<?php
class SENE_JSON_Engine{
	private $data;
	public function SENE_JSON_Engine(){
	}
	public function out($data){
		$this->data = $data;
		header("Content-Type: application/json");
		echo json_encode($this->data);
	}
}