<?php
class Hasil extends JI_Controller{
	var $status = 0;
	var $treehtml = '';
	var $is_login_admin;
	var $is_login_user = "";

	public function __construct(){
    parent::__construct();
		$this->lib("sene_json_engine");
		$this->load("api_admin/d_learnpelajaran_model",'elpm');
		$this->load("api_admin/e_learnquiz_model",'elqm');
		$this->load("api_admin/e_learnhasil_model",'elhm');
		$this->setTheme("admin/");
		$this->is_login_user = 0;
	}
  public function index($c_learnuser_id=""){
    $d = $this->__init();
		$data = array();
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}
		$c_learnuser_id = (int) $c_learnuser_id;
		if(empty($c_learnuser_id)){
			$c_learnuser_id = (int) $this->input->request("c_learnuser_id");
		}
		if(empty($c_learnuser_id)){
			$this->status = 444;
			$this->message = 'ID Learn User tidak valid';
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
		$tbl_as = $this->elhm->getTableAlias();

		switch($iSortCol_0){
			case 0:
				$sortCol = "id";
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
		$dcount = $this->elhm->countAll($keyword,$c_learnuser_id);
		$ddata = $this->elhm->getAll($page,$pagesize,$sortCol,$sortDir,$keyword,$c_learnuser_id);
    
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
	public function hapus($id="",$c_learnuser_id=""){
		$s = $this->__init();
		$data = array();
		
		if(!$this->admin_login){
			$this->status = 400;
			$this->message = 'ID Learn User tidak valid';
			$this->__json_out($data);
			die();
		}
		
		$id = (int) $id;
		$c_learnuser_id = (int) $c_learnuser_id;
		if(empty($id)){
			$id = (int) $this->input->request('id');
			$c_learnuser_id = (int) $this->input->request('c_learnuser_id');
		}
		
		if(empty($c_learnuser_id)){
			$c_learnuser_id = (int) $this->input->request('c_learnuser_id');
		}
		
		if(!empty($c_learnuser_id) && !empty($id)){
			$res = $this->elhm->del($id,$c_learnuser_id);
			if($res){
				$this->status = 100;
				$this->message = 'Berhasil';
			}else{
				$this->status = 202;
				$this->message = 'Tidak dapat menghapus dari database';
			}
		}else{
			$this->status = 444;
			$this->message = 'ID Learn User atau ID hasil quiz tidak valid';
		}
		$this->__json_out($data);
	}

}
