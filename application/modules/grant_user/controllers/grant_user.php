<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grant_user extends MX_Controller {
	 
	public function __construct(){
		
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->model("management/management_mod");
		$this->load->model("grant_mod");
		$this->load->library('session');
	}
	
	public function index(){
		//$this->load->view("home/header");
		$user_name = $this->input->post("user_name");
		$user_id = $this->input->post("id");
		$user = $this->grant_mod->find_user_id((int)$user_id);
		$i=0; $j=0;
		$result_per=[];
		//trong bang role, lay tat ca cac per_id cua role do
		foreach($user['roles'] as $role_id){
			$arr_role_id[$role_id]=$role_id;
			$r_id=$this->management_mod->get_role_name($role_id);
			$arr_role_name[$role_id] =  $r_id['role_name'];
			//var_dump($r_id['role_name']);
			foreach($r_id['permission'] as $per_id){
				$arr_per[$i]= $per_id;
				$i++;
			}
		}
		// Tim per luu trong bang tam, neu co type=0 thi unset per 
			$find_per = $this->grant_mod->find_per($user_id);
			foreach($find_per as $per){
				//var_dump($per['per_id']);
				if(in_array($per['per_id'], $arr_per) ){
					$val = $per['per_id'];
					$key = array_search($val,$arr_per);
					if($key!==false){
					    unset($arr_per[$key]);
					    
					}
				}
			}
		
		//ten per trong bang per
		//var_dump($arr_per);
		foreach($arr_per as $per_key => $per_id){
			//var_dump($per_id);
			$per=$this->grant_mod->find_per_name($per_id);
			$permission[$i] = $per;
			$i++;
		}
		
		$arr_user = array(
			'user_id'=>$user['_id'],
			'name'=>$user['name'],
			'user_name'=>$user['user_name'],
			'user_name'=>$user['user_name'],
			'pass'=>$user['pass'],
			'role_id'=>$arr_role_id,
			'role_name'=>$arr_role_name,
			'permission'=>$permission
			/*'permission_id'=>$arr_per,
			'permission_name'=>$permission*/
		);
		
		$this->load->view("grant_view", $arr_user);
		$this->load->view("home/footer");
	}
	
	public function Delete(){
		$per_id = $this->input->post("per_id");
		echo $inp_userid;
		foreach($per_id as $per_id_dele){
			$this->grant_mod->dele_per($inp_userid, $per_id_dele);
		}
	}
	
}

?>