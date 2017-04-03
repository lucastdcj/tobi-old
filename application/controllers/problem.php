<?php

/**
 * Class Problem
 * This controller shows a section, load the problems and the text
 */
class Problem extends Controller {
  /**
   * Construct this object by extending the basic Controller class
   */
  function __construct() {
    parent::__construct();
  }
    
  function show($section_id, $problem_id) {
    Auth::handleSection($section_id); 	  
    $problem_model = $this->loadModel('Problem');
        
    $this->view->problem_id = $problem_id;
    $this->view->problems = $problem_model->getProblemsFromSection($section_id);
    
    $this->view->problem_data = $problem_model->getProblemFromID($problem_id);
    $this->view->section_id = $section_id;
    
    $this->view->render('problem/show');	  
  }
  
  function show_solution($section_id, $problem_id) {
    Auth::handleProblem($problem_id);
    
    $problem_model = $this->loadModel('Problem');
        
    $this->view->problem_id = $problem_id;
    $this->view->problems = $problem_model->getProblemsFromSection($section_id);
    $this->view->section_id = $section_id;
    
    $this->view->render('problem/show_solution');	  
  }
  
}
