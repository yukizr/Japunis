<?php 
	$i=1; 
	$title = '';
	$d_learnpelajaran_id = $quizs[0]->d_learnpelajaran_id;
	if(isset($quizs[0]->nama)) $title = $quizs[0]->nama;
	shuffle($quizs);
?>
<div class="row">
	<div class="columns large-12">
		<a href="<?php echo base_url('pelajaran/detail/'.$pelajaran_id); ?>" title="Kembali ke pelajaran" class="button secondary small">
			<i class="fa fa-chevron-left"></i>
			Kembali
		</a>
	</div>
	<div class="large-12 columns end">
			<div class="text-center">
				<h3 style="">Kuis</h3>
				<h2 style="font-weight:800;"><?=$title?></h2>
			</div>
			<div class="text-center">&nbsp;</div>
			<form id="fquiz_pelajaran_<?=$d_learnpelajaran_id?>" method="post" action="<?=base_url('pelajaran/quiz_selesai/'.$d_learnpelajaran_id)?>">
				<input type="hidden" name="d_learnpelajaran_id" value="<?=$d_learnpelajaran_id?>" />
			<?php foreach($quizs as $quiz){ ?>
			<?php 
				//option rand 
				$ops = array();
				for($j=1;$j<=$quiz->opsi;$j++){
					$op = new stdClass();
					$op->id = $quiz->id;
					$op->opsi = $j;
					$op->teks = $quiz->{'jawaban'.$j};
					$ops[] = $op;
				}
				shuffle($ops);
			?>
				<!-- <div id="soal_<?=$quiz->id?>" class="soal-pertanyaan"><?php echo $i.'. '.$quiz->pertanyaan ?></div> -->
				<ul class="pricing-table soal-pertanyaan">
					<li class="title"><?php echo $i ?></li>
					<li class="price"><?php echo $quiz->pertanyaan ?></li>
				</ul>
				<ul id="jawaban_<?=$quiz->id?>" class="soal-jawaban pricing-table" style="list-style-type: none;">
						<?php foreach($ops as $op){ ?>
						<li class="bullet-item">
							<div class="large-12"><input type="radio" name="soal[<?php echo $op->id; ?>]" value="<?=$op->opsi?>" /></div>
							<div class="large-12"><?=$op->teks?></div>
						</li>
						<?php } ?>
				</ul>
			<?php $i++; } ?>
			</form>
			<br>
			<a id="aquiz_done" href="#" title="Selesaikan Quiz" class="button expand">Selesai</a>
		
	</div>
</div>