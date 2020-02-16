<?php
class E_Learnquiz_Model extends SENE_Model{
	var $tbl="e_learnquiz";
	var $tbl_as = "elq";
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getAll($is_active=""){
		$this->db->select('id');
		$this->db->select('judul');
		$this->db->select('gambar');
		if(strlen($is_active)) $this->db->order_by('is_active',$is_active);
		$this->db->order_by('prioritas','asc');
		return $this->db->get();
	}
	public function getById($id,$is_active=""){
		$this->db->where('id',$id);
		if(strlen($is_active)) $this->db->order_by('is_active',$is_active);
		return $this->db->get_first();
	}
	public function getByPelajaranId($d_learnpelajaran_id,$is_active=""){
		$this->db->where('d_learnpelajaran_id',$d_learnpelajaran_id);
		if(strlen($is_active)) $this->db->order_by('is_active',$is_active);
		return $this->db->get();
	}
}

