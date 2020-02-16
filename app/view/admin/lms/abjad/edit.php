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
		<li>Edit</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fedit" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="" onsubmit="return false;">
		<div class="block full row">
			<div class="form-group">
				<div class="col-md-12">
					<label class="" for="iejpeang">Indonesia</label>
					<input id="ieindonesia" type="text" name="indonesia" class="form-control" minlength="1" placeholder="Bahasa Indonesia" required value="<?=$abjad->indonesia?>" />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-3">
					<?php if(strlen($abjad->katakana)>4){ ?>
					<img src="<?=base_url($abjad->katakana)?>" class="img-responsive" />
					<?php }else{ ?>
						<img src="<?=base_url('media/upload/default-image.png')?>" class="img-responsive" />
					<?php } ?>
				</div>
				<div class="col-md-9">
				<label class="" for="iekatakana">Katakana</label>
					<input id="iekatakana" type="text" name="katakana" class="form-control" minlength="1" required value="<?=$abjad->katakana?>" />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-3">
					<?php if(strlen($abjad->katakana_urutan)>4){ ?>
					<img src="<?=base_url($abjad->katakana_urutan)?>" class="img-responsive" />
					<?php }else{ ?>
						<img src="<?=base_url('media/upload/default-image.png')?>" class="img-responsive" />
					<?php } ?>
				</div>
				<div class="col-md-9">
				<label class="" for="iekatakana">Katakana Urutan</label>
					<input id="iekatakana_urutan" type="text" name="katakana_urutan" class="form-control" minlength="1" required value="<?=$abjad->katakana_urutan?>" />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-3">
					<?php if(strlen($abjad->hiragana)>4){ ?>
						<img src="<?=base_url($abjad->hiragana)?>" class="img-responsive" />
					<?php }else{ ?>
						<img src="<?=base_url('media/upload/default-image.png')?>" class="img-responsive" />
					<?php } ?>
				</div>
				<div class="col-md-9">
					<label class="" for="iehiragana">Hiragana</label>
					<input id="iehiragana" type="text" name="hiragana" class="form-control" minlength="1" required value="<?=$abjad->hiragana?>" />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-3">
					<?php if(strlen($abjad->hiragana_urutan)>4){ ?>
					<img src="<?=base_url($abjad->hiragana_urutan)?>" class="img-responsive" />
					<?php }else{ ?>
						<img src="<?=base_url('media/upload/default-image.png')?>" class="img-responsive" />
					<?php } ?>
				</div>
				<div class="col-md-9">
					<label class="" for="iehiragana">Hiragana</label>
					<input id="iehiragana_urutan" type="text" name="hiragana_urutan" class="form-control" minlength="1" required value="<?=$abjad->hiragana_urutan?>" />
				</div>
			</div>
		</div>

		<div class="block full row">
			<div class="form-group">
				<div class="col-md-3">
					<audio style="width: 100%;" controls="controls">
						<source src="<?=base_url($abjad->suara)?>" type="audio/mpeg">&nbsp;
					</audio>
				</div>
				<div class="col-md-9">
					<label class="" for="iesuara">Suara</label>
					<input id="iesuara" type="text" name="suara" class="form-control" minlength="1" placeholder="Ganti suara" required value="<?=$abjad->suara?>" />
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
