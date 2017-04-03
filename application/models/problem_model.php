<?php

/**
 * ProblemModel 
 */
class ProblemModel {
  /**
   * Constructor, expects a Database connection
   * @param Database $db The Database object
   */
  public function __construct(Database $db) {
    $this->db = $db;
  }
  
  /**
   * Get problems from a section
   * @return array an array with several objects (the results)
   */
  public function getProblemsFromSection($section_id) {    
    $sql   = "SELECT problem_id,
    		     problem_extra,
    		     problem_name,         		     
    		     problem_level,
    		     problem_year,
    		     problem_phase
    		     FROM problems WHERE section_id = :section_id ORDER BY problem_name";
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':section_id' => $section_id
    ));
    
    // fetchAll() is the PDO method that gets all result rows
    return $query->fetchAll();
  }  
  
   /**
   * Get Problem from ID
   * @return array an array with several objects (the results)
   */
  public function getProblemFromID($problem_id) { 
    $sql   = "SELECT problem_name,
                     problem_year,
                     problem_level,
                     problem_phase
    		     FROM problems
    		     WHERE problem_id = :problem_id";
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':problem_id' => $problem_id      
    ));
       
    return $query->fetch();
  }  
  
  /**
   * Get Ids from all problems that is mandatory
   * @return array an array with several objects (the results)
   */
  public function getIdsFromProblemsMandatories($section_id) { 
    $sql   = "SELECT problem_id    		     
    		     FROM problems
    		     WHERE section_id = :section_id AND problem_extra = :problem_extra";
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':section_id' => $section_id,
      ':problem_extra' => 0,
    ));
    
    // fetchAll() is the PDO method that gets all result rows
    return $query->fetchAll();
  }  
  
  
  
}
