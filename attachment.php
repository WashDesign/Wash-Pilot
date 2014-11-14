<?php

/**
 * Title: Attachment Page Template
 * Description: Displays the attachment
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

			get_template_part( 'partials/single', 'attachment' ); // uses partials/single.php if partials/single-attachment.php not found :)

			get_sidebar();

		}

	} else {

		get_template_part( 'partials/no-results', 'single' ); //*** needs discussion (perhaps statement, search & sitemap)

	}

?>

<?php get_footer();  // site footer ?>