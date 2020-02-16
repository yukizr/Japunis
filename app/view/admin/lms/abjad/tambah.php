<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?php echo base_url_admin('lms/abjad/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>E-Learning</li>
		<li>Abjad</li>
		<li>Tambah</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="ftambah" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="iindonesia">Indonesia</label>
					<input id="iindonesia" type="text" name="indonesia" class="form-control" minlength="1" placeholder="Bahasa Indonesia" required />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="ikatana">Katakana</label>
					<input id="ikatakana" type="text" name="katakana" class="form-control" minlength="1" placeholder="URL Gambar GIF Katakana" required />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="ikatana">Katakana Urutan</label>
					<input id="ikatakana_urutan" type="text" name="katakana_urutan" class="form-control" minlength="1" placeholder="URL Gambar PNG Katakana" required />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="ihiragana">Hiragana</label>
					<input id="ihiragana" type="text" name="hiragana" class="form-control" minlength="1" placeholder="URL Gambar GIF Hiragana" required />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="ihiragana">Hiragana</label>
					<input id="ihiragana_urutan" type="text" name="hiragana_urutan" class="form-control" minlength="1" placeholder="URL Gambar PNG Hiragana" required />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="isuara">Suara</label>
					<input id="isuara" type="text" name="suara" class="form-control" minlength="1" placeholder="URL mp3 suara" required />
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
						<input type="submit" value="Simpan" class="btn btn-primary" />
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- END Content -->
</div>	
