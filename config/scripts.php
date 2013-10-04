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

	if ( !is_admin() ) {

		wp_register_script( 'wash-js-modernizr',    get_stylesheet_directory_uri() . '/assets/js/inc/modernizr-2.6.2.min.js',   array(), false, false );
		wp_register_script( 'wash-js-flexslider',   get_stylesheet_directory_uri() . '/assets/js/inc/jquery.flexslider.min.js', array(), false, true  );
		wp_register_script( 'wash-js-main',   		get_stylesheet_directory_uri() . '/assets/js/main.js', 					    array(), false, true  );

		wp_deregister_script( 'jquery' );

	    wp_enqueue_script( 'wash-js-modernizr' );
	    wp_enqueue_script( 'wash-js-flexslider' );
	    wp_enqueue_script( 'wash-js-main' );

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