<?php

/*
 Plugin Name: Generate Posts and Terms
 Plugin URI: http://wordpress.org/plugins/generate-posts-and-terms
 Description: This plugin will help you generate dummy new posts and terms. (Go to: Dashboard -> Plugins -> Generate Posts and Terms)
 Version: 1.4
 Author: Alexandru Vornicescu
 Author URI: http://alexvorn.com
 */
 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Function that will run at plugin activation
function generate_posts_and_terms__activation_action() {
	
}

// Main class of the plugin
class Generate_Posts_and_Terms {

	public static function instance() {

		// Store the instance locally to avoid private static replication
		static $instance = null;

		// Only run these methods if they haven't been ran previously
		if ( null === $instance ) {
			$instance = new Generate_Posts_and_Terms;
			$instance->setup_globals();
		}

		// Always return the instance
		return $instance;
	}
	
	private function setup_globals() {

		/** Versions **********************************************************/

		$this->version         = '1.4';

		// Setup some base path and URL information
		$this->file            = __FILE__;
		$this->basename        = plugin_basename( $this->file );
		$this->plugin_dir      = plugin_dir_path( $this->file );
		$this->plugin_url      = plugin_dir_url ( $this->file );

		// Includes
		$this->includes_dir    = trailingslashit( $this->plugin_dir . 'includes' );
		$this->includes_url    = trailingslashit( $this->plugin_url . 'includes' );
	}
}

function generate_posts_and_terms() {
	return Generate_Posts_and_Terms::instance();
}

if ( ! function_exists( 'generate_posts_and_terms__load' ) ) {
	function generate_posts_and_terms__load() {

		$generate_posts_and_terms = generate_posts_and_terms();
		
		require( $generate_posts_and_terms->plugin_dir . 'default-settings-values.php'                           );
		require( $generate_posts_and_terms->plugin_dir . 'actions.php'                                           );
		
		require( $generate_posts_and_terms->includes_dir . 'dummy_data.php'                                      );
		require( $generate_posts_and_terms->includes_dir . 'functions.php'                                       );
		require( $generate_posts_and_terms->includes_dir . 'actions.php'                                         );
		
		// Quick admin check and load if needed
		if ( is_admin() ) {
			require( $generate_posts_and_terms->includes_dir . 'admin/actions.php'                               );
			require( $generate_posts_and_terms->includes_dir . 'admin/admin-panel.php'                           );
			require( $generate_posts_and_terms->includes_dir . 'admin/functions.php'                             );

			// Menu pages
			require( $generate_posts_and_terms->includes_dir . 'admin/menu-pages/actions.php'                    );
			require( $generate_posts_and_terms->includes_dir . 'admin/menu-pages/menu-pages.php'                 );
			require( $generate_posts_and_terms->includes_dir . 'admin/menu-pages/menu-page-plugin-options.php'   );
		}
	}
}

// Load all files
generate_posts_and_terms__load();

// Our get_option function
function generate_posts_and_terms__get_option( $option, $default = false, $use_default = false ) {
	
	if ( $default === false ) {
		$default_settings_values = generate_posts_and_terms__default_settings_values();
		
		if ( isset( $default_settings_values[$option] ) ) {
			$default = $default_settings_values[$option];
		} else if ( $use_default === true ) {
			$default = get_option( $option, $default );
		}
	}

	$default = apply_filters( 'generate_posts_and_terms__default_option_' . $option, $default );
	
	if ( $use_default === true ) {
		$get_option = $default;
	} else {
		$get_option = get_option( $option, $default );
	}
	
	return $get_option;
}

// Is plugin active function
function generate_posts_and_terms__is_plugin_active( $plugin ) {
	return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || generate_posts_and_terms__is_plugin_active_for_network( $plugin );
}

// Is plugin active for network
function generate_posts_and_terms__is_plugin_active_for_network( $plugin ) {
	if ( ! is_multisite() ) {
		return false;
	}

	$plugins = get_site_option( 'active_sitewide_plugins' );
	if ( isset( $plugins[$plugin] ) ) {
		return true;
	}
	
	return false;
}