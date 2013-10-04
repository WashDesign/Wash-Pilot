<?php

/**
 * Title: The Package Front Page
 * Description: Displays the front page
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

				// frontpage content goes here

?>
		</div><!-- end wrap -->
		</main>

<?php get_footer();  // site footer ?>