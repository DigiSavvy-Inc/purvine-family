<?php
/**
 * Must-use plugin to create taxonomies for our post types.
 *
 * @package wp_rig
 */

function dgs_register_my_taxes() {

	/**
	 * Taxonomy: Medical Groups.
	 */

	$labels = array(
		'name'          => __( 'Medical Groups', 'wp-rig' ),
		'singular_name' => __( 'Medical Group', 'wp-rig' ),
	);

	$args = array(
		'label'                 => __( 'Medical Groups', 'wp-rig' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'rewrite'               => array(
			'slug'       => 'medical_group',
			'with_front' => false,
		),
		'show_admin_column'     => false,
		'show_in_rest'          => true,
		'rest_base'             => 'medical_group',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'show_in_quick_edit'    => false,
	);
	register_taxonomy( 'medical_group', array( 'physician' ), $args );

	/**
	 * Taxonomy: Specialties.
	 */

	$labels = array(
		'name'          => __( 'Specialties', 'wp-rig' ),
		'singular_name' => __( 'Specialty', 'wp-rig' ),
	);

	$args = array(
		'label'                 => __( 'Specialties', 'wp-rig' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'rewrite'               => array(
			'slug'       => 'specialty',
			'with_front' => true,
		),
		'show_admin_column'     => false,
		'show_in_rest'          => true,
		'rest_base'             => 'specialty',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'show_in_quick_edit'    => false,
	);
	register_taxonomy( 'specialty', array( 'physician' ), $args );

	/**
	 * Taxonomy: Story Types.
	 */

	$labels = array(
		'name'          => __( 'Story Types', 'wp-rig' ),
		'singular_name' => __( 'Story Type', 'wp-rig' ),
	);

	$args = array(
		'label'                 => __( 'Story Types', 'wp-rig' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'hierarchical'          => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'rewrite'               => array(
			'slug'       => 'story_type',
			'with_front' => false,
		),
		'show_admin_column'     => false,
		'show_in_rest'          => true,
		'rest_base'             => 'story_type',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'show_in_quick_edit'    => true,
	);
	register_taxonomy( 'story_type', array( 'patient_stories' ), $args );
}
add_action( 'init', 'dgs_register_my_taxes' );

