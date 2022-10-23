<?php
/**
 * Plugin Name:       Editor Plus
 * Plugin URI:        https://wpeditorplus.com/
 * Description:       Editor Plus extends Gutenberg editor with advanced design controls, icons and more features.
 * Version:           2.9.11
 * Author:            Munir Kamal
 * Author URI:        https://munirkamal.com/
 * License:           GPL-3.0+
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       editor_plus
 */

require_once plugin_dir_path( __FILE__ ) . 'includes/class-editorplus.php';

if ( is_readable( dirname( __FILE__ ) . '/extendify-sdk/loader.php' ) ) {
	if ( ! isset( $GLOBALS['extendify_sdk_partner'] ) ) {
		$GLOBALS['extendify_sdk_partner'] = 'Editor Plus';
	}
	require plugin_dir_path( __FILE__ ) . 'extendify-sdk/loader.php';
}
