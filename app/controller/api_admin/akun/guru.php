<?php
class Guru extends JI_Controller{
	var $is_email = 1;
	public function __construct(){
    parent::__construct();
		//$this->setTheme('frontx');
		$this->load("api_admin/c_learnuser_model",'clum');
		$this->load("api_admin/b_user_model",'bum');
		$this->current_parent = 'akun';
		$this->current_page = 'akun_pengguna';
	}
  public function index(){
    $d = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}

		$draw = $this->input->post("draw");
		$sval = $this->input->post("search");
		$sSearch = $this->input->post("sSearch");
		$sEcho = $this->input->post("sEcho");
		$page = $this->input->post("iDisplayStart");
		$pagesize = $this->input->post("iDisplayLength");

		$iSortCol_0 = $this->input->post("iSortCol_0");
		$sSortDir_0 = $this->input->post("sSortDir_0");


		$sortCol = "date";
		$sortDir = strtoupper($sSortDir_0);
		if(empty($sortDir)) $sortDir = "DESC";
		if(strtolower($sortDir) != "desc"){
			$sortDir = "ASC";
		}
		$tbl_as = $this->clum->getTableAlias();
		$tbl2_as = $this->clum->getTableAlias2();

		switch($iSortCol_0){
			case 0:
				$sortCol = "$tbl_as.id";
				break;
			case 1:
				$sortCol = "$tbl2_as.fnama";
				break;
			case 2:
				$sortCol = "$tbl_as.kelas";
				break;
			case 3:
				$sortCol = "$tbl2_as.email";
				break;
			case 4:
				$sortCol = "is_active";
				break;
			default:
				$sortCol = "id";
				}

		if(empty($draw)) $draw = 0;
		if(empty($pagesize)) $pagesize=10;
		if(empty($page)) $page=0;

		$keyword = $sSearch;

		$this->status = '100';
		$this->message = 'Berhasil';
		$dcount = $this->clum->countAll($keyword,$utype="guru");
		$ddata = $this->clum->getAll($page,$pagesize,$sortCol,$sortDir,$keyword,$utype="guru");
    
		foreach($ddata as &$dt){
      if(isset($dt->is_active)){
				if($dt->is_active == '1'){
					$dt->is_active = 'Aktif';
				}else{
					$dt->is_active = 'Tidak aktif';
				}
			}
		}
		//sleep(3);
		$another = array();
		$this->__jsonDataTable($ddata,$dcount);
  }
	public function tambah(){
		$d = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}
		$di = array();
		$du = array();
		$di['email'] = $this->input->post("email");
		$di['fnama'] = $this->input->post("fnama");
		$di['password'] = $this->input->post("password");
		$di['cdate'] = "NOW()";
		$di['is_active'] = $this->input->post("is_active");
		$du['kelas'] = $this->input->post("kelas");
		$du['utype'] = $this->input->post("utype");
		
		if(!isset($di['email'])) $di['email'] = "";
		if(!isset($di['fnama'])) $di['fnama'] = "";
		if(strlen($di['fnama'])>4 && strlen($di['email'])>4){
			$check = $this->bum->checkEmail($di['email']); //1 = sudah digunakan
			if(empty($check)){
				$di['password'] = md5($di['password']);
				
				$this->bum->trans_start();
				$res = $this->bum->set($di);
				if($res){
					$du['b_user_id'] = $res;
					$res2 = $this->clum->set($du);
					if($res2){
						$this->status = 100;
						$this->message = 'Data baru berhasil ditambahkan';
					}else{
						$this->bum->trans_rollback();
						$this->status = 229;
						$this->message = 'Tidak dapat menambahkan siswa ke database';
					}
					
					
				}else{
					$this->status = 900;
					$this->message = 'Tidak dapat menyimpan data baru, silakan coba beberapa saat lagi';
				}
				
				$this->bum->trans_end();
			}else{
				$this->status = 104;
				$this->message = 'Kode sudah digunakan, silakan coba kode lain';
			}
		}else{
			$this->status = 445;
				$this->message = 'One or more parameter are missing';
		}
		$this->__json_out($data);
	}
	public function detail($id){
		$id = (int) $id;
		$d = $this->__init();
		$data = array();
		if(!$this->admin_login && empty($id)){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}
		$this->status = 100;
		$this->message = 'Berhasil';
		$data = $this->apm->getById($id);
		$this->__json_out($data);
	}
	public function edit($id){
		$d = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}
		$di = array();
		$du = array();
		$di['email'] = $this->input->post("email");
		$di['fnama'] = $this->input->post("fnama");
		$di['is_active'] = $this->input->post("is_active");
		$du['kelas'] = $this->input->post("kelas");
		$du['utype'] = $this->input->post("utype");
		
		$id = (int) $id;
		if(empty($id)){
			if(!isset($di['id'])) $di['id'] = 0;
			$id = (int) $di['id'];
		}
		if(isset($di['id'])) unset($di['id']);
		if(!isset($di['email'])) $di['email'] = "";
		if($id>0 && strlen($di['email'])>1){
			$check = $this->bum->checkEmail($di['email'],$id); //1 = sudah digunakan
			if(empty($check)){
				$res = $this->bum->update($id,$di);
				$res2 = $this->clum->updateByUserId($id,$du);
				if($res && $res2){
					$this->status = 100;
					$this->message = 'Perubahan berhasil diterapkan';
				}else{
					$this->status = 901;
					$this->message = 'Tidak dapat melakukan perubahan ke basis data';
				}
			}else{
				$this->status = 104;
				$this->message = 'Email sudah digunakan, silakan coba yang lain';
			}
		}
		$this->__json_out($data);
	}
	public function hapus($id){
		$id = (int) $id;
		$d = $this->__init();
		$data = array();
		if(!$this->admin_login && empty($id)){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}
		$this->status = 100;
		$this->message = 'Berhasil';
		$res = $this->clum->delByUserId($id);
		$res2 = $this->bum->del($id);
		if(!$res || !$res2){
			$this->status = 902;
			$this->message = 'Data gagal dihapus';
		}
		$this->__json_out($data);
	}
	
	public function edit_password($id){
		$d = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}
		$du = array();
		$id = (int) $id;
		if(empty($id)){
			$id = (int) $this->input->post('password');
		}
		$du['password'] = $this->input->post('password');
		
		if(isset($du['id'])) unset($du['id']);
		if(!isset($du['password'])) $di['password'] = "";
		if($id>0 && strlen($du['password'])>4){
			$du['password'] = md5($du['password']);
			$res = $this->bum->update($id,$du);
			if($res){
				$this->status = 100;
				$this->message = 'Perubahan berhasil diterapkan';
			}else{
				$this->status = 901;
				$this->message = 'Tidak dapat melakukan perubahan ke basis data';
			}
		}
		$this->__json_out($data);
	}
}
