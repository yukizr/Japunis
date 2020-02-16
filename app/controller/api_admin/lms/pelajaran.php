<?php
class Pelajaran extends JI_Controller{
	var $status = 0;
	var $treehtml = '';
	var $is_login_admin;
	var $module = "lms_pelajaran";
	var $is_login_user = "";
	var $page = "lms_pelajaran";

	public function __construct(){
    parent::__construct();
		$this->lib("sene_json_engine");
		$this->load("api_admin/d_learnpelajaran_model",'pelajaran');
		$this->load("api_admin/e_learnquiz_model",'quiz');
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

		$tbl_as = $this->pelajaran->getTableAlias();

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
				$sortCol = $tbl_as.".id";
				break;
			case 1:
				$sortCol = "mata_pelajaran";
				break;
			default:
				$sortCol = $tbl_as.".id";
		}

		if(empty($draw)) $draw = 0;
		if(empty($length)) $length=10;
		if(empty($start)) $start=0;

		$keyword = $sSearch;
		if(isset($sval['value'])){
			$keyword = $sval['value'];
		}


		$count = $this->pelajaran->countAll($keyword);

		$pengumuman = array();
		$pengumuman = $this->pelajaran->getAll($start,$length,$sortCol,$sortDir,$keyword,$tglmax,$tglmin);

		//$this->debug($pengumuman);

		$totalFiltered = $count;
		$totalData =  $count;

		$data = array();
		if(is_array($pengumuman)){
			//var_dump(count($pengumuman));
			//die();
			foreach($pengumuman as &$pe){
				if(isset($pe->cdate))
					$pe->cdate = date("j F Y",strtotime($pe->cdate));
				if(isset($pe->is_quiz)){
					if($pe->is_quiz == "1"){
						$pe->is_quiz = 'Iya';
					}else{
						$pe->is_quiz = 'Tidak';
					}
				}

				if(isset($pe->gambar)){
					$fi = $pe->gambar;
					if(empty($fi)){
						$fi = $this->cms_blog.'/default.jpg';
					}
					$pe->gambar =
					'<img src="'.base_url($fi).'" style="width: 222px; height: auto; max-height: 150px;" />';
				}
			}
			unset($pe);
			$i=0;

			//$this->debug($pengumuman);
			//die();
			foreach($pengumuman as $p){
				$d = array();
				foreach($p as $key=>$val){
					$d[] = $val;
				}
				$data[$i] = $d;
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
			"data"            => $data,   // total data array
		);
		$this->sene_json_engine->out($json_data);
	}
	public function detail($id=""){
		$data = array();
		$data['status'] = 0;
		if(!empty($id)){
			$data['status'] = 1;
			$data['result'] = $this->pelajaran->getById($id);
			if(isset($data['result']->id)) $data['result'] = $data['result'];
		}
		$this->sene_json_engine->out($data);
	}
	public function update($id=""){
		$data = array();
		$data['status'] = 0;
		$data['result'] = 'One or more parameter required';
		$title = $this->input->post("title");
		$s = $this->__init();
		if(!empty($title)){
			$d = array();
			foreach($_POST as $key=>$val){
				$d[$key] = $val;
			}
			$d['cdate'] = "NOW()";

			$res = $this->pelajaran->update($id,$d);
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
		if(!isset($di['mata_pelajaran'])) $di['mata_pelajaran'] = '';
		
		if(strlen($di['mata_pelajaran'])>0){
			$res = $this->pelajaran->set($di);
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
		if(!isset($di['mata_pelajaran'])) $di['mata_pelajaran'] = '';
		
		if($id>0 && strlen($di['mata_pelajaran'])>0){
			$res = $this->pelajaran->update($id,$di);
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
			$res2 = $this->quiz->delByPelajaranId($id);
			$res = $this->pelajaran->del($id);
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
