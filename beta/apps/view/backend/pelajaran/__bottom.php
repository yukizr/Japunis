</div>
<script src="<?php echo base_url('assets/js/vendor/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/foundation.min.js'); ?>"></script> 
<script>
$("#tdata").delegate("#adelete","click",function(event){
	event.preventDefault();
	var id = $(this).attr("data-id");
	var x = confirm("Apakah anda yakin?");
	if(x){
		// NProgress.start();
		// var url = "<?php echo base_url("admin/pelajaran/delete/".$h->id); ?>"+id;
		var url = "<?php echo base_url("admin/pelajaran/delete/".$h->id); ?>"+id;
		console.log(url);
		$.get(url,function(data){
			window.location = "<?php echo base_url("admin/pelajaran"); ?>";
			alert("Berhasil Dihapus");
			// NProgress.done();
		});
	}
});
</script>