<?php
class C_Learnuser_Model extends SENE_Model {
	var $is_cacheable;
	var $tbl = 'c_learnuser';
	var $tbl_as = 'clu';
	var $tbl2 = 'b_user';
	var $tbl2_as = 'bu';
	var $hashkey = 'uwmbeebbuwosas';
	public function __construct(){
		parent::__construct();
		$this->is_cacheable = 0;
    $this->db->from($this->tbl,$this->tbl_as);
	}
	public function getHashkey(){
		return $this->hashkey;
	}
	public function getTableAlias(){
		return $this->tbl_as;
	}
	public function getTableAlias2(){
		return $this->tbl2_as;
	}
	public function set($d){
		$this->db->insert($this->tbl,$d,0,0);
		return $this->db->lastId();
	}
	public function update($id,$d){
		$this->db->where("id",$id);
		return $this->db->update($this->tbl,$d);
	}
	public function del($id){
		$this->db->where("id",$id);
		return $this->db->delete($this->tbl);
	}
  public function getById($id){
    $this->db->where('id',$id);
    return $this->db->get('object',1);
  }
	public function getAll($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword="",$utype="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("$this->tbl_as.id id, $this->tbl2_as.fnama, $this->tbl_as.kelas, $this->tbl2_as.email, $this->tbl2_as.is_active ",'is_active',0);
		
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'id',$this->tbl_as,'b_user_id','');
		
		if(strlen($utype)) $this->db->where_as("$this->tbl_as.utype",$this->db->esc($utype));
		if(strlen($keyword)>1){
			$this->db->where("fnama",$keyword,"OR","%like%",1,0);
			$this->db->where("kelas",$keyword,"OR","%like%",0,0);
			$this->db->where("email",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword="",$utype="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->join($this->tbl2,$this->tbl2_as,'id',$this->tbl_as,'b_user_id','');
		
		if(strlen($utype)) $this->db->where_as("$this->tbl_as.utype",$this->db->esc($utype));
		if(strlen($keyword)>1){
			$this->db->where("fnama",$keyword,"OR","%like%",1,0);
			$this->db->where("kelas",$keyword,"OR","%like%",0,0);
			$this->db->where("email",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
  public function getByUserId($b_user_id){
    $this->db->where('b_user_id',$b_user_id);
    return $this->db->get('object',0);
  }
  public function getJoinById($id){
    $this->db->select_as("$this->tbl2_as.id id, $this->tbl_as.b_user_id, $this->tbl_as.utype, $this->tbl2_as.fnama, $this->tbl2_as.email, $this->tbl_as.kelas,$this->tbl2_as.is_active","is_active",0);
		$this->db->from($this->tbl,$this->tbl_as)->join($this->tbl2,$this->tbl2_as,'id',$this->tbl_as,'b_user_id','');
		$this->db->where_as("$this->tbl_as.id",$this->db->esc($id));
    return $this->db->get_first('object',0);
  }
  public function updateByUserId($b_user_id,$du){
    $this->db->where('b_user_id',$b_user_id);
		return $this->db->update($this->tbl,$du);
  }
	public function delByUserId($b_user_id){
		$this->db->where("b_user_id",$b_user_id);
		return $this->db->delete($this->tbl);
	}
}
