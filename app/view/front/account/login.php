<div class="row">
	<div class="columns large-12">
		<div id="error-container" class="col-md-12 text-center">
			<div class="medium-4 large-4 columns">
	          &nbsp;
	        </div>
			<div class="small-12 medium-4 large-4 columns">
				<!-- <h3 class="animation-pulse"><i class="fa fa-exclamation-circle text-warning"></i> Login</h3> -->
				<h3 class=""> Masuk</h3>
				<div id="flogin_info" data-alert class="alert-box alert round" style="display:none;">
	      			<a href="#" class="close">&times;</a>
	      		</div>
				<form id="flogin" method="post" action="<?=base_url('login/proses')?>" class="" data-abide>
					<div class="row">
						<div class="columns large-12">
					      	<input type="email" id="iusername" name="username" placeholder="Email" required>
						    <small class="error">Email tidak valid</small>
					   	</div>
						<div class="columns large-12">
							<input type="password" id="ipassword" name="password" placeholder="password" required/>
							<small class="error">Isi Password terlebih dahulu</small>
						</div>
						<div class="g-recaptcha column large-12" data-sitekey="6LcfVtkUAAAAAKEVBqc--ET_68AMrYZHoE3Vfqiy"></div>
					</div>
					<div class="row">
						<div class="columns large-12">
							<input type="submit" value="Masuk" class="button warning small expand" />
						</div>
					</div>
				</form>
				<hr>
				<div class="columns large-12">
					<div class="row">
						<!-- <p style="text-align:center;"><a href="<?php echo base_url("forget"); ?>" style="color:red;">Lupa Password</a></p> -->
						<a href="<?php echo base_url("daftar"); ?>" class="button  expand">Daftar</a>
					</div>
				</div>
			</div>
			<div class="medium-4 large-4 columns">
	          &nbsp;
	        </div>
		</div>
	</div>
</div>