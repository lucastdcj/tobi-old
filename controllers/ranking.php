<?php

/**
 * Class Ranking
 * This controller shows a section, load the problems and the text
 */
class Ranking extends Controller {
  
  /**
   * Construct this object by extending the basic Controller class
   */
  function __construct() {
    parent::__construct();
  }
    
  function show() {    	  
    $ranking_model = $this->loadModel('Ranking');
    $this->view->users= $ranking_model->getUsersOrdered();
        
    $this->view->render('ranking/show');	  
  }
  
  
}
