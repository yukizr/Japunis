<?php
	class Login extends JI_Controller{
	
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->load("admin/a_pengguna_model","apm");
		$this->load("admin/a_pengguna_module_model","apmm");
		$this->load("admin/a_modules_model","amod");
		
	}
	public function index(){
		$data = $this->__init();
		
		$this->putJsFooter($this->skins->admin.'js/pages/login.js');
		
		$this->putThemeContent("account/login",$data);
		$this->putJsContent('account/login_bottom',$data);
		$this->loadLayout('login',$data);
		$this->render();
	}
	public function proses(){
		$data = $this->__init();
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		if(strlen($username)>3 && strlen($password)>3){
			$res = $this->apm->auth($username,$password);
			if(isset($res->id)){
				
				$sess = $data['sess'];
				if(!is_object($sess)) $sess = new stdClass();
				if(!isset($sess->admin)) $sess->admin = new stdClass();
				$sess->admin = $res;
				$sess->admin->modules = $this->apmm->getUserModules($res->id);
				$sess->admin->menus = new stdClass();
				$sess->admin->menus->left = array();
				
				//get modules
				$modules = $this->amod->getAllParent();
				foreach($modules as &$module){
					$childs = $this->amod->getChild($module->identifier);
					$mos = array();
					if(count($childs)>0){
						foreach($sess->admin->modules as $m){
							foreach($childs as $cs){
								//$this->debug($cs);
								//die();
								if(empty($m->module) && strtolower($m->rule)=="allowed_except"){
									$mos[] = $cs;
								}else if(($cs->identifier == $m->module) && (strtolower($m->rule)=="allowed")){
									$mos[] = $cs;
								}
							}
						}
					}
					$module->childs = $mos;
				}
				unset($module);
				
				//set module to session
				$allowed_all = 0;
				foreach($modules as $mo){
					foreach($sess->admin->modules as $m){
						if(empty($m->module) && strtolower($m->rule)=="allowed_except"){
							$allowed_all = 1;
							break;
						}else if(($m->module==$mo->identifier) && (strtolower($m->rule)=="allowed")){
							$sess->admin->menus->left[$mo->identifier] = $mo;
						}
					}
					unset($m);
					if($allowed_all){
						$sess->admin->menus->left[$mo->identifier] = $mo;
					}
				}
				unset($mo);
				
				
				
				$this->setKey($sess);
				redir(base_url_admin(""));
				die();
			}else{
				$data['pesan_info'] = 'Username atau password salah';
			}
		}else{
			
			$data['pesan_info'] = 'Username atau password salah';
		}
		$this->putJsFooter($this->skins->admin.'js/pages/login.js');
		
		$this->putThemeContent("account/login",$data);
		$this->putJsContent('account/login_bottom',$data);
		$this->loadLayout('login',$data);
		$this->render();
		
	}
	public function auth(){
		$data = $this->__init();
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$dt = new stdClass();
		$dt->status = 102;
		$dt->message = 'Gagal, kombinasi username atau password salah';
		$dt->redirect_url = base_url_admin('login');
		$this->status = 102;
		$this->message = 'Gagal, kombinasi username atau password salah';
		
		if(strlen($username)>3 && strlen($password)>3){
			$res = $this->apm->auth($username,$password);
			if(isset($res->id)){
				$sess = $data['sess'];
				if(!is_object($sess)) $sess = new stdClass();
				if(!isset($sess->admin)) $sess->admin = new stdClass();
				$sess->admin = $res;
				
				
				$sess->admin->modules = $this->apmm->getUserModules($res->id);
				$sess->admin->menus = new stdClass();
				$sess->admin->menus->left = array();
				
				//get modules
				$modules = $this->amod->getAllParent();
				foreach($modules as &$module){
					$childs = $this->amod->getChild($module->identifier);
					$mos = array();
					if(count($childs)>0){
						foreach($sess->admin->modules as $m){
							foreach($childs as $cs){
								//$this->debug($sess->admin->modules);
								//die();
								if(empty($m->module) && strtolower($m->rule)=="allowed_except"){
									$mos[] = $cs;
								}else if(($cs->identifier == $m->module) && (strtolower($m->rule)=="allowed")){
									$mos[] = $cs;
								}
							}
						}
					}
					$module->childs = $mos;
				}
				unset($module);
				
				//set module to session
				$allowed_all = 0;
				foreach($modules as $mo){
					foreach($sess->admin->modules as $m){
						if(empty($m->module) && strtolower($m->rule)=="allowed_except"){
							$allowed_all = 1;
							break;
						}else if(($m->module==$mo->identifier) && (strtolower($m->rule)=="allowed")){
							$sess->admin->menus->left[$mo->identifier] = $mo;
						}
					}
					unset($m);
					if($allowed_all){
						$sess->admin->menus->left[$mo->identifier] = $mo;
					}
				}
				unset($mo);
				
				$this->status = 100;
				$this->message = 'Berhasil';
				
				$this->setKey($sess);
				$dt->status = 100;
				$dt->message = 'Berhasil';
				$dt->redirect_url = base_url_admin();
			}
		}
		$this->__json_out($dt);
	}
	public function lupa_lagi(){
		$data = $this->__init();
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		if(strlen($username)>3 && strlen($password)>3){
			$res = $this->apm->auth($username,$password);
			if(isset($res->id)){
				$sess = $data['sess'];
				if(!is_object($sess)) $sess = new stdClass();
				if(!isset($sess->admin)) $sess->admin = new stdClass();
				$sess->admin = $res;
				$this->login_admin = 1;
				$this->setKey($sess);
				redir(base_url_admin(""));
				die();
			}else{
				$data['pesan_info'] = 'Username atau password salah';
			}
		}else{
			
			$data['pesan_info'] = 'Username atau password salah';
		}
		$this->putJsFooter($this->skins->admin.'js/pages/login.js');
		
		$this->putThemeContent("account/login",$data);
		$this->putJsContent('account/login_bottom',$data);
		$this->loadLayout('login',$data);
		$this->render();
		
	}
}
