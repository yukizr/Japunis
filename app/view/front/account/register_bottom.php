var close_button = '<a href="#" class="close">&times;</a>';
$("#fregister").on("submit",function(evt){
	evt.preventDefault();
	$("#fregister_info").hide();
	$("#ipassword").removeClass('input-error');
	$("#irepassword").removeClass('input-error');
	var url = '<?php echo base_url('daftar/proses'); ?>';
	var fdata = $(this).serialize();
	
	var p1 = $("#ipassword").val();
	var p2 = $("#irepassword").val();
	if(p1.length > 4){
	}else{
		$("#fregister_info").html('<strong>Daftar Gagal</strong> Password terlalu pendek'+close_button);
		$("#fregister_info").slideDown("slow");
		$("#irepassword").focus();
		$("#ipassword").addClass('input-error');
		return false;
	}
	if(p1 != p2){
		$("#fregister_info").html('<strong>Daftar Gagal</strong> Password tidak sama, silakan periksa kembali'+close_button);
		$("#fregister_info").slideDown("slow");
		$("#irepassword").focus();
		$("#ipassword").addClass('input-error');
		$("#irepassword").addClass('input-error');
		return false;
	}
	
	$.post(url,fdata).done(function(data){
		if(data.status=="100"){
			$("#fregister_info").html('<strong>Daftar Berhasil</strong> Silakan tunggu...'+close_button);
			$("#fregister_info").slideDown("slow");
			setTimeout(function (){
				window.location = data.result.redirect_url;
			},3000);
		}else{
				$("#fregister_info").html('<strong>Daftar Gagal</strong> '+data.message+''+close_button);
				$("#fregister_info").slideDown("slow");
			}
		}).fail(function(err){
		$("#fregister_info").html('<strong>Daftar Gagal</strong> Saat ini tidak bisa daftar dulu, silakan coba beberapa saat lagi'+close_button);
		$("#fregister_info").slideDown("slow");
	});
});