<?php
abstract class SENE_Controller{
  protected static $__instance;
	var $input;
	var $db;
	protected function load($item,$type="model"){
		if($type=="model"){
			if(file_exists(SENEMODEL.$item.'.php')){
				include SENEMODEL.$item.'.php';
				$this->$item = new $item();
			}else{
				die('could not find '.$item.' model on '.SENEMODEL);
			}
		}elseif($type=="lib"){
			if(file_exists(SENELIB.$item.'.php')){
				require_once SENELIB.$item.'.php';
				$this->$item = new $item();
			}else{
				die('could not find '.$item.' library on '.SENELIB);
			}
		}else{
			if(file_exists(SENELIB.$item.'.php')){
				require_once SENELIB.$item.'.php';
			}else{
				die('could not find '.$item.' library on '.SENELIB);
			}
		}
	}
	function __construct() {
		$this->input  = new SENE_Input();
    self::$__instance = $this;
	}
  public static function getInstance(){
    return self::$_instance;
  }
	public abstract function index();
	
	protected function wrapper($data){
		return array("result"=>$data);
	}
	protected function data_wrapper($data){
		return array("data"=>$data);
	}
	protected function xml_out($data){
		$xml_engine = new XML_Engine($data);
		$xml_engine->parse();
	}
	protected function json_out($data){
		$json_engine = new JSON_Engine($data);
		$json_engine->parse();
	}
	protected function view($data,$vd=array()){
		if(file_exists(SENEVIEW.$data.".php")){
			$keytemp=md5(date("h:i:s"));
			$_SESSION[$keytemp] = $vd;
			//print_r($_SESSION);
			extract($_SESSION[$keytemp]);
			unset($_SESSION[$keytemp]);
			require_once(SENEVIEW.$data.".php");
		}else{
			die("unable to load view");
		}
	}
	protected function lib($data,$type="lib"){
		if($type=='lib'){
			if(file_exists(strtolower(SENELIB.$data.".php"))){
				require_once(strtolower(SENELIB.$data.".php"));
				$method = new $data();
				//$this->$data=$data;
				$this->{$data} = $method;
			}else{
				die("unable to load library on ".strtolower(SENELIB.$data.".php"));
			}
		}else{
			if(file_exists(strtolower(SENELIB.$data.".php"))){
				require_once(strtolower(SENELIB.$data.".php"));
			}else die("unable to load library on ".strtolower(SENELIB.$data.".php"));
		}
	}
	public function setKey($arr){
		$_SESSION[keyAdm()]=$arr;
	}
	public function getKey(){
		if(isset($_SESSION[keyAdm()])){
			return $_SESSION[keyAdm()];
		}else{
			return 0;
		}
	}
	public function delKey(){
		unset($_SESSION[keyAdm()]);
		session_destroy();
	}
	public function debug($arr){
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}
}
class SENE_Loader{
	public function model($item){
		require_once(MODEL_PATH.$item.'.php');
			return new $item();
	}
}
class SENE_Input{
	public function post($var){
		if(isset($_POST[$var])){
			return $_POST[$var];
		}else{
			return 0;
		}
	}
	public function get($var){
		if(isset($_GET[$var])){
			return $_GET[$var];
		}else{
			return 0;
		}
	}
	public function file($var){
		if(isset($_FILES[$var])){
			return $_FILES[$var];
		}else{
			return 0;
		}
	}
	public function debug(){
		return array("post_param"=>$_POST,"get_param"=>$_GET,"file_param"=>$_FILES);
	}
}

?>
