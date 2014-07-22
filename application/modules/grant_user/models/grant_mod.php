<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Grant_mod extends CI_Model {
	public function __construct() {
		parent::__construct();
		$mgdb = new MongoClient();   
		  $this->db = $mgdb->ManagerUser;
	}


	public function find_user_id($user_id){
		$user = $this->db->users->findOne(array('_id'=>$user_id));
		return $user;
	}

	public function find_per_name($per_id){
		$per = $this->db->Permissions->findOne(array('_id'=>$per_id));
		return $per;
	}

	// Neu khi phan quyen, per pi delete thi se luu vao bang tam  va codeigniter framework type=0
	public function dele_per($userid, $per_id){
		$per = $this->db->User_Permission->insert(array('user_id'=>(int)$userid,
														'per_id'=>$per_id,
														'type'=>0								
													));
	}
	//(int)$userid,  'type'=>0
															  
	public function find_per($userid){
		$find_per = $this->db->User_Permission->find(array('user_id'=>(int)$userid, 'type'=>0));	
		return $find_per;
	}
}