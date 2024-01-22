<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Theme options
add_filter( 'generate_posts_and_terms__add_menu_page_settings', 'generate_posts_and_terms__add_admin_panel_filter' );

// Add terms
add_filter( 'generate_posts_and_terms__filter_admin_menu_options_generate_posts_and_terms__admin_panel_settings', 'generate_posts_and_terms__multiple_form_inputs' );