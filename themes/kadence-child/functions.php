<?php
/**
 * Enqueue child styles.
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}

// add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' ); // Remove the // from the beginning of this line if you want the child theme style.css file to load on the front end of your site.

// Gutenberg custom stylesheet
add_theme_support( 'editor-styles' );

add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'your-handle-here', get_stylesheet_directory_uri() . "/editor-style.css", false, '1.0', 'all' );
} );