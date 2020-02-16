<?php
class Profil extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('front');
		$this->load('front/b_user_model','bum');
		$this->load('front/c_learnuser_model','clum');
		$this->load('front/d_learnpelajaran_model','pelajaran');
		$this->load('front/e_learnhasil_model','hasil');
	}
	private function __redirCF(){
		$cf = 'https';
		if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) $cf = $_SERVER['HTTP_X_FORWARDED_PROTO'];
		if($cf == 'http' ){
    	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    	header('HTTP/1.1 301 Moved Permanently');
    	header('Location: ' . $redirect);
    	exit();
		}
	}
	public function index(){
		$data = $this->__init();
		if(!$this->user_login){
			redir(base_url('login'));
			die();
		}
		$data['hasil'] = $this->hasil->getByPelajaranAndUserId($data['sess']->user->c_learnuser_id,'',0);
		
		//$this->debug($data['hasil']);
		//die();
		
		$this->putThemeContent("profil/home",$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function edit_password(){
		$data = $this->__init();
		if(!$this->user_login){
			redir(base_url('login'));
			die();
		}
		
		$this->putThemeContent("profil/edit_password",$data);
		
		$this->putJsContent("profil/edit_password_bottom",$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function edit_password_api(){
		$s = $this->__init();
		if(!$this->user_login){
			redir(base_url('login'));
			die();
		}
		$sess = $s['sess'];
		$data = array();
		$du = array();
		$oldpassword = md5($this->input->post("oldpassword"));
		$du['password'] = $this->input->post("password");
		if(strlen($du['password'])>4){
			if($oldpassword == $sess->user->password){
				$b_user_id = $sess->user->id;
				$du['password'] = md5($du['password']);
				$res = $this->bum->update($b_user_id,$du);
				if($res){
					$sess->user->password = $du['password'];
					$this->setKey($sess);
					$this->status = 100;
					$this->message = 'Berhasil';
				}else{
					$this->status = 444;
					$this->message = 'Tidak dapat menyimpan password baru ke database';
				}
			}else{
				$this->status = 444;
				$this->message = 'Password lama salah.'.$oldpassword.' - '.$sess->user->password;
			}
		}else{
			$this->status = 444;
			$this->message = 'Password baru terlalu pendek';
		}
		$this->__json_out($data);
	}
	public function edit(){
		$data = $this->__init();
		if(!$this->user_login){
			redir(base_url('login'));
			die();
		}
		$this->putThemeContent("profil/edit",$data);
		
		$this->putJsContent("profil/edit_bottom",$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function edit_api(){
		$s = $this->__init();
		if(!$this->user_login){
			redir(base_url('login'));
			die();
		}
		$sess = $s['sess'];
		$data = array();
		$di = array();
		$du = array();
		$di['email'] = $this->input->post("email");
		$di['fnama'] = $this->input->post("fnama");
		if(strlen($di['email'])>4){
			$b_user_id = $sess->user->id;
			$check = $this->bum->checkEmail($di['email'],$b_user_id);
			if(empty($check)){
				$res = $this->bum->update($b_user_id,$di);
				if($res){
					$sess->user->email = $di['email'];
					$sess->user->fnama = $di['fnama'];
					$this->setKey($sess);
					$this->status = 100;
					$this->message = 'Berhasil';
				}else{
					$this->status = 444;
					$this->message = 'Tidak dapat menyimpan perubahan data ke database';
				}
			}else{
				$this->status = 202;
				$this->message = 'Email sudah digunakan';
			}
		}else{
			$this->status = 444;
			$this->message = 'Password baru terlalu pendek';
		}
		$this->__json_out($data);
	}

}
