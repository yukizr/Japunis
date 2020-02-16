<?php
class M_Pelajaran extends SENE_Model {
	public function __construct(){
		parent::__construct();
	}

  public function index($key=""){
  }

  // public function email(){
  //   $key = $this->input->get("email");
  //   $data = array();
  //   if (strlen($key)>3) {
  //     $email = $this->mt_kumpulkupon->getEmail($key);
  //     foreach ($email as $e) {
  //       $data[] = $e->email;
  //     }
  //   }
  //   //sleep(2);
  //   header_remove();
  //   header("Access-Control-Allow-Origin: *");
  //   header("Content-Type: application/json");
  //   echo json_encode($data);
  // }

  public function getAll(){
    $sql="SELECT `id`,`mapel`,`judul`,`gambar`,`dialog_1`,`dialog_2` FROM `t_pelajaran` WHERE 1 ";
    return $this->select($sql);
  }
  // public function getOffset($offset=0){
  //   $b=10;
		// $a=($offset-1)*10;
  //   $sql="SELECT `id`,`email`,`kupon` FROM `t_kumpulkupon` WHERE 1 LIMIT ".$a.",".$b."";
  //   return $this->select($sql);
  // }
  public function getOffset($orderby,$asc,$page,$keyword){

      $b=20;
      $a=($page-1)*$b;
      $sql="SELECT `id`,`mapel`,`judul`,`gambar` FROM `t_pelajaran` WHERE ";
      if(strlen($keyword)>=3){
				$sql = $sql." `id` LIKE '%".$keyword."%' OR `mapel` LIKE '%".$keyword."%' OR `judul` LIKE '%".$keyword."%' ";
      }else{
				$sql = $sql." 1 ";
			}

      if(!empty($orderby)){
        $sql = $sql." ORDER BY `".$orderby."` ";
      }else{
        $sql = $sql." ORDER BY `id` ";
      }

      if($asc=="1"){
        $sql = $sql." DESC  ";
        }else{
        $sql = $sql." ASC ";
      }
      $sql = $sql ." LIMIT ".$a.",".$b."";
      //die($sql);
      return $this->select($sql);
    }
  public function getById($id){
    $sql="SELECT `id`,`mapel`,`judul`,`gambar`,`dialog_1`,`dialog_2` FROM `t_pelajaran` WHERE `id` = ".$this->db->esc($id)." ";
    // var_dump($sql);
    // die();
    return $this->select($sql);
  }

	public function getByMapel($mapel){
    $sql="SELECT `id`,`mapel`,`judul`,`gambar`,`dialog_1`,`dialog_2` FROM `t_pelajaran` WHERE `mapel` = ".$this->db->esc($mapel)." ";
    return $this->select($sql);
  }

	public function getByJudul($judul){
    $sql="SELECT `id`,`mapel`,`judul`,`gambar`,`dialog_1`,`dialog_2` FROM `t_pelajaran` WHERE `judul` = ".$this->db->esc($judul)." ";
    return $this->select($sql);
  }

  public function getCount(){
      $sql="SELECT COUNT(*) 'total' FROM `t_pelajaran` WHERE 1 ";
      $data = $this->select($sql);
      if(isset($data[0]->total)) return  $data[0]->total;
      return 0;
    }

  public function countByMapel($mapel){
    $sql="SELECT COUNT(*) 'total' FROM `t_pelajaran` WHERE `mapel` = ".$this->db->esc($mapel)." ";
		//die($sql);
    $data = $this->select($sql);
		if(isset($data[0]->total)) return $data[0]->total;
		return 0;
  }

  public function set($mapel,$judul,$gambar,$dialog_1,$dialog_2){
		$sql="INSERT INTO `t_pelajaran`(`mapel`,`judul`,`gambar`,`dialog_1`,`dialog_2`) VALUES(".$this->db->esc($mapel).",".$this->db->esc($judul).",".$this->db->esc($gambar).",".$this->db->esc($dialog_1).",".$this->db->esc($dialog_2).") ";
		// var_dump($sql);
		// die();
		$this->exec($sql);
    return $this->db->lastId();
  }

  public function update($id,$mapel,$judul,$gambar,$dialog_1,$dialog_2){
		$sql 					= " SELECT `gambar` FROM `t_pelajaran` WHERE `id` = ".$this->db->esc($id)." ";
		$data 				= $this->select($sql);
		$gambar_ganti = $data[0]->gambar;
		$path 				= "assets/img/pelajaran/".$gambar_ganti;

		$sql1="UPDATE `t_pelajaran` SET `mapel` = ".$this->db->esc($mapel).",`judul` = ".$this->db->esc($judul).",`gambar` = ".$this->db->esc($gambar).",`dialog_1` = ".$this->db->esc($dialog_1).",`dialog_2` = ".$this->db->esc($dialog_2)." WHERE `id` = ".$this->db->esc($id)."";

		$sql2=" UPDATE `t_pelajaran` SET `mapel` = ".$this->db->esc($mapel).", `judul` = ".$this->db->esc($judul)." , `dialog_1` = ".$this->db->esc($dialog_1).", `dialog_2` = ".$this->db->esc($dialog_2)." WHERE `id` = ".$this->db->esc($id)." ";

		if (empty($gambar)) {
			return $this->exec($sql2);
		} else {
			//jika gambar diubah
			$unlink = unlink($path);
			return $this->exec($sql1);
		}

  }

  public function del($id){
		$sql="SELECT `gambar` FROM `t_pelajaran` WHERE `id` = ".$this->db->esc($id)." ";
		$data = $this->select($sql);
		$gambar = $data[0]->gambar;
		$path = "assets/img/pelajaran/".$gambar;

		$sql1="DELETE FROM `t_pelajaran` WHERE `id` = ".$this->db->esc($id)." ";
		if (count($data)==1) {
			$unlink = unlink($path);
			return $this->exec($sql1);
		} else {
			return $this->exec($sql1);
		}


  }
}
