<?php
class Quiz extends JI_Controller{
	var $status = 0;
	var $treehtml = '';
	var $is_login_admin;
	var $is_login_user = "";

	public function __construct(){
    parent::__construct();
		$this->lib("sene_json_engine");
		$this->load("api_admin/d_learnpelajaran_model",'elpm');
		$this->load("api_admin/e_learnquiz_model",'elqm');
		$this->setTheme("admin/");
		$this->is_login_user = 0;
	}

	private function slugify($text){
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		return $text;
	}
	public function index($utype=""){
		$data = array();
		$pesan = array();
		$s = $this->__init();
		$res = array();
		$draw = $this->input->post("draw");
		$sval = $this->input->post("search");
		$sSearch = $this->input->post("sSearch");
		$sEcho = $this->input->post("sEcho");
		$page = $this->input->post("iDisplayLength");
		$start = $this->input->post("iDisplayStart");
		$length = $this->input->post("iDisplayLength");
		$supplier = $this->input->post("supplier");

		$iSortCol_0 = $this->input->post("iSortCol_0");
		$sSortDir_0 = $this->input->post("sSortDir_0");


		$tglmin = $this->input->post("tgl_min");
		$tglmax = $this->input->post("tgl_max");

		$utype = $this->input->post("utype");

		$tbl_as = $this->elpm->getTableAlias();

		if(empty($utype)) $utype = '';
		if(empty($tglmin)) $tglmin = '';
		if(empty($tglmax)) $tglmax = '';

		//echo $tglmax;
		//die();

		$sortCol = "cdate";
		$sortDir = strtoupper($sSortDir_0);
		if(empty($sortDir)) $sortDir = "DESC";
		if($sortDir != "DESC") $sortDir = "ASC";

		switch($iSortCol_0){
			case 0:
				$sortCol = "id";
				break;
			case 1:
				$sortCol = "nama";
				break;
			default:
				$sortCol = $tbl_as.".id";
		}

		if(empty($draw)) $draw = 0;
		if(empty($pagesize)) $pagesize=10;
		if(empty($page)) $page=0;

		$keyword = $sSearch;
		if(isset($sval['value'])){
			$keyword = $sval['value'];
		}

		$this->status = '100';
		$this->message = 'Berhasil';
		$dcount = $this->elqm->countAll($keyword);
		$ddata = $this->elqm->getAll($page,$pagesize,$sortCol,$sortDir,$keyword);
		
		foreach($ddata as &$gd){
			if(isset($gd->is_active)){
				if(!empty($gd->is_active)){
					$gd->is_active = '<span class="label label-success">Aktif</span>';
				}else{
					$gd->is_active = '<span class="label label-alert">Tidak Aktif</span>';
				}
			}
		}
		$this->__jsonDataTable($ddata,$dcount);
	}
	public function detail($id){
		$data = array();
		$s = $this->__init();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Belum login';
			$this->__json_out($data);
			die();
		}
		
