<!DOCTYPE html>
<html class="no-js" lang="en">
	<?php $this->getThemeElement("page/html/head",$__forward); ?>
	<body>
		<?php $this->getThemeElement('page/html/header',$__forward); ?>
		<div class="container">
			<?php $this->getThemeContent(); ?>
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