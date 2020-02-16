<?php
class Siswa extends JI_Controller{
	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'akun';
		$this->current_page = 'akun_siswa';
		$this->load('admin/c_learnuser_model','clm');
	}
	public function index(){
    $data = $this->__init();
    if(!$this->admin_login){
      redir(base_url_admin('login'));
      die();
    }
		$this->putThemeContent("akun/siswa/home_modal",$data);
		$this->putThemeContent("akun/siswa/home",$data);

		$this->putJsContent("akun/siswa/home_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
  }
	public function detail($id=""){
    $data = $this->__init();
    if(!$this->admin_login){
      redir(base_url_admin('login'));
      die();
    }
		$id = (int) $id;
		if(empty($id)){
      redir(base_url_admin('lms/siswa'));
			die();
		}
		$data['siswa'] = $this->clm->getJoinById($id);
		
		$this->putThemeContent("akun/siswa/detail_modal",$data);
		$this->putThemeContent("akun/siswa/detail",$data);

		$this->putJsContent("akun/siswa/detail_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render();
  }
}
