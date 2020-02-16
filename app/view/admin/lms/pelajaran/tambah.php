<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?php echo base_url_admin('lms/pelajaran/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>E-Learning</li>
		<li>Pelajaran</li>
		<li>Tambah</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="ftambah" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="imata_pelajaran">Mata Pelajaran</label>
					<input id="imata_pelajaran" name="mata_pelajaran" type="text" class="form-control" />
				</div>
				<div class="col-md-12">
					<label class="" for="ijudul">Judul</label>
					<input id="ijudul" name="judul" type="text" class="form-control" />
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<div class="block-options pull-right">
					<button id="bgaleritambah" href="#" class="btn btn-alt btn-sm btn-primary" data-toggle="tooltip" title="Ubah gambar" data-original-title="Ubah gambar"><i class="fa fa-edit"></i> Ubah Gambar</button>
				</div>
				<h2><strong>Gambar</strong></h2>
			</div>
			<div id="dgaleri_items" class="row media-manager">
				
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Dialog</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="idialog1">Dialog 1</label>
					<textarea id="idialog1" name="dialog1" class="ckeditor" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="idialog2">Dialog 2</label>
					<textarea id="idialog2" name="dialog2" class="ckeditor" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="idialog3">Dialog 3</label>
					<textarea id="idialog3" name="dialog3" class="ckeditor" rows="5"></textarea>
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Tata Bahasa</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="itatabahasa1">Tata Bahasa 1</label>
					<textarea id="itatabahasa1" name="tatabahasa1" class="ckeditor" rows="5"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="itatabahasa2">Tata Bahasa 2</label>
					<textarea id="itatabahasa2" name="tatabahasa2" class="ckeditor" rows="5"></textarea>
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Kata Ungkapan</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea id="ikataungkapan" name="kataungkapan" class="ckeditor" rows="5"></textarea>
				</div>
			</div>
		</div>
		
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Action</strong></h2>
			</div>
			<div class="row">
				<div class="col-md-8">&nbsp;</div>
				<div class="col-md-4 text-right">
					<div class="btn-group"><input type="submit" value="Simpan Perubahan" class="btn btn-primary" />
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- END Content -->
</div>	
