<?php
class Logout extends JI_Controller{
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		// $this->lib("seme_chat");
	}
	public function index(){
		$data = $this->__init();
		if(isset($data['sess']->admin->id)){
			$user = $data['sess']->admin;
			// $this->seme_chat->set_offline($user->id);
			$sess = $data['sess'];
			$sess->admin = new stdClass();
			$this->login_admin = 0;
			$this->setKey($sess);
		}
		//sleep(1);
		//ob_clean();
		flush();
		redir(base_url_admin("login"),0,1);
		//redir(base_url_admin("login"),0,0);
	}

}
