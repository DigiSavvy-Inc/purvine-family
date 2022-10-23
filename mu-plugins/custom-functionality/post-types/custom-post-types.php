<?php
/**
 * Must-use plugin to create all of our post types.
 *
 * @package wp_rig
 */

function dgs_register_my_cpts() {

	/**
	 * Post Type: Patient Stories.
	 */

	$labels = array(
		'name'          => __( 'Patient Stories', 'wp-rig' ),
		'singular_name' => __( 'Patient Story', 'wp-rig' ),
	);

	$args = array(
		'label'                 => __( 'Patient Stories', 'wp-rig' ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'delete_with_user'      => false,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => false,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => array(
			'slug'       => 'patient-story',
			'with_front' => false,
		),
		'query_var'             => true,
		'menu_icon'             => 'dashicons-groups',
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'story_type' ),
	);

	register_post_type( 'patient_stories', $args );

	/**
	 * Post Type: Physicians.
	 */

	$labels = array(
		'name'          => __( 'Physicians', 'wp-rig' ),
		'singular_name' => __( 'Physician', 'wp-rig' ),
		'menu_name'     => __( 'Physicians', 'wp-rig' ),
		'edit_item'     => __( 'Edit Physician', 'wp-rig' ),
	);

	$args = array(
		'label'                 => __( 'Physicians', 'wp-rig' ),
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'delete_with_user'      => false,
		'show_in_rest'          => true,
		'rest_base'             => '',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'has_archive'           => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'delete_with_user'      => false,
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'map_meta_cap'          => true,
		'hierarchical'          => false,
		'rewrite'               => array(
			'slug'       => 'physicians',
			'with_front' => false,
		),
		'query_var'             => 'physicians',
		'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
		'supports'              => array( 'title', 'editor', 'author' ),
		'taxonomies'            => array( 'medical_group', 'specialty' ),
	);

	register_post_type( 'physician', $args );
}

add_action( 'init', 'dgs_register_my_cpts' );
