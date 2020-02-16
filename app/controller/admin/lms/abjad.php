<?php
	class Abjad extends JI_Controller{
	
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'lms';
		$this->current_page = 'lms_abjad';
	}
	public function index(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		
		$this->putThemeContent("lms/abjad/home",$data);
		$this->putThemeContent("lms/abjad/home_modal",$data);
		
		
		$this->putJsContent("lms/abjad/home_bottom",$data);
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
		$this->load('api_admin/f_learnabjad_model','abjad');
		
		$this->putThemeContent("lms/abjad/tambah_modal",$data);
		$this->putThemeContent("lms/abjad/tambah",$data);
		
		
		$this->putJsContent("lms/abjad/tambah_bottom",$data);
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
			redir(base_url_admin('lms/abjad/'));
			die();
		}
		$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));
		$this->load('api_admin/f_learnabjad_model','abjad');
		$data['abjad'] = $this->abjad->getById($id);
		$data['abjad_id'] = $id;
		
		$this->putThemeContent("lms/abjad/edit",$data);
		$this->putThemeContent("lms/abjad/edit_modal",$data);
		
		
		$this->putJsContent("lms/abjad/edit_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
}
