<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends MX_Controller {
	 
	public function __construct(){
		
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->model("setting/setting_mod");
		$this->load->model("management_mod");
		$this->load->library('session');
	}
	//when click on decentralization, find role name of role in db to show in button
	public function decentralization(){
		foreach($this->session->userdata("role") as $role_id){
			if($role_id=="r01"){
				// Lay ten role co id=r02
				$user_pm=$this->setting_mod->get_role_id("r02");
				$role_name_pm = $user_pm["role_name"];
				// Lay ten role co id=r04
				$user_umo=$this->setting_mod->get_role_id("r04");
				$role_name_umo = $user_umo["role_name"];
				$arr = array(
					'role_signin_id'=>$role_id,
					"role_pm_id"=>"r02",
					"role_name_pm"=>$role_name_pm,
					"role_umo_id"=>"r04",
					"role_name_umo"=>$role_name_umo
				);
				$this->load->view("sys_management_view", $arr);
			}elseif($role_id=="r02"){
		// neu user dag dag nhap la partner manger thi tim nhung partner user cua gian hang do -> den show_user_view 
				$aisle_id=$this->session->userdata("aisle_id");
			//	echo $aisle_id;
				$role=$this->management_mod->get_user_pu($aisle_id);
				$arr = array(
					'role_signin_id'=>$role_id,
					"role"=>$role
				);
				$this->load->view("sys_management_view",$arr);
			}
		}
	}
	
	//Lay ten cac user co role id = $this->input->post("role_id")
	public function get_all_pm(){
		$r_id = $this->input->post("role_id");
		if($r_id=="r02"){
			$role=$this->management_mod->get_user_pm("r02");
			$arr = array(
					"role"=>$role
				);
		}
		elseif($r_id=="r04"){
			$role=$this->management_mod->get_user_pm("r04");
			$arr = array(
					"role"=>$role
				);
		}
		$this->load->view("show_user_view", $arr);
	}
	
	
	public function get_role_id(){
		$user_id = $this->input->post("user_id");
		$role_use = $this->management_mod->get_role_user_id((int)$user_id);
		foreach($role_use['roles'] as $key => $r_id){
			//var_dump($r_id);
			$r_name = $this->management_mod->get_role_name($r_id);	
			//var_dump($r_name['role_name']);
			$arr_role[$r_id] = $r_name['role_name'];
		}
		//
		$arr_role_name = array('arr_role'=>$arr_role);
		//var_dump($arr_role_name);
		$this->load->view("role_name",$arr_role_name);
	}
	
	
	public function update_enable(){
			//var_dump($_REQUEST['val']);
			$id=$this->input->post('id');
			$check=$this->input->post('val');
			//var_dump($id.$check);
			$u=$this->management_mod->update_enable((int)$check, $id);
			foreach($u as $key => $val){
				if($key=="nModified" && $val==1){
					$arr =array('modify'=>$val);
				}
			}
			echo json_encode($arr);
	}
	
	
	
	
	// Lay thong tin user can edit de hien len modal
		/*public function profile_user(){
			$id=$this->input->post('id');
			*/
			
			
			
			
			// tim tat ca permission cua user de tick vao khi edit user
			/*$per_user=$this->profile_mod->show_permission($id, $role_id, $role_name);
			foreach($per_user as $per => $per_user){
				//var_dump($per_user["permission"]);
			}*/
			
		/*khi user đăng nhập có role=r01(system manager) thì khi cấp quyền cho user, 
			chỉ hiện user có role là r02 (partner manager) và r04(menu online user), role có thể phân quyền cho user là r02 và r04,
			system manager không quản lí và phân quyền cho r03(partner user)*/
		/*	foreach($this->sess['role'] as $key => $val){
						$roles_user_login=$key;
					}
			$role=$this->profile_mod->get_roles_user($roles_user_login) ;
			$role_part_manager=$this->profile_mod->per_part_manager();
			foreach($role_part_manager as $rpm){
				$arr_rpm=$rpm;
			}
			$find=$this->profile_mod->find_user($id);
		//	 $per=$this->profile_mod->get_permissions();
			foreach($find as $f){
					$array_u=$f;
				}
			
			$array_data=array('fu'=>$array_u,'r'=>$role, 'arr_rpm'=>$arr_rpm, 'per_user'=>$per_user);
			$this->load->view("edit_user", $array_data);	*/
		//}
	
	
}