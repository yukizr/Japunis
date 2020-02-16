<?php
class B_User_Model extends SENE_Model{
	var $tbl = 'b_user';
	var $tbl_as = 'bu';
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function trans_start(){
		$r = $this->db->autocommit(0);
		if($r) return $this->db->begin();
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
	public function set($di){
		if(!is_array($di)) return 0;
		$this->db->insert($this->tbl,$di,0,0);
		return $this->db->last_id;
	}
	public function update($id,$du){
		if(!is_array($du)) return 0;
		$this->db->where("id",$id);
    return $this->db->update($this->tbl,$du,0);
	}
	public function del($id){
		$this->db->where("id",$id);
		return $this->db->delete($this->tbl);
	}
	public function checkEmail($email,$id=0){
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->where("email",$email);
		if(!empty($id)) $this->db->where("id",$id,'AND','!=');
		$d = $this->db->from($this->tbl,$this->tbl_as)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	
	public function getById($id){
		$this->db->select_as("$this->tbl_as.*, COALESCE(a_company_id,'-')",'a_company_id',0);
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where("id",$id);
		return $this->db->get_first();
	}
}