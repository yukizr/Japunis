var growlPesan = '<h4>Error</h4><p>Tidak dapat diproses, silakan coba beberapa saat lagi!</p>';
var growlType = 'danger';
var drTable = {};
var ieid = 0;
App.datatables();
function gritter(pesan,jenis='info'){
	$.bootstrapGrowl(pesan, {
		type: jenis,
		delay: 2500,
		allow_dismiss: true
	});
}
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
			"sAjaxSource"		: "<?php  echo base_url("api_admin/akun/siswa/"); ?>",
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
						$("#modal_pilihan").modal("show");
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
$("#aedit_password").on("click",function(e){
	e.preventDefault();
	$("#modal_pilihan").modal("hide");
	setTimeout(function(){
		$("#modal_edit_password").modal("show");
	},333);
});
$("#fedit_password").on("submit",function(e){
	e.preventDefault();
	
	var p1 = $("#iganti_password").val();
	var p2 = $("#iganti_repassword").val();
	if(p1 != p2){
		gritter('Password tidak sama','info');
		$("#iganti_password").focus();
		return false;
	}	
	
	var fd = new FormData($(this)[0]);
	var url = '<?php echo base_url("api_admin/akun/siswa/edit_password/"); ?>'+ieid;
	$.ajax({
		type: $(this).attr('method'),
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			if(respon.status=="100" || respon.status == 100){
				gritter('Password berhasil diganti','success');
				$("#modal_edit_password").modal("hide");
			}else{
				gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
			}
		},
		error:function(){
			gritter('<h4>Error</h4><p>Proses tambah data tidak bisa dilakukan, coba beberapa saat lagi</p>','warning');
		}
	});
});
$("#atambah").on("click",function(e){
	e.preventDefault();
	$("#modal_tambah").modal("show");
});
$("#modal_tambah").on("shown.bs.modal",function(e){
	//
});
$("#modal_tambah").on("hidden.bs.modal",function(e){
	$("#modal_tambah").find("form").trigger("reset");
});

$("#ftambah").on("submit",function(e){
	e.preventDefault();
	var fd = new FormData($(this)[0]);
	var url = '<?php echo base_url("api_admin/akun/siswa/tambah/"); ?>';
	$.ajax({
		type: $(this).attr('method'),
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			if(respon.status=="100" || respon.status == 100){
				growlPesan = '<h4>Berhasil</h4><p>Proses tambah data telah berhasil!</p>';
				drTable.ajax.reload();
				growlType = 'success';
				$("#modal_tambah").modal("hide");
			}else{
				growlPesan = '<h4>Gagal</h4><p>'+respon.message+'</p>';
			}
			setTimeout(function(){
				$.bootstrapGrowl(growlPesan, {
					type: growlType,
					delay: 2500,
					allow_dismiss: true
				});
			}, 666);
		},
		error:function(){
			growlPesan = '<h4>Error</h4><p>Proses tambah data tidak bisa dilakukan, coba beberapa saat lagi</p>';
			growlType = 'warning';
			setTimeout(function(){
				$.bootstrapGrowl(growlPesan, {
					type: growlType,
					delay: 2500,
					allow_dismiss: true
				});
			}, 666);
			return false;
		}
	});

});



//edit
$("#aedit").on("click",function(e){
	e.preventDefault();
	$("#modal_pilihan").modal("hide");
	setTimeout(function(){
		$("#modal_edit").modal("show");
	},333);
});
$("#modal_edit").on("shown.bs.modal",function(e){
	var url = '<?php echo base_url(); ?>api_admin/akun/siswa/detail/'+ieid;
	$.get(url).done(function(response){
		if(response.status==100 || response.status=='100'){
			var dta = response.result;
			//input nilai awal
			$("#ieid").val(dta.id);
			$("#ieemail").val(dta.email);
			$("#iefnama").val(dta.fnama);
			$("#iekelas").val(dta.kelas);
			$("#ieis_active").val(dta.is_active);
			$("#modal_edit").modal("show");
		}else{
			growlType = 'info';
			growlPesan = '<h4>Error</h4><p>Tidak dapat mengambil detail data</p>';
			$.bootstrapGrowl(growlPesan, {
				type: growlType,
				delay: 2500,
				allow_dismiss: true
			});
		}
	});
});
$("#modal_edit").on("hidden.bs.modal",function(e){
	$("#modal_edit").find("form").trigger("reset");
});
$("#fedit").on("submit",function(e){
	e.preventDefault();
	var fd = new FormData($(this)[0]);
	var url = '<?php echo base_url("api_admin/akun/siswa/edit/"); ?>'+ieid;
	$.ajax({
		type: $(this).attr('method'),
		url: url,
		data: fd,
		processData: false,
		contentType: false,
		success: function(respon){
			if(respon.status=="100" || respon.status == 100){
				gritter('<h4>Berhasil</h4><p>Proses ubah data telah berhasil!</p>','success');
				drTable.ajax.reload();
				$("#modal_edit").modal("hide");
			}else{
				gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
			}
		},
		error:function(){
			gritter('<h4>Error</h4><p>Proses ubah data tidak bisa dilakukan, coba beberapa saat lagi</p>','warning');
			return false;
		}
	});
});

//hapus
$("#bhapus").on("click",function(e){
	e.preventDefault();
	<?php 
		//ambil hidden id dari form
	?>
	var id = eval($("#ieid").val());
	if(ieid){
		var c = confirm('apakah anda yakin?');
		if(c){
			var url = '<?php echo base_url('api_admin/akun/siswa/hapus/'); ?>'+ieid;
			$.get(url).done(function(response){
				$("#modal_edit").modal("hide");
				$("#modal_pilihan").modal("hide");
				if(response.status=="100" || response.status==100){
					gritter( '<h4>Berhasil</h4><p>Data berhasil dihapus</p>','success');
				}else{
					gritter('<h4>Gagal</h4><p>'+respon.message+'</p>','danger');
				}
				drTable.ajax.reload();
			}).fail(function() {
				gritter('<h4>Error</h4><p>Proses ubah data tidak bisa dilakukan, coba beberapa saat lagi</p>','warning');
				return false;
			});
		}
	}
});

$("#adetail").on("click",function(e){
	e.preventDefault();
	window.location = '<?php echo base_url_admin('akun/siswa/detail/'); ?>'+ieid;
});