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
         
    $sql   = "SELECT A.user_id, A.user_name, A.section_id, COUNT( DISTINCT B.problem_id ) AS problems
    		FROM users AS A
    		LEFT JOIN problem_user as B
    		ON A.user_id = B.user_id
    		GROUP BY B.user_id
    		ORDER BY A.section_id DESC, problems DESC, A.user_name;";
    $query = $this->db->prepare($sql);
    $query->execute();
    $all_users = $query->fetchAll();
    $ans = array();

    $last_section_id = 0;
    $last_problems = 0;
    $last_pos = 0;
    $pos = 1;
    foreach ($all_users as $key => $val) {
        // Skip if it's lucastdcj
        if ($val->user_id == 736) continue;
        if ($val->problems == 0) continue;
    	$ans[$val->user_id]['user_name'] = $val->user_name;
    	$ans[$val->user_id]['section_id'] = $val->section_id;
	$ans[$val->user_id]['problems'] = $val->problems;    	
	if ($val->section_id != $last_section_id || $val->problems != $last_problems) {
	  $ans[$val->user_id]['ranking'] = $pos; 
          $last_pos = $pos;	
          $last_section_id = $val->section_id;
          $last_problems = $val->problems;
	} else {
          $ans[$val->user_id]['ranking'] = $last_pos;
        }
        $pos = $pos + 1;
    }    
    return $ans;
  }  
    
  
}

