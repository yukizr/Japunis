<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url(); ?>" title="Kembali ke halaman utama" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>
</div>
<div class="row">
	<!-- <div class="text-center">
		<h2 style="font-weight:800;">Tanggal</h2>
	</div>
	<div class="text-center">&nbsp;</div> -->
	<?php if(count($tambahans)){ ?>
	<?php foreach($tambahans as $tambahan){ ?>
	<div class="large-12 columns">
		<div class="card-product card-product-hover">
			<div class="card-product-img-wrapper">
				<a href="<?php echo base_url('tanggal/detail/'.$tambahan->id); ?>">
					<h2><?php echo $tambahan->judul; ?></h2>
				</a>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php } ?>
</div>