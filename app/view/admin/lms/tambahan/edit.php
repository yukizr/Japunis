<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-6">
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
		<li>Edit</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fedit" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="form-group">
				<div class="col-md-4">
					<label class="" for="ieutype">Jenis</label>
					<select id="ieutype" name="utype" class="form-control" required>
						<option <?php if($tambahan->utype == 'plain') echo 'selected';?> value="plain">Plain</option>
						<option <?php if($tambahan->utype == 'angka') echo 'selected';?> value="angka">Angka</option>
						<option <?php if($tambahan->utype == 'tanggal') echo 'selected';?> value="tanggal">Tanggal</option>
						<option <?php if($tambahan->utype == 'waktu') echo 'selected';?> value="waktu">Waktu</option>
						<option <?php if($tambahan->utype == 'tata_bahasa') echo 'selected';?> value="tata_bahasa">Tata Bahasa</option>
						<option <?php if($tambahan->utype == 'kata_ungkapan') echo 'selected';?> value="kata_ungkapan">Kata Ungkapan</option>
					</select>
				</div>
				<div class="col-md-8">
					<label class="" for="iejudul">Judul</label>
					<input id="iejudul" type="text" name="judul" class="form-control" minlength="1" placeholder="Judul" required value="<?=$tambahan->judul?>" />
					<input id="ieid" type="hidden" name="id" value="<?=$tambahan->id?>" />
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Isi</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea id="ieisi" name="isi" class="ckeditor" rows="5"><?php echo $tambahan->isi;?></textarea>
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
					<div class="btn-group">
						<button id="bhapus" type="button" class="btn btn-warning">Hapus</button>
						<input type="submit" value="Simpan Perubahan" class="btn btn-primary" />
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- END Content -->
</div>	
