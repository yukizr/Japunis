
<?php
	class Pelajaran extends SENE_Controller{
		var $status = 0;
		var $img_pelajaran = 'pelajaran';

		public function __construct(){
			parent::__construct();
			$this->lib("SENE_JSON_Engine","lib");
			$this->load("m_pelajaran");
			$this->img_pelajaran=realpath(getcwd().'/assets/img/'.$this->img_pelajaran);
		}

		public function index($orderby="id",$asc=0,$page=1){
			$sess = $this->getKey();
			if(!is_array($sess)){
				$sess = array();
			}
			if(isset($sess['admin'])){
				$data['sess'] = $sess;
				if(empty($page)){
					$page=1;
				}
				if(empty($orderby)) $orderby="id";
				if(!empty($asc)){
					$asc = "1";
					}else{
					$asc = "0";
				}
				if(!empty($_REQUEST['keyword'])){
					$keyword=$_REQUEST['keyword'];
				}
				else{
					$keyword="";
				}
				$data['keyword']=$keyword;
				$data['asc'] = $asc;
				//$data['is_rollback'] = $is_rollback;
				$data['orderby'] = $orderby;
				$data['pelajaran'] = $this->m_pelajaran->getOffset($orderby,$asc,$page,$keyword);
				$data['row'] = $this->m_pelajaran->getCount();
				$data['page'] = $page;
				$this->view("backend/__header",$data);
				$this->view("backend/__nav",$data);
        		$this->view("backend/pelajaran/pelajaran",$data);
				$this->view("backend/pelajaran/__bottom",$data);
				$this->view("backend/__footer",$data);
			}
			else{
      	redir(base_url("admin/login"));
			}
		}

    public function create(){
		$sess = $this->getKey();
		if(!is_array($sess)){
			$sess = array();
		}
    	$data['sess'] = $sess;
		if(isset($sess['admin'])){
			$this->view("backend/__header",$data);
			$this->view("backend/__nav",$data);
			$this->view("backend/pelajaran/create");
			$this->view("backend/pelajaran/create/bottom");
			$this->view("backend/__footer");
		}else{
			redir(base_url("admin/login"));
		}
	}

    // upload by sene_uploader
    public function input(){
		$url = base_url("assets/img/pelajaran/");
		if($this->input->post('submit')){
        $this->lib("SENE_Uploader","lib");
			$mapel = $this->input->post('mapel');
			$judul = $this->input->post('judul');
			$gambar = $this->SENE_Uploader->upload($this->img_pelajaran,"gambar",$res);
			$dialog_1 = $this->input->post('dialog_1');
			$dialog_2 = $this->input->post('dialog_2');
			$dialog_3 = $this->input->post('dialog_3');
			$tatabahasa_1 = $this->input->post('tatabahasa_1');
			$tatabahasa_2 = $this->input->post('tatabahasa_2');
			$kata_ungkapan = $this->input->post('kata_ungkapan');
			$res = $this->m_pelajaran->set($mapel,$judul,$gambar,$dialog_1,$dialog_2,$dialog_3,$tatabahasa_1,$tatabahasa_2,$kata_ungkapan);
			// var_dump($res);
			// die();
			header("location:".base_url("admin/pelajaran/"));
		}
		else{}
	}

	public function edit($id){
		$sess = $this->getKey();
		if(!is_array($sess)){
			$sess = array();
		}
	    $data['sess'] = $sess;
		if(isset($sess['admin'])){
			$data['datalist'] = $this->m_pelajaran->getById($id);
			$data['datalist'] = $data['datalist'][0];
			$data['id']=$id;
			if(isset($data['datalist'])){
				$data['sess'] = $sess;
				$this->view("backend/__header",$data);
				$this->view("backend/__nav",$data);
				$this->view("backend/pelajaran/edit",$data);
				$this->view("backend/pelajaran/edit/bottom");
				$this->view("backend/__footer");
			}
		}
		else{
		redir(base_url("admin/login"));
		}
	}

	public function alter($id){
		//var_dump($id);
		//die('editaction');
		$url = base_url("assets/img/pelajaran/");
		if($submit = $this->input->post('submit')){
		$data['warn'] = "";
		if (!empty($submit)) {
			$this->lib("SENE_Uploader","lib");
			$id = $id;
			$mapel = $this->input->post('mapel');
			$judul = $this->input->post('judul');
			$gambar = $this->SENE_Uploader->upload($this->img_pelajaran,"gambar",$res);
			$dialog_1 = $this->input->post('dialog_1');
			$dialog_2 = $this->input->post('dialog_2');
			$dialog_3 = $this->input->post('dialog_3');
			$tatabahasa_1 = $this->input->post('tatabahasa_1');
			$tatabahasa_2 = $this->input->post('tatabahasa_2');
			$kata_ungkapan = $this->input->post('kata_ungkapan');
			$res = $this->m_pelajaran->update($id,$mapel,$judul,$gambar,$dialog_1,$dialog_2,$dialog_3,$tatabahasa_1,$tatabahasa_2,$kata_ungkapan);
			if ($res) {
				$data['warn'] = "berhasil";
			} else {
				$data['warn'] = "gagal";
			}
		}
		header("location:".base_url("admin/pelajaran/"));
		}
		else{redir(base_url("admin/login"));}
	}

		public function delete($id){
      // $del_img = unlink("gambar/$_GET[namafile]");
			$res = $this->m_pelajaran->del($id);
	    header("location:".base_url("admin/pelajaran/"));
      //redir(base_url("kumpulkupon/"));
		}


	}
?>
