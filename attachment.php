<?php

/**
 * Title: Attachment Page Template
 * Description: Displays the attachment
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
<?php get_header(); // site header ?>
		<main class="site-main" role="main">
			<div class="wrap grp">
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

			</div><!-- end wrap -->
		</main>

<?php get_footer();  // site footer ?>