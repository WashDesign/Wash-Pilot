<?php

/**
 * Title: Content Search Loop Template
 * Description: The standard content for search results. Displays the summary/excerpt.
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
				<article id="post-<?php the_ID(); ?>" class="box box-archive box-searches">>

					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					</header>

					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				</article>