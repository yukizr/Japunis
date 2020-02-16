<?php
class B_Learn_Model extends SENE_Model {
	var $is_cacheable;
	var $tbl = 'b_learn';
	var $tbl_as = 'blc';
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
  public function getByProperti($properti){
    $this->db->where('properti',$properti);
    return $this->db->get('object',1);
  }
  public function getByNilai($nilai){
    $this->db->where('nilai',$nilai);
    return $this->db->get('object',1);
  }
}
