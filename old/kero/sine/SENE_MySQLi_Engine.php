<?php
class SENE_MySQLi_Engine{
	protected static $__instance;
	protected $__mysqli;
	protected $koneksi;
	private $fieldname = array();
	private $fieldvalue = array();
	
	function __construct(){
		$db = $GLOBALS['db'];
    //$port = ini_get('mysqli.default_port');
		
    //$this->koneksi=mysqli_connect($db['host'],$db['user'],$db['pass'],$db['name']);
    
    $this->__mysqli = new mysqli($db['host'],$db['user'],$db['pass'],$db['name'],$db['port']);
    if ($this->__mysqli->connect_errno) {
      die('Couldn\'t connect to database. Please, check your database configuration on '.SENECFG.'/database.php');
    }
    $this->__mysqli->set_charset('utf8');
    
    self::$__instance = $this;
	}
  public static function getInstance(){
    return self::$_instance;
  }
  public function autoCommit($var=1){
    $this->__mysqli->autocommit($var);
  }
  public function commit(){
    $this->__mysqli->commit();
  }
  public function rollback(){
    $this->__mysqli->rollback();
  }
	public function debug($sql){
		$this->fieldname[] = 'error';
		$this->fieldname[] = 'code';
		$this->fieldname[] = 'sql';
		$this->fieldvalue[] = $this->__mysqli->errno;
		$this->fieldvalue[] = $this->__mysqli->error;
		$this->fieldvalue[] = $sql;
	}
	public function exec($sql){
		$res = $this->__mysqli->query($sql);
		if($res){
			return 1;
		}else{
			$this->debug($sql);
			return 0;
		}
	}
	public function select($sql,$type="object"){
		$res = $this->__mysqli->query($sql);
		if($res){
			$dataz=array();
			if($type=="array"){
        while($data=$res->fetch_assoc()){
          array_push($dataz,$data);
        }
      }else{
        while($data=$res->fetch_object()){
          $dataz[] = $data;
        }
      }
      $res->free();
			return $dataz;
		}else{
			$this->debug($sql);
			return $this->fieldvalue;
		}
	}
	public function getStat(){
		return array("fieldname"=>$this->fieldname,"fieldvalue"=>$this->fieldvalue);
	}
	public function lastId(){
		return $this->__mysqli->insert_id;
	}
	public function esc($var){
		if(strtolower($var)=="null"){
			return "NULL";
		}else{
			return '"'.$this->__mysqli->real_escape_string($var).'"';
		}
	}
	public function __destruct(){
		$this->__mysqli->close();
	}
	public function getField(){
		return array("field"=>$this->fieldname,"value"=>fieldvalue);
	}
}
?>
