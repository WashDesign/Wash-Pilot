<?php

/**
 * Title: CMS File
 * Description: Core configuration for the CMS
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

/** 1.  CMS
  *
  * 1.1 Login
  * 1.2 Dashboard
  * 1.3 Footer
  * 1.4 Users
  * 1.5 TinyMCE
  *
  **/

  // =============
  // = 1.1 Login =
  // =============


/**
  * Enqueue the custom login css
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_login_css() {

	wp_enqueue_style( 'wash_login_css', get_template_directory_uri() . '/config/style.css', false );

}

add_action( 'login_enqueue_scripts', 'wash_login_css', 10 );

/**
  * Update the logo link from WP to site
  *
  * @return - home url
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_login_url() {

	return home_url();

}

add_filter( 'login_headerurl', 'wash_login_url' );

/**
  * Update the title tag from WP to site
  *
  * @return - site name
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_login_title() {

	return get_option('blogname');

}

add_filter( 'login_headertitle', 'wash_login_title' );


  // =================
  // = 1.2 Dashboard =
  // =================


/**
  * Disable default widgets
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function disable_default_dashboard_widgets() {

	// remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

}

add_action('admin_menu', 'disable_default_dashboard_widgets');


  // ==============
  // = 1.3 Footer =
  // ==============

/**
  * Add a snippet of text to the admin footer
  *
  * @return - wash credit
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_custom_admin_footer() {

	echo '<span id="footer-thankyou">Developed by <a href="http://wash-design.co.uk" target="_blank">Wash</a></span>.';

}

add_filter('admin_footer_text', 'wash_custom_admin_footer');


  // =================
  // = 1.4 User Role =
  // =================

/**
  * Add our default user role
  *
  * @author - lewis
  *
  */

function create_site_manager_user_role() {

	$result = add_role(

		'site_manager',
		'Site Manager',
		array(

			'activate_plugins'  	=> false,
			'delete_others_pages'	=> true,
			'delete_others_posts'	=> true,
			'delete_pages'		  	=> true,
			'delete_plugins'		=> false,
			'delete_posts'		  	=> true,
			'delete_private_pages'  => true,
			'delete_private_posts'  => true,
			'delete_published_pages'=> true,
			'delete_published_posts'=> true,
			'edit_dashboard'	  	=> false,
			'edit_files'		  	=> true,
			'edit_others_pages'	  	=> true,
			'edit_others_posts'	  	=> true,
			'edit_pages'		  	=> true,
			'edit_posts'		  	=> true,
			'edit_private_pages'  	=> true,
			'edit_private_posts'  	=> true,
			'edit_published_pages' 	=> true,
			'edit_published_posts' 	=> true,
			'edit_theme_options'  	=> false,
			'export'			  	=> false,
			'import'			  	=> false,
			'list_users'		  	=> true,
			'manage_categories'	  	=> true,
			'manage_links'		  	=> true,
			'manage_options'	  	=> true,
			'moderate_comments'	  	=> true,
			'promote_users'		  	=> true,
			'publish_pages'		  	=> true,
			'publish_posts'		  	=> true,
			'read_private_pages'  	=> true,
			'read_private_posts'  	=> true,
			'read'				  	=> true,
			'remove_users'		  	=> true,
			'switch_themes'		  	=> false,
			'upload_files'		  	=> true,
			'create_product'	  	=> true,
			'update_core'		  	=> false,
			'update_plugins'	  	=> false,
			'update_themes'		  	=> false,
			'install_plugins'	  	=> false,
			'install_themes'	  	=> false,
			'delete_themes'		  	=> false,
			'edit_plugins'		  	=> false,
			'edit_themes'		  	=> false,
			'edit_users'		  	=> true,
			'create_users'		  	=> true,
			'delete_users'		  	=> true,
			'unfiltered_html'	  	=> true

		)

	);

}

add_action( 'admin_init', 'create_site_manager_user_role' );


  // ===============
  // = 1.5 TinyMCE =
  // ===============

/**
  * Adds our default CSS classes
  * to the TinyMCE editor style selector
  *
  * @param - mixed init array
  * @returns - CSS class array
  * @author - lewis
  *
  */

function wash_tinymce_classes( $init ) {

	// global $init;

	$temp = $init['theme_advanced_styles'];

	$classes = array(

		'intro-text' => 'Intro Text'

	);

	foreach( $classes as $css=>$name ) {

		$temp .= $name.'='.$css.';';

	}

	$init['theme_advanced_styles'] .= rtrim( $temp, ';' );

	return $init;

}

//add_filter('tiny_mce_before_init', 'wash_tinymce_classes');
