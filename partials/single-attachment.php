<?php

/**
 * Title: Attachment Content Template
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
				<article id="post-<?php the_ID(); ?>" class="box box-single box-attachment">

					<header class="entry-header">
						<h1 class="entry-title attachment-title" itemprop="headline"><?php the_title(); ?></h1>
					</header>
<?php

 	$metadata = wp_get_attachment_metadata();

?>
					<footer class="entry-footer entry-meta">
						<p>Published <span class="entry-date"><time class="entry-date" datetime="<?php echo get_the_date( 'c' ); ?>" pubdate><?php echo get_the_date(); ?></time></span> at <a href="<?php echo wp_get_attachment_url(); ?>" title="Link to full-size image"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a> in <a href="<?php echo get_permalink( $post->post_parent ); ?>" title="Return to %7$s" rel="gallery">%<?php echo get_the_title( $post->post_parent ); ?></a></p>
					</footer>

					<nav id="image-navigation" class="site-navigation">
                    	<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous' ) ); ?></span>
						<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;' ) ); ?></span>
                    </nav>

					<div class="entry-content">
						 <div class="entry-attachment">
                            <div class="attachment">
<?php

    $attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );

	foreach ( $attachments as $k => $attachment )
	{

	    if ( $attachment->ID == $post->ID )
	    {

	        break;
		}

	}

	$k++;

    if ( count( $attachments ) > 1 ) // If there is more than 1 attachment in a gallery
    {
        if ( isset( $attachments[ $k ] ) )
        {

            $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID ); // get the URL of the next image attachment

        } else {

            $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID ); // or get the URL of the first image attachment

        }

    } else {

        $next_attachment_url = wp_get_attachment_url(); // or, if there's only 1 image, get the URL of the image
    }
?>

                                <a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment">
<?php

   $attachment_size = apply_filters( 'shape_attachment_size', array( 1200, 1200 ) ); // Filterable image size.
                                    echo wp_get_attachment_image( $post->ID, $attachment_size );
?>
								</a>
                            </div>
							<?php the_content(); ?>
						 </div> <!-- end attachment -->
					</div> <!-- end content -->

				</article> <!-- end article -->
<?php

				if (function_exists('wash_page_navi')) //*** change to nav function/component
				{

					wash_page_navi(); //*** need this function

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