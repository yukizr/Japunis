<?php
class SENE_JSON_Engine{
	public function out($data,$allowed="*"){
		header("Access-Control-Allow-Origin: ".$allowed);
		header("Content-Type: application/json");
		echo json_encode($data);
	}
}