<?php
	class Quiz extends JI_Controller{
	
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'lms';
		$this->current_page = 'lms_quiz';
		$this->load("admin/d_learnpelajaran_model",'dlpm');
		$this->load("admin/e_learnquiz_model",'elqm');
	}
	public function index(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		$data['pelajaran'] = $this->dlpm->get();
		
		$this->putThemeContent("lms/quiz/home_modal",$data);
		$this->putThemeContent("lms/quiz/home",$data);
		
		$this->putJsContent("lms/quiz/home_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
	public function tambah($id){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		$id = (int) $id;
		if($id <= 0){
			redir(base_url_admin('lms/quiz/'));
			die();
		}
		$data['pelajaran'] = $this->dlpm->getById($id);
		if(!isset($data['pelajaran']->id)){
			redir(base_url_admin('lms/pelajaran/'));
			die();
		}
		
		$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));
		
		$this->putThemeContent("lms/quiz/tambah_modal",$data);
		$this->putThemeContent("lms/quiz/tambah",$data);
		
		$this->putJsContent("lms/quiz/tambah_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
	public function tambah_form($id){
		$data = $this->__init();
		if(!$this->admin_login) {
			redir(base_url_admin('login'));
			die();
		}
		$id = (int) $id;
		if ($id <= 0) {
			redir(base_url_admin('lms/quiz/'));
			die();
		}
		$data['pelajaran'] = $this->dlpm->getById($id);
		if (!isset($data['pelajaran']->id)) {
			redir(base_url_admin('lms/pelajaran/'));
			die();
		}
		$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));

		$this->putThemeContent("lms/quiz/tambah_form",$data);

		$this->putJsContent("lms/quiz/tambah_form_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
	public function edit_form($pelajaran_id,$quiz_id){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		$pelajaran_id = (int) $pelajaran_id;
		if($pelajaran_id <= 0){
			redir(base_url_admin('lms/quiz/'));
			die();
		}
		$data['pelajaran'] = $this->dlpm->getById($pelajaran_id);
		if(!isset($data['pelajaran']->id)){
			redir(base_url_admin('lms/pelajaran/'));
			die();
		}
		$quiz_id = (int) $quiz_id;
		if($quiz_id <= 0){
			redir(base_url_admin('lms/quiz/'));
			die();
		}
		$data['quiz'] = $this->elqm->getById($quiz_id);
		if(!isset($data['quiz']->id)){
			redir(base_url_admin('lms/quiz/'));
			die();
		}
		
		//$this->debug($data['quiz']);
		//die();
		
		
		$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));
		
		$this->putThemeContent("lms/quiz/edit_form",$data);
		
		$this->putJsContent("lms/quiz/edit_form_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
	}
	// public function edit($id){
	// 	$data = $this->__init();
	// 	if(!$this->admin_login){
	// 		redir(base_url_admin('login'));
	// 		die();
	// 	}
	// 	$id = (int) $id;
	// 	if($id <= 0){
	// 		redir(base_url_admin('lms/quiz/'));
	// 		die();
	// 	}
	// 	$this->putJsFooter(base_url('skin/admin/js/helpers/ckeditor/ckeditor'));
	// 	$data['elqm'] = $this->elqm->getById($id);
		
	// 	$this->putThemeContent("lms/quiz/edit_modal",$data);
	// 	$this->putThemeContent("lms/quiz/edit",$data);
		
		
	// 	$this->putJsContent("lms/quiz/edit_bottom",$data);
	// 	$this->loadLayout('col-2-left',$data);
	// 	$this->render();
	// }
}
