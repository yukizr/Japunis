	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<title><?php echo $this->getTitle(); ?></title>
		
		<meta name="description" content="<?php echo $this->getDescription(); ?>">
		<meta name="keyword" content="<?php echo $this->getKeyword(); ?>"/>
		<meta name="author" content="<?php echo $this->getAuthor(); ?>">
		<meta name="robots" content="<?php echo $this->getRobots(); ?>" />
		
		<!-- Icons -->
		<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
		<link rel="icon" href="<?php echo $this->skins->admin; ?>img/favicon.png">
		<link rel="shortcut icon" href="<?php echo $this->skins->admin; ?>img/favicon.png">
		<!-- END Icons -->
		
		<!-- Stylesheets -->
		<!-- END Stylesheets -->
		
		<?php $this->getAdditionalBefore(); ?>
		<?php $this->getAdditional(); ?>
		<?php $this->getAdditionalAfter(); ?>

		<!-- Anal -->
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115614181-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-115614181-1');
		</script>

		
		<!-- Modernizr (browser feature detection library) -->
		<script src="<?php echo $this->skins->admin; ?>js/vendor/modernizr.min.js"></script>
		
	</head>
	