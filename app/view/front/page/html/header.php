<?php 
	if(isset($sess->user->id)){
		$nama = $sess->user->fnama;
		if(empty($nama)) $nama = $sess->user->email;
	}
?>
<header class="">
	<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
				<a href="<?php echo base_url(); ?>">
					<img style="height:40px;margin:2px;" src="<?php echo base_url(); ?>skin/front/image/logo.png" alt="Fujitsu Guide to Japanese" />
				</a>
			</li>
      <li class="toggle-topbar menu-icon"><a href="#"><i class="fa fa-bars fa-lg"></i></a></li>
		</ul>
    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
				<li><a href="<?php echo base_url(); ?>" class="ttfos"><i class="fa fa-home"></i> Beranda</a></li>
				<?php if(!isset($sess->user->id)){ ?>
				<li><a href="<?php echo base_url(); ?>login" class="ttfos"><i class="fa fa-user"></i> Masuk</a></li>
				<li><a href="<?php echo base_url(); ?>daftar" class="ttfos"><i class="fa fa-user-plus"></i> Daftar</a></li>
				<?php }else { ?>
				<!-- For Dropdown -->
				<!-- <li class="has-dropdown">
					<a href="#" class="ttfos"><i class="fa fa-user"></i> Profil : <?=$nama?></a>
					<ul class="dropdown">
						<li><a href="<?php echo base_url('profil/'); ?>" class="ttfos">Profil</a></li>
						<li><a href="<?php echo base_url(); ?>logout" class="ttfos"><i class="fa fa-power-off"></i> Keluar</a></li>
					</ul>
				</li> -->
				<li><a href="<?php echo base_url('profil/'); ?>" class="ttfos"><i class="fa fa-user"></i> Profil : <?=$nama?></a></li>
				<li><a href="<?php echo base_url('media/upload/2018/03/fujitsusguidetojapanese.zip'); ?>" target="_blank" class="ttfos"><i class="fa fa-book"></i> Download E-Book</a></li>
				<li><a href="<?php echo base_url(); ?>logout" class="ttfos"><i class="fa fa-power-off"></i> Keluar</a></li>
				
				<?php } ?>
		</ul>
	</section>
	</nav>
</header>