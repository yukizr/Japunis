CKEDITOR.config.font_names += '; Roboto;';	
setTimeout(function(){ 
	//CKEDITOR.replaceAll();
},1333);

var growlPesan = '<h4>Error</h4><p>Tidak dapat diproses, silakan coba beberapa saat lagi!</p>';
var growlType = 'danger';
var drTable = {};
var ieid = '';
function gritter(pesan,jenis='info'){
	$.bootstrapGrowl(pesan, {
		type: jenis,
		delay: 2500,
		allow_dismiss: true
	});
}

App.datatables();

$("#ftambah").on("submit",function(e){
	e.preventDefault();
	for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
	var fd = new FormData($(this)[0]);
	var url = '<?php echo base_url('api_admin/lms/quiz/tambah/'.$pelajaran->id); ?>';
	$.ajax({
		type: 'POST',
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			if(respon.status=="100" || respon.status == 100){
				$("#modal_tambah").modal("hide");
				gritter('<h4>Berhasil</h4><p>Pertanyaan baru berhasil ditambahkan</p>', 'success');
				setTimeout(function(){
					window.location = '<?=base_url_admin('lms/quiz/tambah/'.$pelajaran->id)?>';
				},3000);
			}else{
				gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
			}
		},
		error:function(){
			gritter('<h4>Error</h4><p>Proses tambah data tidak bisa dilakukan, coba beberapa saat lagi</p>', 'warning');
			return false;
		}
	});
});
