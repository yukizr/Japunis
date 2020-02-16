<?php
class Guru extends JI_Controller{
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'akun';
		$this->current_page = 'akun_guru';
	}
	public function index(){
    $data = $this->__init();
    if(!$this->admin_login){
      redir(base_url_admin('login'));
      die();
    }
		$this->putThemeContent("akun/guru/home_modal",$data);
		$this->putThemeContent("akun/guru/home",$data);

		$this->putJsContent("akun/guru/home_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
  }
}
