<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<link rel="dns-prefetch" href="//ajax.googleapis.com" />
		<link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo is_null($this->title)?'xBoilerplate':$this->title; ?></title>
		<meta name="description" content="<?php echo is_null($this->title)?'xBoilerplate':$this->title; ?>">
		<meta name="keywords" content="<?php echo is_null($this->title)?'xBoilerplate':$this->title; ?>" />
		<meta name="author" content="Nicolas Ruflin">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="<?php echo $this->img(); ?>favicon.ico">
		<link type="text/css" rel="stylesheet" href="<?php echo $this->css(); ?>reset.css">
		<link type="text/css" rel="stylesheet" href="<?php echo $this->css(); ?>style.css">
		<?php echo $this->loadPageCss(); ?>

		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js"></script>
		<script>window.Modernizr || document.write('<script src="<?php echo $this->js(); ?>libs/modernizr-2.5.3.min.js"><\/script>')</script>

		<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo $this->js(); ?>libs/selectivizr-1.0.2.min.js"></script>
		<![endif]-->
	</head>
	<body>