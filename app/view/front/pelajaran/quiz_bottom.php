<?php $d_learnpelajaran_id = $quizs[0]->d_learnpelajaran_id; ?>
$("#fquiz_pelajaran_<?=$d_learnpelajaran_id?>").off("submit");
$("#fquiz_pelajaran_<?=$d_learnpelajaran_id?>").on("submit",function(e){
	e.preventDefault();
	var fd = $(this).serialize();
	var url = '<?=base_url('quiz/proses/'.$d_learnpelajaran_id)?>';
	$.post(url,fd).done(function(dt){
		if(dt.status == 100 || dt.status == '100'){
			window.location = '<?=base_url('pelajaran/quiz_selesai/'.$d_learnpelajaran_id)?>';
			
		}else if(dt.status == '400' || dt.status == 400){
			window.open('<?=base_url('login')?>','_blank');
			return false;
		}else{
			alert('Error: '+dt.message);
		}
	}).error(function(e){
		console.log(e.getAllResponseHeaders());
		alert('Maaf, Jawaban belum bisa diproses, cek koneksi anda');
	});
});
$("#aquiz_done").on("click",function(e){
	e.preventDefault();
	var c = confirm('Apakah sudah yakin?');
	if(c){
		$("#fquiz_pelajaran_<?=$d_learnpelajaran_id?>").trigger("submit");
	}
});