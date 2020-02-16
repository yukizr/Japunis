<?php
class Home extends SENE_Controller{
    var $status = 0;

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
		$this->lib("SENE_Soap","inc");
	}

	public function index(){
		$sess = $this->getKey();
    // if(!is_array($sess)){
		// 	$sess = array();
		// }
    $data = array();
    $data['sess'] = $sess;
		if(isset($sess['user']->id)){
      $this->view("frontend/__header",$data);
			$this->view("frontend/__nav",$data);
			$this->view("frontend/home/home",$data);
			$this->view("frontend/__bottom",$data);
			$this->view("frontend/__footer",$data);
		}else{
        //buathalaman login & signup popup
        //jadi ini untuk sementara dulu
        // redir(base_url("admin/login"));
        $this->view("frontend/__header",$data);
  			$this->view("frontend/__nav",$data);
  			$this->view("frontend/home/home",$data);
  			$this->view("frontend/__bottom",$data);
  			$this->view("frontend/__footer",$data);
		}
	}

	private function __out($data){
	   $res = array('status'=>$this->status,'result' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
