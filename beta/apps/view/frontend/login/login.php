<!--//contain row after container//-->
		<!--//container main //-->
    <div class="row">
    <div class="large-12 columns" style="min-height:590px;">
        <div class="medium-4 large-4 columns">
          &nbsp;
        </div>
				<div class="small-12 medium-4 large-4 columns" style="padding-top:0em;">
          <h3>Login</h3>
          <hr>
          <?php if(isset($warn)): ?>
      		<div data-alert class="alert-box alert round">
      			<?php echo $warn; ?>
      			<a href="#" class="close">&times;</a>
      		</div>
      		<?php endif; ?>
						<form action="<?php echo base_url("login"); ?>" method="post" enctype="multipart/form-data" data-abide>
            <div class="row">
      				<div class="large-12 columns">
      					<label for="i_username">Email</label>
      				</div>
      			</div>
            <div class="row">
      				<div class="large-12 columns">
    							<input type="email" name="email" id="i_username" class="input" pattern="email" placeholder="email" required="required" />
                  <small class="error">Email tidak valid</small>
      				</div>
      			</div>
            <div class="row">
      				<div class="large-12 columns">
      					<label for="i_password">Password</label>
      				</div>
      			</div>
            <div class="row">
      				<div class="large-12 columns">
      					<input type="password" id="i_password" class="input" name="password" placeholder="password" required="required" />
                <small class="error">Password harus diisi</small>
      				</div>
      			</div>
            <div class="row">
      				<div class="large-12 columns">
                <input type="submit" name="submit" value="Masuk" class="button expand" />
                <hr>
                <p style="text-align:center;"><a href="<?php echo base_url("forget"); ?>">Lupa Password</a></p>
                <a href="<?php echo base_url("signup"); ?>" class="button secondary expand">Daftar</a>
      				</div>
      			</div>
						</form>


				</div>
        <div class="medium-4 large-4 columns">
          &nbsp;
        </div>
      </div>
  </div>
<!--//contain row after container//-->
