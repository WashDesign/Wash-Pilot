<?php

/**
 * Title: Functions File
 * Description: Includes all the function files for the site
 * Author: Wash
 * Date: September 2013
 * Package: FlightDeck
 **/

/** 1.  CMS
  *
  * 1.1 Login
  * 1.2 Dashboard
  * 1.3 Footer
  * 1.4 User Role
  *
  **/
require_once( 'config/cms.php' );

/** 2.  WP Tidy Up
  *
  * 2.1 Version
  * 2.2 Head
  * 2.3 Code
  * 2.4 Comments
  * 2.5 Other
  *
  **/
require_once( 'config/tidy.php' );

/** 3.  Theme Config
  *
  * 3.1 Support - thumbnails, sidebars, post formats
  * 3.2 Custom Posts Types - register and custom icons
  * 3.3 Taxonomies
  * 3.4 Meta Boxes
  * 3.5 Images - custom sizes and register with media library
  *
  **/
require_once( 'config/theme.php' );

/** 4.  Scripts
  *
  * 4.1 Enqueue Scripts
  * 4.2 Enqueue Styles
  *
  **/
require_once( 'config/scripts.php' );

/** 5.  Functions
  *
  * 5.1 Init
  * 5.2 Menus
  * 5.3 Navigation
  * 5.4 Content
  * 5.5 Utilities
  *
  **/
require_once( 'config/functions.php' );

?>