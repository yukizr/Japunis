<?php
class Tambahan extends JI_Controller{
	var $status = 0;
	var $treehtml = '';
	var $is_login_admin;
	var $module = "lms_tambahan";
	var $is_login_user = "";
	var $page = "lms";

	public function __construct(){
    parent::__construct();
		$this->lib("sene_json_engine");
		$this->load("api_admin/d_learnpelajaran_model",'pelajaran');
		$this->load("api_admin/g_learntambahan_model",'tambahan');
		$this->load("api_admin/e_learnquiz_model",'quiz');
		$this->setTheme("admin/");
		$this->is_login_user = 0;
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
		
		$utype = $this->input->post("utype");
		if(empty($utype)){
			$utype = "";
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
				$sortCol = "utype";
				break;
			case 2:
				$sortCol = "judul";
				break;
			case 3:
				$sortCol = "isi";
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
		$dcount = $this->tambahan->countAll($keyword,$utype);
		$ddata = $this->tambahan->getAll($page,$pagesize,$sortCol,$sortDir,$keyword,$utype);
		
		foreach($ddata as &$gd){
			if(isset($gd->isi)){
				$gd->isi = strip_tags($gd->isi);
				if(strlen($gd->isi)>=40){
					$gd->isi = mb_substr($gd->isi,0,40).'...';
				}
			}
			if(isset($gd->utype)){
					if($gd->utype == "plain"){
						$gd->utype = 'Plain';
					}
			}
			if(isset($gd->utype)){
					if($gd->utype == "angka"){
						$gd->utype = 'Angka';
					}
			}
			if(isset($gd->utype)){
					if($gd->utype == "tanggal"){
						$gd->utype = 'Tanggal';
					}
			}
			if(isset($gd->utype)){
					if($gd->utype == "waktu"){
						$gd->utype = 'Waktu';
					}
			}
			if(isset($gd->utype)){
					if($gd->utype == "tata_bahasa"){
						$gd->utype = 'Tata Bahasa';
					}
			}
			if(isset($gd->utype)){
					if($gd->utype == "kata_ungkapan"){
						$gd->utype = 'Kata Ungkapan';
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
		if(!isset($di['utype'])) $di['utype'] = "";
		if(!isset($di['judul'])) $di['judul'] = "";
		if(!isset($di['isi'])) $di['isi'] = "";
		if(strlen($di['utype'])>0 && strlen($di['judul'])>1){
			$res = $this->tambahan->set($di);
			if($res){
				$this->status = 100;
				$this->message = 'Data baru berhasil ditambahkan';
			}else{
				$this->status = 900;
				$this->message = 'Tidak dapat menyimpan data baru, silakan coba beberapa saat lagi';
			}
		}else{
			$this->status=444;
			$this->message="Mohon isi semua kolom";
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
		$data = $this->tambahan->getById($id);
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
		if(!isset($du['utype'])) $du['utype'] = "";
		if(!isset($du['judul'])) $du['judul'] = "";
		if(!isset($du['isi'])) $du['isi'] = "";
		if($id>0 && strlen($du['utype'])>0 && strlen($du['judul'])>1){
			$res = $this->tambahan->update($id,$du);
			if($res){
				$this->status = 100;
				$this->message = 'Perubahan berhasil diterapkan';
			}else{
				$this->status = 901;
				$this->message = 'Tidak dapat melakukan perubahan ke basis data';
			}
		}else{
			$this->status = 444;
			$this->message = 'Mohon isi semua kolom';
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
		$res = $this->tambahan->del($id);
		if(!$res){
			$this->status = 902;
			$this->message = 'Data gagal dihapus';
		}
		$this->__json_out($data);
	}

}
