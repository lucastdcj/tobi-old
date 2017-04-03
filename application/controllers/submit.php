<?php

/**
 * Class Submit
 * This controller is responsible to verify a submission, show history
 */
class Submit extends Controller {
  /**
   * Construct this object by extending the basic Controller class
   */
  function __construct() {
    parent::__construct();
  }
  
  // Responsible to load the leftmenu
  function show_form($section_id, $problem_id) {
    Auth::handleSection($section_id);
    
    $problem_model          = $this->loadModel('Problem');
    $this->view->section_id = $section_id;
    $this->view->problem_id = $problem_id;
    $this->view->problems   = $problem_model->getProblemsFromSection($section_id);
    
    $this->view->render('submit/show_form');
  }
  
  function show_history($section_id, $problem_id) {
    Auth::handleSection($section_id);
    
    $submit_model = $this->loadModel('Submit');
    
    // This code is responsible to load the leftmenu
    $problem_model          = $this->loadModel('Problem');
    $this->view->section_id = $section_id;
    $this->view->problems   = $problem_model->getProblemsFromSection($section_id);
    
    $this->view->submissions = $submit_model->getSubmissionsFromProblem($problem_id);
    $this->view->render('submit/show_history');
  }
  
  // No need no authenticate user because in the selection we already
  // do this check
  function show_code($submission_id) {
    $submit_model = $this->loadModel('Submit');
    
    $this->view->submission_code = $submit_model->getCodeFromSubmission($submission_id);
    $this->view->render('submit/show_code');
  }
  
  function test_code($section_id, $problem_id) {
    Auth::handleSection($section_id);
    $submit_model = $this->loadModel('Submit');
    
    $submission_path = SUBMISSION_PATH . Session::get('user_id') . '/' . $problem_id . '/';
    if (!is_dir($submission_path)) {
      mkdir($submission_path);
      chmod($submission_path, 0777);
    }
    
    $language      = $_POST['language'];
    $compile_error = $this->compile_submission($_POST['code_source'], $language, $problem_id);
    
    if ($compile_error) {
      $status     = COMPILATION_ERROR;       
    } else {      
      $result = $this->run_submission($problem_id, $language);
      $status     = $result['status'];
      $run_memory = $result['run_memory'];
      $run_time   = $result['run_time'];
      $wrong_test = $result['wrong_test'];           
    }
    
    // Save in DB the submission and take the  
    $register_successful = $submit_model->registerNewSubmission($problem_id, $status, $wrong_test, $run_time, $run_memory);
    
    if (!$register_successful) {
      header('location: ' . URL . 'submit/show_form/' . $section_id . '/' . $problem_id);
      return;
    }
    
    if ($status == ACCEPTED) {
      $user_problems = Session::get('user_problems');
      // If it's the first time the user solved this problem      
      if (!isset($user_problems[$problem_id])) {
        
        // First we update that this user solved this problem
        Session::setArray('user_problems', $problem_id);        
        $submit_model->addProblemUser($problem_id);
        $user_problems[$problem_id] = true;
      }

      // Now we have to check if the user has passed of section, i.e it was
      // the last problem to be solved in this section
      $problem_model = $this->loadModel('Problem');
      $problems_ids  = $problem_model->getIdsFromProblemsMandatories($section_id);
        
      $section_advanced = true;
      $is_mandatory     = false;
      foreach ($problems_ids as $key => $value) {
        // Check if it was a mandatory problem
        if ($value->problem_id == $problem_id) {
          $is_mandatory = true;
        }
          
        // Check if exists a mandatory problem unset	 
        if (!isset($user_problems[$value->problem_id])) {
          $section_advanced = false;
          break;
        }
      }
        
      if ($section_advanced && $is_mandatory) {
        $section_model   = $this->loadModel('Section');
        $user_section_id = max($section_id + 1, Session::get('section_id'));
        Session::set('section_id', $user_section_id);
        $section_model->updateUserSection($user_section_id);
      }      
    }
    
    // After the code run show the history for that problem
    header('location: ' . URL . 'submit/show_history/' . $section_id . '/' . $problem_id);
  }
  
  function get_compile_cmd($language) {
    switch ($language) {
      case CPP:
        return 'g++ -lm -lcrypt -O2 -pipe -DONLINE_JUDGE -O2 [PATH]source.cpp -o [PATH]source';
      case C:
        return 'gcc -lm -lcrypt -O2 -pipe -ansi -DONLINE_JUDGE  [PATH]source.c -o [PATH]source';
    }
  }
  
  function get_extension($language) {
    switch ($language) {
      case CPP:
        return '.cpp';
      case C:
        return '.c';
    }
  }
  
  function get_run_command($language) {
    switch ($language) {
      case CPP:
        return './[PATH]source';
      case C:
        return './[PATH]source';
  
    }
  }
  
