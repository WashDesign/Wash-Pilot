<?php

/**
 * Title: Content Custom Post Type Loop Template
 * Description: The standard content for a custom post loop. Displays the summary/excerpt.
 * Author: Wash
 * Package: FlightDeck
 **/

?>
		<article id="post-<?php echo get_the_ID(); ?>" class="box box-archive box-<?php echo get_post_type(); ?>s">

			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header>

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		</article>