<?php
class Home extends SENE_Controller{
    var $status = 0;

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
	}

	public function index(){
		$sess = $this->getKey();
    $data = array();
    $data['sess'] = $sess;
		if(isset($sess['admin'])){
      $this->view("backend/__header",$data);
			$this->view("backend/__nav",$data);
			$this->view("backend/home/home",$data);
			$this->view("backend/__bottom",$data);
			$this->view("backend/__footer",$data);
		}else{
        //buathalaman login & signup popup
        //jadi ini untuk sementara dulu
        redir(base_url("admin/login"));
		}
	}

	private function __out($data){
	   $res = array('status'=>$this->status,'result' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