  /**
   * Compiles a submission
   *
   * This function grades the submission whose ID is $submission['id'] using the language whose ID is $language['id'].
   * 
   * @param array $submission The submission.
   * @param array $language The language.
   */
  function compile_submission($code, $language, $problem_id) {
    $submission_path = SUBMISSION_PATH . Session::get('user_id') . '/' . $problem_id . '/';
    
    file_put_contents($submission_path . 'source' . $this->get_extension($language), $code);     
    $compile_cmd = str_replace('[PATH]', $submission_path, $this->get_compile_cmd($language)) . ' 2>&1';
    
    // retval = 1 if some error ocurred, retval = 0 otherwise
    exec($compile_cmd, $output, $retval);
    
    $compile_result = '';
    foreach ($output as $v) {
      $compile_result .= str_replace($submission_path, '', $v) . "\n";
    }
    
    // Remove source code 
    unlink($submission_path . 'source' . $this->get_extension($language));
    // Put the compile result at compile file
    if ($retval) {
      Session::set('compilation_msg', $compile_result);
    }
    // file_put_contents($submission_path . 'compile', $compile_result);
    return $retval;
  }
  
  /**
   * Runs a submission against the testcases
   *
   * This function runs the submission whose ID is $submission['id'] against the testcases, and returns the verdict.
   * 
   * @param int $problem_id 	The problem.
   * @param string $code  	The code.
   * @param int $language 	The language.
   *
   * @return int The verdict.
   */
  function run_submission($problem_id,  $language, $time_limit = 2.5, $memory_limit = 256) {
        
    $grader_path     = MOE_BOX_PATH;
    $submission_path = SUBMISSION_PATH . Session::get('user_id') . '/' . $problem_id . '/';
        
    $input_path = './' . PROBLEMS_PATH . $problem_id . '/input/';
    $output_path = PROBLEMS_PATH . $problem_id . '/output/';
         
    $handle = opendir($input_path);  
    
    $status = ACCEPTED;
    $run_time = 0.0;
    $run_memory = 0.0;
    $wrong_test = 0;
    
    while (($file = readdir($handle)) !== false) {      
      if ($file == '.' || $file == '..' || is_dir($input_path . $file)) {
        continue;
      }
      
      $test = str_replace('in', '', $file);
      
      $run_cmd = $grader_path . 'box';
      // Memory Limit
      // $run_cmd .= ' -m' . (1024 * $problem['memory_limit']);
      $run_cmd .= ' -f -a3'; // Limit to syscall     
      $run_cmd .= ' -w ' . $time_limit;
      $run_cmd .= ' -i ' . $input_path . 'in' . $test;
      $run_cmd .= ' -o ' . $submission_path . 'out' . $test;
      $run_cmd .= ' -r ' . $submission_path . 'error';
      $run_cmd .= ' -M ' . $submission_path . 'result';
      $run_cmd .= ' -- ' . str_replace(array(
        '[PATH]',
        '[TIME_LIMIT]',
        '[MEMORY_LIMIT]'
      ), array(
        $submission_path,
        $time_limit,
        $memory_limit
      ), $this->get_run_command($language)) . ' 2> /dev/null';
            
      exec($run_cmd, $output, $retval);
      
      // reads the execution results      
      $run_result = array();
      foreach (explode("\n", file_get_contents($submission_path . 'result')) as $w) {
        $line                 = explode(':', $w);
        $run_result[$line[0]] = @$line[1];
      }
                  
      if (@$run_result['status'] == 'SG' && @$run_result['exitsig'] == 11) {
        $status = RUNTIME_ERROR;
      } else if (@$run_result['status'] == 'TO') {
        $status = TIME_LIMIT_EXCEEDED; 
      } else if (@$run_result['status'] == 'SG' && @$run_result['exitsig'] == 9) {
        $status = MEMORY_LIMIT_EXCEEDED;
      } else if (@$run_result['status'] == 'FO') {
        $status = FORBIDDEN_SYSCALL; 
      } else if (isset($run_result['status'])) {
        $status = OTHER_ERROR; 
      } else {
        $diff_cmd = 'diff -b -q ' . $output_path . 'out' . $test . ' ' . $submission_path . 'out' . $test . ' > ' . $submission_path . 'diff';
        
        exec($diff_cmd, $output, $retval);
        $diff = file_get_contents($submission_path . 'diff');
   
        if (!empty($diff)) {
          $status = WRONG_ANSWER; 
        }
        unlink($submission_path . 'diff');
      }
    
      $run_time = max($run_time, (float)$run_result['time-wall']);
      $run_memory = max($run_memory, (float)$run_result['mem']);
      
      unlink($submission_path . 'error');
      unlink($submission_path . 'result');
      unlink($submission_path . 'out' . $test);
      
      if ($status !== ACCEPTED) {
        $wrong_test = $test;
        break;
      }
      
    }
    
    closedir($handle);
    unlink($submission_path . 'source');
    unlink($submission_path . 'compile');
    
    $run_memory = ceil($run_memory / (1024 * 1024)); 
        
    $result = array();
    $result['status'] = $status;
    $result['run_time'] = $run_time;
    $result['run_memory'] = $run_memory;
    $result['wrong_test'] = $wrong_test;
    
    return $result;
  }
  
}
