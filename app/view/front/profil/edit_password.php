<div class="row">
	<div class="large-offset-4 large-4 medium-offset-3 medium-6 small-12 columns">
		<div class="card-product">
			<h4>Ganti password</h4>
			<form id="fedit_password" method="post" action="<?php echo base_url('profil/edit_password/') ?>" onsubmit="return false;">
				<div class="row">
					<div class="large-12 columns">
						<label for="ioldpassword">Password Lama</label>
						<input id="ioldpassword" type="password" name="oldpassword" minlength="4" placeholder="" required />
					</div>
					<div class="large-12 columns">
						<label for="ipassword">Password Baru</label>
						<input id="ipassword" type="password" name="password" minlength="4" placeholder="" required />
					</div>
					<div class="large-12 columns">
						<label for="irepassword">Ulangi Password</label>
						<input id="irepassword" type="password" minlength="4" placeholder="" required />
					</div>
					<div class="large-12 columns">
						<div class="button-group">
							<a href="<?php echo base_url('profil/')?>" class="button secondary expand">Kembali</a>
							<input type="submit" value="Simpan" class="button expand" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>