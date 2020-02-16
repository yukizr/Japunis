<?php
class A_Modules_Model extends SENE_Model{
	var $tbl = 'a_modules';
	var $tbl_alias = 'bmod';
	public function __construct(){
		parent::__construct();
	}    
  public function getAll(){
    $sql="SELECT * FROM `$this->tbl` WHERE `is_visible` = 1 ORDER BY priority ASC, `has_submenu` ASC";
    return $this->select($sql);
  }
  public function getAllParent(){
    $sql="SELECT * FROM `$this->tbl` WHERE `is_visible` = 1 AND `children_identifier` IS NULL ORDER BY priority ASC, `has_submenu` ASC";
		//die($sql);
    return $this->db->query($sql);
  }
  public function getChild($children_identifier){
    $sql="SELECT * FROM `$this->tbl` WHERE `is_visible` = 1 AND `children_identifier` LIKE ".$this->db->esc($children_identifier)." ORDER BY priority ASC, `has_submenu` ASC";
    return $this->select($sql);
  }
	public function getAllVisible(){
		//return $this->db->from($this->tbl)->where("is_visible",1)->order_by("priority","asc")->get();
		return $this->db->from($this->tbl)->order_by("priority","asc")->get();
	}
	public function getAllVisibleParent(){
		return $this->db->from($this->tbl)->order_by("priority","asc")->where_as("children_identifier","IS NULL")->get("object",0);
	}
	public function getIdentifierAll(){
		//return $this->db->from($this->tbl)->where("is_visible",1)->order_by("priority","asc")->get();
		return $this->db->select("identifier")->from($this->tbl)->order_by("priority","asc")->get();
	}
	public function getParent($identifier){
		$d = $this->db->select_as("COALESCE(children_identifier,'')","children_identifier",1)->from($this->tbl)->where("identifier",$identifier)->order_by("priority","asc")->get_first();
		if(isset($d[0]->children_identifier)) return $d[0]->children_identifier;
		return "";
	}
}