<?php
/*
  * Set $regex_path_patterns accordingly.
  *
  * We don't set this variable for you, so you must define it
  * yourself per your specific use case before the following conditional.
  *
  * For example, to exclude pages in the /news/ and /about/ path from cache, set:
  *
  *   $regex_path_patterns = array(
  *     '#^/news/?#',
  *     '#^/about/?#',
  *   );
  */

$regex_path_patterns = array(
	'#^/checkout/?#',
	'#^/cart/?#',
	'#^/breastfeeding-equipment-renewal/?#',
);

// Loop through the patterns.
foreach ( $regex_path_patterns as $regex_path_pattern ) {
	if ( preg_match( $regex_path_pattern, $_SERVER['REQUEST_URI'] ) ) {
		add_action( 'send_headers', 'add_header_nocache', 15 );

		// No need to continue the loop once there's a match.
		break;
	}
}
function add_header_nocache() {
	header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
}
