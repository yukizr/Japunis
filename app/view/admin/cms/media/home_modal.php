
<div id="mfadd" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
				<h4 class="modal-title">Upload Media</h4>
			</div>
			<div id="modalBody" class="modal-body">
				<p id="mfaddloading">Loading...</p>
				<form id="mfaddform" method="post" action="<?php echo base_url("api/media/add/"); ?>" style="display:none;"  class="form-horizontal">

					<div class="form-group">
						<div class="col-md-6">
							<label for="ifolder" class="control-label">Pilih Folder</label>
							<div class="input-group ">
								<span class="input-group-addon">Folder</span>
								<select id="ifolder" name="folder" class="form-control select2">
									<option value="/">-- Root folder --</option>
								</select>
								<span id="ifoldertambah" class="input-group-addon">+ Tambah</span>
							</div>
						</div>
						<div class="col-md-12">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<label for="ifile" class="control-label">Slug</label>
							<div class="input-group mb15">
								<span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
								<input id="ifile" name="file" class="form-control" type="file" accept="" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-12">
							<button id="mfaddsimpan" type="submit" class="btn btn-success">Simpan</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<div id="mfmenu" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
				<h4 class="modal-title">Menu Pilihan</h4>
			</div>

			<div id="modalBody" class="modal-body">
				<div class="row">
					<div id="mfmenu_preview" class="col-md-9">
						<img id="imgreal" src="" class="img-responsive" />
					</div>
					<div class="col-md-3">

						<div class="input-group mb15">
							<input id="copasmedia" type="text" value="" class="form-control" />
							<span id="copasmediabutton" class="input-group-addon" title="copy paste"><i class="fa fa-copy"></i></span>
						</div>

						<div class="">
							<a id="bgfldrmv" href="#" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Pindah Folder</a>
							<a id="bgdel" href="#" class="btn btn-danger btn-block"><i class="fa fa-times"></i> Hapus</a>
						</div>

						<div class="well">

							<div id="ddelconf" class="btn-group" style="display:none;">
								<p>
									Apakah anda yakin?
								</p>
								<a id="ddelconfyes" href="#" class="btn btn-danger"> Iya</a>
								<a id="ddelconfno" class="btn btn-primary"> Tidak</a>
							</div>

							<div id="dfldrmv" style="display:none;">
								<a id="dfldrmvadd" href="#" class="">+ Folder Baru</a>
								<select id="sfldmv" name="folder" class="form-control select2" style="margin-bottom: 1em;">
									<option value="/">/</option>
								</select>
								<button id="dfldrmvs" class="btn btn-block btn-primary btn-xs">Pindah</button>
							</div>

						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
