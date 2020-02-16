var close_button = '<a href="#" class="close">&times;</a>';
$("#flogin").on("submit",function(evt){
	evt.preventDefault();
	var url = '<?php echo base_url('login/auth'); ?>';
	var fdata = $(this).serialize();
	$.post(url,fdata).done(function(data){
		if(data.status=="100"){
			$("#flogin_info").html('<strong>Login Berhasil</strong> Silakan tunggu...'+close_button);
			$("#flogin_info").slideDown("slow");
			setTimeout(function (){
				window.location = data.result.redirect_url;
			},3000);
		}
		if(data.status=="199"){
			$("#flogin_info").html('Email atau Password Salah'+close_button);
			$("#flogin_info").slideDown("slow");
		}
		}).fail(function(err){
		$("#flogin_info").html('<strong>Login Gagal</strong> Saat ini tidak bisa login dulu, silakan coba beberapa saat lagi'+close_button);
		$("#flogin_info").slideDown("slow");
	});
});