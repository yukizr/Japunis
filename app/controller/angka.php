<?php
class Angka extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('front');
		$this->load('front/g_learntambahan_model','tambahan');
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
		$page = (int) $this->input->request("page");
		$data['tambahans'] = $this->tambahan->getAll($page,$pagesize=10,$sortCol="judul",$sortDir="ASC",$keyword="",$utype="angka");
		
		$data['tambahan'] = $this->tambahan->getById(16);

		$this->putThemeContent("angka/home",$data);
		//$this->putJsContent('angka/home_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function detail($id){
		$id = (int) $id;
		$data = $this->__init();
		if($this->user_login){
		
		}
		if($id<=0){
			redir(base_url('angka'));
			die();
		}
		$data['tambahan'] = $this->tambahan->getById($id);
		
		
		$this->putThemeContent("angka/detail",$data);
		//$this->putJsContent('angka/detail_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}

}
