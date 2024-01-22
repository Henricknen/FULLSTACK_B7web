<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

$generate_posts_and_terms = generate_posts_and_terms();

$plugin_file = $generate_posts_and_terms->file;

// Plugin Activation
register_activation_hook( $plugin_file,              'generate_posts_and_terms__activation_action'                 );