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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- IE 10 Metro tile icon  -->
		<meta name="msapplication-TileColor" content="#FFFFFF">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-144.png">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-152.png">

    <?php wp_head(); ?>

		<!-- Respond -->
		<!--[if lt IE 9]>
			<script src="/assets/bower_components/respond/dest/respond.min.js"></script>
		<![endif]-->
		
		<!-- Selectivizr -->
		<!--[if (gte IE 6)&(lte IE 8)]>
			<script src="/assets/bower_components/selectivizr/selectivizr.js"></script>
		<![endif]-->

    </head>
    <body <?php body_class(); ?>>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

		<header class="site-header" role="banner">
			<div class="constrain grp">
	
				<div class="site-brand" itemscope itemtype="http://schema.org/Organization">
					<a class="site-brand__link" itemprop="url" href="<?php echo home_url(); ?>" rel="home">
						<h1 class="site-brand__heading vh" itemprop="name"><?php bloginfo( 'name'); ?></h1>
						<img class="site-brand__media" itemprop="logo" src="http://placehold.it/190x83" alt="<?php bloginfo( 'name'); ?>">
					</a>
				</div>
	
				<button id="js-btn--menu" class="btn btn--menu">Menu</button> 
				
				<nav id="js-nav--primary" class="nav nav--primary" role="navigation">
					<ul class="nav__tier nav__tier--1">
<?php
	// primary menu
	global $wash_head;

	$args = array(
		'numberposts' => -1,
		'post_type' => 'page',
		'post_parent' => 0,
		'exclude' => '2',
		'meta_query' => array(
			array(
				'key' => 'page_type',
				'value' => array(
					'primary'
					),
				'compare' => 'IN'
			)
		),
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);

	if ( $primary = get_posts( $args ) )
	{

		foreach ( $primary as $post )
		{

			setup_postdata( $post );

			$menuType = get_post_meta( $post->ID, 'page_type', true );

?>
						<li class="nav__item<?php if ( in_array( $post->ID, $wash_head['ancestors'] ) ) { echo ' is-current'; }  ?>">
							<a class="nav__link<?php if ( in_array( $post->ID, $wash_head['ancestors'] ) ) { echo ' is-active'; }  ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>					
<?php

		}
			
?>
						</li>
<?php

		wp_reset_postdata();
		
	}

?>
						</ul>
					</nav>
	
	
			</div>
		</header>
	
		<main class="site-main">
			<div class="site-content constrain grp">