<?php
class D_Learnpelajaran_Model extends SENE_Model {
	var $is_cacheable;
	var $tbl = 'd_learnpelajaran';
	var $tbl_as = 'dlp';
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
	public function update($id,$d){
		$this->db->where("id",$id);
		return $this->db->update($this->tbl,$d);
	}
	public function del($id){
		$this->db->where("id",$id);
		return $this->db->delete($this->tbl);
	}
	public function getById($id){
	    $this->db->where('id',$id);
	    return $this->db->get_first('object',0);
	}
	public function getAll($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword=""){
		$this->db->flushQuery();
		$this->db->select('id');
		$this->db->select('judul');
		$this->db->select('gambar');
		
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>1){
			$this->db->where("id",$keyword,"OR","%like%",1,0);
			$this->db->where("judul",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		if(strlen($keyword)>1){
			$this->db->where("id",$keyword,"OR","%like%",1,0);
			$this->db->where("judul",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
}
