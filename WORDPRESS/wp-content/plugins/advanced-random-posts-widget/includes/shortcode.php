<?php
/**
 * Shortcode helper
 */

/**
 * Display random posts with shortcode
 *
 * @since  0.0.1
 */
function arpw_shortcode( $atts ) {

	// Get shortcode attr
	$args = shortcode_atts( arpw_get_default_args(), $atts );

	// Load default style
	wp_enqueue_style( 'arpw-style' );

	// Display the shortcode content
	return arpw_get_random_posts( $args, get_the_ID() );

}
add_shortcode( 'arpw', 'arpw_shortcode' );