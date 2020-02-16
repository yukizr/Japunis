<?php
class Home extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('front');
	}
	public function index(){
		//$this->debug($_SERVER);
		//die();
		$cf = 'https';
		if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) $cf = $_SERVER['HTTP_X_FORWARDED_PROTO'];
		if($cf == 'http' ){
    	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    	header('HTTP/1.1 301 Moved Permanently');
    	header('Location: ' . $redirect);
    	exit();
		}
		$data = $this->__init();
		if($this->user_login){
			
		}else{
			
		}
		//$this->putJsFooter($this->skins->front.'js/pages/login.js');
		
		$this->putThemeContent("home/home",$data);
		//$this->putJsContent('home/home_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}

}
