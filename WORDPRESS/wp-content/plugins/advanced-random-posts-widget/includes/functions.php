<?php
/**
 * Various functions used by the plugin.
 */

/**
 * Sets up the default arguments.
 *
 * @since  0.0.1
 */
function arpw_get_default_args() {

	$defaults = array(
		'title'             => esc_attr__( 'Random Posts', 'advanced-random-posts-widget' ),
		'title_url'         => '',

		'offset'            => 0,
		'limit'             => 5,
		'orderby'           => 'rand',
		'post_type'         => 'post',
		'post_status'       => 'publish',
		'ignore_sticky'     => 1,
		'taxonomy'          => '',
		'cat'               => array(),
		'tag'               => array(),

		'thumbnail'         => false,
		'thumbnail_size'    => 'arpw-thumbnail',
		'thumbnail_align'   => 'left',
		'thumbnail_custom'  => false,
		'thumbnail_width'   => '',
		'thumbnail_height'  => '',

		'content'           => false,
		'excerpt'           => false,
		'excerpt_length'    => 10,
		'date'              => false,
		'date_modified'     => false,
		'date_relative'     => false,

		'css'               => '',
		'css_class'         => '',
		'before'            => '',
		'after'             => ''
	);

	// Allow plugins/themes developer to filter the default arguments.
	return apply_filters( 'arpw_default_args', $defaults );

}

/**
 * Display list of terms
 *
 * @since  1.0.0
 * @param  string $term The term name
 * @return array        Returns an array of term objects
 */
function arpw_term_list( $term ) {

	// Arguments
	$args = array(
		'number' => 99
	);

	// Allow dev to filter the arguments
	$args = apply_filters( 'arpw_term_list_args', $args );

	// Get the terms
	$terms = get_terms( $term, $args );

	return $terms;
}

/**
 * Custom CSS
 *
 * @since  2.0.4
 */
function arpw_custom_css( $args ) {

	// Sanitize Custom CSS
	$css = $args['css'];
	$css = wp_kses( $css, array( '\'', '\"', '>', '+' ) );
	$css = str_replace( '&gt;', '>', $css );

	if ( ! empty( $css ) ) {
		echo '<style>' . $css . '</style>';
	}

}
add_action( 'arpw_before_loop', 'arpw_custom_css', 1 );
