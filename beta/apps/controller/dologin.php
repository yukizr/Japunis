<?php
class Dologin extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
		$this->load("m_pengguna");
	}
	public function index(){
		$sess = $this->getKey();
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$res = $this->m_pengguna->auth($email,$password);
		if($res){
      $sess = $this->getKey();
  		$data = array();
  		$data['sess'] = $sess;
			if (isset($sess['admin'])) {
			  $this->view("backend/__header");
			  $this->view("backend/__nav");
			  $this->view("backend/home/home");
			  $this->view("backend/__bottom");
			  $this->view("backend/__footer");
			} else {
        $this->view("frontend/home/__header",$data);
  			$this->view("frontend/home/__nav",$data);
  			$this->view("frontend/home/home",$data);
  			$this->view("frontend/home/__bottom",$data);
  			$this->view("frontend/home/__footer",$data);
			}


		}else{
			$data['warn'] = 'Invalid email or password';
			$this->view("backend/login/__header",$data);
			$this->view("backend/login/__nav",$data);
			$this->view("backend/login/login",$data);
			$this->view("backend/login/__bottom",$data);
			$this->view("backend/login/__footer",$data);
		}


	}

	public function login(){
	   $this->view('backend/__header');
	   $this->view('backend/__nav');
		 $this->view('backend/admin/login');
	   $this->view('backend/__bottom');
	   $this->view('backend/__footer');
	}
  public function template(){
	   $this->view('template');
	}
	private function __out($data){
	   $res = array('status'=>$this->status,'post' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
