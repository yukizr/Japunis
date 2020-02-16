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
      <!-- Right Nav Section -->
      <ul class="right">
				<?php if(isset($sess['user'])) { ?>
        <!-- <li class="divider hide-for-small"></li> -->
        <!-- <li class="has-dropdown not-click"> -->
          <!-- <ul class="dropdown"> -->
            <!-- <li class="divider hide-for-small"></li> -->
            <li><a href="<?php echo base_url("home"); ?>" class="ttfos"><i class="fi-home"></i> Beranda</a></li>
            <li class=""><a href="#"><i class="fi-torso"></i> Profile</a></li>
            <!-- <li class="divider hide-for-small"></li> -->
            <!-- <li class=""><a href="#">Kuis</a></li> -->
            <li><a href="<?php echo base_url("logout"); ?>" class="ttfos"><i class="fi-power"></i> Keluar</a></li>
          <!-- </ul> -->
        </li>
				<?php }else{ ?>
        <li><a href="<?php echo base_url("home"); ?>" class="ttfos">Beranda</a></li>
				<li><a href="<?php echo base_url("login"); ?>" class="ttfos">Masuk</a></li>
				<li><a href="<?php echo base_url("signup"); ?>" class="ttfos">Daftar</a></li>
				<?php } ?>
      </ul>
    </section>
  </nav>
</div>

<!--//start of container//-->
<div class="container" style="padding-top:2.9em">
