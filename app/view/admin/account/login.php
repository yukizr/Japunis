<style>
</style>
<!-- Login Full Background -->
<!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
<img src="<?php echo $this->skins->admin; ?>img/background-login-japunis.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
<!-- END Login Full Background -->

	<!-- Login Container -->
	<div id="login-container" class="animation-fadeIn">
		<!-- Login Title -->
		<div class="login-title text-center">
			<img src="<?php echo $this->skins->admin; ?>img/japunis-logo.png" class="img-responsive" />
		</div>
		<!-- END Login Title -->

		<!-- Login Block -->
		<div class="block push-bit">
			<div id="flogin_info" class="alert alert-info" role="alert" style="<?php if(!isset($pesan_info)) echo 'display:none'; ?>"><?php if(isset($pesan_info)) echo $pesan_info; ?></div>
			<!-- Login Form -->
			<form action="<?php echo base_url_admin("login/proses"); ?>" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
				<div class="form-group">
					<div class="col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
							<input type="text" id="iusername" name="username" class="form-control input-lg" placeholder="Username" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
							<input type="password" id="ipassword" name="password" class="form-control input-lg" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="form-group form-actions">
					<div class="col-xs-4">
						<label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
							<input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
							<span></span>
						</label>
					</div>
					<div class="col-xs-8 text-right">
						<button type="submit" class="btn btn-sm btn-primary"><i id="bsubmit" class="fa fa-angle-right"></i> Login ke Pusat</button>
					</div>
				</div>
						<!--
				<div class="form-group">
					<div class="col-xs-12 text-center">
						<a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a>
							- <a href="javascript:void(0)" id="link-register-login"><small>Create a new account</small></a>
					</div>
				</div>
						-->
			</form>
			<!-- END Login Form -->

			<!-- Reminder Form -->
			<form action="<?php echo base_url("login/lupa_lagi"); ?>" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
				<div class="form-group">
					<div class="col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<input type="text" id="remail" name="rremail" class="form-control input-lg" placeholder="Email">
						</div>
					</div>
				</div>
				<div class="form-group form-actions">
					<div class="col-xs-12 text-right">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 text-center">
						<small>Did you remember your password?</small> <a href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
					</div>
				</div>
			</form>
			<!-- END Reminder Form -->

			<!-- Register Form -->
			<form action="login_full.html#register" method="post" id="form-register" class="form-horizontal form-bordered form-control-borderless display-none">
				<div class="form-group">
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-user"></i></span>
							<input type="text" id="register-firstname" name="register-firstname" class="form-control input-lg" placeholder="Firstname">
						</div>
					</div>
					<div class="col-xs-6">
						<input type="text" id="register-lastname" name="register-lastname" class="form-control input-lg" placeholder="Lastname">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
							<input type="text" id="register-email" name="register-email" class="form-control input-lg" placeholder="Email">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
							<input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
							<input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Verify Password">
						</div>
					</div>
				</div>
				<div class="form-group form-actions">
					<div class="col-xs-6">
						<a href="#modal-terms" data-toggle="modal" class="register-terms">Terms</a>
						<label class="switch switch-primary" data-toggle="tooltip" title="Agree to the terms">
							<input type="checkbox" id="register-terms" name="register-terms">
							<span></span>
						</label>
					</div>
					<div class="col-xs-6 text-right">
						<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Register Account</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 text-center">
						<small>Do you have an account?</small> <a href="javascript:void(0)" id="link-register"><small>Login</small></a>
					</div>
				</div>
			</form>
			<!-- END Register Form -->
		</div>
		<!-- END Login Block -->
	</div>
	<!-- END Login Container -->

	<!-- Modal Terms -->
	<div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Terms &amp; Conditions</h4>
				</div>
				<div class="modal-body">
					<h4>Title</h4>
					<p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<h4>Title</h4>
					<p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<h4>Title</h4>
					<p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- END Modal Terms -->
