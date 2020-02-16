<?php
class M_Pengguna extends SENE_Model{
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
  public function update($username,$email,$password,$active,$level){
    $sql="UPDATE `t_admin` SET `username` = ".$this->db->esc($username).",`email` = ".$this->db->esc($email).",`password` = ".$this->db->esc($password).",`active` = ".$this->db->esc($active).",`level` = ".$this->db->esc($level)."  WHERE `id` = ".$this->db->esc($id)."";
    return $this->exec($sql);
  }
  public function del($id){
    $sql="DELETE FROM `t_admin` WHERE `id` = ".$this->db->esc($id)."";
    return $this->exec($sql);
  }

	public function getByIdCustomer($id){
    $sql="SELECT `id`,`email`,`password`,`name_first`,`name_last`,`class`,`active`,`confirmed`, `confirm_code` FROM `t_pengguna` WHERE `id` = ".$this->db->esc($id)." ";
		// die($sql);
    return $this->select($sql);
  }

	public function check($email){
		$email = $this->db->esc($email.'');
    $sql="SELECT id FROM `t_pengguna` WHERE `email` LIKE ".$email." ";
		// die($sql);
    $data = $this->select($sql);
		return count($data);
  }

	public function set($name_first,$name_last,$email,$password,$kelas,$active,$confirmed,$confirm_code){
    $sql="INSERT INTO `t_pengguna`(`name_first`,`name_last`,`email`,`password`,`class`,`active`,`confirmed`,`confirm_code`) VALUES(".$this->db->esc($name_first).",".$this->db->esc($name_last).",".$this->db->esc($email).",PASSWORD(".$this->db->esc($password)."),".$this->db->esc($kelas).",".$this->db->esc($active).",".$this->db->esc($confirmed).",".$this->db->esc($confirm_code).") ";
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
