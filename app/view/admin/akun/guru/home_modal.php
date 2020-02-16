<style>
	.btn.text-left {
		text-align: left;
	}
</style>
<!-- modal pilihan -->
<div id="modal_pilihan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h2 class="modal-title">Pilihan</h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 btn-group-vertical " style="text-align: left;">
						<a id="adetail" href="#" class="btn btn-info text-left"><i class="fa fa-info-circle"></i> Detail</a>
						<a id="amigrasi" href="#" class="btn btn-info text-left"><i class="fa fa-paste"></i> Migrasi Ke Cabang Lain</a>
						<a id="aedit_password" href="#" class="btn btn-info text-left"><i class="fa fa-pencil"></i> Reset Password</a>
						<a id="aedit" href="#" class="btn btn-info text-left"><i class="fa fa-pencil"></i> Edit</a>
						<button id="bhapus" type="button" class="btn btn-info text-left"><i class="fa fa-trash-o"></i> Hapus</button>
					</div>
				</div>
				<div class="row" style="margin-top: 1em; ">
					<div class="col-md-12" style="border-top: 1px #afafaf dashed;">&nbsp;</div>
					<div class="col-xs-12 btn-group-vertical" style="">
						<button type="button" class="btn btn-default btn-block text-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<!-- modal edit password -->
<div id="modal_edit_password" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Edit Password</h2>
			</div>
			<!-- END Modal Header -->
			
			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fedit_password" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iganti_password">Password *</label>
							<div class="col-md-8">
								<input id="iganti_password" type="password" name="password" class="form-control" minlength="4" placeholder="Password" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iganti_repassword">Ulangi *</label>
							<div class="col-md-8">
								<input id="iganti_repassword" type="password"  class="form-control" minlength="4" placeholder="Ulangi Password" required />
							</div>
						</div>
					</fieldset>
					<div class="form-group form-actions">
						<div class="col-xs-12 text-right">
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>

<!-- modal tambah -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Tambah</h2>
			</div>
			<!-- END Modal Header -->
			
			<!-- Modal Body -->
			<div class="modal-body">
				<form id="ftambah" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
					<input id="iutype" type="hidden" name="utype" value="guru" />
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iemail">Email</label>
							<div class="col-md-8">
								<input id="iemail" type="text" name="email" class="form-control" minlength="4" placeholder="Email" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="inama">Nama</label>
							<div class="col-md-8">
								<input id="inama" type="text" name="nama" class="form-control" minlength="4" placeholder="Nama" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="ikelas">Kelas</label>
							<div class="col-md-8">
								<input id="ikelas" type="text" name="kelas" class="form-control" minlength="4" placeholder="Kelas" />
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="ipassword">Password *</label>
							<div class="col-md-8">
								<input id="ipassword" type="password" name="password" class="form-control" minlength="4" placeholder="Password" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="irepassword">Ulangi Password *</label>
							<div class="col-md-8">
								<input id="irepassword" type="password" class="form-control" minlength="4" placeholder="Ulangi password" required />
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iis_active">Status *</label>
							<div class="col-md-8">
								<select id="iis_active" name="is_active" class="form-control" required>
									<option value="1">Aktif</option>
									<option value="0">Tidak</option>
								</select>
							</div>
						</div>
					</fieldset>
					<div class="form-group form-actions">
						<div class="col-xs-12 text-right">
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>

<!-- modal edit -->
<div id="modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Edit</h2>
			</div>
			<!-- END Modal Header -->
			
			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fedit" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
					<input id="ieid" type="hidden" name="id" />
					<input id="ieutype" type="hidden" name="utype" value="guru" />
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="ieemail">Email *</label>
							<div class="col-md-8">
								<input id="ieemail" type="text" name="email" class="form-control" minlength="4" placeholder="Email" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="ienama">Nama</label>
							<div class="col-md-8">
								<input id="ienama" type="text" name="nama" class="form-control" minlength="4" placeholder="Nama" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iekelas">Kelas</label>
							<div class="col-md-8">
								<input id="iekelas" type="text" name="kelas" class="form-control" minlength="4" placeholder="Kelas" />
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iis_active">Status *</label>
							<div class="col-md-8">
								<select id="iis_active" name="is_active" class="form-control" required>
									<option value="1">Aktif</option>
									<option value="0">Tidak</option>
								</select>
							</div>
						</div>
					</fieldset>
					<div class="form-group form-actions">
						<div class="col-xs-12 text-right">
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button id="bhapus" type="button" class="btn btn-sm btn-warning">Hapus</button>
							<button type="submit" class="btn btn-sm btn-primary">Simpan Perubahan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>