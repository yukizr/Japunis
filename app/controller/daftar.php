<?php
	class Daftar extends JI_Controller{

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
		$this->putThemeContent("account/register",$data);
		$this->putJsContent('account/register_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function proses(){
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
			$di = array();
			$du = array();
			
			$di['email'] = $this->input->post('username');
			$di['fnama'] = $this->input->post('fnama');
			$di['password'] = $this->input->post('password');
			$du['kelas'] = $this->input->post('kelas');
			$du['is_active'] = 1;

			//google captcha
			$captcha=$_POST['g-recaptcha-response'];
			$secretKey = "6LcfVtkUAAAAAJ5yWnzCSTnYAYeLLhHDujiRf9C2";
			$ip = $_SERVER['REMOTE_ADDR'];
			// post request to server
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response,true);
			
			if($responseKeys["success"]){
				if(strlen($di['email'])>2 && strlen($di['password'])>2 && strlen($du['kelas'])>0){
					$email_sudah = $this->bum->checkEmail($di['email']);
					$di['password'] = md5($di['password']);
					if($email_sudah>0){
						$this->status = 196;
						$this->message = 'Email sudah dipakai, gunakan yang lain';
					}else{
						$this->bum->trans_start();
						$res = $this->bum->set($di);
						if($res){
							$this->bum->trans_commit();
							$this->bum->trans_start();
							$du['b_user_id'] = $res;
							$res2 = $this->clm->set($du);
							if($res2){
								$this->bum->trans_commit();
								$this->status = 100;
								$this->message = 'Berhasil';
								$sess = $s['sess'];
								if(!isset($sess->user)) $sess->user = new stdClass();
								$sess->user = $this->clm->auth($di['email'],$this->input->post('password'));
								$this->setKey($sess);
								$data['user'] = $sess->user;
								$data['redirect_url'] = base_url('');
							}else{
								$this->bum->trans_rollback();
								$this->status = 197;
								$this->message = 'Pendaftaran Gagal';
							}
						}else{
							$this->bum->trans_rollback();
							$this->status = 198;
							$this->message = 'Pendaftaran Gagal';
						}
						$this->bum->trans_end();
					
					}
				}else{
					$this->status = 199;
					$this->message = 'Maaf, email atau password atau kelas nya tidak valid, coba lagi!';
				}
			}else{
				echo"goblok";
			}

		}
		
		echo $this->__json_out($data);
	}
}
