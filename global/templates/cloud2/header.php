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
		<link rel="stylesheet" type="text/css" href="/global/bower_components/jquery-ui/themes/start/jquery-ui.min.css">
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

		<!-- Font Awesome -->
		<link href="/global/bower_components/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<!-- Animate CSS -->
		<link href="/global/css/animate.css" rel="stylesheet" media="screen">
	<?php } ?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/global/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="/global/bower_components/angular/angular.js"></script>
	<!--
        <link href='/global/bower_components/fullcalendar/dist/fullcalendar.min.css' rel='stylesheet' />
        <link href='/global/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link href='/global/bower_components/fullcalendar-scheduler/dist/scheduler.min.css' rel='stylesheet' />
    -->


</head>
<body>