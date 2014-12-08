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
    		ORDER BY A.section_id, problems DESC;";
    $query = $this->db->prepare($sql);
    $query->execute();
    $all_users = $query->fetchAll();
    $ans = array();
    foreach ($all_users as $key => $val) {
    	$ans[$val->user_id]['user_name'] = $val->user_name;
    	$ans[$val->user_id]['section_id'] = $val->section_id;
	$ans[$val->user_id]['problems'] = $val->problems;    	
    }    
    return $ans;
  }  
    
  
}

