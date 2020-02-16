<?php
class G_LearnTambahan_Model extends SENE_Model{
	var $tbl = 'g_learntambahan';
	var $tbl_as = 'glt';
	public function __construct(){
		parent::__construct();
		$this->db->setCharSet("utf8mb4");
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function getAll($page=0,$pagesize=10,$sortCol="kode",$sortDir="ASC",$keyword="",$utype=""){
		$this->db->flushQuery();
		 $this->db->setCharSet("utf8mb4");
		$this->db->select();
		$this->db->from($this->tbl,$this->tbl_as);
		if(!empty($utype)) $this->db->where("utype",$utype,"AND","=",0,0);
		if(strlen($keyword)>1){
			$this->db->where("judul",$keyword,"OR","%like%",1,0);
			$this->db->where("isi",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword="",$utype=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		if(!empty($utype)) $this->db->where("utype",$utype,"AND","=",0,0);
		if(strlen($keyword)>1){
			$this->db->where("judul",$keyword,"OR","%like%",1,0);
			$this->db->where("isi",$keyword,"OR","%like%",0,1);
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
}


