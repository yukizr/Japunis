<?php
	Class JI_Controller extends SENE_Controller {
		var $site_title = 'Japunis - Belajar Bahasa Jepang';
		var $site_description = 'Belajar bahasa Jepang di mana saja dengan mudah dan gratis';
		var $site_suffix = ' - Fujitsu Guide Japanese';
		var $site_keyword = 'bahasa Jepang, bahasa, belajar, pelajaran, online, gratis, mudah, audio, tata bahasa, Fujitsu guide japanese, guide japanese, Fujitsu';
		var $page_current = 'beranda';
		var $menu_current = 'beranda';
		var $site_author = 'Yuki Zain Rohman';
		var $user_login = 0;
		var $admin_login = 0;
		var $status = 404;
		var $message = 'Error, not found!';
		var $breadcrumbs;
		var $skins;

		var $cms_blog = 'media/blog';
		var $user_img = 'media/user/';
		var $user_toko = 'media/user/store/';
		var $produk_foto = 'media/produk/';
		var $produk_thumb = 'media/produk/thumb/';
		var $order_konfirmasi = 'media/order/konfirmasi/';
		var $order_qc = 'media/order/qc/';
		var $order_packing = 'media/order/packing/';
		var $order_resi = 'media/order/resi/';
		var $apikeys = 'kmz12399x,kmzwa8878,clst0100x';

		public function apikey_check($apikey){
			if(strlen($apikey)>4){
			$apikeys = explode(',',$this->apikeys);
				if(in_array($apikey,$apikeys)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return false;
			}
		}


		public function __json_out($dt){
			$this->lib('sene_json_engine','sene_json');
			$data = array();
			$data["status"]  = (int) $this->status;
			$data["message"] = $this->message;
			$data["result"]  = $dt;
			$this->sene_json->out($data);
			die();
		}
		public function __breadCrumb($name="home",$url="#",$title=""){
			$bc = new stdClass();
			$bc->name = $name;
			$bc->url = $url;
			$bc->title = $title;
			$this->breadcrumbs[] = $bc;
		}
		private function __menuBuilder($menus){
			$k = array();
			$ks = array();
			$kss = array();
			foreach($menus as $m){
				if($m->utype == "kategori"){
					$k[$m->id] = $m;
					$k[$m->id]->childs = array();
				}else if($m->utype=="kategori_sub"){
					$ks[$m->id] = $m;
					$ks[$m->id]->childs = array();
				}else{
					$kss[$m->id] = $m;
				}
			}
			foreach($kss as $key=>$val){
				$parent_id = $val->b_kategori_id;
				if(isset($ks[$parent_id])){
					$ks[$parent_id]->childs[] = $val;
				}
			}
			foreach($ks as $key=>$val){
				$parent_id = $val->b_kategori_id;
				if(isset($k[$parent_id])){
					$k[$parent_id]->childs[] = $val;
				}
			}
			return $k;
		}

		public function __construct(){
			parent::__construct();
			$this->breadcrumbs = array();
			$this->skins = new stdClass();
			$this->skins->front = base_url('skin/front/');
			$this->skins->homepage = base_url('skin/homepage/');
			$this->skins->admin = base_url('skin/admin/');
		}
		public function __init(){
			//$this->load('front/b_kategori_model','bk');
			$data = array();
			$sess = $this->getKey();
			if(!is_object($sess)) $sess = new stdClass();
			if(!isset($sess->user)) $sess->user = new stdClass();
			if(isset($sess->user->id)) $this->user_login = 1;

			if(!isset($sess->admin)) $sess->admin = new stdClass();
			if(isset($sess->admin->id)) $this->admin_login = 1;

			$data['sess'] = $sess;
			$data['site_title'] = $this->site_title;
			$data['site_description'] = $this->site_description;
			$data['page_current'] = $this->page_current;
			$data['menu_current'] = $this->menu_current;
			$data['site_author'] = $this->site_author;
			$data['site_keyword'] = $this->site_keyword;
			$data['user_login'] = $this->user_login;
			$data['admin_login'] = $this->admin_login;
			$data['skins'] = $this->skins;

			//$data['produk_kategori'] = $this->__menuBuilder($this->bk->getKategori());
			$data['produk_kategori'] = array();

			$this->setTitle($this->site_title);
			$this->setDescription($this->description);
			$this->setRobots('INDEX,FOLLOW');
			$this->setAuthor($this->site_author);
			$this->setKeyword($this->site_keyword);
			$this->setIcon(base_url('favicon.png'));
			$this->setShortcutIcon(base_url('favicon.png'));

			return $data;
		}
		public function __jsonDataTable($data,$count,$another=array()){
			$this->lib('sene_json_engine','sene_json');
			$rdata = array();
			if(!is_array($data)) $data = array();
			$dt1 = array();
			$dt2 = array();
			if(!is_array($data)){
				trigger_error('jsonDataTable first params need array!');
				die();
			}
			foreach($data as $dat){
				$dt2 = array();
				if(is_int($dat)) trigger_error('[ERROR: '.$dat.'] Data table not well performed because a query execution error!');
				foreach($dat as $dt){
					$dt2[] = $dt;
				}
				$dt1[] = $dt2;
			}

			if(is_array($another)) $rdata = $another;
			$rdata['data'] = $dt1;
			$rdata['recordsFiltered'] = $count;
			$rdata['recordsTotal'] = $count;
			$rdata['status'] = (int) $this->status;
			$rdata['message'] = $this->message;
			$this->sene_json->out($rdata);
			die();
		}

		public function __bankHtml($utype){
			$b = new stdClass();
			$b->nama = $utype;
			$b->norek = '';
			$b->an = '';
			switch($utype){
				case 'transfer_bca_1':
					$b->nama = 'BCA';
					$b->norek = '7750344563';
					$b->an = 'Daeng Rosanda';
					break;
				case 'transfer_mandiri_1':
					$b->nama = 'Mandiri';
					$b->norek = '1300011142505';
					$b->an = 'Daeng Rosanda';
					break;
				case 'transfer_bni_1':
					$b->nama = 'BNI';
					$b->norek = '0152948767';
					$b->an = 'Daeng Rosanda';
					break;
				case 'transfer_permata_1':
					$b->nama = 'BCA';
					$b->norek = '7750344563';
					$b->an = 'Daeng Rosanda';
					break;
				default:
					$b->nama = '-';
			}
			return $b;
		}
		public function __dateIndonesia($datetime,$utype='hari_tanggal'){
			$stt = strtotime($datetime);
			$bulan_ke = date('n',$stt);
			$bulan = 'Desember';
			switch ($bulan_ke) {
				case '1':
					$bulan = 'Januari';
					break;
				case '2':
					$bulan = 'Februari';
					break;
				case '3':
					$bulan = 'Maret';
					break;
				case '4':
					$bulan = 'April';
					break;
				case '5':
					$bulan = 'Mei';
					break;
				case '6':
					$bulan = 'Juni';
					break;
				case '7':
					$bulan = 'Juli';
					break;
				case '8':
					$bulan = 'Agustus';
					break;
				case '9':
					$bulan = 'September';
					break;
				case '10':
					$bulan = 'Oktober';
					break;
				case '11':
					$bulan = 'November';
					break;
				default:
					$bulan = 'Desember';
			}
			$hari_ke = date('N',$stt);
			$hari = 'Minggu';
			switch ($hari_ke) {
				case '1':
					$hari = 'Senin';
					break;
				case '2':
					$hari = 'Selasa';
					break;
				case '3':
					$hari = 'Rabu';
					break;
				case '4':
					$hari = 'Kamis';
					break;
				case '5':
					$hari = 'Jumat';
					break;
				case '6':
					$hari = 'Sabtu';
					break;
				default:
					$hari = 'Minggu';
			}
			$utype == strtolower($utype);
			if($utype=="hari") return $hari;
			if($utype=="jam") return date('H:i',$stt).' WIB';
			if($utype=="tanggal") return ''.date('d',$stt).' '.$bulan.' '.date('Y',$stt);
			if($utype=="tanggal_jam") return ''.date('d',$stt).' '.$bulan.' '.date('Y H:i',$stt).' WIB';
			if($utype=="hari_tanggal") return $hari.', '.date('d',$stt).' '.$bulan.' '.date('Y',$stt);
			if($utype=="hari_tanggal_jam") return $hari.', '.date('d',$stt).' '.$bulan.' '.date('Y H:i',$stt).' WIB';
		}
		public function __validateDate($date,$format="Y-m-d H:i:s"){
			$d = DateTime::createFromFormat($format, $date);
    	return $d && $d->format($format) == $date;
		}

		public function __getOrderStatusList(){
			return array(
				'order_konfirmasi'=>'Belum Konfirmasi',
				'order_konfirmasi_sudah'=>'Telah Konfirmasi',
				'order_cekstok'=>'Di cek stok',
				'order_pembelian'=>'Dibeli',
				'order_store'=>'Digudang',
				'order_qc'=>'di Q.C.',
				'order_packing'=>'Dipacking',
				'order_kirim'=>'Dikirim',
				'order_selesai'=>'Selesai',
				'order_batal'=>'Dibatalkan',
				'order_pending'=>'Di Tahan',
				'order_retur'=>'Retur'
			);
		}
		public function __orderStatus($order_utype){
			switch($order_utype){
				case "order_konfirmasi_sudah":
					$os = 'Verifikasi pembayaran';
					break;
				case "order_cekstok":
					$os = 'Proses (Cekstok)';
					break;
				case "order_pembelian":
					$os = 'Proses (Pembelian)';
					break;
				case "order_store":
					$os = 'Proses (Gudang)';
					break;
				case "order_qc":
					$os = 'Proses (QC)';
					break;
				case "order_packing":
					$os = 'Proses (Packing)';
					break;
				case "order_kirim":
					$os = 'Dikirim';
					break;
				case "order_selesai":
					$os = 'Terkirim';
					break;
				case "order_batal":
					$os = 'Batalkan';
					break;
				case "order_pending":
					$os = 'Pending';
					break;
				case "order_konfirmasi":
					$os = 'Belum konfirmasi';
					break;
				default:
					$os = 'Tidak diketahui, hub admin!';
			}
			return $os;
		}


		public function __orderPembayaran($order_pembayaran){
			switch($order_pembayaran){
				case "transfer_mandiri_1":
					$os = 'TF Mandiri 1';
					break;
				case "transfer_bni_1":
					$os = 'TF BNI 1';
					break;
				case "transfer_bca_1":
					$os = 'TF BCA 1';
					break;
				case "transfer_permata_1":
					$os = 'TF Permata 1';
					break;
				case "transfer_bri_1":
					$os = 'TF BRI 1';
					break;
				case "cash":
					$os = 'Tunai';
					break;
				default:
					$os = 'Tidak diketahui, hub admin!';
			}
			return $os;
		}

		public function __orderStatusLabel($order_utype){
			switch($order_utype){
				case "order_konfirmasi":
					$os = '<label class="label label-warning">Belum konfirmasi</label>';
					break;
				case "order_konfirmasi_sudah":
					$os = '<label class="label label-info">Verifikasi pembayaran</label>';
					break;
				case "order_cekstok":
					$os = '<label class="label label-info">Proses (Cekstok)</label>';
					break;
				case "order_pembelian":
					$os = '<label class="label label-info">Proses (Pembelian)</label>';
					break;
				case "order_store":
					$os = '<label class="label label-info">Proses (Gudang)</label>';
					break;
				case "order_qc":
					$os = '<label class="label label-info">Proses (QC)</label>';
					break;
				case "order_packing":
					$os = '<label class="label label-info">Proses (Packing)</label>';
					break;
				case "order_kirim":
					$os = '<label class="label label-info">Dikirim</label>';
					break;
				case "order_selesai":
					$os = '<label class="label label-info">Terkirim</label>';
					break;
				case "order_batal":
					$os = '<label class="label label-secondary">Dibatalkan</label>';
					break;
				case "order_pending":
					$os = '<label class="label label-info">Pending</label>';
					break;
				default:
					$os = '<label class="label label-info">Tidak diketahui, hub admin!</label></label>';
			}
			return $os;
		}
    public function __format($str,$format="text"){
      $format = strtolower($format);
      if($format == 'richtext'){
        $allowed_tags = '<div><h1><h2><h3><h4><u><hr><p><br><b><i><ul><ol><li><em><strong><quote><blockquote><p><time><sup><sub><table><tr><td><th><thead><tbody><tfoot>';
        return strip_tags($str,$allowed_tags);
      }else if($format == 'text'){
        return filter_var(trim($str), FILTER_SANITIZE_STRING);
      }else{
        return $str;
      }
    }
    public function __e($str,$format="text"){
      echo $this->__format($str,$format);
    }

		//karena ini wajib jadi method ini harus ada... :P
		public function index(){}

}
