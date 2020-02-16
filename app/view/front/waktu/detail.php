<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url('waktu/'); ?>" title="Kembali ke halaman utama" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>
	<?php if(isset($tambahan->isi)){ ?>
	<div class="large-12 columns">
		<div class="text-center">
			<h2 style="font-weight:800;"><?php echo $tambahan->judul; ?></h2>
		</div>
		<div class="text-center">&nbsp;</div>
		<?php echo $tambahan->isi; ?>
	</div>
	<?php } ?>
</div>