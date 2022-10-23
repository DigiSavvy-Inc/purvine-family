<?php
/**
 * Run this function on plugin installation
 *
 * @copyright   Copyright (c) 2020, Jeffrey Carandang
 * @since       1.0
 */

 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'editorskit_typography_plugin_check' ) ) :
	function editorskit_typography_plugin_check() {
		if ( ! defined( 'EDITORSKIT_VERSION' ) ) { ?>
		<div class="editorskit_activated_notice notice-error notice" style="box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);">
			<p>
					<?php
					echo sprintf(
						esc_html__( '%1$sEditorsKit Plugin%2$s is required for the EditorsKit Typography Add-on to work properly. %1$s%3$sClick here to install the plugin%4$s%2$s.', 'editorskit-typography-addon' ),
						'<strong>',
						'</strong>',
						'<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=block-options&TB_iframe=true&width=640&height=500' ) . '">',
						'</a>'
					);
					?>
			</p>
		</div>
		<?php }
	}
	add_action( 'admin_notices', 'editorskit_typography_plugin_check' );
endif;
?>
