<?php
class E_Learnhasil_Model extends SENE_Model{
	var $tbl="e_learnhasil";
	var $tbl_as = "elh";
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getTableAlias(){
		return $this->tbl_as;
	}
	
	public function getAll($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword="",$c_learnuser_id="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("pelajaran, cdate, nilai_angka, jawaban_benar, jawaban_salah",'jawaban_salah',0);
		
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where('c_learnuser_id',$c_learnuser_id);
		if(strlen($keyword)>1){
			$this->db->where("pelajaran",$keyword,"OR","%like%",0,0);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	
	public function countAll($keyword="",$c_learnuser_id="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where('c_learnuser_id',$c_learnuser_id);
		if(strlen($keyword)>1){
			$this->db->where("pelajaran",$keyword,"OR","%like%",0,0);
		}
		$d = $this->db->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	
	public function getByPelajaranAndUserId($c_learnuser_id,$d_learnpelajaran_id="",$is_latest=1){
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where('c_learnuser_id',$c_learnuser_id);
		if(!empty($d_learnpelajaran_id)) $this->db->where('d_learnpelajaran_id',$d_learnpelajaran_id);
		$this->db->order_by('id','desc');
		if(!empty($is_latest)){
			return $this->db->get_first();
		}else{
			return $this->db->get();
		}
	}
}


