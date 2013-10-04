<?php

/**
 * Title: Functions Theme File
 * Description: Includes all the theme configuration and bespoke elements to create the site
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

/** 3.  Theme Config
  *
  * 3.1 Support - thumbnails, sidebars, post formats
  * 3.2 Custom Posts Types
  * 3.3 Taxonomies
  * 3.4 Meta Boxes
  * 3.5 Image Sizes
  *
  **/


  // ===============
  // = 3.1 Support =
  // ===============

/**
  * Add theme support and setup
  *
  * @author lewis
  *
  */

function wash_theme_setup() {

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5' );

	if ( function_exists( "register_options_page" ) ) {

	    register_options_page('Site Options');
	    register_options_page('Company Information');

	}

}

add_action('after_setup_theme', 'wash_theme_setup');


  // =========================
  // = 3.2 Custom Post Types =
  // =========================

/**
  * Register Custom Post Types
  *
  * @author lewis
  *
  */

function defineCustomPostTypes() {

	register_post_type(
		'CPT',
		array(

			'label' => __('CPT'),
			'singular_label' => 'CPT',
			'labels' => array(
				'name' => 'CPT',
				'singular_name' => 'CPT',
				'add_new' => 'Add CPT',
				'add_new_item' => 'Add New CPT',
				'edit_item' => 'Edit CPT Post',
				'new_item' => 'New CPT Post',
				'view_item' => 'View CPTs',
				'search_items' => 'Search CPTs',
				'not_found' =>  'No CPTs found',
				'not_found_in_trash' => 'No CPTs found in Trash',
				'parent_item_colon' => '',
				'menu_name' => 'CPT'
			),
			'description' => 'CPT',
			'public' => true,
			'show_ui' => true,
			'supports' => array(

				'title',
				'thumbnail',
				'excerpt',
				'editor'

			),
			'taxonomies' => array(

				'CT'

			),
			'rewrite' => true
		)
	);

}

//add_action('init', 'defineCustomPostTypes');


  // =========================
  // = 3.3 Custom Taxonomies =
  // =========================

/**
  * Register Custom Taxonomies
  *
  * @author lewis
  *
  */

function defineTaxonomies() {

	register_taxonomy(

		'CT',
		array(
			'CPT'
		),
		array(
			'hierarchical' => true,
			'labels' =>
			array(
				'name' => 'CT',
				'singular_name' => 'CT',
				'search_items' =>  'Search CTs',
				'all_items' => 'All CTs',
				'parent_item' => 'Parent CT',
				'parent_item_colon' => 'Parent CT:',
				'edit_item' => 'Edit CT',
				'update_item' => 'Update CT',
				'add_new_item' => 'Add New CT',
				'new_item_name' => 'New CT Name',
				'menu_name' => 'CTs'
			),
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true
		)

	);

}

//add_action('init', 'defineTaxonomies', 0);


  // ==================
  // = 3.4 Meta Boxes =
  // ==================

/**
  * Add custom metaboxes
  *
  * @author lewis
  *
  */

function addCustomMetaboxes() {

	add_meta_box('unique-metabox-slug', 'Friendly Heading', 'wash_create_metabox', 'page', 'side', 'low');

}

//add_action('admin_init', 'addCustomMetaboxes', 1);

/**
  * Create custom metaboxe
  *
  * @author lewis
  *
  */

function wash_create_metabox() {

	global $post;
	$metaboxMeta = get_post_meta($post->ID, '_wash_create_metabox', true);

?>
	<input type="hidden" name="unique-metabox-slug_noncename" id="unique-metabox-slug_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	<div id="unique-metabox-slug-fields" class="admin-form">
	</div>
<?php

}

/**
 * Fired when page saved
 *
 * @return void
 * @author Wash Design
 */
function wash_metabox_save( $post_id, $post ) {

	if ( !wp_verify_nonce( $_POST['unique-metabox-slug_noncename'], plugin_basename(__FILE__) ) ) {

		return $post->ID;

	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

		return $post_id;

	}

	if ( ( $_POST['post_type'] == 'page' ) && ( !current_user_can( 'edit_page', $post_id ) ) ) {

		return $post_id;

	} elseif ( !current_user_can( 'edit_post', $post_id ) ) {

		return $post_id;

	}

	$metaboxMeta = $_POST['metabox'];

	if ( $post->post_type == 'revision' ) {

		return;

	}

	delete_post_meta($post_id, '_wash_create_metabox');

	if ( isset( $metaboxMeta ) ) {

		add_post_meta( $post->ID, '_wash_create_metabox', $metaboxMeta );
	}

}

//add_action('save_post', 'wash_metabox_save', 1, 2);

  // ===================
  // = 3.5 Image Sizes =
  // ===================

/**
  * Customise our Theme Image Sizes
  *
  * @author lewis
  *
  */

function wash_image_sizes() {

	// we can set the thumbnail size
	set_post_thumbnail_size( 150, 150, true );

	// we can set the defaults
	update_option('medium_size_w', 800);
	update_option('medium_size_h', 600);
	update_option('large_size_w', 1000);
	update_option('large_size_h', 768);

	// we can add custom ones
	add_image_size( 'content-crop', 745, 420, true );
	add_image_size( 'content-full', 745, 0, true );
	add_image_size( 'hero-crop', 1000, 562, true );

}

add_action( 'init', 'wash_image_sizes' );


/**
  * Enable Custom Images sizes to be selected in Media Library
  *
  * @author lewis
  *
  */
function wash_add_images_to_media( $sizes ) {

	return array_merge(

		$sizes,
		array(

        	'content-crop' 	=> 'Content Image - cropped',
        	'content-full' 	=> 'Content Image',
        	'hero-crop' 	=> 'Banner'

		)

	);

}
add_filter( 'image_size_names_choose', 'wash_add_images_to_media' );