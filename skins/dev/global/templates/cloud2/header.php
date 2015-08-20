<?php
use MD\Helpers\Config;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= Config::getInstance()->partnerName ?></title>

	<link rel="icon" href="/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/style.css"/>

	<?php if (Config::getInstance()->environment == 'development') { ?>

	<?php } else { ?>

	<?php } ?>

	<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="/global/js/html5shiv.js"></script>
		<script src="/global/js/respond.min.js"></script>
	<![endif]-->
	<script src="/global/bower_components/angular/angular.js"></script>
</head>
<body>