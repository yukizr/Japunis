CKEDITOR.config.font_names += '; Roboto;';	
setTimeout(function(){ 
	CKEDITOR.replaceAll();
},333);
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

if(jQuery('#drTable').length>0){
	drTable = jQuery('#drTable')
	.on('preXhr.dt', function ( e, settings, data ){
		$("#modal-preloader").modal("hide");
		//$("#modal-preloader").modal("show");
	}).DataTable({
			"order"					: [[ 1, "asc" ]],
			"responsive"	  : true,
			"bProcessing"		: true,
			"bServerSide"		: true,
			"sAjaxSource"		: "<?php  echo base_url("api_admin/lms/quiz/pelajaran/".$pelajaran->id); ?>",
			"fnServerData"	: function (sSource, aoData, fnCallback, oSettings) {
				//$('body').removeClass('loaded');

				oSettings.jqXHR = $.ajax({
					dataType 	: 'json',
					method 		: 'POST',
					url 		: sSource,
					data 		: aoData
				}).success(function (response, status, headers, config) {
					console.log(response);
					$("#modal-preloader").modal("hide");
					//$('body').addClass('loaded');
					$('#drTable > tbody').off('click', 'tr');
					$('#drTable > tbody').on('click', 'tr', function (e) {
						e.preventDefault();
						var id = $(this).find("td").html();
						ieid = id;
						window.location='<?=base_url_admin('lms/quiz/edit_form/'.$pelajaran->id.'/')?>'+ieid;
					});
					fnCallback(response);
				}).error(function (response, status, headers, config) {
					$("#modal-preloader").modal("hide");
					//console.log(response, response.responseText);
					//$('body').addClass('loaded');
					alert("Error");
				});
			},
	});
	$('.dataTables_filter input').attr('placeholder', 'Cari');
}
$("#bpertanyaan_tambah").on("click",function(e){
	e.preventDefault();
	//$("#modal_tambah").modal("show");
	window.location='<?=base_url_admin('lms/quiz/tambah_form/'.$pelajaran->id.'/')?>'+ieid;
});
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
				drTable.ajax.reload();
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
$("#modal_tambah").on("hidden.bs.modal",function(e){
	$("#ftambah").trigger('reset');
	for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].setData(''); }
});
$("#modal_tambah").on("shown.bs.modal",function(e){
	
});
$("#fedit").on("submit",function(e){
	e.preventDefault();
	for ( instance in CKEDITOR.instances ) { CKEDITOR.instances[instance].updateElement(); }
	var fd = new FormData($(this)[0]);
	var url = '<?php echo base_url('api_admin/lms/quiz/edit/'.$pelajaran->id); ?>';
	$.ajax({
		type: 'POST',
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			if(respon.status=="100" || respon.status == 100){
				$("#modal_edit").modal("hide");
				drTable.ajax.reload();
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
$("#modal_edit").on("hidden.bs.modal",function(e){
	$("#fedit").trigger('reset');
});
$("#modal_tambah").on("shown.bs.modal",function(e){
});

//hapus
$("#bhapus").on("click",function(e){
	e.preventDefault();
	if(ieid){
		var c = confirm('apakah anda yakin?');
		if(c){
			var url = '<?php echo base_url('api_admin/lms/quiz/hapus/'.$pelajaran->id.'/'); ?>'+ieid;
			$.get(url).done(function(response){
				if(response.status=="100" || response.status==100){
					gritter('<h4>Berhasil</h4><p>Data berhasil dihapus</p>','success');
				}else{
					gritter('<h4>Gagal</h4><p>'+response.message+'</p>','danger');
				}
				drTable.ajax.reload();
				$("#modal_edit").modal("hide");
			}).fail(function() {
				gritter('<h4>Error</h4><p>Proses penghapusan tidak bisa dilakukan, coba beberapa saat lagi</p>','danger');
			});
		}
	}
});

