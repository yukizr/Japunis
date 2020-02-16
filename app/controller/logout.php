<?php
class Logout extends JI_Controller{
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
	}
	public function index(){
		$data = $this->__init();
		if(isset($data['sess']->user->id)){
			$user = $data['sess']->user;
			$sess = $data['sess'];
			$sess->user = new stdClass();
			$this->login_user = 0;
			$this->setKey($sess);
		}
		redir(base_url(""),0,1);
	}

}

