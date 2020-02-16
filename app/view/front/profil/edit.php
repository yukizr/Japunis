<div class="row">
	<div class="large-offset-4 large-4 medium-offset-3 medium-6 small-12 columns">
		<div class="card-product">
			<h4>Edit Profil</h4>
			<form id="fedit_password" method="post" action="<?php echo base_url('profil/edit_password/') ?>" onsubmit="return false;">
				<div class="row">
					<div class="large-12 columns">
						<label for="ifnama">Nama</label>
						<input id="ifnama" type="text" name="fnama" value="<?=$sess->user->fnama?>" minlength="4" placeholder="" />
					</div>
					<div class="large-12 columns">
						<label for="iemail">Email</label>
						<input id="iemail" type="text" name="email" value="<?=$sess->user->email?>" minlength="4" placeholder="" required />
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