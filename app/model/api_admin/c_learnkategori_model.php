<?php
class C_Learnkategori_Model extends SENE_Model {
	var $is_cacheable;
	var $tbl = 'c_learnkategori';
	var $tbl_as = 'clg';
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
    return $this->db->get('object',1);
  }
	public function getAll($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select('id');
		$this->db->select('nama');
		$this->db->select('utype');
		$this->db->select('mdescription');
		$this->db->select('prioritas');
		$this->db->select('is_active');
		
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>1){
			$this->db->where("id",$keyword,"OR","%like%",1,0);
			$this->db->where("nama",$keyword,"OR","%like%",0,0);
			$this->db->where("utype",$keyword,"OR","%like%",0,0);
			$this->db->where("mdescription",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		if(strlen($keyword)>1){
			$this->db->where("id",$keyword,"OR","%like%",1,0);
			$this->db->where("nama",$keyword,"OR","%like%",0,0);
			$this->db->where("utype",$keyword,"OR","%like%",0,0);
			$this->db->where("mdescription",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
}
