<?php
	class Media extends JI_Controller{
	var $status = 0;
	var $treehtml = '';
	var $module = "cms_media";
	var $page = "cms_media";

	public function __construct(){
    parent::__construct();
		$this->setTheme("admin/");
		$this->current_parent = 'cms';
		$this->current_page = 'cms_media';
		$this->is_login_user = 0;
	}
	public function index(){
		$data = array();
		$data = $this->__init();
		//$this->debug($data['sess']->user->modules);
		//die();
		if($this->admin_login){
			$data['utype'] = 'kaskecil';

			//$data['mutasi'] = $this->mbilo_mutasi_bank->getAll();

			$data['banks'] = array();
			$data['tipes'] = array();


			//$this->putJsFooter("ckeditor","skin/admin/js/ckeditor/",1);
			//$this->putJsFooter("jquery","skin/admin/js/ckeditor/adapters/",1);

			$this->putThemeContent("cms/media/home_modal",$data);
			$this->putThemeContent("cms/media/home",$data);
			$this->putJsContent("cms/media/home_bottom",$data);

			//$this->debug($data);
			//die();

			$this->loadLayout("col-2-left",$data);
			$this->render();

		}else{
			redir(base_url_admin("home"));
		}
	}
}
