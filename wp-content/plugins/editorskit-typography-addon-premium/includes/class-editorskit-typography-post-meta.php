<?php
/**
 * Register post meta.
 *
 * @package EditorsKit
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * EditorsKit_Typography_Post_Meta Class
 *
 * @since 1.0
 */
class EditorsKit_Typography_Post_Meta {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'rest_api_init', array( $this, 'register_meta' ) );
		add_action( 'init', array( $this, 'register_settings' ) );
		add_filter( 'rest_pre_dispatch', array( $this, 'rest_pre_dispatch' ), 10, 3 );
	}

	/**
	 * Register meta.
	 */
	public function register_meta() {
		register_meta(
			'post',
			'_editorskit_typography_data',
			array(
				'single'        => true,
				'type'          => 'object',
				'show_in_rest'  => array(
					'schema' => array(
						'type'                 => 'object',
						'properties'           => array(
							'version' => array(
								'type' => 'string',
							),
						),
						'additionalProperties' => array(
							'type' => 'object',
						),
					),
				),
				'auth_callback' => array( $this, 'auth_callback' ),
			)
		);

		register_meta(
			'post',
			'_editorskit_blocks_typography',
			array(
				'show_in_rest'  => true,
				'single'        => true,
				'auth_callback' => array( $this, 'auth_callback' ),
			)
		);
	}

	/**
	 * Register block settings.
	 *
	 * @access public
	 */
	public function register_settings() {
		register_setting(
			'editorskit_typography_custom',
			'editorskit_typography_custom',
			array(
				'type'              => 'string',
				'description'       => __( 'Custom typography', 'editorskit-typography-addon' ),
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => true,
			)
		);

		register_setting(
			'editorskit_typography_default',
			'editorskit_typography_default',
			array(
				'type'              => 'string',
				'description'       => __( 'Default typography', 'editorskit-typography-addon' ),
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => true,
			)
		);
	}

	/**
	 * Determine if the current user can edit posts
	 *
	 * @return bool True when can edit posts, else false.
	 */
	public function auth_callback() {

		return current_user_can( 'edit_posts' );

	}

	/**
	 * Fix REST API issue with blocks registered via PHP register_block_type.
	 *
	 * @param mixed  $result  Response to replace the requested version with.
	 * @param object $server  Server instance.
	 * @param object $request Request used to generate the response.
	 *
	 * @return array Returns updated results.
	 */
	public function rest_pre_dispatch( $result, $server, $request ) {

		if ( strpos( $request->get_route(), '/wp/v2/block-renderer' ) !== false ) {

			if ( isset( $request['attributes'] ) && isset( $request['attributes']['editorskit_typography'] ) ) {

				$attributes = $request['attributes'];
				unset( $attributes['editorskit_typography'] );
				$request['attributes'] = $attributes;
			}
		}

		return $result;
	}
}

return new EditorsKit_Typography_Post_Meta();
