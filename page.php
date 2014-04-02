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

<?php

				get_template_part( 'partials', 'single' ); // uses partials/single.php if partials/single-page.php not found :)
				/* get_sidebar(); */

?>

<?php get_footer();  // site footer ?>