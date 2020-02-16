<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url(); ?>" title="Kembali ke halaman utama" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>
</div>
<div class="row">
	<?php if(count($pelajarans)){ ?>
	<?php foreach($pelajarans as $pelajaran){ ?>
	<div class="large-6 columns end">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url('pelajaran/detail/'.$pelajaran->id); ?>">
					<img src="<?php echo base_url($pelajaran->gambar); ?>" />
				</a>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php } ?>
</div>