<?php

/**
 * Title: Search Template
 * Description: The template for displaying search results
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

?>
				<header class="search-header">
					<h1 class="search-title">
						<span class="search-subtitle">Search Results for: </span> <?php echo get_search_query(); ?>
					</h1>
				</header>

<?php
		while ( have_posts() )
		{

			the_post();

			get_template_part( 'partials/single', 'search' ); // uses partials/single.php if partials/single-search.php not found :)


		}

	} else {

		get_template_part( 'partials/no-results', 'search' );

	}

?>
			</div><!-- end wrap -->
		</main>

<?php get_footer();  // site footer ?>