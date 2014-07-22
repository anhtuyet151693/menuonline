<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Home_mod extends CI_Model {
	public function __construct() {
		parent::__construct();
		$mgdb = new MongoClient();   
		  $this->db = $mgdb->ManagerUser;
	}

	public function signin($user, $pass){
		$signin = $this->db->users->findOne(array("user_name"=> $user, "pass"=>$pass));
		return $signin;
	}
	
}

?>