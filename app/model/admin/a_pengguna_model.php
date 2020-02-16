<?php
class A_Pengguna_Model extends SENE_Model{
	var $tbl = 'a_pengguna';
	var $tbl_as = 'ap';
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function auth($username,$password){
		$this->db
			->select("*")
			->where_as("is_active",'1')
			->where_as("username",$this->db->esc($username))
			->where_as("password",$this->db->esc(md5($password)));
		return $this->db->get_first('object',0);
	}
	public function checkToken($kind="api_web",$token){
		$dt = $this->db->where($kind.'_token',$token)->get();
		if(count($dt)>1){
			foreach($dt as $d){
				$this->setToken($kind,"NULL",$d->id);
			}
			return false;
		}else if(count($dt)==1){
			return true;
		}else{
			return false;
		}
	}
	public function setToken($kind="api_web",$token,$id){
		$du = array($kind.'_token'=>$token);
		return $this->db->where("id",$id)->update($this->tbl,$du);
	}
	public function setAgree($id){
		$du = array('is_agree'=>'1');
		return $this->db->where("id",$id)->update($this->tbl,$du);
	}
	public function update($id,$du){
		$this->db->where('id',$id);
		return $this->db->update($this->tbl,$du);
	}
}


