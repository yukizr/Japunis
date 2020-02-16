<?php
class Pengguna extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->load("api_admin/b_learning_pengguna_model",'blpm');
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
		$tbl_as = $this->blpm->getTableAlias();
		$tbl2_as = $this->blpm->getTableAlias2();
		
		switch($iSortCol_0){
			case 0:
				$sortCol = "$tbl_as.id";
				break;
			case 1:
				$sortCol = "CONCAT(nama_depan,' ',nama_belakang)";
				break;
			case 2:
				$sortCol = "$tbl2_as.email";
				break;
			case 3:
				$sortCol = "is_pengajar";
				break;
			case 4:
				$sortCol = "is_pelajar";
				break;
			case 5:
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
		$data_count = $this->blpm->countAll($keyword);
		$data_hasil = $this->blpm->getAll($page,$pagesize,$sortCol,$sortDir,$keyword);
		
		foreach($data_hasil as &$gd){
			if(isset($gd->is_active)){
				if(!empty($gd->is_active)){
					$gd->is_active = '<span class="label label-success">Aktif</span>';
				}else{
					$gd->is_active = '<span class="label label-alert">Tidak Aktif</span>';
				}
			}
			if(isset($gd->is_pengajar)){
				if(!empty($gd->is_pengajar)){
					$gd->is_pengajar = '<span class="label label-success">Pengajar</span>';
				}else{
					$gd->is_pengajar = '<span class="label label-alert">-</span>';
				}
			}
		}
		$another = array();
		$this->__jsonDataTable($data_hasil,$data_count);
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
		if(!isset($di['kode'])) $di['kode'] = "";
		if(!isset($di['nama'])) $di['nama'] = "";
		if(strlen($di['nama'])>1 && strlen($di['kode'])>1){
			$check = $this->bbm->checkKode($di['kode']); //1 = sudah digunakan
			if(empty($check)){
				$res = $this->bbm->set($di);
				if($res){
					$this->status = 100;
					$this->message = 'Data baru berhasil ditambahkan';
				}else{
					$this->status = 900;
					$this->message = 'Tidak dapat menyimpan data baru, silakan coba beberapa saat lagi';
				}
			}else{
				$this->status = 104;
				$this->message = 'Kode sudah digunakan, silakan coba kode lain';
			}
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
		$data = $this->bbm->getById($id);
		$this->__json_out($data);
	}
	public function edit(){
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
		if(!isset($du['id'])) $du['id'] = 0;
		$id = (int) $du['id'];
		unset($du['id']);
		if(!isset($du['kode'])) $du['kode'] = "";
		if(!isset($du['nama'])) $di['nama'] = "";
		if($id>1 && strlen($du['nama'])>1 && strlen($du['kode'])>1){
			$check = $this->bbm->checkKode($du['kode'],$id); //1 = sudah digunakan
			if(empty($check)){
				$res = $this->bbm->update($id,$du);
				if($res){
					$this->status = 100;
					$this->message = 'Perubahan berhasil diterapkan';
				}else{
					$this->status = 901;
					$this->message = 'Tidak dapat melakukan perubahan ke basis data';
				}
			}else{
				$this->status = 104;
				$this->message = 'Kode sudah digunakan, silakan coba kode lain';
			}
		}
		$this->__json_out($data);
	}
	public function hapus($id){
		die();
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
		$res = $this->bbm->del($id);
		if(!$res){
			$this->status = 902;
			$this->message = 'Data gagal dihapus';
		}
		$this->__json_out($data);
	}
}
