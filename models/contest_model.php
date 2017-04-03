<?php

/**
 * SubmitModel 
 */
class SubmitModel {
  /**
   * Constructor, expects a Database connection
   * @param Database $db The Database object
   */
  public function __construct(Database $db) {
    $this->db = $db;
  }
  
  public function registerNewSubmission($problem_id, $status, $wrong_test = 0, $run_time = 0, $run_memory = 0) {
    // perform all necessary form checks    
    $code_source = $_POST['code_source'];
    $language = $_POST['language'];
    
    // For all these cases we don't register in DB
    if (empty($code_source)) {
      $_SESSION["feedback_negative"][] = FEEDBACK_SOURCE_FILE_FIELD_EMPTY;
      return false;
    } elseif ($language == 0) {
      $_SESSION["feedback_negative"][] = FEEDBACK_LANGUAGE_FIELD_EMPTY;
      return false;
    } elseif ($status == CODE_TOO_LONG) {
      $_SESSION["feedback_negative"][] = FEEDBACK_CODE_TOO_LONG;
      return false;     
    } elseif ($status == COMPILATION_ERROR) {
      $_SESSION["feedback_negative"][] = FEEDBACK_COMPILATION_ERROR;
      return false;     
    } elseif ($status == OTHER_ERROR) {
      $_SESSION["feedback_negative"][] = FEEDBACK_OTHER_ERROR;
      return false;     
    } elseif ($status == FORBIDDEN_SYSCALL) {
      $_SESSION["feedback_negative"][] = FEEDBACK_FORBIDDEN_SYSCALL_ERROR;
      return false;     
    }
        
    $sql = "INSERT INTO submissions (problem_id, user_id, submission_code, submission_language, submission_runtime, submission_memory, submission_status, submission_wrong_test)
                   VALUES (:problem_id, :user_id, :submission_code, :submission_language, :submission_runtime, :submission_memory, :submission_status, :submission_wrong_test)";
        
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':problem_id' => $problem_id,
      ':user_id' => Session::get('user_id'),
      ':submission_code' => $code_source,
      ':submission_language' => $language,
      ':submission_runtime' => $run_time,
      ':submission_memory' => $run_memory,
      ':submission_status' => $status,
      ':submission_wrong_test' => $wrong_test      
    ));               
    
    $count = $query->rowCount();    
    if ($count != 1) {
      $_SESSION["feedback_negative"][] = FEEDBACK_SUBMISSION_REGISTRATION_FAILED;
      return false;
    }
    
    return true;
  }
  
  /**
   * Get last 10 submissions given a problem
   * @return array an array with several objects (the results)
   */  
  public function getSubmissionsFromProblem($problem_id) {    
    $sql   = "SELECT submission_id,
                     submission_code,
    		     submission_language,
    		     submission_runtime,
    		     submission_memory,
    		     submission_status,
    		     submission_time    		     
    	             FROM submissions
    	             WHERE problem_id = :problem_id AND user_id = :user_id
    	             ORDER BY submission_time DESC
    	             LIMIT 10";
    	             
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':problem_id' => $problem_id,
      ':user_id' => Session::get('user_id')
    ));
    
    // fetchAll() is the PDO method that gets all result rows
    return $query->fetchAll();
  }

  /**
   * Get code given a submission
   * @return array an array with several objects (the results)
   */  
  public function getCodeFromSubmission($submission_id) {    
    $sql   = "SELECT submission_code    		         		     
    	             FROM submissions
    	             WHERE submission_id = :submission_id AND user_id = :user_id";
    	             
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':submission_id' => $submission_id,
      ':user_id' => Session::get('user_id')
    ));
    
    $submission = $query->fetch();
    return $submission->submission_code;
  }  
  
  public function addProblemUser($problem_id) {
    $sql   = "INSERT INTO problem_user (problem_id, user_id)
    		VALUES (:problem_id, :user_id)";
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':user_id' => Session::get('user_id'),
      ':problem_id' => $problem_id
    ));
        
    return $query->rowCount() == 1;  	  
  }
  
}
