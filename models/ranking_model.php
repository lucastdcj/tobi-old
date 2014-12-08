<?php
/**
 * SectionModel
 */
class RankingModel {
	
  /**
   * Constructor, expects a Database connection
   * @param Database $db The Database object
   */
  public function __construct(Database $db) {
    $this->db = $db;
  }
  
  public function getUsersOrdered() {
         
    $sql   = "SELECT user_id, user_name, section_id FROM users ORDER BY section_id DESC";
    $query = $this->db->prepare($sql);
    $query->execute();
    $all_users = $query->fetchAll();
    $ans = array();
    foreach ($all_users as $key => $val) {
    	$ans[$val->user_id]['user_name'] = $val->user_name;
    	$ans[$val->user_id]['section_id'] = $val->section_id;
	$ans[$val->user_id]['problems'] = 0;    	
    }    
    $sql   = "SELECT user_id, COUNT(DISTINCT problem_id) AS problems FROM problem_user GROUP BY user_id ";
    $query = $this->db->prepare($sql);
    $query->execute();
    $all_users = $query->fetchAll();
        
    foreach ($all_users as $key => $val) {
      // Verify if user still exists
      if (isset($ans[$val->user_id])) {
        $ans[$val->user_id]['problems'] = max($val->problems,0);
      }
    }
    
    return $ans;
  }  
    
  
}

