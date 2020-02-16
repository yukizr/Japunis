<?php
class E_Learnquiz_Model extends SENE_Model {
	var $is_cacheable;
	var $tbl = 'e_learnquiz';
	var $tbl_as = 'elq';
	var $tbl2 = 'd_learnpelajaran';
	var $tbl2_as = 'dlp';
	var $hashkey = 'uwmbeebbuwosas';
	public function __construct(){
		parent::__construct();
		$this->is_cacheable = 0;
    $this->db->from($this->tbl,$this->tbl_as);
	}
	public function getHashkey(){
		return $this->hashkey;
	}
	public function getTableAlias(){
		return $this->tbl_as;
	}
	public function set($d){
		$this->db->insert($this->tbl,$d,0,0);
		return $this->db->lastId();
	}
	public function update($id,$du){
		$this->db->where("id",$id);
		return $this->db->update($this->tbl,$du);
	}
	public function del($id){
		$this->db->where("id",$id);
		return $this->db->delete($this->tbl);
	}
	public function delByPelajaranId($d_learnpelajaran_id){
		$this->db->where("d_learnpelajaran_id",$d_learnpelajaran_id);
		return $this->db->delete($this->tbl);
	}
	public function del2($d_learnpelajaran_id,$id){
		$this->db->where("id",$id);
		$this->db->where("d_learnpelajaran_id",$d_learnpelajaran_id);
		return $this->db->delete($this->tbl);
	}
  public function getById($id){
    $this->db->where('id',$id);
    return $this->db->get_first('object',0);
  }
	public function getAll($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("DISTINCT d_learnpelajaran_id id, nama, COUNT(*) total_soal, $this->tbl_as.is_active ",'is_active',0);
		
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>1){
			$this->db->where("nama",$keyword,"OR","%like%",1,0);
			$this->db->where("pertanyaan",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$sql = 'SELECT COUNT(*) total FROM (SELECT DISTINCT d_learnpelajaran_id id FROM '.$this->tbl.' WHERE ';
		if(strlen($keyword)>1){
			$keyword = $this->db->esc('%'.$keyword.'%');
			$sql .= 'nama LIKE '.$keyword.' AND ';
			$sql .= 'pertanyaan LIKE '.$keyword.' ';
		}
		$sql .= ') ';
		$d = $this->db->query($sql);
		return 0;
	}
	public function getAllByPelajaranId($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword="",$d_learnpelajaran_id=""){
		$this->db->flushQuery();
		$this->db->select_as("id, pertanyaan, opsi, jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban, is_active ",'is_active',0);
		
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where('d_learnpelajaran_id',$d_learnpelajaran_id);
		if(strlen($keyword)>1){
			$this->db->where("pertanyaan",$keyword,"OR","%like%",1,0);
			$this->db->where("jawaban1",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban2",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban3",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban4",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban5",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAllByPelajaranId($keyword="",$d_learnpelajaran_id=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)",'total',0);
		
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where('d_learnpelajaran_id',$d_learnpelajaran_id);
		if(strlen($keyword)>1){
			$this->db->where("pertanyaan",$keyword,"OR","%like%",1,0);
			$this->db->where("jawaban1",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban2",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban3",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban4",$keyword,"OR","%like%",0,0);
			$this->db->where("jawaban5",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->get_first();
		if(isset($d->total)) return $d->total;
		return 0;
	}
}