		if(!empty($id)){
			$this->status = 100;
			$this->message = 'Berhasil';
			$data= $this->elqm->getById($id);
			// if(isset($data['result']->id)) $data['result'] = $data['result'];
		}else{
			$this->status = 445;
			$this->message = 'One or more parameter are required';
		}
		$this->__json_out($data);
		// $this->sene_json_engine->out($data);
	}
	public function tambah($d_learnpelajaran_id){
		$s = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Notfound';
			$this->__json_out($data);
			die();
		}
		$d_learnpelajaran_id = (int) $d_learnpelajaran_id;
		
		$di = $_POST;
		if(empty($d_learnpelajaran_id)){
			if(isset($di['d_learnpelajaran_id'])) $d_learnpelajaran_id = (int) $di['d_learnpelajaran_id'];
		}
		
		if(!isset($di['pertanyaan'])) $di['pertanyaan'] = '';
		if(!isset($di['jawaban1'])) $di['jawaban1'] = '';
		if(!isset($di['jawaban2'])) $di['jawaban2'] = '';
		if(!isset($di['jawaban'])) $di['jawaban'] = '';
		if(!isset($di['is_active'])) $di['is_active'] = 1;
		
		if($d_learnpelajaran_id>0 && strlen($di['pertanyaan'])>4 && strlen($di['jawaban1'])>0 && strlen($di['jawaban2'])>0 && strlen($di['jawaban'])>0){
			$pelajaran = $this->elpm->getById($di['d_learnpelajaran_id']);
			if(isset($pelajaran->judul)){
				$di['nama'] = $pelajaran->mata_pelajaran;
				$res = $this->elqm->set($di);
				if($res){
					$this->status = 100;
					$this->message = 'Berhasil';
				}else{
					$this->status = 200;
					$this->message = 'Tidak dapat menyimpan ke database';
				}
			}else{
				$this->status = 202;
				$this->message = 'ID Pelajaran tidak ditemukan';
			}
		}else{
			$this->status = 445;
			$this->message = 'Mohon isi semua kolom';
		}
		
		$this->__json_out($data);
	}
	
	public function edit($d_learnpelajaran_id){
		$s = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Notfound';
			$this->__json_out($data);
			die();
		}
		$d_learnpelajaran_id = (int) $d_learnpelajaran_id;
		
		$di = $_POST;
		if(empty($d_learnpelajaran_id)){
			if(isset($di['d_learnpelajaran_id'])) $d_learnpelajaran_id = (int) $di['d_learnpelajaran_id'];
		}
		$id = 0;
		if(isset($di['id'])) $id = (int) $di['id'];
		
		if(!isset($di['pertanyaan'])) $di['pertanyaan'] = '';
		if(!isset($di['jawaban1'])) $di['jawaban1'] = '';
		if(!isset($di['jawaban2'])) $di['jawaban2'] = '';
		if(!isset($di['jawaban'])) $di['jawaban'] = '';
		if(!isset($di['is_active'])) $di['is_active'] = 1;
		
		if($id>0 && $d_learnpelajaran_id>0 && strlen($di['pertanyaan'])>4 && strlen($di['jawaban1'])>0 && strlen($di['jawaban2'])>0 && strlen($di['jawaban'])>0){
			$pelajaran = $this->elpm->getById($d_learnpelajaran_id);
			if(isset($pelajaran->judul)){
				$di['nama'] = $pelajaran->mata_pelajaran;
				$res = $this->elqm->update($id,$di);
				if($res){
					$this->status = 100;
					$this->message = 'Berhasil';
				}else{
					$this->status = 200;
					$this->message = 'Tidak dapat menyimpan ke database';
				}
			}else{
				$this->status = 202;
				$this->message = 'ID Pelajaran tidak ditemukan';
			}
		}else{
			$this->status = 445;
			$this->message = 'Mohon isi semua kolom';
		}
		
		$this->__json_out($data);
	}
	
	public function hapus($d_learnpelajaran_id,$id){
		$s = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Notfound';
			$this->__json_out($data);
			die();
		}
		$d_learnpelajaran_id = (int) $d_learnpelajaran_id;
		$id = (int) $id;
		if($id>0 && $d_learnpelajaran_id>0){
			$res = $this->elqm->del2($d_learnpelajaran_id,$id);
			if($res){
				$this->status = 100;
				$this->message = 'Berhasil';
			}else{
				$this->status = 200;
				$this->message = 'Tidak dapat menyimpan ke database';
			}
		}else{
			$this->status = 445;
			$this->message = 'One or more parameter required';
		}
		$this->__json_out($data);
	}
	public function pelajaran($d_pelajaran_id){
		$data = array();
		$pesan = array();
		$s = $this->__init();
		$res = array();
		$draw = $this->input->post("draw");
		$sval = $this->input->post("search");
		$sSearch = $this->input->post("sSearch");
		$sEcho = $this->input->post("sEcho");
		$page = $this->input->post("iDisplayLength");
		$start = $this->input->post("iDisplayStart");
		$length = $this->input->post("iDisplayLength");
		$supplier = $this->input->post("supplier");
		
		$iSortCol_0 = $this->input->post("iSortCol_0");
		$sSortDir_0 = $this->input->post("sSortDir_0");


		$tglmin = $this->input->post("tgl_min");
		$tglmax = $this->input->post("tgl_max");

		$utype = $this->input->post("utype");

		$tbl_as = $this->elqm->getTableAlias();

		if(empty($utype)) $utype = '';
		if(empty($tglmin)) $tglmin = '';
		if(empty($tglmax)) $tglmax = '';

		//echo $tglmax;
		//die();

		$sortCol = "cdate";
		$sortDir = strtoupper($sSortDir_0);
		if(empty($sortDir)) $sortDir = "DESC";
		if($sortDir != "DESC") $sortDir = "ASC";

		switch($iSortCol_0){
			case 0:
				$sortCol = "id";
				break;
			case 1:
				$sortCol = "pertanyaan";
				break;
			// case 2:
			// 	$sortCol = "opsi";
			// 	break;
			// case 3:
			// 	$sortCol = "jawaban1";
			// 	break;
			// case 4:
			// 	$sortCol = "jawaban2";
			// 	break;
			// case 5:
			// 	$sortCol = "jawaban3";
			// 	break;
			// case 6:
			// 	$sortCol = "jawaban4";
			// 	break;
			// case 7:
			// 	$sortCol = "jawaban5";
			// 	break;
			// case 8:
			// 	$sortCol = "jawaban";
			// 	break;
			case 9:
				$sortCol = "is_active";
				break;
			default:
				$sortCol = "id";
		}
		$page = $start;

		if(empty($draw)) $draw = 0;
		if(empty($pagesize)) $pagesize=10;
		if(empty($page)) $page=0;
		
		$keyword = $sSearch;
		if(isset($sval['value'])){
			$keyword = $sval['value'];
		}
		$d_pelajaran_id = (int) $d_pelajaran_id;

		$this->status = '100';
		$this->message = 'Berhasil';
		$dcount = $this->elqm->countAllByPelajaranId($keyword,$d_pelajaran_id);
		$ddata = $this->elqm->getAllByPelajaranId($page,$pagesize,$sortCol,$sortDir,$keyword,$d_pelajaran_id);
		
		foreach($ddata as &$gd){
			if(isset($gd->is_active)){
				if(!empty($gd->is_active)){
					$gd->is_active = '<span class="label label-success">Aktif</span>';
				}else{
					$gd->is_active = '<span class="label label-alert">Tidak Aktif</span>';
				}
			}
		}
		$this->__jsonDataTable($ddata,$dcount);
	}
}
