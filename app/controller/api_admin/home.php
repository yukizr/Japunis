<?php
class Home extends JI_Controller{

	public function __construct(){
    parent::__construct();
		//$this->setTheme('frontx');
		$this->load("api_web/b_user_modelx",'bu');
	}
	public function index(){
		$this->status = '404';
		header("HTTP/1.0 404 Not Found");
		$data = array();
		$this->__json_out($data);
	}
}
