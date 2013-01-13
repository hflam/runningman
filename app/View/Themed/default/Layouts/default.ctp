<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo Configure::read('App.name'); ?>: <?php echo $title_for_layout; ?></title>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <?php echo $this->AssetRenderer->render('ie'); ?>
    <![endif]-->
    <?php echo $this->AssetRenderer->render('head'); // required js and css ?>
    <?php echo $this->AssetRenderer->render('headBottom'); // jsHelpers for AutoAsset ?>
    <?php echo $scripts_for_layout; ?>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <?php echo $this->element('Layouts/default/navbar'); ?>
        </div>
    </div>
</div>

<div class="container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $content_for_layout; ?>
</div>
<?php echo $this->AssetRenderer->render(); // async assets ?>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>