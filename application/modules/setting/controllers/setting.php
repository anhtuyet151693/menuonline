<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MX_Controller {
	 
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->model("setting_mod");
	}
	public function index(){
		/* value of role body (my infor)
		show default when load setting page*/
		$id = $this->session->userdata("id");
		if(empty($id)){
			redirect('/home', 'refresh');
		}else{
			$array=$this->public_myinfor();
			$this->load->view("home/header");
			$this->load->view("setting_body",$array);
			$this->load->view("home/footer");
		}
			
		}
	// get information of user who loging
	public function my_infor(){
		$array=$this->public_myinfor();
		$this->load->view("My_Infor/myInfo_body", $array);
	}
	// value of myinfor
	private function public_myinfor(){
		$id = $this->session->userdata("id");
		$inf_user = $this->setting_mod->get_infor_user($id);
		foreach($inf_user['roles'] as $key_r => $val_r){
			$role_id= $val_r;
		}
		
		$permissions_id=$this->setting_mod->get_role_id($role_id);
				foreach($permissions_id['permission'] as $key => $val){
					// get per_id and information of all permission
						$permissions= $this->setting_mod->get_permission($val);
						$array_per[$val]=$permissions['per_name'];
					}
				$roles = $permissions_id['role_name'];
					//var_dump($roles);
		$aisle_id=isset($inf_user['aisle_id'])?$inf_user['aisle_id']:NULL;
		$aisle_name=isset($inf_user['aisle_name'])?$inf_user['aisle_name']:NULL;
		$enable=isset($inf_user['enable'])?$inf_user['enable']:NULL;	
			
		 $array= array(
				'userid'=>$id,
				'name'=>$inf_user["name"],
				'aisle_id'=>$aisle_id,
				'aisle_name'=>$aisle_name,
				'username'=>$inf_user["user_name"],
				'pass'=>$inf_user["pass"],
				'enable'=>$enable,
				'role_id'=>$role_id,
				'roles'=>$roles,
				'permissions'=>$array_per
			);	
		return $array;
	}
	
	/*--------------Edit name of user----------------*/
	public function form_edit_name(){
		///echo ($this->input->post("value"));
		$name = $this->input->post("value");
		$name_edit=array(
			'name'=>$name
		);
		$this->load->view("My_Infor/ajax_edit_users", $name_edit);
	}
	
	public function update_name_user(){
		$name_change = $this->input->post("name_edit");
		//echo $name_change;
		$userid =  $this->session->userdata("id");
		$this->setting_mod->update_name_user($userid, $name_change);
		
		//after updated...reload setting page
		$this->my_infor();
	}
	
	
	
	
	/*--------------Edit username of user----------------*/
	public function form_edit_username(){
		$username = $this->input->post("value");
		$username_edit=array(
			'username'=>$username
		);
		$this->load->view("My_Infor/ajax_edit_username", $username_edit);
	}
	
	
	public function update_username_user(){
		$username_change = $this->input->post("username_edit");
		//echo $name_change;
		$userid =  $this->session->userdata("id");
		$find_user=$this->setting_mod->update_username_user($userid, $username_change);
		if($find_user==1){
			$id = $this->session->userdata("id");
			$inf_user = $this->setting_mod->get_infor_user($id);
			foreach($inf_user['roles'] as $key_r => $val_r){
				$role_id= $val_r;
		}
		
		$permissions_id=$this->setting_mod->get_role_id($role_id);
				foreach($permissions_id['permission'] as $key => $val){
					// get per_id and information of all permission
						$permissions= $this->setting_mod->get_permission($val);
						$array_per[$val]=$permissions['per_name'];
					}
				$roles = $permissions_id['role_name'];
					//var_dump($roles);
		$aisle_id=isset($inf_user['aisle_id'])?$inf_user['aisle_id']:NULL;
		$aisle_name=isset($inf_user['aisle_name'])?$inf_user['aisle_name']:NULL;
		$enable=isset($inf_user['enable'])?$inf_user['enable']:NULL;	
			
		 $check_username= array(
				'userid'=>$id,
				'name'=>$inf_user["name"],
				'aisle_id'=>$aisle_id,
				'aisle_name'=>$aisle_name,
				'username'=>$username_change,
				'pass'=>$inf_user["pass"],
				'enable'=>$enable,
				'roles'=>$roles,
				'permissions'=>$array_per,
				'check_username'=>$find_user
			);	
			$this->load->view("My_Infor/ajax_save_username", $check_username);
		}else{
			$this->my_infor();
		}
		
	}
	
	
	/*--------------Edit pass of user----------------*/
	public function form_edit_pass(){
		$pass = $this->input->post("value");
		$pass_edit=array(
			'pass'=>$pass
		);
		$this->load->view("My_Infor/ajax_edit_pass", $pass_edit);
	}
	///confirm pass
	public function update_pass(){
		$old_pass = $this->input->post("old_pass");
		$pass_new = $this->input->post("New_pass");
		$pass_conf_new= $this->input->post("conf_new_pass");
		$userid =  $this->session->userdata("id");
		if($pass_new===$pass_conf_new){
			$this->setting_mod->update_pass($userid, $pass_new);
			$this->my_infor();
		}else{
			$old_pw=array(
				'pass'=>$old_pass
		);
			$this->load->view("My_Infor/ajax_save_pass", $old_pw);
		}
		echo $old_pass;
		
	}
	
		
}
	
?>