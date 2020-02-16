<?php
	class Blog extends JI_Controller{
	var $status = 0;
	var $treehtml = '';
	var $is_login_admin;
	var $module = "cms_blog";
	var $is_login_user = "";
	var $page = "cms_blog";

	public function __construct(){
    parent::__construct();
		$this->lib("site_config");
		$this->setTheme("admin/");
		$this->setTitle("CMS Blog | ".$this->site_config->title);
		$this->current_parent = 'cms';
		$this->current_page = 'cms_blog';
		$this->is_login_user = 0;
	}
	public function index(){
		$data = array();
		$data = $this->__init();
		//$this->debug($data['sess']->user->modules);
		//die();
		if($this->admin_login){
			$data['utype'] = 'kaskecil';
			$this->setAdditional('<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />');
			$this->setAdditional('<link rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" />');
			$this->setAdditional('<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet">');

			$this->setAdditionalAfter('<link href="{{base_url}}skin/front/css/jquery.gritter.css" rel="stylesheet">');

			//$data['mutasi'] = $this->mbilo_mutasi_bank->getAll();

			$data['banks'] = array();
			$data['tipes'] = array();

			$this->putJsFooter("//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js");
			$this->putJsFooter("//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js");

			$this->putJsFooter("https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js");
			$this->putJsFooter("//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js");
			$this->putJsFooter("https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js");
			$this->putJsFooter("//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js");
			$this->putJsFooter("//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js");
			$this->putJsFooter("https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js");
			$this->putJsFooter("//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js");


			//$this->putJsFooter("ckeditor","skin/admin/js/ckeditor/",1);
			//$this->putJsFooter("jquery","skin/admin/js/ckeditor/adapters/",1);

			$this->putJsFooter(base_url()."assets/js/tinymce/tinymce.min.js");
			$this->putJsFooter(base_url()."skin/front/js/jquery.gritter.min.js");

			$this->putThemeContent("cms/blog/home",$data);
			$this->putThemeContent("cms/blog/home_modal",$data);
			$this->putJsContent("cms/blog/home_bottom",$data);

			//$this->debug($data);
			//die();

			$this->loadLayout("col-2-left",$data);
			$this->render();

		}else{
			redir(base_url_admin("home"));
		}
	}
}
