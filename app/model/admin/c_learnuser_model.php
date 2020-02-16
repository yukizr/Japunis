<?php
class C_Learnuser_Model extends SENE_Model{
	var $tbl="c_learnuser";
	var $tbl_as = "clu";
	var $tbl2="b_user";
	var $tbl2_as = "bu";
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getById($id){
		$this->db->where('id',$id);
		return $this->db->get_first($id);
	}
	public function getJoinById($id){
		$this->db->select_as("$this->tbl_as.id, $this->tbl_as.id c_learnuser_id, $this->tbl2_as.id b_user_id, $this->tbl2_as.fnama fnama, $this->tbl_as.kelas, $this->tbl2_as.email",'email',0);
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'id',$this->tbl_as,'b_user_id');
		$this->db->where_as("$this->tbl_as.id",$this->db->esc($id));
		return $this->db->get_first($id);
	}
}


