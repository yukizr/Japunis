<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-6">
				<div class="btn-group">
					<a id="aback" href="<?php echo base_url_admin('lms/pelajaran/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="btn-group pull-right">
					<a id="aquiz_add" href="<?php echo base_url_admin('lms/quiz/tambah/'.$pelajaran_id); ?>" class="btn btn-std btn-info"><i class="fa fa-plus"></i> Tambah Quiz</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>E-Learning</li>
		<li>Pelajaran</li>
		<li>Edit</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fedit" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="iemata_pelajaran">Mata Pelajaran</label>
					<input id="iemata_pelajaran" type="text" name="mata_pelajaran" class="form-control" minlength="1" placeholder="Mata Pelajaran" required value="<?=$pelajaran->mata_pelajaran?>" />
				</div>
				<div class="col-md-9">
					<label class="" for="iejudul">Judul</label>
					<input id="iejudul" type="text" name="judul" class="form-control" minlength="1" placeholder="Judul" required value="<?=$pelajaran->judul?>" />
					<input id="ieid" type="hidden" name="id" value="<?=$pelajaran->id?>" />
				</div>
				<div class="col-md-3">
					<?php if(strlen($pelajaran->gambar)>4){ ?>
					<img src="<?=base_url($pelajaran->gambar)?>" class="img-responsive" />
					<?php } ?>
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
					<label class="control-label" for="iedialog1">Dialog 1</label>
					<textarea id="iedialog1" name="dialog1" class="ckeditor" rows="5"><?=$pelajaran->dialog1?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="iedialog2">Dialog 2</label>
					<textarea id="iedialog2" name="dialog2" class="ckeditor" rows="5"><?=$pelajaran->dialog2?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="iedialog3">Dialog 3</label>
					<textarea id="iedialog3" name="dialog3" class="ckeditor" rows="5"><?=$pelajaran->dialog3?></textarea>
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Tata Bahasa</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="ietatabahasa1">Tata Bahasa 1</label>
					<textarea id="ietatabahasa1" name="tatabahasa1" class="ckeditor" rows="5"><?=$pelajaran->tatabahasa1?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="ietatabahasa2">Tata Bahasa 2</label>
					<textarea id="ietatabahasa2" name="tatabahasa2" class="ckeditor" rows="5"><?=$pelajaran->tatabahasa2?></textarea>
				</div>
			</div>
		</div>
		
		<div class="block full row">
			<div class="block-title">
				<h2><strong>Kata Ungkapan</strong></h2>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea id="iekataungkapan" name="kataungkapan" class="ckeditor" rows="5"><?=$pelajaran->kataungkapan?></textarea>
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
