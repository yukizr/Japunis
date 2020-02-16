<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url('abjad/'); ?>" title="Kembali ke halaman utama" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>
</div>
<div class="row">
	<?php if(isset($abjad->indonesia)){ ?>
	<div class="large-12 columns end">
		
			<div class="card-product-img-wrapper">
					<div class="large-12 text-center">
						<h1 style="font-weight:800;"><?php echo $abjad->indonesia; ?></h1>
					</div>
					<div class="large-12">
						<audio style="width: 100%;" controls="controls" controlslist="nodownload">
							<source src="<?php echo base_url($abjad->suara)?>" type="audio/mpeg">&nbsp;
						</audio>
					</div>
			</div>
		<div class="card-product ">
			<div class="card-product-img-wrapper">
					<div class="large-12 text-center">
						<p>Katakana</p>
						<?php if(strlen($abjad->katakana) > 1){ ?> 
							<img src="<?php echo base_url($abjad->katakana);?>" />
						<?php }else{ ?>
							<!-- nothing else that's matter -->
						<?php } ?>
					</div>
					<div class="large-12 text-center">	
						<img src="<?php echo base_url($abjad->katakana_urutan);?>" />
					</div>
			</div>
			<hr/>
			<div class="card-product-img-wrapper">
					<div class="large-12 text-center">
						<p>Hiragana</p>
						<?php if (strlen($abjad->hiragana) > 1) { ?>
							<img src="<?php echo base_url($abjad->hiragana);?>" />
						<?php } else { ?>
							<!-- nothing else that's matter -->
						<?php } ?>
					</div>
					<div class="large-12 text-center">	
						<img src="<?php echo base_url($abjad->hiragana_urutan);?>" />
					</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>