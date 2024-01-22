<?php
/**
 * Plugin Name:  Advanced Random Posts Widget
 * Plugin URI:   https://github.com/idenovasi/advanced-random-posts-widget
 * Description:  Easily to display advanced random posts via shortcode or widget.
 * Version:      2.2.1
 * Author:       satrya
 * Author URI:   https://idenovasi.com/
 * Author Email: satrya@idenovasi.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'ARP_Widget' ) ) :

	class ARP_Widget {

		/**
		 * PHP5 constructor method.
		 *
		 * @since  0.0.1
		 */
		public function __construct() {

			// Set the constants needed by the plugin.
			add_action( 'plugins_loaded', array( &$this, 'constants' ), 1 );

			// Internationalize the text strings used.
			add_action( 'plugins_loaded', array( &$this, 'i18n' ), 2 );

			// Load the functions files.
			add_action( 'plugins_loaded', array( &$this, 'includes' ), 3 );

			// Register widget.
			add_action( 'widgets_init', array( &$this, 'register_widget' ) );

			// Register new image size.
			add_action( 'init', array( &$this, 'register_image_size' ) );

			// Enqueue the front-end style.
			add_action( 'wp_enqueue_scripts', array( &$this, 'plugin_style' ) );

			// Load the admin style.
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_scripts' ) );
			add_action( 'customize_controls_enqueue_scripts', array( &$this, 'admin_scripts' ) );

		}

		/**
		 * Defines constants used by the plugin.
		 *
		 * @since  0.0.1
		 */
		public function constants() {

			// Set constant path to the plugin directory.
			define( 'ARPW_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

			// Set the constant path to the plugin directory URI.
			define( 'ARPW_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

			// Set the constant path to the includes directory.
			define( 'ARPW_INC', ARPW_DIR . trailingslashit( 'includes' ) );

			// Set the constant path to the assets directory.
			define( 'ARPW_ASSETS', ARPW_URI . trailingslashit( 'assets' ) );

		}

		/**
		 * Loads the translation files.
		 *
		 * @since  0.0.1
		 */
		public function i18n() {
			load_plugin_textdomain( 'advanced-random-posts-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * Loads the initial files needed by the plugin.
		 *
		 * @since  0.0.1
		 */
		public function includes() {
			require_once( ARPW_INC . 'functions.php' );
			require_once( ARPW_INC . 'resizer.php' );
			require_once( ARPW_INC . 'posts.php' );
			require_once( ARPW_INC . 'shortcode.php' );
			require_once( ARPW_INC . 'widget.php' );
		}

		/**
		 * Register custom style for the widget settings.
		 *
		 * @since  0.0.1
		 */
		function admin_scripts() {
			wp_enqueue_style( 'arpw-admin-style', trailingslashit( ARPW_ASSETS ) . 'css/arpw-admin.css' );
			wp_enqueue_script( 'arpw-admin-script', trailingslashit( ARPW_ASSETS ) . 'js/jquery-cookie.js', array( 'jquery-ui-tabs' ) );
		}

		/**
		 * Register the widget.
		 *
		 * @since  0.0.1
		 */
		function register_widget() {
			register_widget( 'Advanced_Random_Posts_Widget' );
		}

		/**
		 * Register new image size.
		 *
		 * @since  0.0.1
		 */
		function register_image_size() {
			add_image_size( 'arpw-thumbnail', 50, 50, true );
		}

		/**
		 * Enqueue front-end style.
		 *
		 * @since  0.0.1
		 */
		function plugin_style() {
			wp_register_style( 'arpw-style', trailingslashit( ARPW_ASSETS ) . 'css/arpw-frontend.css' );
		}

	}

endif;

new ARP_Widget;
