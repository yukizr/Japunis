$("#fedit_password").on("submit",function(e){
	e.preventDefault();
	var fnama = $("#ifnama").val();
	var email = $("#iemail").val();
	var fd = {};
	fd.email = email;
	fd.fnama = fnama;
	var url= '<?php echo base_url('profil/edit_api/')?>';
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
