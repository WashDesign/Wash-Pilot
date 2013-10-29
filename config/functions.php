<?php

/**
 * Title: Functions Function File
 * Description: Includes all the useful functions for the site
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

/** 6.  Functions
  *
  * 6.1 Init
  * 6.2 Menus
  * 6.3 Navigation
  * 6.4 Content
  * 6.5 Utilities
  *
  **/

  // ===============
  // = 6.1 Init =
  // ===============


/**
  * Ancestor Array
  *
  * @author forepoint extract
  * @editor lewis
  *
  */
function wash_head() {

	global $post;
	global $wash_head;

	// get homepage id & postpage id
	$front_page_id = get_option( 'page_on_front' );
	$posts_page_id = get_option( 'page_for_posts' );

	// if post
	if ( ( get_post_type() == 'post' ) && ( is_home() || is_category() || is_tag() || is_single() || is_archive() ) ) {

		$wash_head['ancestors']   = get_post_ancestors( $posts_page_id );
		$wash_head['ancestors']   = array_reverse( $wash_head['ancestors'] );
		$wash_head['ancestors'][] = $posts_page_id;

	// if homepage
	} elseif ( is_front_page() ) {

		$wash_head['ancestors']   = get_post_ancestors( $front_page_id );
		$wash_head['ancestors']   = array_reverse( $wash_head['ancestors'] );
		$wash_head['ancestors'][] = $front_page_id;

	// if page
	} else {

		$wash_head['page-type']   = get_field( 'page_type' );
		$wash_head['ancestors']   = get_post_ancestors( $post->ID );
		//reverse array so it's in a logical order
		$wash_head['ancestors']   = array_reverse( $wash_head['ancestors'] );
		$wash_head['ancestors'][] = $post->ID;

	}

}

add_action( 'wp_head'. 'wash_head' );


  // =============
  // = 6.2 MENUS =
  // =============

/**
  * Primary Menu
  *
  * @author lewis
  *
  */

function wash_primary_menu() {

}

/**
  * Secondary Menu
  *
  * @author lewis
  *
  */

function wash_secondary_menu() {

}

/**
  * Supporting Menu
  *
  * @author lewis
  *
  */

function wash_supporting_menu() {

}


/**
  * Sub Nav Menu ( Parent > Child )
  *
  * @author lewis
  *
  */

function wash_subnav_menu() {

}


/**
  * Tree Menu ( Parent > Child )
  *
  * @author lewis
  *
  */

function wash_tree_menu() {

}


  // ==================
  // = 6.3 NAVIGATION =
  // ==================

/**
  * Next & Previous Page
  *
  * @author lewis
  *
  */

function wash_nextprev_page_nav() {

}


/**
  * Pagination
  *
  * @author lewis
  *
  */

function wash_pagination_nav() {

}


/**
  * Next & Prev Post
  *
  * @author lewis
  *
  */

function wash_nextprev_post_nav() {

}

  // ===============
  // = 6.4 CONTENT =
  // ===============

/**
  * Breadcrumb
  *
  * @author lewis
  *
  */

function wash_breadcrumb() {

}


  // ================
  // = 6.5 UTILTIES =
  // ================

/**
  * Colors
  *
  * @author lewis
  *
  */

function wash_color_util() {

}
