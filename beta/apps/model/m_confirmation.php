<?php
class M_confirmation extends SENE_Model{
	public function __construct(){
		parent::__construct();
	}
  public function getAll(){
    $sql="SELECT `id`,`username`,`email`,`password`,`active`,`level` FROM `t_admin` WHERE 1 ";
    return $this->select($sql);
  }
  public function getOffset($offset=0){
    $b=10;
		$a=($offset-1)*10;
    $sql="SELECT `id`,`username`,`email`,`password`,`active`,`level` FROM `t_admin` WHERE 1 LIMIT ".$a.",".$b."";
    return $this->select($sql);
  }
  public function getById($id){
    $sql="SELECT `id`,`username`,`email`,`password`,`active`,`level` FROM `t_admin` WHERE `id` = ".$this->db->esc($id)." ";
    return $this->select($sql);
  }



  public function has_confirmed($code){
    $sql="UPDATE `t_pengguna` SET `confirmed` = '1'  WHERE `confirm_code` = ".$this->db->esc($code)."";
    return $this->exec($sql);
  }
  public function del($id){
    $sql="DELETE FROM `t_admin` WHERE `id` = ".$this->db->esc($id)."";
    return $this->exec($sql);
  }

	public function check($email){
		$email = $this->db->esc($email.'');
    $sql="SELECT id FROM `t_pengguna` WHERE `email` LIKE ".$email." ";
		// die($sql);
    $data = $this->select($sql);
		return count($data);
  }

	public function set($name_first,$name_last,$email,$password,$kelas,$active){
    $sql="INSERT INTO `t_pengguna`(`name_first`,`name_last`,`email`,`password`,`class`,`active`) VALUES(".$this->db->esc($name_first).",".$this->db->esc($name_last).",".$this->db->esc($email).",PASSWORD(".$this->db->esc($password)."),".$this->db->esc($kelas).",".$this->db->esc($active).") ";
		// die($sql);
    $this->exec($sql);
    return $this->db->lastId();
  }
	public function auth($email,$pass){
    $sql="SELECT `id`,`email`,`password`,`active` FROM `t_pengguna` WHERE `email` = ".$this->db->esc($email)." AND `password` = PASSWORD(".$this->db->esc($pass)."); ";
		// die($sql);
    return $this->select($sql);
  }
}
?>
