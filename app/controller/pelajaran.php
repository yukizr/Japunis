<?php
class Pelajaran extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('front');
		$this->load('front/d_learnpelajaran_model','pelajaran');
		$this->load('front/e_learnquiz_model','quiz');
		$this->load('front/e_learnhasil_model','hasil');
	}
	private function __redirCF(){
		$cf = 'https';
		if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) $cf = $_SERVER['HTTP_X_FORWARDED_PROTO'];
		if($cf == 'http' ){
    	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    	header('HTTP/1.1 301 Moved Permanently');
    	header('Location: ' . $redirect);
    	exit();
		}
	}
	public function index(){
		$data = $this->__init();
		if($this->user_login){
			
		}else{
			
		}
		$data['pelajarans'] = $this->pelajaran->getAll();
		
		//$this->putJsFooter((base_url('skin/front/js/foundation/foundation.equalizer')));
		
		$this->putThemeContent("pelajaran/home",$data);
		//$this->putJsContent('pelajaran/home_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function detail($id){
		$id = (int) $id;
		$data = $this->__init();
		
		//$this->debug($data);
		//die();
		
		// if(!$this->user_login){
		// 	redir(base_url('login'));
		// 	die();
		// }
		// if(empty($id)){
		// 	redir(base_url('pelajaran'));
		// 	die();
		// }
		$data['pelajaran'] = $this->pelajaran->getById($id);
		
		$this->putThemeContent("pelajaran/detail",$data);
		//$this->putJsContent('pelajaran/detail_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function quiz($pelajaran_id=""){
		$pelajaran_id = (int) $pelajaran_id;
		
		$data = $this->__init();
		//$this->debug($data);
		//die();
		if(!$this->user_login){
			redir(base_url('login/'));
			die();
		}
		if($pelajaran_id<=0){
			redir(base_url('pelajaran'));
			die();
		}
		$data['pelajaran_id'] = $pelajaran_id;
		$data['quizs'] = $this->quiz->getByPelajaranId($pelajaran_id);
		if(!isset($data['quizs'][0])){
			redir(base_url('pelajaran'));
			die();
		}
		
		
		$this->putThemeContent("pelajaran/quiz",$data);
		$this->putJsContent('pelajaran/quiz_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function quiz_selesai($pelajaran_id=""){
		$pelajaran_id = (int) $pelajaran_id;
		if(empty($pelajaran_id)){
			$pelajaran_id = (int) $this->input->post('pelajaran_id');
		}
		
		$data = $this->__init();
		if(!$this->user_login){
			redir(base_url('login/'));
			die();
		}
		
		if(empty($pelajaran_id)){
			redir(base_url('pelajaran/'));
			die();
		}
		
		if(empty($pelajaran_id)){
			redir(base_url('pelajaran'));
			die();
		}
		$data['pelajaran_id'] = $pelajaran_id;
		
		$data['hasil'] = $this->hasil->getByPelajaranAndUserId($data['sess']->user->c_learnuser_id,$pelajaran_id,1);
		
		
		$this->putThemeContent("pelajaran/selesai",$data);
		$this->putJsContent('pelajaran/selesai_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
}
