<?php
	class Home extends JI_Controller{

	public function __construct(){
    parent::__construct();
		$this->setTheme('admin');
		$this->current_parent = 'dashboard';
		$this->current_page = 'dashboard';
	}
	public function index(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		//$data['order_konfirmasi_sudah_count'] = $this->order->countByUtypeIn(array('order_konfirmasi_sudah'));
		//$data['order_proses_count'] = $this->order->countByUtypeIn(array('order_cekstok','order_pembelian','order_store','order_qc','order_packing','order_kirim'));

		//$this->putJsFooter('//maps.googleapis.com/maps/api/js?key=AIzaSyDOGk8LjwATqbz_ceIFz9Lu3H6bZrg19o8',1);
		$this->putJsFooter($this->skins->admin.'js/helpers/gmaps.min',0);
		$this->putJsFooter($this->skins->admin.'js/pages/index');

		$this->putThemeContent("home/learn",$data);
		$this->putJsContent("home/learn_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render(0);
	}
	public function sample(){
		$data = $this->__init();
		if(!$this->admin_login){
			redir(base_url_admin('login'));
			die();
		}
		$this->putThemeContent("home/sample",$data);
		//$this->putJsContent("home/dashboard_bottom",$data);
		$this->loadLayout('col-2-left',$data);
		$this->render(1);
	}
	public function test(){
		header('content-type: application/json');
		echo json_encode($_SERVER);
		
	}
}
