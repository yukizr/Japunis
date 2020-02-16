<?php
class B_Learn_Pengguna_Model extends SENE_Model {
	var $is_cacheable;
	var $tbl = 'b_learn_pengguna';
	var $tbl_as = 'blc';
	var $tbl2 = 'a_pengguna';
	var $tbl2_as = 'ap';
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
	public function getTableAlias2(){
		return $this->tbl2_as;
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
		$this->db->select_as("$this->tbl_as.id, CONCAT(nama_depan,' ',nama_belakang) nama_peserta, $this->tbl2_as.email email, is_pengajar, is_pelajar, $this->tbl_as.is_active",'is_active',0);
		$this->db->join($this->tbl2,$this->tbl2_as,'id',$this->tbl_as,'a_pengguna_id','');
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>1){
			$this->db->where($this->tbl_as.".id",$keyword,"OR","%like%",1,0);
			$this->db->where($this->tbl_as.".nama_depan",$keyword,"OR","%like%",0,0);
			$this->db->where($this->tbl_as.".nama_belakang",$keyword,"OR","%like%",0,0);
			$this->db->where($this->tbl2_as.".email",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		if(strlen($keyword)>1){
			$this->db->where($this->tbl_as.".id",$keyword,"OR","%like%",1,0);
			$this->db->where($this->tbl_as.".nama_depan",$keyword,"OR","%like%",0,0);
			$this->db->where($this->tbl_as.".nama_belakang",$keyword,"OR","%like%",0,0);
			$this->db->where($this->tbl2_as.".email",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
}
