<?php
	class Login extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('front');
		$this->load("front/b_user_model","bum");
		$this->load("front/c_learnuser_model",'clm');
	}
	public function index(){
		$data = $this->__init();
		//$this->debug($data);
		//die();
		//$this->clm->auth('yuki@japunis.com','123456');
		$this->__breadCrumb('Login','#','Login');
		if($this->user_login){
			flush();
			redir(base_url('account'));
			die();
		}
		$this->putThemeContent("account/login",$data);
		$this->putJsContent('account/login_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function auth(){
		$s = $this->__init();
		$data = array();
		$this->status = 199;
		$this->message = 'Maaf, username atau password salah';
		$data['user'] = new stdClass();
		if($this->user_login){
			$this->status = 100;
			$this->message = 'Berhasil';
			$data['redirect_url'] = base_url('');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$res = $this->clm->auth($username,$password);
			if(isset($res->id)){
				$sess = $s['sess'];
				if(!isset($sess->user)) $sess->user = new stdClass();
				$sess->user = $res;
				$this->setKey($sess);
				$data['user'] = $res;
				$this->status = 100;
				$this->message = 'Berhasil';
				$data['message'] = 'Berhasil';
				$data['redirect_url'] = base_url('');
			}else{
				$this->status = 199;
				$this->message = 'Maaf, username atau password salah';
			}
		}
		
		echo $this->__json_out($data);
	}
}
