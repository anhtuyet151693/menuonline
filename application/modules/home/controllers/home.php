
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	 
	public function __construct(){
		
		parent::__construct();
		//$this->load->model("home_mod");
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->model("home_mod");
		$this->load->library('session');
	}
	public function index(){
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('footer');
	}
	// Function dang nhap
	public function signin(){
		if($this->input->post('username')===FALSE) {
			redirect('/home', 'refresh');
			}
		$user_name=$this->input->post('username');
		$pass=$this->input->post('pass');
		$signin = $this->home_mod->signin($user_name, $pass);
		$aisle_id=isset($signin['aisle_id'])?$signin['aisle_id']:NULL;
		$aisle_name=isset($signin['aisle_name'])?$signin['aisle_name']:NULL;
		$enable=isset($signin['enable'])?$signin['enable']:NULL;
		
		if($signin){
			if($enable==0) {
				$session = array('login'=>3);
				$this->session->set_userdata($session);
			}else{
				//$login=1;
				$session = array(
					'login'=>1,
					'id'=>$signin['_id'],
					'name' =>$signin['name'], 
					'aisle_id'=>$aisle_id,      
					'aisle_name'=>$aisle_name,                                                                                                           
					'username'=> $user_name,
					'pass'=>$pass,
					'enable'=>$enable, 
					'role'=>$signin['roles']
				);
				$this->session->set_userdata($session);
				redirect('/home', 'refresh');
				}
			
		}else{
				$session = array('login'=>2);
				$this->session->set_userdata($session);
			}
		redirect('/home', 'refresh');
		echo $login;
	}	
	
	
	
	public function logout(){
			$this->session->sess_destroy();
			redirect('home', 'refresh');
		}
		

}