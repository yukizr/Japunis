<?php
	$admin_foto = '';
	if(isset($sess->admin->foto))$admin_foto = $sess->admin->foto;
	if(empty($admin_foto)) $admin_foto = 'media/pengguna/default.png';
	$admin_foto = base_url($admin_foto);
?>
<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?php echo base_url_admin(''); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>Profil</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<?php if(isset($notif)){ ?>
	<div class="alert alert-info" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<?=$notif?>
	</div>
	<?php } ?>
	<div class="block full row">
		<div class="block-title">
			<div class="block-options pull-right">
				<button type="button" id="bprofil_foto" href="#" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Edit Foto Profil" data-original-title="Edit Profil"><i class="fa fa-file-image-o"></i> Ganti Foto</button>
				<button type="button" id="bprofil" href="#" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Edit Profil" data-original-title="Edit Profil"><i class="fa fa-edit"></i> Edit</button>
			</div>
			<h2><strong>Profil</strong></h2>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<img src="<?=$admin_foto?>" style="width: 100%;" class="img-responsive" />
			</div>
			<div class="col-md-3">&nbsp;</div>
			<div class="col-md-6">
				<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Nama</th>
						<td>:</td>
						<td><?=$sess->admin->nama?></td>
					</tr>
					<tr>
						<th>Username</th>
						<td>:</td>
						<td><?=$sess->admin->username?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:</td>
						<td><?=$sess->admin->username?></td>
					</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
		
	<!-- END Content -->
</div>	
