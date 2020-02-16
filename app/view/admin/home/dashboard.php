<?php
	$admin_name = $sess->admin->username;
	if(isset($sess->admin->nama)) if(strlen($sess->admin->nama)>1) $admin_name = $sess->admin->nama;
?>
<div id="page-content">
	<!-- Dashboard Header -->
	<!-- For an image header add the class 'content-header-media' and an image as in the following example -->
	<div class="content-header content-header-media">
		<div class="header-section">
			<div class="row">
				<!-- Main Title (hidden on small devices for the statistics to fit) -->
				<div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
					<h1>
						Selamat Datang <strong><?php echo $admin_name; ?></strong>
						<br><small>Semoga hari ini berkah!</small>
					</h1>
				</div>
				<!-- END Main Title -->

				<!-- Top Stats -->
				<div class="col-md-8 col-lg-6">
					<div class="row text-center">

						<div class="col-xs-12 col-sm-6">
							<h2 class="animation-hatch">
								Rp <strong><?php echo number_format(16667778,0,',','.'); ?></strong><br>
								<small><i class="fa fa-thumbs-o-up"></i> Bulan ini</small>
							</h2>
						</div>

						<div class="col-xs-12 col-sm-6">
							<h2 class="animation-hatch">
								Rp <strong><?php echo number_format(87003601,0,',','.'); ?></strong><br>
								<small><i class="fa fa-thumbs-o-up"></i> Bulan lalu</small>
							</h2>
						</div>

					</div>
				</div>
				<!-- END Top Stats -->
			</div>
		</div>
		<!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
		<img src="<?php echo $this->skins->admin; ?>img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
	</div>
	<!-- END Dashboard Header -->

	<!-- Mini Top Stats Row -->
	<div class="row">
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
						<i class="fa fa-archive"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>Barang</strong>
						<small>Manajemen Barang</small>
						<!-- <strong><?php echo number_format($order_konfirmasi_sudah_count); ?></strong> -->
						<!-- <small>Telah Konfirmasi</small> -->
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
						<i class="fa fa-archive"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>Barang Baru</strong>
						<small>Tambah Barang</small>
						<!-- <strong><?php echo number_format($order_proses_count); ?></strong> Orderan<br>
						<small>Diproses</small> -->
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-blackberry animation-fadeIn">
						<i class="gi gi-wrench"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>Jasa </strong>
						<small>Manajemen jasa</small>
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-coral animation-fadeIn">
						<i class="fa fa-wrench"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>Jasa Baru</strong>
						<small>Tambah Jasa</small>
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
	</div>
	<!-- END Mini Top Stats Row -->

	<!-- Mini Top Stats Row -->
	<div class="row">
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-emerald animation-fadeIn">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>Pembelian</strong>
						<small>Manajemen Pembelian</small>
						<!-- <strong><?php echo number_format($order_konfirmasi_sudah_count); ?></strong> -->
						<!-- <small>Telah Konfirmasi</small> -->
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-fancy animation-fadeIn">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>Pembelian Baru</strong>
						<small>Tambah Pembelian</small>
						<!-- <strong><?php echo number_format($order_proses_count); ?></strong> Orderan<br>
						<small>Diproses</small> -->
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-fire animation-fadeIn">
						<i class="gi gi-money"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>Penjualan</strong>
						<small>Manajemen Penjualan</small>
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
		<div class="col-sm-6 col-lg-3">
			<!-- Widget -->
			<a href="#" class="widget widget-hover-effect1">
				<div class="widget-simple">
					<div class="widget-icon pull-left themed-background-flatie animation-fadeIn">
						<i class="fa fa-users"></i>
					</div>
					<h3 class="widget-content text-right animation-pullDown">
						<strong>User</strong>
						<small>Manajemen User</small>
					</h3>
				</div>
			</a>
			<!-- END Widget -->
		</div>
	</div>
	<!-- END Mini Top Stats Row -->
	<!-- Widgets Row -->

	<!-- END Widgets Row -->
</div>
