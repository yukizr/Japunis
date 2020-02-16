<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url('silabus/'); ?>" title="Kembali ke halaman utama" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>
</div>
<div class="row">
	<?php if(isset($tambahan->isi)){ ?>
	<div class="large-12 columns end">
		<div class="card-product ">
			<div class="card-product-img-wrapper">
				<h2><?php echo $tambahan->judul; ?></h2>
				<hr>
				<?php echo $tambahan->isi; ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>