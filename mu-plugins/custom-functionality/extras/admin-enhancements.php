<?php
/**
 * Admin Enhancements
 */

// Restyle admin menu separators
function dgs_separators() {
	echo '<style type="text/css">#adminmenu li.wp-menu-separator {margin: 0; background: #444;}</style>';
	echo '<style type="text/css">.editor-styles-wrapper .icon-bullet .wp-block-group__inner-container { display: inherit !important; }</style>';
}
add_action( 'admin_head', 'dgs_separators' );

/**
* @snippet Hide Jetpack Upsells @ WP Admin
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=108175
* @author Rodolfo Melogli
* @compatible WooCommerce 3.5.4
* @donate $9 https://businessbloomer.com/bloomer-armada/
*/

add_filter( 'jetpack_just_in_time_msgs', '__return_false' );

add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );
function wpdocs_dequeue_dashicon() {
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}

// Remove the content editor from Physician
add_action(
	'init',
	function() {
		remove_post_type_support( 'physician', 'editor' );
	},
	99
);

// Disable full-screen block edtior layout by default
function dgs_disable_editor_fullscreen_by_default() {
	$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
	wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'dgs_disable_editor_fullscreen_by_default' );

/**
 * Removes the width and height attributes of <img> tags for SVG
 *
 * Without this filter, the width and height are set to "1" since
 * WordPress core can't seem to figure out an SVG file's dimensions.
 *
 * For SVG:s, returns an array with file url, width and height set
 * to null, and false for 'is_intermediate'.
 *
 * @wp-hook image_downsize
 * @param mixed $out Value to be filtered
 * @param int $id Attachment ID for image.
 * @return bool|array False if not in admin or not SVG. Array otherwise.
 */
function wpse240579_fix_svg_size_attributes( $out, $id ) {
	$image_url = wp_get_attachment_url( $id );
	$file_ext  = pathinfo( $image_url, PATHINFO_EXTENSION );

	if ( is_admin() || 'svg' !== $file_ext ) {
		return false;
	}

	return array( $image_url, null, null, false );
}
add_filter( 'image_downsize', 'wpse240579_fix_svg_size_attributes', 10, 2 );
