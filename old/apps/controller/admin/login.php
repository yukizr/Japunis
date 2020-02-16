<?php
class Login extends SENE_Controller{
    var $status = 'ok';

	public function __construct(){
    parent::__construct();
		$this->lib("SENE_JSON_Engine","lib");
    $this->load("m_admin");
	}
	public function index(){
		$sess = $this->getKey();
		$data = array();
		$data['sess'] = $sess;
    if(isset($sess['admin'])){
			redir(base_url("admin/"));
		}else{

      if($this->input->post("submit")){
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $res = $this->m_admin->auth($username,$password);
        if(count($res)==1){
          redir(base_url("admin/"));
					$sess = array();
					$sess['admin'] = $res[0];
					$this->setKey($sess);
        }else{
          $data['warn'] = 'Email atau Password salah';
          $this->view("backend/__header",$data);
          $this->view("backend/login/__nav",$data);
          $this->view("backend/login/login",$data);
          $this->view("backend/__bottom",$data);
          $this->view("backend/__footer",$data);
        }
      }else {
        $this->view("backend/__header",$data);
        $this->view("backend/login/__nav",$data);
        $this->view("backend/login/login",$data);
        $this->view("backend/__bottom",$data);
        $this->view("backend/__footer",$data);
      }

    }

	}

	private function __out($data){
	   $res = array('status'=>$this->status,'post' => $data);
	   $this->SENE_JSON_Engine->out($res);
	}

}
?>
