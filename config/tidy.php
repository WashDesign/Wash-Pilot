<?php

/**
 * Title: Tidy Up File
 * Description: Includes all the functions for keeping WP tidy and secure
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

/** 2.  WP Tidy Up
  *
  * 2.1 Version
  * 2.2 Head
  * 2.3 Code         //*** some of these may belong in functions
  * 2.4 Comments
  * 2.5 Other        //*** some of these may belong in functions
  *
  **/

  // ===============
  // = 2.1 Version =
  // ===============

/**
  * Run a cleanup on versioning info in head
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_version_cleanup() {

	// WP version
	remove_action( 'wp_head', 'wp_generator' );

}

add_action('init', 'wash_version_cleanup');

/**
  * Run a cleanup on rss versioning
  *
  * @return - blank
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_rss_version() {

	return '';

}

add_filter('the_generator', 'wash_rss_version');

/**
  * Run a cleanup on versioning
  * info from css scripts
  *
  * @return - src stripped of ver
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_remove_wp_ver_css_js( $src ) {

    if ( strpos( $src, 'ver=' ) ) {

        $src = remove_query_arg( 'ver', $src );

    }

    return $src;
}

add_filter( 'script_loader_src', 'wash_remove_wp_ver_css_js', 9999 );
add_filter( 'style_loader_src',  'wash_remove_wp_ver_css_js', 9999 );

  // ============
  // = 2.2 Head =
  // ============

/**
  * Run a cleanup on the head
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_head_cleanup() {

	// category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );

	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );

	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// index link
	remove_action( 'wp_head', 'index_rel_link' );

	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

}

  // ============
  // = 2.3 Code =
  // ============

/**
  * Unset the default WordPress list pages current class
  * and replace with a more useful version
  *
  * @param content
  * @return stripped content
  * @author lewis
  *
  */

function strip_non_current_classes( $content ) {

    $pattern = '# class=(\'|")([-\w ]+)(\'|")#';
    $needle = 'current_page_';
    $cls_rplcmt_val = 'current';
    preg_match_all( $pattern, $content, $class_attrs );
    $num_class_attrs = ( isset( $class_attrs ) ) ? count( $class_attrs[0] ) : 0;

    for ( $i = 0; $i < $num_class_attrs; $i++ ) {

        if ( strpos( $class_attrs[2][$i], $needle ) === false ) {

            $content = preg_replace( "#{$class_attrs[0][$i]}#", '', $content );

        } else {

            $content = preg_replace( "#{$class_attrs[0][$i]}#", " class={$class_attrs[1][$i]}$cls_rplcmt_val{$class_attrs[3][$i]}", $content );

        }

    }

	$content = preg_replace( '/title=\"(.*?)\"/', '', $content );

    return $content;

}

add_action( 'wp_list_pages', 'strip_non_current_classes' );

/**
  * Unset the default WordPress list pages current class
  * and replace with a more useful version
  *
  * @param content
  * @return stripped content
  * @author lewis
  *
  */

function strip_non_current_classes_cat( $content ) {

    $pattern = '# class=(\'|")([-\w ]+)(\'|")#';
    $needle = 'current-cat';
    $cls_rplcmt_val = 'current';
    preg_match_all( $pattern, $content, $class_attrs );
    $num_class_attrs = ( isset( $class_attrs ) ) ? count( $class_attrs[0] ) : 0;

    for ( $i = 0; $i < $num_class_attrs; $i++ ) {

        if ( strpos( $class_attrs[2][$i], $needle ) === false ) {

            $content = preg_replace( "#{$class_attrs[0][$i]}#", '', $content );

        } else {

            $content = preg_replace( "#{$class_attrs[0][$i]}#", " class={$class_attrs[1][$i]}$cls_rplcmt_val{$class_attrs[3][$i]}", $content );

        }

    }

	$content = preg_replace( '/title=\"(.*?)\"/', '', $content );

    return $content;

}

add_action( 'wp_list_categories', 'strip_non_current_classes_cat' );


