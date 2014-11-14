<?php

/**
 * Title: The Package Page Archive Template
 * Description: Displays a page that hosts an archive/loop of posts
 * Author: Wash
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

<?php

		if ( $customposttype->have_posts() ) // if we have a custom post loop - let's do it here.
		{
	
			while( $customposttype->have_posts() )
			{
	
				$customposttype->the_post();
	
				get_template_part( 'partials/loop', 'post' ); // uses partials/loop.php if partials/loop-post-type.php not found :)
	
	
			}
	
			wp_reset_postdata();
	
		}
	
		get_sidebar();

?>

<?php get_footer();  // site footer ?>