<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url('pelajaran'); ?>" title="Kembali ke halaman utama" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>


	<div class="large-12 columns">
		<div class="text-center">
			<h3 style=""><?=$pelajaran->mata_pelajaran?></h3>
			<h2 style="font-weight:800;"><?=$pelajaran->judul?></h2>
			<!-- <img src="<?php echo base_url($pelajaran->gambar); ?>" class="img-responsive marginbottom1" /> -->
		</div>
		<ul class="accordion" data-accordion="" role="tablist">
		  <li class="accordion-navigation active">
		    <a href="#panel1d" role="tab" id="panel1d-heading" aria-controls="panel1d" aria-expanded="true">Dialog 1</a>
		    <div id="panel1d" class="content active" role="tabpanel" aria-labelledby="panel1d-heading">
		    	<?php if(strlen($pelajaran->dialog1)){ ?>
		      		<?php echo $pelajaran->dialog1; ?>
		      	<?php } ?>
		    </div>
		  </li>
		  <li class="accordion-navigation">
		    <a href="#panel2d" role="tab" id="panel2d-heading" aria-controls="panel2d" aria-expanded="false">Tata Bahasa 1</a>
		    <div id="panel2d" class="content" role="tabpanel" aria-labelledby="panel2d-heading">
		      	<?php if(strlen($pelajaran->tatabahasa1)){ ?>
		      		<?php echo $pelajaran->tatabahasa1; ?>
		      	<?php } ?>
		    </div>
		  </li>
		  <li class="accordion-navigation">
		    <a href="#panel3d" role="tab" id="panel3d-heading" aria-controls="panel3d" aria-expanded="false">Dialog 2</a>
		    <div id="panel3d" class="content" role="tabpanel" aria-labelledby="panel3d-heading">
		      	<?php if(strlen($pelajaran->dialog2)){ ?>
		      		<?php echo $pelajaran->dialog2; ?>
		      	<?php } ?>
		    </div>
		  </li>
		  <li class="accordion-navigation">
		    <a href="#panel4d" role="tab" id="panel4d-heading" aria-controls="panel4d" aria-expanded="false">Dialog 3</a>
		    <div id="panel4d" class="content" role="tabpanel" aria-labelledby="panel4d-heading">
		      	<?php if(strlen($pelajaran->dialog3)){ ?>
		      		<?php echo $pelajaran->dialog3; ?>
		      	<?php } ?>
		    </div>
		  </li>
		  <li class="accordion-navigation">
		    <a href="#panel5d" role="tab" id="panel5d-heading" aria-controls="panel5d" aria-expanded="false">Tata Bahasa 2</a>
		    <div id="panel5d" class="content" role="tabpanel" aria-labelledby="panel5d-heading">
		      	<?php if(strlen($pelajaran->tatabahasa2)){ ?>
		      		<?php echo $pelajaran->tatabahasa2; ?>
		      	<?php } ?>
		    </div>
		  </li>
		  <li class="accordion-navigation">
		    <a href="#panel6d" role="tab" id="panel6d-heading" aria-controls="panel6d" aria-expanded="false">Kata & Ungkapan</a>
		    <div id="panel6d" class="content" role="tabpanel" aria-labelledby="panel6d-heading">
		      <?php if(strlen($pelajaran->kataungkapan)){ ?>
		      		<?php echo $pelajaran->kataungkapan; ?>
		      	<?php } ?>
		    </div>
		  </li>
		</ul>
	</div>
	<div class="large-12">&nbsp;</div>
	<div class="large-12">
		<div class="small-6 columns end">
			<div class="button-group">
				<a href="<?php echo base_url('pelajaran/'); ?>" title="Kembali ke pelajaran" class="button secondary small">
					<i class="fa fa-chevron-left"></i>
					Kembali
				</a>
			</div>
		</div>
		<div class="small-6 columns end text-right">
			<div class="button-group">
				<?php //if($pelajaran->is_quiz){ ?>
					<a href="<?php echo base_url('pelajaran/quiz/'.$pelajaran->id); ?>" title="Quiz" class="button warning small">
						<i class="fa fa-file-text-o"></i>
						Kuis
					</a>
				<?php //} ?>
			</div>
		</div>
	</div>
</div>	
