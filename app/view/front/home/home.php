<div class="row">
	<div class="large-12 columns" style="margin-top:-2em;">
		<?php 
			if(isset($sess->user->id)){
				$nama = $sess->user->fnama;
				if(empty($nama)) $nama = $sess->user->email;
			}
		?>	
        <?php if (!isset($sess->user->id)) { ?>
            &nbsp;
        <?php } else { ?>
            <div class="text-center">
				<h3 style="font-weight:800;">Irasshai, <?=$nama?></h3>
			</div>
        <?php } ?> 
    </div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>pelajaran"><img src="<?php echo base_url('media/upload/2018/01/'); ?>pelajaran.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>abjad"><img src="<?php echo base_url('media/upload/2018/01/'); ?>abjad.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>angka"><img src="<?php echo base_url('media/upload/2018/01/'); ?>angka.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>tanggal"><img src="<?php echo base_url('media/upload/2018/01/'); ?>tanggal.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>waktu"><img src="<?php echo base_url('media/upload/2018/01/'); ?>waktu.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>tatabahasa"><img src="<?php echo base_url('media/upload/2018/01/'); ?>tatabahasa.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>kataungkapan"><img src="<?php echo base_url('media/upload/2018/01/'); ?>kataungkapan.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>silabus"><img src="<?php echo base_url('media/upload/2018/01/'); ?>silabus.jpg"></a>
			</div>
		</div>
	</div>
	<div class="large-6 columns end">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url(); ?>tentang"><img src="<?php echo base_url('media/upload/2018/01/'); ?>tentang.jpg"></a>
			</div>
		</div>
	</div>
</div>