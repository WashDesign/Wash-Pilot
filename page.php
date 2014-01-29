<?php

/**
 * Title: The Package Page Template
 * Description: Displays a standard page
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
<?php get_header(); // site header ?>
<?php

	the_post(); // dont need a while loop as its always on result.

?>

		<main class="site-main" role="main">
			<div class="wrap grp">
<?php

				get_template_part( 'partials/single' ); // use default by default
				get_sidebar();

?>
			</div><!-- end wrap -->
		</main>

<?php get_footer();  // site footer ?>