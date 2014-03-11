<?php

/**
 * Title: Page Content Template
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
				<article id="post-<?php the_ID(); ?>" class="box box-single box-<?php echo get_post_type(); ?>">

					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

				</article>