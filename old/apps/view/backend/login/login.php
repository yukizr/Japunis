<!--//contain row after container//-->
		<!--//container main //-->
    <div class="row">
    <div class="large-12 columns">
        <div class="medium-4 large-4 columns">
          &nbsp;
        </div>
				<div class="small-12 medium-4 large-4 columns" style="padding:3em 0 3em 0;">
					<ul class="pricing-table">
						<form action="<?php echo base_url("admin/login"); ?>" method="post">
						<li class="title"><h3 style="color:#fff;" class="ttfos"></h3></li>
						<?php if(!empty($warn)){ ?>
						<li class="description" style="background-color:#ef0000; color:#fff;"><?php echo $warn; ?></li>
						<?php } ?>
						<li class="bullet-item">
							<input type="text" name="username" placeholder="username" required="required" />
						</li>
						<li class="bullet-item">
							<input type="password" name="password" placeholder="password" required="required" />
						</li>
						<li class="cta-button">
							<input type="submit" name="submit" value="Masuk" class="button primary ttfos expand" />
							<a href="<?php echo base_url(""); ?>" class="button info ttfos expand">Beranda</a>
						</li>
						</form>
					</ul>
				</div>
        <div class="medium-4 large-4 columns">
          &nbsp;
        </div>
      </div>
  </div>
  <!-- <div class="row footer"><div class="large-12 columns">Copyright &copy; Yuki</div></div> -->
<!--//contain row after container//-->
