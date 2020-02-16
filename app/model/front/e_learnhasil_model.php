<?php
class E_Learnhasil_Model extends SENE_Model{
	var $tbl="e_learnhasil";
	var $tbl_as = "elh";
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function set($di){
		$this->db->insert($this->tbl,$di);
		return $this->db->last_id;
	}
	public function getByPelajaranAndUserId($c_learnuser_id,$d_learnpelajaran_id="",$is_latest=1){
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->where('c_learnuser_id',$c_learnuser_id);
		if(!empty($d_learnpelajaran_id)) $this->db->where('d_learnpelajaran_id',$d_learnpelajaran_id);
		$this->db->order_by('id','desc');
		if(!empty($is_latest)){
			return $this->db->get_first();
		}else{
			return $this->db->get();
		}
	}
}

