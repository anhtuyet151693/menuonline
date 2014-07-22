<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Setting_mod extends CI_Model {
	public function __construct() {
		parent::__construct();
		$mgdb = new MongoClient();   
		  $this->db = $mgdb->ManagerUser;
	}
	
	public function get_infor_user($id){
		$infor_user=$this->db->users->findOne(array("_id"=>$id));
		return $infor_user;
	}
	
	
	
	// get role_id to get permissions of user
	public function get_role_id($role_id){
		$per_id=$this->db->Roles->findOne(array("_id"=>$role_id));
		return $per_id;
	}
	// get all permissions of user who loging
	public function get_permission($per_id){
		$permission=$this->db->Permissions->findOne(array("_id"=>$per_id));
		return $permission;
	}
			//update user edited
	public function update_name_user($userid, $name_change){
		$this->db->users->update(array('_id'=>$userid), 
								array('$set' =>array(
									'name'=>$name_change
								)));
	}
	
	
	//update username edited
	public function update_username_user($userid, $username_change){
		$find_user = $this->db->users->find(array('user_name'=>$username_change))->count();
		if($find_user<1){
			$this->db->users->update(array('_id'=>$userid), 
								array('$set' =>array(
									'user_name'=>$username_change
							)));
		}else {
			 $find_user = 1;
		}
		return $find_user;
	}
	
	
	public function update_pass($userid, $pass_new){
		$this->db->users->update(array('_id'=>$userid), 
								array('$set' =>array(
									'pass'=>$pass_new
							)));
	}
	
}
	
	
?>