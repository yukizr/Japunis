<?php
class C_LearnUser_Model extends SENE_Model{
	var $tbl = 'c_learnuser';
	var $tbl_as = 'clu';
	var $tbl2 = 'b_user';
	var $tbl2_as = 'bu';
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function auth($username,$password){
		$this->db->flushQuery();
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'id',$this->tbl_as,'b_user_id');
		$this->db
			->select_as("$this->tbl2_as.id id, $this->tbl2_as.id b_user_id, $this->tbl_as.id c_learnuser_id, $this->tbl2_as.email, $this->tbl2_as.fnama, $this->tbl2_as.password, $this->tbl_as.kelas, $this->tbl_as.utype utype, $this->tbl2_as.is_active","is_active",0)
			->where_as("$this->tbl_as.is_active",'1')
			->where_as("$this->tbl2_as.email",$this->db->esc($username))
			->where_as("$this->tbl2_as.password",$this->db->esc(md5($password)));
		return $this->db->get_first('object',0);
	}
	public function getByUserId($b_user_id){
		$this->db->flushQuery();
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'id',$this->tbl_as,'b_user_id');
		$this->db
			->select("*")
			->where_as("$this->tbl_as.is_active",'1')
			->where_as("$this->tbl2_as.id",$this->db->esc($b_user_id));
		return $this->db->get_first('object',0);
	}
	public function set($di){
		$this->db->insert($this->tbl,$di);
		return $this->db->lastId();
	}
	public function update($id,$du){
		$this->db->where('id',$id);
		return $this->db->insert($this->tbl,$du);
	}
	public function updateByUserId($b_user_id,$du){
		$this->db->where('b_user_id',$b_user_id);
		return $this->db->insert($this->tbl,$du);
	}
}


