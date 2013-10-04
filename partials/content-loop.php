<?php

/**
 * Title: Content Loop Template
 * Description: The standard content for a post loop. Displays the summary/excerpt.
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
<article id="post-<?php the_ID(); ?>" class="box box-archive box-<?php echo get_post_type(); ?>s">

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

<?php

	if ( 'post' == get_post_type() )
	{

?>
	<footer class="entry-meta">
<?php

		$categories_list = get_the_category_list( ', ' ) );
		if ( $categories_list )
		{

?>
			<span class="cat-links">
				Posted in: <?php echo $categories_list; ?>
			</span>
<?php

		}

		$tags_list = get_the_tag_list( ', ' );
		if ( $tags_list )
		{

?>

			<span class="tags-links">
				Tagged in: <?php echo $tags_list; ?>
			</span>

<?php

		}

?>
	</footer>

<?php

	}

?>
</article>