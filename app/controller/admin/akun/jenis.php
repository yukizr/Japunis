<?php
	class Jenis extends JI_Controller{
	
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'erpmaster';
		$this->current_page = 'erpmaster_jenis';
	}
	public function index(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		
		//$this->loadCss(base_url('assets/css/datatables.min.css'));
		
		$this->putThemeContent("erpmaster/jenis/home",$data);
		$this->putThemeContent("erpmaster/jenis/home_modal",$data);
		
		
		$this->putJsContent("erpmaster/jenis/home_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
}
