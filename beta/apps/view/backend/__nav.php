<div class="">
  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <?php $logo = "logo.png"; ?>
        <a href="<?php echo base_url("home"); ?>"><img style="height:40px;margin:2px;" src="<?php echo base_url("assets/img/").$logo ?>" alt="Fujitsu Guide to Japanese" /></a>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"></a></li>
    </ul>

    <section class="top-bar-section">
      <ul class="right">
				<?php if(isset($sess['admin'])) { ?>
				<li><a href="<?php echo base_url("admin/"); ?>" class="ttfos"><i class="fi-home"></i> Home</a></li>
				<!-- <li><a href="<?php echo base_url("kumpulkupon"); ?>" class="ttfos"><i class="fi-star"></i> Kumpul Kupon</a></li>
				<li class="has-dropdown">
					<a href="#" class="ttfos"><i class="fi-list"></i> Manage</a>
					<ul class="dropdown">
						<li><a href="<?php echo base_url("manage/warna"); ?>" class="ttfos"><i class=""></i> Warna</a></li>
						<li><a href="<?php echo base_url("manage/size"); ?>" class="ttfos"><i class=""></i> Size</a></li>
						<li><a href="<?php echo base_url("manage/grupjenis"); ?>" class="ttfos"><i class=""></i> Grup Jenis</a></li>
					</ul>
				</li>-->
				<li><a href="<?php echo base_url("admin/logout"); ?>" class="ttfos"><i class="fi-power"></i> Keluar</a></li>
				<?php }else{ ?>
				<li><a href="<?php echo base_url("login"); ?>" class="ttfos">Login</a></li>
				<?php } ?>

      </ul>

      <!-- Left Nav Section -->

    </section>
  </nav>
</div>

<!--//start of container//-->
<div class="container" style="padding-top:2.9em;">
