<?php
class Pengguna extends JI_Controller{
	var $is_email = 1;
	public function __construct(){
    parent::__construct();
		//$this->setTheme('frontx');
		$this->load("api_admin/a_pengguna_model",'apm');
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
		

		switch($iSortCol_0){
			case 0:
				$sortCol = "id";
				break;
			case 1:
				$sortCol = "username";
				break;
			case 2:
				$sortCol = "email";
				break;
			case 3:
				$sortCol = "nama";
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
		$dcount = $this->apm->countAll($keyword);
		$ddata = $this->apm->getAll($page,$pagesize,$sortCol,$sortDir,$keyword);
    
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
		$di = $_POST;
		if(!isset($di['username'])) $di['username'] = "";
		if(!isset($di['nama'])) $di['nama'] = "";
		if(strlen($di['nama'])>1 && strlen($di['username'])>1){
			$check = $this->apm->checkUsername($di['username']); //1 = sudah digunakan
			$check2 = 0;
			if(strlen($di['email'])){
				$check2 = $this->apm->checkEmail($di['email']); //1 = sudah digunakan
			}
			if(empty($check) && empty($check2)){
				$di['password'] = md5($di['password']);
				$res = $this->apm->set($di);
				if($res){
					$this->status = 100;
					$this->message = 'Data baru berhasil ditambahkan';
				}else{
					$this->status = 900;
					$this->message = 'Tidak dapat menyimpan data baru, silakan coba beberapa saat lagi';
				}
			}else{
				$this->status = 104;
				$this->message = 'Email sudah digunakan, silakan coba email lain';
			}
		}else{
			$this->status = 445;
				$this->message = 'Isi kolom yang kosong';
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
		$du = $_POST;
		
		$id = (int) $id;
		if(empty($id)){
			if(!isset($du['id'])) $du['id'] = 0;
			$id = (int) $du['id'];
			
		}
		if(isset($du['id'])) unset($du['id']);
		if(!isset($du['username'])) $di['username'] = "";
		if($id>1 && strlen($du['username'])>1){
			$check = $this->apm->checkUsername($du['username'],$id); //1 = sudah digunakan
			$check2 = 0;
			if(strlen($du['email'])){
				$check2 = $this->apm->checkEmail($du['email'],$id); //1 = sudah digunakan
			}
			if(empty($check) && empty($check2)){
				$res = $this->apm->update($id,$du);
				if($res){
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
		$res = $this->apm->del($id);
		if(!$res){
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
			$res = $this->apm->update($id,$du);
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
