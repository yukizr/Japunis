<?php
class Abjad extends JI_Controller{
	var $status = 0;
	var $treehtml = '';
	var $is_login_admin;
	var $module = "lms_abjad";
	var $is_login_user = "";
	var $page = "lms_abjad";

	public function __construct(){
    parent::__construct();
		$this->lib("sene_json_engine");
		$this->load("api_admin/f_learnabjad_model",'abjad');
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


		if(empty($utype)) $utype = '';
		if(empty($tglmin)) $tglmin = '';
		if(empty($tglmax)) $tglmax = '';

		//echo $tglmax;
		//die();

		$sortCol = "cdate";
		$sortDir = strtoupper($sSortDir_0);
		if(empty($sortDir)) $sortDir = "ASC";
		if($sortDir != "ASC") $sortDir = "DESC";

		switch($iSortCol_0){
			case 0:
				$sortCol = "id";
				break;
			case 1:
				$sortCol = "indonesia";
				break;
			case 2:
				$sortCol = "katakana";
				break;
			case 3:
				$sortCol = "hiragana";
				break;
			default:
				$sortCol = "id";
		}

		if(empty($draw)) $draw = 0;
		if(empty($length)) $length=10;
		if(empty($start)) $start=0;

		$keyword = $sSearch;
		if(isset($sval['value'])){
			$keyword = $sval['value'];
		}


		$dcount = $this->abjad->countAll($keyword);
		$ddata = $this->abjad->getAll($start,$length,$sortCol,$sortDir,$keyword);

		//$this->debug($pengumuman);

		$totalFiltered = $dcount;
		$totalData =  $dcount;


		$data = array();
		if(is_array($ddata)){
			foreach($ddata as &$pe){
				if(isset($pe->cdate))
					$pe->cdate = date("j F Y",strtotime($pe->cdate));
				if(isset($pe->katakana)){
					$fi = $pe->katakana;
					if(empty($fi)){
						$pe->katakana = '<img src="'.base_url('media/upload/default-image.png').'" style="width: 222px; height: auto; max-height: 150px;" />';
					}
					else {
						$pe->katakana = '<img src="'.base_url($fi).'" style="width: 222px; height: auto; max-height: 150px;" />';	
					}
				}
				if(isset($pe->hiragana)){
					$fi = $pe->hiragana;
					if(empty($fi)){
						$pe->hiragana = '<img src="'.base_url('media/upload/default-image.png').'" style="width: 222px; height: auto; max-height: 150px;" />';
					}
					else {
						$pe->hiragana = '<img src="'.base_url($fi).'" style="width: 222px; height: auto; max-height: 150px;" />';	
					}
					
				}
			}
			unset($pe);
			$i=0;
			foreach($ddata as $p){
				$d = array();
				foreach($p as $key=>$val){
					$d[] = $val;
				}
				$ddata[$i] = $d;
				$i++;
			}
			unset($val);
			unset($key);
			unset($p);
		}
		$i=0;

		$json_data = array(
			"pesan"           => $pesan,
			"draw"            => intval( $draw ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $ddata,   // total data array
		);
		$this->sene_json_engine->out($json_data);
	}
	public function detail($id=""){
		$data = array();
		$data['status'] = 0;
		if(!empty($id)){
			$data['status'] = 1;
			$data['result'] = $this->abjad->getById($id);
			if(isset($data['result']->id)) $data['result'] = $data['result'];
		}
		$this->sene_json_engine->out($data);
	}
	public function update($id=""){
		$data = array();
		$data['status'] = 0;
		$data['result'] = 'One or more parameter required';
		$indonesia = $this->input->post("indonesia");
		$s = $this->__init();
		if(!empty($indonesia)){
			$d = array();
			foreach($_POST as $key=>$val){
				$d[$key] = $val;
			}
			$d['cdate'] = "NOW()";

			$res = $this->abjad->update($id,$d);
			if($res){
				$data['status'] = 1;
				$data['result'] = 'Berhasil';
			}else{
				$data['result'] = 'Gagal';
			}
		}
		$this->sene_json_engine->out($data);
	}
	public function tambah(){
		$s = $this->__init(); //inisialisasi login / auth
		$data = array(); //array kosong
		
		if(!$this->admin_login){
			$this->status=400;
			$this->message="Harus login";
			$this->__json_out($data);
			die();
		}
		
		//handling inputan
		$di = $_POST;
		
		//validasi
		if(!isset($di['indonesia'])) $di['indonesia'] = '';
		
		if(strlen($di['indonesia'])>0){
			$res = $this->abjad->set($di);
			if($res){
				$this->status=100;
				$this->message="Berhasil";
			}else{
				$this->status=204;
				$this->message="tidak dapat menyimpan ke database";
			}
		}else{
			$this->status=204;
			$this->message="Mohon isi semua kolom";
		}
		$this->__json_out($data);
	}
	public function edit($id){
		$s = $this->__init(); //inisialisasi login / auth
		$data = array(); //array kosong
		
		if(!$this->admin_login){
			$this->status=400;
			$this->message="Harus login";
			$this->__json_out($data);
			die();
		}
		
		//ambil current data id
		$id = (int) $id;
		
		//ambil inputan
		$di = $_POST; //semua array & key-nya akan dimasukan ke database
		
		if(empty($id)){
			if(isset($di['id'])) $id = (int) $di['id'];
			unset($di['id']);
		}
		
		//validasi
		if(!isset($di['indonesia'])) $di['indonesia'] = '';
		
		if($id>0 && strlen($di['indonesia'])>0){
			$res = $this->abjad->update($id,$di);
			if($res){
				$this->status=100;
				$this->message="Berhasil";
			}else{
				$this->status=204;
				$this->message="tidak dapat menyimpan ke database";
			}
		}else{
			$this->status=204;
			$this->message="Mohon isi semua kolom";
		}
		$this->__json_out($data);
	}
	public function hapus($id=""){
		$s = $this->__init(); //inisialisasi login / auth
		$data = array(); //array kosong
		
		if(!$this->admin_login){
			$this->status=400;
			$this->message="Harus login";
			$this->__json_out($data);
			die();
		}
		
		$id = (int) $id;
		if(!empty($id)){
			$res = $this->abjad->del($id);
			if($res){
				$this->status=100;
				$this->message="Berhasil";
			}else{
				$this->status=204;
				$this->message="tidak dapat menghapus ke database";
			}
		}
		$this->__json_out($data);
	}

}
