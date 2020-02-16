<?php
class Confirmation extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
		parent::__construct();
			$this->lib("SENE_JSON_Engine","lib");

		$this->load("m_confirmation");

	}

	public function index(){
		die();
		$sess = $this->getKey();
	    $data = array();
	    $data['res'] = "";
			$data['sess'] = $sess;
	    if (isset($sess['user'])) {
	      redir(base_url(""));
	      die();
	    } else {

	      if(!empty($_REQUEST)){
	        if(!empty($_REQUEST['ks'])){
	          $code = $_REQUEST['ks'];
	          var_dump($code);
	          die();
	          $query = $this->m_confirmation->has_confirmed($code);
	          var_dump($query);
	          die();
	          if($query == 1){
	            die('Success');
	          }else{
	            die('Failed');
	          }
	        }else{
	          die('Invalid URL / Verification Code Not Found');
	        }
	      }else{
	        die('Invalid URL');
	      }

	    }
	}

	public function get_code(){
	    $sess = $this->getKey();
	    $data = array();
	    $data['res'] = "";
		  $data['sess'] = $sess;
	      if (isset($sess['user'])) {
	      if(!empty($_REQUEST)){
	        if(!empty($_REQUEST['ks'])){
	          $code = $_REQUEST['ks'];
	          $query = $this->m_confirmation->has_confirmed($code);
	          
	          if($query == 1){
	            // die('Success');
	            $data["res"] = "berhasil";
                $this->view("frontend/__header",$data);
                $this->view("frontend/__nav",$data);
                $this->view("frontend/confirmation/get_code",$data);
                $this->view("frontend/__bottom",$data);
                $this->view("frontend/__footer",$data);
	          }else{
	            // die('Failed');
	            $data["res"] = "gagal";
                $this->view("frontend/__header",$data);
                $this->view("frontend/__nav",$data); 
                $this->view("frontend/confirmation/get_code",$data);
                $this->view("frontend/__bottom",$data);
                $this->view("frontend/__footer",$data);
	          }
	        }else{
	          	// die('Invalid URL / Verification Code Not Found');
	          	$data["res"] = "invalid";
            	$this->view("frontend/__header",$data);
	            $this->view("frontend/__nav",$data);
	            $this->view("frontend/confirmation/get_code",$data);
	            $this->view("frontend/__bottom",$data);
	            $this->view("frontend/__footer",$data);
	        }
	      }else{
	        	// die('Invalid URL');
	        	$data["res"] = "invalid";
            	$this->view("frontend/__header",$data);
	            $this->view("frontend/__nav",$data);
	            $this->view("frontend/confirmation/get_code",$data);
	            $this->view("frontend/__bottom",$data);
	            $this->view("frontend/__footer",$data);
	      }
	    } else {

	      if(!empty($_REQUEST)){
	        if(!empty($_REQUEST['ks'])){
	          $code = $_REQUEST['ks'];
	          $query = $this->m_confirmation->has_confirmed($code);
	          
	          if($query == 1){
	            // die('Success');
	            $data["res"] = "berhasil";
                $this->view("frontend/__header",$data);
                $this->view("frontend/__nav",$data);
                $this->view("frontend/confirmation/get_code",$data);
                $this->view("frontend/__bottom",$data);
                $this->view("frontend/__footer",$data);
	          }else{
	            // die('Failed');
	            $data["res"] = "gagal";
                $this->view("frontend/__header",$data);
                $this->view("frontend/__nav",$data); 
                $this->view("frontend/confirmation/get_code",$data);
                $this->view("frontend/__bottom",$data);
                $this->view("frontend/__footer",$data);
	          }
	        }else{
	          	// die('Invalid URL / Verification Code Not Found');
	          	$data["res"] = "invalid";
            	$this->view("frontend/__header",$data);
	            $this->view("frontend/__nav",$data);
	            $this->view("frontend/confirmation/get_code",$data);
	            $this->view("frontend/__bottom",$data);
	            $this->view("frontend/__footer",$data);
	        }
	      }else{
	        	// die('Invalid URL');
	        	$data["res"] = "invalid";
            	$this->view("frontend/__header",$data);
	            $this->view("frontend/__nav",$data);
	            $this->view("frontend/confirmation/get_code",$data);
	            $this->view("frontend/__bottom",$data);
	            $this->view("frontend/__footer",$data);
	      }

	    }
	}

  
	private function __out($data){
	   $res = array('status'=>$this->status,'post' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
