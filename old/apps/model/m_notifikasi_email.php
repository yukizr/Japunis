<?php
/**
 *
 */
class M_Notifikasi_Email extends SENE_Model{
  public function __construct(){
		parent::__construct();
	}
  public function getByName($name,$ntype="email"){
   $sql="SELECT `id`,`name`,`ntype`,`title`,`subject`,`sender`,`content`,`ctype`,`cdate`,`ldate` FROM `t_notifikasi_email` WHERE `name` LIKE ".$this->db->esc($name)." AND ntype=".$this->db->esc($ntype)." ";
  //  die($sql);
   return $this->select($sql);
 }
}
