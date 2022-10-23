<?php

wp_cache_add_non_persistent_groups( array( 'woocommerce' ) );

/**
 * Overrides the default wc_get_template_part cachekey to add the  $_SERVER['SERVER_NAME'] as an additional unique identifier.
 *
 * @param string $template Template path.
 * @param mixed  $slug Template slug.
 * @param string $name Template name (default: '').
 * @return mixed $template Modified template path from new $cachekey.
 */
function wc_get_template_part_override( $template, $slug, $name ) {
	if ( isset( $_SERVER['SERVER_NAME'] ) ) {
		$uniquepath = sanitize_key( $_SERVER['SERVER_NAME'] );
	} else {
		$uniquepath = '';
	}
	$cache_key = sanitize_key( implode( '-', array( 'template-part', $slug, $name, WC_VERSION, $uniquepath ) ) );
	$template  = (string) wp_cache_get( $cache_key, 'woocommerce' );

	if ( ! $template ) {
		if ( $name ) {
			$template = WC_TEMPLATE_DEBUG_MODE ? '' : locate_template(
				array(
					"{$slug}-{$name}.php",
					WC()->template_path() . "{$slug}-{$name}.php",
				)
			);

			if ( ! $template ) {
				$fallback = WC()->plugin_path() . "/templates/{$slug}-{$name}.php";
				$template = file_exists( $fallback ) ? $fallback : '';
			}
		}

		if ( ! $template ) {
			$template = WC_TEMPLATE_DEBUG_MODE ? '' : locate_template(
				array(
					"{$slug}.php",
					WC()->template_path() . "{$slug}.php",
				)
			);
		}

		wp_cache_set( $cache_key, $template, 'woocommerce' );
	}

	return $template;
}
add_filter( 'wc_get_template_part', 'wc_get_template_part_override', 10, 3 );

/**
 * Overrides the default wc_get_template with uncached template path.
 *
 * @param string $template Template path.
 * @param mixed  $template_name Template slug.
 * @param mixed  $args Action arguments.
 * @param string $template_path Template path.
 * @param string $default_path Default path.
 * @return mixed $template Uncached template path that adapts on different ABSPATH.
 */
function wc_get_template_override( $template, $template_name, $args, $template_path, $default_path ) {
	if ( ! file_exists( $template ) ) {
		$template = wc_locate_template( $template_name, $template_path, $default_path );
	}
	return $template;
}
add_filter( 'wc_get_template', 'wc_get_template_override', 10, 5 );
