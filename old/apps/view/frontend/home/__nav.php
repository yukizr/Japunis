<div class="contain-to-grid">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
				<h1 class="h1titletopbar">Fujitsu's Guide to Japanese</h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <ul class="right">
				<?php if(isset($logged)) { ?>
				<li><a href="<?php echo base_url(); ?>" class="ttfos"><i class="fi-home"></i> Home</a></li>
				<li><a href="<?php echo base_url(); ?>" class="ttfos"><i class="fi-power"></i> Logout</a></li>
				<?php }else{ ?>
				<li><a href="<?php echo base_url("login"); ?>" class="ttfos">Login</a></li>
				<?php } ?>

      </ul>

      <!-- Left Nav Section -->

    </section>
  </nav>
</div>

<!--//start of container//-->
<div class="container">
