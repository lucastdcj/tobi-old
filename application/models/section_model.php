<?php
/**
 * SectionModel
 */
class SectionModel {
	
  /**
   * Constructor, expects a Database connection
   * @param Database $db The Database object
   */
  public function __construct(Database $db) {
    $this->db = $db;
  }
  
  public function getSection($section_id) {    
    $sql   = "SELECT section_id,
                     section_title    		         		     
    		     FROM sections WHERE section_id = :section_id";
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':section_id' => $section_id
    ));
        
    return $query->fetch();
  }
  
  public function updateUserSection($section_id) {    
    $sql   = "UPDATE users SET section_id = :section_id WHERE user_id = :user_id";
    $query = $this->db->prepare($sql);
    $query->execute(array(      
      ':user_id' => Session::get('user_id'),
      ':section_id' => $section_id
    ));
        
    return $query->rowCount() == 1;
  }
  
  
  
}
