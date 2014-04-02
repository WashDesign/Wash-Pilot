<?php

/**
 * Title: The Package 404 Page
 * Description: Displays a 404 page with search form
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
<?php get_header(); // site header ?>
<?php

	the_post(); // dont need a while loop as its always on result.

?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	
			<header class="entry__header">
				<h1 class="entry__heading">404 - nothing found here</h1>
			</header>
	
			<div class="entry__content">
				<?php get_search_form(); ?>
			</div>
	
		</article>
<?php

		get_sidebar();

?>

<?php get_footer();  // site footer ?>