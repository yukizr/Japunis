<?php
class G_Learntambahan_Model extends SENE_Model{
	var $tbl="g_learntambahan";
	var $tbl_as = "glt";
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->setCharSet("utf8mb4");
	}
	public function getById($id){
		$this->db->setCharSet("utf8mb4");
		$this->db->where('id',$id);
		return $this->db->get_first();
	}
}


