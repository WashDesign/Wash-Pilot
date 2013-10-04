<?php

/**
 * Title: Search Form
 * Description: A default search form for site search.
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Search &hellip" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="Search">
</form>