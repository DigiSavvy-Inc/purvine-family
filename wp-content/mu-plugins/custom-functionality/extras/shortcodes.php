<?php

/**
 * Adds a shortcode that outputs the current year
 * Usage: [year]
 */
function dgs_year_shortcode() {
	$year = date( 'Y' );
	return $year;
}
add_shortcode( 'year', 'dgs_year_shortcode' );

/**
 * Adds a shortcode that outputs a search form
 * Usage:  [bplsearch]
 */
function dgs_add_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input data-swplive="true" type="text" value="' . get_search_query() . '" name="s" id="s"  />
    <input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) . '" />
    </div>
    </form>';

	return $form;
}
add_shortcode( 'bplsearch', 'dgs_add_search_form' );

/**
 * Allow widgets in shortcodes
 */
add_filter( 'widget_text', 'do_shortcode' );
