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

		<main class="site-main" role="main">
			<div class="wrap grp">
				<article id="post-<?php the_ID(); ?>" <?php post_class('grp'); ?>>

					<header class="entry-header">
						<h1 class="entry-title">404 - nothing found here</h1>
					</header>

					<div class="entry-content">
						<?php get_search_form(); ?>
					</div>

				</article>
<?php

				get_sidebar();

?>
			</div><!-- end wrap -->
		</main>

<?php get_footer();  // site footer ?>