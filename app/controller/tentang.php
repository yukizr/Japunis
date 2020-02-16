<?php
class Tentang extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('front');
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
		// $page = (int) $this->input->request("page");
		// $data['abjads'] = $this->abjad->getAll($page,$pagesize=10,$sortCol="indonesia",$sortDir="ASC",$keyword="");
		
		$this->putThemeContent("tentang/home",$data);
		//$this->putJsContent('angka/home_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}

}
