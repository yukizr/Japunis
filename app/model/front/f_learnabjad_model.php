<?php
class F_Learnabjad_Model extends SENE_Model{
	var $tbl="f_learnabjad";
	var $tbl_as = "fla";
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getAll($is_active=""){
		$this->db->select('id');
		$this->db->select('indonesia');
		if(strlen($is_active)) $this->db->order_by('is_active',$is_active);
		$this->db->order_by('id','asc');
		return $this->db->get();
	}
	public function getById($id,$is_active=""){
		$this->db->where('id',$id);
		if(strlen($is_active)) $this->db->order_by('is_active',$is_active);
		return $this->db->get_first();
	}
	public function getByDasarId($f_learndasar_id,$is_active=""){
		$this->db->where('f_learndasar_id',$f_learndasar_id);
		if(strlen($is_active)) $this->db->order_by('is_active',$is_active);
		return $this->db->get();
	}
	public function get(){
		//$this->db->select()
		$this->db->from($this->tbl,$this->tbl_as)->limit(100);
		return $this->db->get();
	}
}


