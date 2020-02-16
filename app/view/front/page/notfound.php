<!DOCTYPE html>
<html class="no-js" lang="en">
	<?php $this->getThemeElement("page/html/head",$__forward); ?>
	<body>
		<?php $this->getThemeElement('page/html/header',$__forward); ?>
		<div class="container">
			<div class="row">
				<div id="error-container" class="col-md-12 text-center">
					<div class="card-product">
					<h1 class="animation-pulse"><i class="fa fa-exclamation-circle text-warning"></i> 404</h1>
					<h2 class="h3">Oops, halaman yang anda tuju tidak ditemukan..<br>Kembali ke <a href="<?php echo base_url(); ?>">halaman utama</a></h2>
					</div>
				</div>
			</div>
		</div>
		<?php $this->getThemeElement('page/html/footer',$__forward); ?>
		<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
		<?php $this->getJsFooter(); ?>
		<!-- Load and execute javascript code used only in this page -->
		<script>
			$(document).ready(function(e){
				  $(document).foundation();
				<?php $this->getJsReady(); ?>
			});
			<?php $this->getJsContent(); ?>
		</script>
	</body>
</html>