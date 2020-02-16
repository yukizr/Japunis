<?php
	class Tambahan extends JI_Controller{
	
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'lms';
		$this->current_page = 'lms_tambahan';
	}
	public function index(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		
		$this->putThemeContent("lms/tambahan/home",$data);
		$this->putThemeContent("lms/tambahan/home_modal",$data);
		
		
		$this->putJsContent("lms/tambahan/home_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
	public function tambah(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));
		$this->putThemeContent("lms/tambahan/tambah_modal",$data);
		$this->putThemeContent("lms/tambahan/tambah",$data);
		
		
		$this->putJsContent("lms/tambahan/tambah_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
	public function edit($id){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		$id = (int) $id;
		if($id <= 0){
			redir(base_url_admin('lms/tambahan/'));
			die();
		}
		$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));
		$this->load('api_admin/g_learntambahan_model','tambahan');
		$data['tambahan'] = $this->tambahan->getById($id);
		$data['tambahan_id'] = $id;
		
		$this->putThemeContent("lms/tambahan/edit",$data);
		$this->putThemeContent("lms/tambahan/edit_modal",$data);
		
		
		$this->putJsContent("lms/tambahan/edit_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
}
