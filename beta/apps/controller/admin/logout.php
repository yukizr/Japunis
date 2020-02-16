<?php
class Logout extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
	}

	public function index(){
		//$this->delKey();
		$sess = $this->getKey();
		if(isset($sess['admin'])) unset($sess['admin']);
		$this->setKey($sess);
		sleep(1);
		redir(base_url("admin/login"));
	}

}
?>
