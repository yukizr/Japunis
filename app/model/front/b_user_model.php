<?php
class B_User_Model extends SENE_Model{
	var $tbl = 'b_user';
	var $tbl_as = 'bu';
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function auth($username,$password){
		$this->db
			->select("*")
			->where_as("email",$this->db->esc($username))
			->where_as("password",$this->db->esc(md5($password)));
		return $this->db->get_first('object',0);
	}
	public function set($di){
		$this->db->insert($this->tbl,$di);
		return $this->db->lastId();
	}
	public function update($id,$du){
		$this->db->where('id',$id);
		return $this->db->update($this->tbl,$du);
	}
	public function trans_start(){
		$r = $this->db->autocommit(0);
		if($r) return $this->db->begin('');
		return false;
	}
	public function trans_commit(){
		return $this->db->commit();
	}
	public function trans_rollback(){
		return $this->db->rollback();
	}
	public function trans_end(){
		return $this->db->autocommit(1);
	}
	public function checkEmail($email,$id=0){
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->where("email",$email);
		if(!empty($id)) $this->db->where("id",$id,'AND','!=');
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
}


