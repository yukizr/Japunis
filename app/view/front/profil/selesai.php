<div class="row">
	<div class="large-offset-3 large-6 medium-offset-3 medium-6 small-offset-2 small-8 columns">
		<div class="card-product">
			<h4>Profil <?=ucfirst($sess->user->utype)?></h4>
			<table class="table bordered" style="width: 100%;">
				<tr>
					<tr>
						<th>Nama</th>
						<td>:</td>
						<td><?=$sess->user->fnama?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:</td>
						<td><?=$sess->user->email?></td>
					</tr>
					<tr>
						<th>Kelas</th>
						<td>:</td>
						<td><?=$sess->user->kelas?></td>
					</tr>
				</tr>
			</table>
			<div class="button-group">
				<a href="<?php echo base_url('/')?>" class="button tiny secondary">Kembali</a>
				<a href="<?php echo base_url('profil/edit/'); ?>" class="button tiny">Edit Profil</a>
				<a href="<?php echo base_url('profil/edit_password/'); ?>" class="button tiny">Ganti Password</a>
			</div>
		</div>
	</div>
</div>