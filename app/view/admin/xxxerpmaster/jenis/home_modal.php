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
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="ikode">Kode*</label>
							<div class="col-md-8">
								<input id="ikode" type="text" name="kode" class="form-control" minlength="2" maxlength="2" placeholder="2 digit huruf angka" required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="inama">Jenis Barang *</label>
							<div class="col-md-8">
								<input id="inama" type="text" name="nama" class="form-control" minlength="1" placeholder="jenis barang" required />
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iis_active">Aktif *</label>
							<div class="col-md-8">
								<select id="iis_active" name="is_active" class="form-control" required>
									<option value="1">Iya</option>
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
					<fieldset>
						<div class="form-group">
							<label class="col-md-4 control-label" for="iekode">Kode*</label>
							<div class="col-md-8">
								<input id="iekode" type="text" name="kode" class="form-control" minlength="2" maxlength="2" placeholder="2 digit huruf angka" required />
								<input type="hidden" name="id" value="" id="ieid" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="ienama">Nama *</label>
							<div class="col-md-8">
								<input id="ienama" type="text" name="nama" class="form-control" minlength="1" placeholder="jenis barang" required />
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<div class="col-md-6">
								<label for="ieis_active">Aktif *</label>
								<select id="ieis_active" name="is_active" class="form-control" required>
									<option value="1">Iya</option>
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