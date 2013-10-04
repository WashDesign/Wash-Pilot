<?php

/*
 * Title: Package Header
 * Description: Displays all of the <head> section and everything up till <div class="site-content">
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 */

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

		<!-- IE 10 Metro tile icon  -->
		<meta name="msapplication-TileColor" content="#FFFFFF">
		<meta name="msapplication-TileImage" content="assests/img/favicon-144.png">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="apple-touch-icon-precomposed" href="assests/img/favicon-152.png">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/main.css">

         <!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="assets/css/ie.css" />
		<![endif]-->

        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>

        <!-- more head info -->
        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

	<header class="site-header" role="banner">
		<div class="wrap grp">

			<?php //*** needs thinking about (logo etc) ?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>

			<?php //*** needs nav function ?>
			<nav class="primary-nav" role="navigation">
				<ul>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
				</ul>
			</nav>

		</div><!-- end wrap -->
	</header>

	<div class="site-content">