<?php

/**
 * Title: Single Page Template
 * Description: A page template for teh default posts and custom post types.
 * Author: Wash
 * Package: FlightDeck
 **/

?>
<?php get_header(); // site header ?>

<?php

	if ( have_posts() )
	{

		while ( have_posts() )
		{

			the_post();

			get_template_part( 'partials/single' );
			
			get_sidebar();

		}

	} else {

		get_template_part( 'partials/no-results', 'single' ); //*** needs discussion (perhaps statement, search & sitemap)

	}

?>

<?php get_footer();  // site footer ?>