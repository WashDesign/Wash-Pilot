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
  * 3.2 Custom Posts Types - register and custom icons
  * 3.3 Taxonomies
  * 3.4 Meta Boxes
  * 3.5 Images - custom sizes and register with media library
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

		'CPTs', array(

			'label'                  => 'CPTs',
			'labels' => array(

				'singular_name'      => 'CPT',
				'menu_name'          => 'CPTs',
				'all_items'          => 'CPTs',
				'add_new'            => 'Add CPT',
				'add_new_item'       => 'Add New CPT',
				'edit_item'          => 'Edit CPT',
				'new_item'           => 'New CPT',
				'view_item'          => 'View CPT',
				'search_items'       => 'Search CPTs',
				'not_found'          => 'No CPTs found',
				'not_found_in_trash' => 'No CPTs found in Trash',
				'parent_item_colon'  => ''

			),
			'description'            => 'CPTs',
			'public'                 => true,
			//'exclude_from_search'  => false,
			//'publicly_queryable'   => false,
			//'show_ui'              => true,
			//'show_in_nav_menus'    => false,
			'show_in_menu'           => true,
			'show_in_admin_bar'      => true,
			'menu_position'          => null, // 21+ for below pages
			'menu_icon'              => null,
			'hierarchical'           => false,
			'supports' => array(

				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'page-attributes',
				'post-formats'

			),
			//'taxonomies' => array(

			//	'custom_tax'

			//),
			'has_archive'            => true,
			'rewrite'                => true
		)
	);

}

//add_action('init', 'defineCustomPostTypes');

/**
  * Customise CPT Icons
  *
  * @author lewis
  *
  */


function wash_cpt_icons() {

?>
    <style type="text/css" media="screen">

        #menu-posts .menu-icon-post div.wp-menu-image:before {

            content: '\f116' !important;

        } 
        
        #menu-posts-CPT div.wp-menu-image:before {

            content: '\f109' !important;

        }

    </style>
<?php

}

//add_action( 'admin_head', 'wash_cpt_icons' );


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

		'custom_tax', array(

			'CPT'

		), array(

			'hierarchical'          => true,
			'labels' => array(

				'name'              => 'Custom Taxonomies',
				'singular_name'     => 'Custom Taxonomy',
				'menu_name'         => 'Custom Taxonomies',
				'all_items'         => 'All Custom Taxonomies',
				'edit_item'         => 'Edit Custom Taxonomy',
				'view_item'         => 'View Custom Taxonomy',
				'update_item'       => 'Update Custom Taxonomy',
				'add_new_item'      => 'Add New Custom Taxonomy',
				'new_item_name'     => 'New Custom Taxonomy Name',
				'parent_item'       => 'Parent Custom Taxonomy',
				'parent_item_colon' => 'Parent Custom Taxonomy:',
				'search_items'      =>  'Search Custom Taxonomies',
				'popular_items'     => 'Popular Custom Taxonomies',
				'separate_items_with_commas' => 'Separate Custom Taxonomies with commas',
				'add_or_remove_items'        => 'Add or remove Custom Taxonomies',
				'choose_from_most_used'      => 'Choose from the most used Custom Taxonomies',
				'not_found'         => 'No Custom Taxonomies found'

			),
			'public'                => true,
			'show_ui'               => true,
			'show_in_nav_menus'     => false,
			'show_tagcloud'         => false,
			'show_admin_column'     => true,
			'hierarchical'          => true,
			'update_count_callback' => '',
			//'query_var'           => $taxonomy,
			'rewrite'               => true,
			'sort'                  => ''

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

  // ==============
  // = 3.5 Images =
  // ==============

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