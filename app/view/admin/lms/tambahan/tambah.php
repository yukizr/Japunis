<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?php echo base_url_admin('lms/tambahan/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>E-Learning</li>
		<li>Tambahan</li>
		<li>Tambah</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="ftambah" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="form-group">
				<div class="col-md-4">
					<label class="" for="iutype">Jenis</label>
					<select id="iutype" name="utype" class="form-control" required>
						<option value="plain">Plain</option>
						<option value="angka">Angka</option>
						<option value="tanggal">Tanggal</option>
						<option value="waktu">Waktu</option>
						<option value="tata_bahasa">Tata Bahasa</option>
						<option value="kata_ungkapan">Kata Ungkapan</option>
					</select>
				</div>
				<div class="col-md-8">
					<label class="" for="ijudul">Judul</label>
					<input id="ijudul" name="judul" type="text" class="form-control" />
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Isi</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea id="iisi" name="isi" class="ckeditor" rows="5"></textarea>
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
