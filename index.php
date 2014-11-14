<?php

/**
 * Title: Default Index Template
 * Description: The most generic template should ideally function as a catch-all (or archive).
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

			if ( is_single() )
			{

				get_template_part( 'partials/single' );

			} else {

				get_template_part( 'partials/loop' );

			}

		}

	} else {

		get_template_part( 'partials/no-results', 'index' ); //*** needs discussion (perhaps statement, search & sitemap)

	}

?>

<?php get_footer();  // site footer ?>