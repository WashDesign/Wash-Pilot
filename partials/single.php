<?php

/**
 * Title: Page Content Template
 * Author: Wash
 * Package: FlightDeck
 **/

?>
<article id="post-<?php the_ID(); ?>" class="entry <?php echo get_post_type(); ?>s">

	<header class="entry__header">
		<h2 class="entry__heading"><?php the_title(); ?></h2>
	</header>

	<div class="entry__content">
		<?php the_content(); ?>
	</div>

</article>