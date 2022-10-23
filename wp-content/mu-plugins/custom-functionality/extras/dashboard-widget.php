<?php
/**
 * Renders a dashboard widget
 */

class Custom_Dashboard_Widget {

	public function __construct() {
		add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widget' ) );
	}

	public function add_dashboard_widget() {
		wp_add_dashboard_widget(
			'welcome',
			__( 'Managing Your Website', 'digisavvy' ),
			array( $this, 'render_dashboard_widget' ),
			array( $this, 'save_dashboard_widget' )
		);
	}

	public function render_dashboard_widget() { ?>
		<p>Welcome to your Website! Need help? Contact the developer <a href="mailto:getsupport@digisavvy.com">here</a>. 
        For additional help visit: <a href="https://www.digisavvy.com" target="_blank">DigiSavvy</a>
        </p>
    <?php }

	public function save_dashboard_widget() {

	}

}
new Custom_Dashboard_Widget;