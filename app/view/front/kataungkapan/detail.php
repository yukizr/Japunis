<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url('kataungkapan/'); ?>" title="Kembali ke halaman utama" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>
	<?php if(isset($tambahan->isi)){ ?>
	<div class="large-12 columns end">
		<div class="text-center">
			<h2 style="font-weight:800;"><?php echo $tambahan->judul; ?></h2>
		</div>
		<?php echo $tambahan->isi; ?>
	</div>
	<?php } ?>
</div>