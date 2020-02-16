$("#fedit_password").on("submit",function(e){
	e.preventDefault();
	var p1 = $("#ioldpassword").val();
	var p2 = $("#ipassword").val();
	var p3 = $("#irepassword").val();
	if(p1 == p2){
		alert("Password baru tidak boleh sama dengan password lama!");
		$("#ipassword").focus();
		return false;
	}
	if(p2 != p3){
		alert("Password baru tidak sama!");
		$("#ipassword").focus();
		return false;
	}
	var fd = {};
	fd.password = p2;
	fd.oldpassword = p1;
	var url= '<?php echo base_url('profil/edit_password_api/')?>';
	$.post(url,fd).done(function(dt){
		if(dt.status == '100' || dt.status == 100){
			alert('Berhasil');
			window.location = '<?php echo base_url('profil/'); ?>';
		}else{
			alert('Error: '+dt.message);
		}
	}).error(function(){
		alert('Error: Tidak dapat mengganti password sekarang, coba beberapa saat lagi');
	});
});
