<?php
class A_Pengguna_Model extends SENE_Model{
	var $tbl = 'a_pengguna';
	var $tbl_as = 'ap';
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getAll($page=0,$pagesize=10,$sortCol="kode",$sortDir="ASC",$keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as('id,username,email,nama,is_active','is_active',0);
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>1){
			$this->db->where("fnama",$keyword,"OR","%like%",1,0);
			$this->db->where("lnama",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		if(strlen($keyword)>1){
			$this->db->where("fnama",$keyword,"OR","%like%",1,0);
			$this->db->where("lnama",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	public function getById($id){
		$this->db->where("id",$id);
		return $this->db->get_first();
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
	public function checkUsername($username,$id=0){
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->where("username",$username);
		if(!empty($id)) $this->db->where("id",$id,'AND','!=');
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
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


