<?php

/**
 * Class Section
 * This controller shows a section, load the problems and the text
 */
class Section extends Controller {
  /**
   * Construct this object by extending the basic Controller class
   */
  function __construct() {
    parent::__construct();
  }
  
  /**
   * This method controls what happens when you move to /overview/index in your app.
   * Shows a list of all users.
   */
  function index() {    
    $this->view->render('section/index');
  }
  
  function show($section_id) {
    Auth::handleSection($section_id); 	  
    $problem_model = $this->loadModel('Problem');    
    
    $this->view->section_id = $section_id;
    $this->view->problems = $problem_model->getProblemsFromSection($section_id);    
    $this->view->render('section/show');	  
  }
  
}
