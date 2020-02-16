<?php
class D_Blog_Model extends SENE_Model {
	var $is_cacheable;
	var $tbl = 'd_blog';
	var $tbl_alias = 'db';
	var $hashkey = 'uwmbeebbuwosas';
	public function __construct(){
		parent::__construct();
		$this->is_cacheable = 0;
	}
	public function getHashkey(){
		return $this->hashkey;
	}
	public function getTableAlias(){
		return $this->tbl_alias;
	}
	public function getAll($b_user_id,$page=0,$pagesize=10,$sortCol="cdate",$sortDir="DESC",$keyword="",$tglmax="",$tglmin=""){
		$this->db->flushQuery();
		$this->db->select_as($this->tbl_alias.".id","id",0);
		$this->db->select_as("CONCAT(bu.fnama,' ',bu.lnama)","author",0);
		$this->db->select_as($this->tbl_alias.".title","title",0);
		$this->db->select_as($this->tbl_alias.".excerpt","excerpt",0);
		$this->db->select_as("".$this->tbl_alias.".featured_image","featured_image",0);
		$this->db->select_as("".$this->tbl_alias.".cdate","cdate",0);
		$this->db->select_as("".$this->tbl_alias.".status","status",0);
		$this->db->order_by($sortCol,$sortDir);
		$this->db->from($this->tbl,$this->tbl_alias);
		$this->db->join("b_user","bu","id",$this->tbl_alias,"b_user_id","left");
		if(!empty($b_user_id)){
			$this->db->where($this->tbl_alias.".b_user_id",$b_user_id,"AND","like");
		}
		if(!empty($tglmax) && empty($tglmin)){
			$tglmin = $tglmax;
		}else if(empty($tglmax) && !empty($tglmin)){
			$tglmax = $tglmin;
		}

		if(!empty($tglmax) && !empty($tglmin)){
			$this->db->between("DATE(".$this->tbl_alias.".tanggal_pernikahan)",'DATE("'.$tglmin.'")','DATE("'.$tglmax.'")');
		}

		if(strlen($keyword)>2){
			$this->db->where("bu.fnama",$keyword,"OR","%like%");
			$this->db->where("bu.lnama",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".title",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".slug",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".excerpt",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".content",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".status",$keyword,"OR","%like%");
		}
		$this->db->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function getAllCount($b_user_id,$keyword="",$tglmax="",$tglmin=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->from($this->tbl,$this->tbl_alias);
		$this->db->join("b_user","bu","id",$this->tbl_alias,"b_user_id","left");
		if(!empty($b_user_id)){
			$this->db->where($this->tbl_alias.".b_user_id",$b_user_id,"AND","like");
		}
		if(!empty($tglmax) && empty($tglmin)){
			$tglmin = $tglmax;
		}else if(empty($tglmax) && !empty($tglmin)){
			$tglmax = $tglmin;
		}

		if(!empty($tglmax) && !empty($tglmin)){
			$this->db->between("DATE(".$this->tbl_alias.".fdate)",'DATE("'.$tglmin.'")','DATE("'.$tglmax.'")');
		}

		if(strlen($keyword)>2){
			$this->db->where("bu.fnama",$keyword,"OR","%like%");
			$this->db->where("bu.lnama",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".title",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".slug",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".excerpt",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".content",$keyword,"OR","%like%");
			$this->db->where($this->tbl_alias.".status",$keyword,"OR","%like%");
		}
		$d = $this->db->from($this->tbl,$this->tbl_alias)->get("object",0);
		if(isset($d[0]->jumlah)) return $d[0]->jumlah;
		return 0;
	}
	public function countByUserId($b_user_id){
		$d = $this->db->select_as("COUNT(*)","total",1)->from($this->tbl)->where("b_user_id",$b_user_id)->get();
		if(isset($d[0]->total)) return $d[0]->total;
		return 0;
	}
	public function set($d){
		return $this->db->insert($this->tbl,$d);
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
		$this->db->where("id",$id);
		return $this->db->from($this->tbl)->get_first();
	}
	public function getByIdAndUser($id,$b_user_id){
		$this->db->where("id",$id);
		$this->db->where("b_user_id",$b_user_id);
		return $this->db->from($this->tbl)->get_first();
	}
	public function getByIdHashedAndUser($id,$b_user_id){
		$this->db->where_as("MD5(CONCAT('$this->hashkey',id))",$id);
		$this->db->where("b_user_id",$b_user_id);
		return $this->db->from($this->tbl)->get_first();
	}
	public function getBrandByDate($fdate){
		//SELECT DATE_FORMAT(`fdate`,"%W, %d %M %Y") tanggal, supplier, SUM(`nominal`) total FROM d_lapbeli WHERE  DATE(fdate) BETWEEN DATE('2017-01-01') AND DATE('2017-01-09') GROUP BY supplier ORDER BY supplier ASC;
		$this->db->select_as('DATE_FORMAT(`fdate`,"%W, %d %M %Y")',"tanggal",1)->select_as("supplier","brand",1)->select_as("SUM(`nominal`)","total",1)->from($this->tbl)->between("DATE(fdate) ",' DATE("'.$fdate.'") ',' DATE("'.$fdate.'") ');
		$this->db->group_by("supplier");
		return $this->db->get("object",0);
	}
	public function getTotal($tglmin,$tglmax){
		$this->db->select_as('DATE_FORMAT(`fdate`,"%W, %d %M %Y")',"tanggal",1)->select_as("supplier","brand",1)->select_as("SUM(`nominal`)","total",1)->from($this->tbl)->where_as("DATE(fdate)",$fdate)->order_by("supplier","ASC")->between("DATE(fdate) ",' DATE("'.$tglmin.'") ',' DATE("'.$tglmax.'") ');

		return $this->db->get("object",0);
	}

	public function updateByUser($id,$b_user_id,$d){
		$this->db->where("id",$id);
		$this->db->where("b_user_id",$b_user_id);
		return $this->db->update($this->tbl,$d);
	}
	public function delByUser($id,$b_user_id){
		$this->db->where("id",$id);
		$this->db->where("b_user_id",$b_user_id);
		return $this->db->delete($this->tbl);
	}
	public function getRand(){
		$sql = 'SELECT * FROM '.$this->tbl.' ORDER BY RAND() LIMIT 0,1';
		return $this->db->query($sql);
	}

	public function getBySlug($slug){
		$d = $this->db->select()->from($this->tbl)->where("slug",$slug)->get_first();
		if(isset($d->id)) return $d;
		return new stdClass();
	}
	public function get($status="publish"){
		return $this->db->select()->from($this->tbl,$this->tbl_alias)->where("status",$status)->get();
	}
	public function count($status="publish"){
		$d = $this->db->select_as("COUNT(*)","total",1)->from($this->tbl,$this->tbl_alias)->where("status",$status)->get();
		if(isset($d[0]->total)) return $d[0]->total;
		return $d[0]->total;
	}
	public function getLatest($jml=3,$status="publish"){
		$this->db->select()->from($this->tbl,$this->tbl_alias)->where('status',$status)->order_by("id","DESC")->limit(0,$jml);
		return $this->db->get("object",0);
	}
	public function checkSlug($slug){
		$this->db->select_as("COUNT(*)","total",1)->from($this->tbl)->where("slug",$slug)->get();
		if(isset($d[0]->total)) return $d[0]->total;
		return 0;
	}
}
