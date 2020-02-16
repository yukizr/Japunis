<?php
	class Pelajaran extends JI_Controller{
	
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'lms';
		$this->current_page = 'lms_pelajaran';
	}
	public function index(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		
		$this->putThemeContent("lms/pelajaran/home",$data);
		$this->putThemeContent("lms/pelajaran/home_modal",$data);
		
		
		$this->putJsContent("lms/pelajaran/home_bottom",$data);
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
		$this->load('api_admin/d_learnpelajaran_model','pelajaran');
		
		$this->putThemeContent("lms/pelajaran/tambah_modal",$data);
		$this->putThemeContent("lms/pelajaran/tambah",$data);
		
		
		$this->putJsContent("lms/pelajaran/tambah_bottom",$data);
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
			redir(base_url_admin('lms/pelajaran/'));
			die();
		}
		$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));
		$this->load('api_admin/d_learnpelajaran_model','pelajaran');
		$data['pelajaran'] = $this->pelajaran->getById($id);
		$data['pelajaran_id'] = $id;
		
		$this->putThemeContent("lms/pelajaran/edit",$data);
		$this->putThemeContent("lms/pelajaran/edit_modal",$data);
		
		
		$this->putJsContent("lms/pelajaran/edit_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
}
