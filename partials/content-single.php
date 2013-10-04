<?php

/**
 * Title: Single Content Template
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
				<article id="post-<?php the_ID(); ?>" class="box box-single box-<?php echo get_post_type(); ?>">

					<header class="entry-header">
						<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					</header>
					<footer class="entry-footer entry-meta">
						<p class="byline vcard"><?php //*** just needs standard output for now NOT --> printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'wshtheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), wsh_get_the_author_posts_link(), get_the_category_list(', '));<--  */?></p>
					</footer>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

				</article> <!-- end article -->
<?php

				if (function_exists('wsh_page_navi')) //*** change to nav function/component
				{

					wsh_page_navi(); //*** need this function

				} else {

?>
		        <nav class="wp-prev-next">
		            <ul class="clearfix">
		                <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "")) ?></li>
		                <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "")) ?></li>
		            </ul>
		        </nav>
<?php

				}

				if ( comments_open() || '0' != get_comments_number() )
				{

					comments_template();

				}

?>
