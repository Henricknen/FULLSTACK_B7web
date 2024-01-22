<?php

// IMPORTANT: Use 'use_admin_panel' => true - for showing Admin Panel.

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Page menus array
function generate_posts_and_terms__add_admin_panel_filter( $settings_options = array() ) {

	$admin_panel_help_theme_options = array();
	
	$admin_panel_help_theme_options['id_3'] = array(
		'title'      => __( 'About Admin Penel' , 'generate_posts_and_terms' ),
		'content'    => '<p>' . __( 'The admin panel will help you to add new dummy posts and terms. Select the tab menu you need from the list of tabs.', 'generate_posts_and_terms' ) . '</p>'
	);

	// Theme options
	$settings_options['generate_posts_and_terms_page'] = array(
		'use_admin_panel'       => true,
		'page_title'            => __( 'Generate Posts and Terms Admin Panel', 'generate_posts_and_terms' ),
		'menu_title'            => __( 'Generate Posts and Terms', 'generate_posts_and_terms' ),
		'capability'            => 'edit_theme_options',
		'menu_slug'             => 'generate_posts_and_terms',
		'function'              => 'generate_posts_and_terms__admin_panel_settings',
		'help'                  => apply_filters( 'generate_posts_and_terms__filter_admin_menu_help_text', $admin_panel_help_theme_options ),
		'scripts'               => array(
			'generate_posts_and_terms-admin-panel',
			'jquery-ui-accordion'
		),
		'styles'                => array(
			'generate_posts_and_terms-admin-panel'
		)
	);

	return $settings_options;
}
