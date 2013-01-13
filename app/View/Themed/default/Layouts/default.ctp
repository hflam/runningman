<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo Configure::read('App.name'); ?>: <?php echo $title_for_layout; ?></title>
	<meta name="description" content="<?php echo Configure::read('App.description'); ?>">
	<meta name="author" content="<?php echo Configure::read('App.author'); ?>">
<?php echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php echo $this->AssetRenderer->render('head'); ?>
	<?php echo $scripts_for_layout; ?>
	<?php echo $this->AssetRenderer->render('headBottom'); ?>
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>

	<?php echo $content_for_layout; ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>