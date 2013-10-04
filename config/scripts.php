<?php

/**
  * Title: Scripts
  * Description: For enqueing scripts
  * Author: Wash
  * Date: September 2013
  * Package: FlightDeck
  **/

/** 4.  Scripts
  *
  * 4.1 Enqueue Scripts
  * 4.2 Enqueue Styles
  *
  **/


  // =======================
  // = 4.1 Enqueue Scripts =
  // =======================

/**
  * Register and Enqueue Scripts
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_scripts() {

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if ( !is_admin() ) {

		wp_register_script( 'wash-modernizr-js',   get_stylesheet_directory_uri() . '/assets/js/inc/modernizr.custom.min.js', array(), '2.5.3', false );
		wp_register_script( 'wash-flexslider-js',  get_stylesheet_directory_uri() . '/assets/js/inc/jquery.flexslider.js', array(), '2', true );
		wp_register_script( 'wash-accord-menu-js', get_stylesheet_directory_uri() . '/assets/js/inc/jquery.accord-menu.js', array(), '2', true );
		wp_register_script( 'wash-isotope-js', get_stylesheet_directory_uri() . '/assets/js/inc/jquery.isotope.js', array(), '1.5', true );
		wp_register_script( 'wash-cookie-js',  get_stylesheet_directory_uri() . '/assets/js/inc/jquery.cookie.js', array(), '', true );
	    wp_register_script( 'wash-scripts-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'jquery' );
	    wp_enqueue_script( 'wash-modernizr-js' );
		wp_enqueue_script( 'wash-flexslider-js');
		wp_enqueue_script( 'wash-accord-menu-js');
		wp_enqueue_script( 'wash-isotope-js');
		wp_enqueue_script( 'wash-cookie-js');
	    wp_enqueue_script( 'wash-scripts-js' );

		if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {

			wp_enqueue_script( 'comment-reply' ); // comment reply script for threaded comments

		}

	}

}

add_action('wp_enqueue_scripts', 'wash_scripts', 999);

  // ======================
  // = 4.2 Enqueue Styles =
  // ======================

/**
  * Register and Enqueue Styles
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_styles() {

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if ( !is_admin() ) {

		wp_register_style( 'wash-styles',   get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
		wp_register_style( 'wash-ie-style', get_stylesheet_directory_uri() . '/assets/css/ie.css', array(), '' );

		$wp_styles->add_data( 'wash-ie-style', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

	    wp_enqueue_style(  'wash-styles' );
	    wp_enqueue_style(  'wash-ie-style');

	}

}

add_action('wp_enqueue_scripts', 'wash_styles', 999);

?>