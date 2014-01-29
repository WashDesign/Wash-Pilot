<?php

/**
 * Title: Archive Template
 * Description: The template for displaying archive pages for postypes, taxonomies, authors and dates
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
				<header class="archive-header">
					<h1 class="archive-title">
<?php
						if ( is_category() )
						{

							echo '<span class="archive-subtitle">Category: </span>' . single_cat_title();

						} elseif ( is_tag() ) {

							echo '<span class="archive-subtitle">Tag: </span>' . single_tag_title();

						} elseif ( is_author() ) {

							the_post(); // Queue post, get author

							echo '<span class="archive-subtitle">Author: </span><span class="vcard">' . get_the_author() . '</span>';

							rewind_posts(); // rewind posts

						} elseif ( is_day() ) {

							echo '<span class="archive-subtitle">Day: </span>' . get_the_date();

						} elseif ( is_month() ) {

							echo '<span class="archive-subtitle">Month: </span>' . get_the_date( 'F Y' );

						} elseif ( is_year() ) {

							echo '<span class="archive-subtitle">Year: </span>' . get_the_date( 'Y' );

						} else {

							echo '<span class="archive-subtitle">Archive</span>' .

						}
?>
					</h1>
				</header>

<?php
		while ( have_posts() )
		{

			the_post();

			get_template_part( 'partials/loop' );

		}

	} else {

		get_template_part( 'partials/no-results', 'archive' );

	}

?>
			</div><!-- end wrap -->
		</main>

<?php get_footer();  // site footer ?>