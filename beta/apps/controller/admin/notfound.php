<?php
class notfound extends SENE_Controller{
	
	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
	}
	
	public function index(){
		$data = 'notfound';
		echo $data;
    //$this->__out(array("notfound"));
	}
  
	private function __out($data){
		$this->SENE_JSON_Engine->out($data);
	}
  
}
?>