/**
  * Remove the <p> from around <img>
  *
  * @param content
  * @return stripped content
  * @author bones extract
  * @editor lewis
  *
  */

function wash_filter_ptags_on_images( $content ) {

   return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );

}

add_filter('the_content', 'wash_filter_ptags_on_images');


/**
  * Improve the Excerpt More Link
  *
  * @param more link
  * @return new more link
  * @author bones extract
  * @author lewis
  *
  */

function wash_excerpt( $text ) {

	global $post;

	return '&hellip;  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="Read ' . get_the_title($post->ID).'">Read more &raquo;</a>';
	return str_replace('[...]', '<a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="Read ' . get_the_title($post->ID).'">Read more &raquo;</a>', $text);

}

add_filter('excerpt_more', 'wash_excerpt');

/**
  * Adds attributes to Next posts link
  *
  * @return HTML
  * @author Lewis Carey
  **/

function posts_next_link_attributes() {

 return 'class="links-next"';

}

add_filter( 'next_posts_link_attributes', 'posts_next_link_attributes' );

/**
  * Adds attributes to Prev posts link
  *
  * @return HTML
  * @author lewis
  *
  **/

function posts_previous_link_attributes() {

	return 'class="links-prev"';

}

add_filter( 'previous_posts_link_attributes', 'posts_previous_link_attributes' );

/**
  * Unset the default WP body classes
  * and replace with a more useful version
  *
  * @return body class array
  * @author lewis
  *
  **/

function wash_body_classes() {

	global $wp_query, $wpdb, $fpt_head;

	$post_id = $wp_query->get_queried_object_id();
	$post = $wp_query->get_queried_object();

	if( is_404() ) {

		$classes[] = '404';
		$classes[] = 'home';

	}

	if( is_front_page() ) {

		$classes[] = 'front';
		$classes[] = 'home';

	}

	if( is_home() ) {

		$classes[] = 'news';
		$classes[] = 'home';

	}

	if( is_search() ) {

		$classes[] = 'search';

	}

	if( is_single() ) {

		$classes[] =  $post->post_type;
		$classes[] = 'single';

	}

	if( is_category() ) {

		$classes[] = 'category';

	}

	if( is_date() ) {

		$classes[] = 'date';
	}

	if ( is_tag() ) {

		$term = $wp_query->get_queried_object();

		$classes[] = 'tag';
		$classes[] = $term->taxonomy;

	}

	if ( ( is_page() ) && ( ! is_front_page() ) ) {

		if ( $post->post_parent == 0 ) {

			$classes[] = 'section';
			$classes[] = 'page';

		} else {

			$classes[] = 'page';

		}

		$ancestors = get_post_ancestors( $post_id );

		if ( is_array( $ancestors ) ) {

			$classes[] = get_field( 'page_type', end( $ancestors ) );
			$the_parent = get_post( end( $ancestors ) );
			$classes[] = $the_parent->post_name;

		} else {

			$classes[] = get_field( 'page_type', $post_id );

		}


	}

	if ( is_user_logged_in() ) {

		$classes[] = 'has-admin-bar';

	}

	$classes[] = $post->post_name;

	return $classes;

}


  // ================
  // = 2.4 Comments =
  // ================

/**
  * Remove injected CSS for recent comments
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

// remove injected CSS for recent comments widget
function wash_remove_wp_widget_recent_comments_style() {

   if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {

	   remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );

   }

}

/**
  * Remove injected CSS for recent comments widget
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_remove_recent_comments_style() {

  global $wp_widget_factory;

  if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {

    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );

  }

}

add_action('wp_head', 'wash_remove_recent_comments_style', 1);

  // =============
  // = 2.5 Other =
  // =============

/**
  * Remove injected CSS from gallery
  *
  * @author - bones extract
  * @editor - lewis
  *
  */

function wash_gallery_style( $css ) {

  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);

}

add_filter('gallery_style', 'wash_gallery_style');