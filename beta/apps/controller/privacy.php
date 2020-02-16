<?php
class Privacy extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		// $this->lib("SENE_JSON_Engine","lib");
    // $this->load("m_pengguna");
	}

  public function index(){
    $this->view("frontend/__header",$data);
    $this->view("frontend/__nav",$data);
    $this->view("frontend/privacy/privacy",$data);
    $this->view("frontend/__bottom",$data);
    $this->view("frontend/__footer",$data);
	}

}
?>
