<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package kelly
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function kelly_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'         => 'main',
		'footer'            => 'page',
		'footer_widgets'    => array( 'sidebar-1', 'sidebar-2', 'sidebar-3' ),
	) );

	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'kelly_jetpack_setup' );