<?php

/**
 * Class Contest
 * This controller shows a section, load the problems and the text
 */
class Contest extends Controller {
  /**
   * Construct this object by extending the basic Controller class
   */
  function __construct() {
    parent::__construct();
  }
  
  function show() {
    Auth::handleSection(25); 	  
    $section_model = $this->loadModel('Section');    
    
    $this->view->sections = $section_model->getSectionContests();    
    $this->view->render('contest/show');	  
  }
  
}
