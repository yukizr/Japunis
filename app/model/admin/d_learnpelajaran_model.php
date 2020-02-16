<?php
class D_Learnpelajaran_Model extends SENE_Model{
	var $tbl="d_learnpelajaran";
	var $tbl_as = "dlp";
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
	public function get(){
		//$this->db->select()
		$this->db->from($this->tbl,$this->tbl_as)->limit(100);
		return $this->db->get();
	}
}


