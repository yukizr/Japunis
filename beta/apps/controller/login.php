<?php
class Login extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
    $this->load("m_pengguna");
	}
  public function index(){
		$sess = $this->getKey();
    $data = array();
		$data['sess'] = $sess;
    if (isset($sess['user'])) {
      redir(base_url(""));
    } else {
      if ($this->input->post("submit")) {
        $email = $this->input->post("email");
    		$password = $this->input->post("password");
    		$res = $this->m_pengguna->auth($email,$password);
    		if(count($res)==1){
    			redir(base_url("home"));
          $sess = array();
          $sess['user'] = $res[0];
    			$this->setKey($sess);
    		}else{
    			$data['warn'] = 'Email atau Password salah';
    			$this->view("frontend/__header",$data);
    			$this->view("frontend/__nav",$data);
    			$this->view("frontend/login/login",$data);
    			$this->view("frontend/__bottom",$data);
    			$this->view("frontend/__footer",$data);
    		}
      } else {
        $this->view("frontend/__header",$data);
        $this->view("frontend/__nav",$data);
        $this->view("frontend/login/login",$data);
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
