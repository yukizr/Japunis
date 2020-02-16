</div>
<!--//end of container//-->
	<script src="<?php echo base_url('assets/js/vendor/jquery.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/foundation.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/foundation/foundation.abide.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/foundation/foundation.topbar.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/foundation/foundation.section.js'); ?>"></script>
  <script>
    $(document).foundation();
		Foundation.utils.image_loaded($('img'), function(){
		});
    function goBack() {
    window.history.back();
    }
		// $('#fregister')
  	// .on('invalid.fndtn.abide', function () {
    // 	var invalid_fields = $(this).find('[data-invalid]');
    // 	console.log(invalid_fields);
  	// })
  	// .on('valid.fndtn.abide', function () {
	  //   console.log('valid!');
	  // });
  </script>
