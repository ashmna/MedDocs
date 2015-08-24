<?php
use MD\Helpers\App;
use MD\Helpers\Config;
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<title><?= Config::getInstance()->partnerName ?></title>

	<link rel="icon" href="/img/favicon.ico">
<?php if(App::isLoggedUser()) { ?>
	<link rel="stylesheet" type="text/css" href="/style.css"/>
	<link rel="stylesheet" type="text/css" href="/global/css/datepicker/bootstrap-datepicker3.css">
	<?php if (Config::getInstance()->environment == 'development') { ?>

	<?php } else { ?>

	<?php } ?>

	<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="/global/js/html5shiv.js"></script>
		<script src="/global/js/respond.min.js"></script>
	<![endif]-->
<?php } else { ?>
	<!-- Error CSS -->
	<link href="/global/css/login.css" rel="stylesheet" media="screen">

	<!-- Animate CSS -->
	<link href="/global/css/animate.css" rel="stylesheet" media="screen">

	<!-- Font Awesome -->
	<link href="/global/fonts/font-awesome.min.css" rel="stylesheet">
<?php } ?>
	<script src="/global/bower_components/angular/angular.js"></script>
</head>
<body>
