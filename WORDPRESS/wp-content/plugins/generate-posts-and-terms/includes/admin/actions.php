<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/** Main Actions **************************************************************/

// CSS and Javascript files
add_action( 'admin_enqueue_scripts',                            'generate_posts_and_terms__enqueue_style_scripts_action'                           );

// For registering styles and scripts for admin pages
add_action( 'admin_init',                                       'generate_posts_and_terms__register_scripts_and_styles_admin_action'               );

// Add page menus in the left WP Admin Menu
add_action( 'admin_menu',                                       'generate_posts_and_terms__admin_menu_action'                                      );

// Add ajax function for generating new posts
add_action( 'wp_ajax_generate_posts_and_terms__generate_new_posts',                      'generate_posts_and_terms__generate_new_posts_action'                                      );