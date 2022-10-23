<?php
/**
 * Load assets for our blocks.
 *
 * @package EditorsKit_Typography_Addon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load general assets for our blocks.
 *
 * @since 1.0.0
 */
class EditorsKit_Typography_Block_Assets {


	/**
	 * This plugin's instance.
	 *
	 * @var EditorsKit_Typography_Block_Assets
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 */
	public static function register() {
		if ( null === self::$instance ) {
			self::$instance = new EditorsKit_Typography_Block_Assets();
		}
	}

	/**
	 * The base URL path (without trailing slash).
	 *
	 * @var string $url
	 */
	private $url;

	/**
	 * The plugin version.
	 *
	 * @var string $slug
	 */
	private $slug;

	/**
	 * The plugin inline scripts.
	 *
	 * @var string $inline_global
	 */
	private $inline_global;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->slug = 'editorskit-typography-addon';
		$this->url  = untrailingslashit( plugins_url( '/', dirname( __FILE__ ) ) );

		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
		add_action( 'init', array( $this, 'editor_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'settings_assets' ) );

		$this->inline_global = array(
			'plugin' => array(
				'version' => EDITORSKIT_TYPOGRAPHY_VERSION,
				'url'     => EDITORSKIT_TYPOGRAPHY_PLUGIN_URL,
				'dir'     => EDITORSKIT_TYPOGRAPHY_PLUGIN_DIR,
			),
		);
	}

	/**
	 * Enqueue block assets for use within Gutenberg.
	 *
	 * @access public
	 */
	public function block_assets() {
		if ( ! is_admin() ) {
			// Styles.
			wp_enqueue_style(
				$this->slug . '-frontend',
				$this->url . '/build/style.build.css',
				array(),
				EDITORSKIT_TYPOGRAPHY_VERSION
			);
		}
	}

	/**
	 * Enqueue block assets for use within Gutenberg.
	 *
	 * @access public
	 */
	public function editor_assets() {

		if ( ! is_admin() ) {
			return;
		}
		if ( ! $this->is_edit_or_new_admin_page() ) {
			return;
		}

		// Styles.
		wp_enqueue_style(
			$this->slug . '-editor',
			$this->url . '/build/editor.build.css',
			array(),
			EDITORSKIT_TYPOGRAPHY_VERSION
		);

		// Scripts.
		wp_enqueue_script(
			$this->slug . '-editor',
			$this->url . '/build/index.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-plugins', 'wp-components', 'wp-edit-post', 'wp-api', 'wp-rich-text', 'wp-editor' ),
			EDITORSKIT_TYPOGRAPHY_VERSION,
			false
		);

		wp_add_inline_script( $this->slug . '-editor', 'window.editorskitTypography = ' . wp_json_encode( $this->inline_global ) . ';', 'before' );

	}

	/**
	 * Enqueues the required scripts.
	 *
	 * @return void
	 */
	public function settings_assets() {

		// phpcs:ignore
		if ( ! isset( $_GET['page'] ) || 'editorskit-getting-started' !== $_GET['page'] ) {
			return;
		}

		// Styles.
		wp_enqueue_style(
			$this->slug . '-editor',
			$this->url . '/build/editor.build.css',
			array(),
			EDITORSKIT_TYPOGRAPHY_VERSION
		);

		wp_enqueue_style(
			$this->slug . '-admin',
			$this->url . '/build/admin.build.css',
			array(),
			EDITORSKIT_TYPOGRAPHY_VERSION
		);

		// Scripts.
		wp_enqueue_script(
			$this->slug . '-settings',
			$this->url . '/build/settings.js',
			array( 'wp-i18n', 'wp-element', 'wp-plugins', 'wp-components', 'wp-api', 'wp-hooks', 'wp-edit-post', 'lodash', 'wp-block-library', 'wp-block-editor', 'wp-editor' ),
			EDITORSKIT_TYPOGRAPHY_VERSION,
			false
		);

		wp_add_inline_script( $this->slug . '-settings', 'window.editorskitTypography = ' . wp_json_encode( $this->inline_global ) . ';', 'before' );
	}

	/**
	 * Checks if admin page is the 'edit' or 'new-post' screen.
	 *
	 * @return bool true or false
	 */
	public function is_edit_or_new_admin_page() {
		global $pagenow;
		// phpcs:ignore
		return ( is_admin() && ( $pagenow === 'post.php' || $pagenow === 'post-new.php' ) );
	}

}

EditorsKit_Typography_Block_Assets::register();
