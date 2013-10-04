<?php

/**
 * Title: The Package Page Template
 * Description: Displays a standard page
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
<?php

	$args = array(

				'post_type' => 'post',
				'posts_per_page' => -1,
				'status' => 'publish',
				'orderby' => 'menu_order',
				'order' => 'ASC',

			);

	$customposttype = new WP_Query( $args );

?>
<?php get_header(); // site header ?>
<?php

	the_post(); // dont need a while loop as its always on result.

?>

		<main class="site-main" role="main">
			<div class="wrap grp">
<?php

				get_template_part( 'partials/content', 'page' );

				if ( $customposttype->have_posts() ) // if we have a custom post loop - let's do it here.
				{

					while( $customposttype->have_posts() )
					{

						//*** check this carries through
						$customposttype->the_post();

						get_template_part( 'partials/content', 'post-type' ); // should be the post type required

					}

					wp_reset_postdata();

				}

				get_sidebar();

?>
			</div><!-- end wrap -->
		</main>

<?php get_footer();  // site footer ?>