<?php
class Quiz extends JI_Controller{

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
		$data['quizs'] = $this->quiz->getByPelajaranId($id);
		
		$this->putThemeContent("abjad/home",$data);
		//$this->putJsContent('pelajaran/home_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function detail($id){
		$id = (int) $id;
		$data = $this->__init();
		if($this->user_login){
			
		}else{
			
		}
		if($id<=0){
			redir(base_url('pelajaran'));
			die();
		}
		$data['elqm'] = $this->pelajaran->getById($id);
		
		
		$this->putThemeContent("pelajaran/detail",$data);
		//$this->putJsContent('pelajaran/detail_bottom',$data);
		$this->loadLayout('col-1',$data);
		$this->render();
	}
	public function proses($d_learnpelajaran_id=""){
		$d_learnpelajaran_id = (int) $d_learnpelajaran_id;
		if(empty($id)){
			$d_learnpelajaran_id = (int) $this->input->post('d_learnpelajaran_id');
		}
		$s = $this->__init();
		$data = array();
		if(!$this->user_login){
			$this->status = 400;
			$this->message = 'Harus login';
			header("HTTP/1.0 400 Harus login");
			$this->__json_out($data);
			die();
		}
		$fd = $_POST;
		if(!empty($d_learnpelajaran_id)){
			$soals = $this->quiz->getByPelajaranId($d_learnpelajaran_id);
			$jawabans = array();
			$benar = 0;
			$salah = 0;
			$jsoal = 0;
			if(isset($soals[0]->id)){
				$pelajaran = $soals[0]->nama;
				foreach($soals as $soal){
					$sid = $soal->id;
					if(isset($fd['soal'][$sid])){
						if($fd['soal'][$sid] == $soal->jawaban){
							$benar++;
						}else{
							$salah++;
						}
					}else{
						$salah++;
					}
					$jsoal++;
				}
				$data['jawaban_benar'] = $benar;
				$data['jawaban_salah'] = $salah;
				
				$di = array();
				$di['c_learnuser_id'] = $s['sess']->user->c_learnuser_id;
				$di['d_learnpelajaran_id'] = $d_learnpelajaran_id;
				$di['pelajaran'] = $pelajaran;
				$di['cdate'] = 'NOW()';
				$di['jawaban_benar'] = $benar;
				$di['jawaban_salah'] = $salah;
				$di['nilai_angka'] = round(($benar/$jsoal)*100,2);
				$di['nilai_huruf'] = 'A';
				$di['is_lulus'] = 1;
				
				
				$res = $this->hasil->set($di);
				if($res){
					$this->status = 100;
					$this->message = 'Berhasil';
				}else{
					$this->status = 202;
					$this->message = 'Tidak dapat menyimpan hasil quiz ke database. Skor kamu: '.$di['nilai_angka'];
				}
				
				
			}else{
				$this->status = 400;
				$this->message = 'Tidak dapat memproses jawaban, coba beberapa saat lagi';
			}
		}else{
			$this->status = 550;
			$this->message = 'Tidak dapat mengambil kode pelajaran';
		}
		$this->__json_out($data);
	}
}
