<?php
/**
 *
 * @package kelly
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses kelly_header_style()
 * @uses kelly_admin_header_style()
 * @uses kelly_admin_header_image()
 *
 * @package kelly
 */
function kelly_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kelly_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '93dfd5',
		'width'                  => 1200,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'kelly_header_style',
		'admin-head-callback'    => 'kelly_admin_header_style',
		'admin-preview-callback' => 'kelly_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'kelly_custom_header_setup' );

if ( ! function_exists( 'kelly_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see kelly_custom_header_setup().
 */
function kelly_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // kelly_header_style

if ( ! function_exists( 'kelly_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see kelly_custom_header_setup().
 */
function kelly_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			background-position: center;
			background-repeat: no-repeat;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			border: none;
			font-size: 16px;
			padding-top: 1.5em;
			position: relative;
			text-align: center;
		}
		#headimg h1 {
			font-family: "Leckerli One", Arial, Helvetica, sans-serif;
			font-size: 4.6em;
			font-weight: 500;
			line-height: 1.25;
			margin: 0 auto;
			position: relative;
			z-index: 2;
		}
		#headimg h1 a {
			text-decoration: none;
		}
		#desc {
			color: #0a6a5e !important;
			font-family: "Open Sans", Arial, Helvetica, sans-serif;
			font-size: 1em;
			font-weight: normal;
			margin: 0 auto;
			padding-bottom: 1.5em;
			position: relative;
			z-index: 2;
		}
		.header-background {
			background: rgba(6,156,136,0.75);
			display: block;
			position: absolute;
				top: 0;
				left: 0;
			width: 100%;
			height: 100%;
			z-index: 1;
		}
	</style>
<?php
}
endif; // kelly_admin_header_style

if ( ! function_exists( 'kelly_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see kelly_custom_header_setup().
 */
function kelly_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
	$bgstyle = '';
	$descstyle = '';
	if ( get_header_image() ) :
		$bgstyle = ' style="padding: 6em 0 1.5em; background-image: url( ' . get_header_image() . ' );"';
		$descstyle = ' style="color: #fff !important;"';
	endif; ?>
	<div id="headimg"<?php echo $bgstyle; ?>>
		<div class="header-background"></div>
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $descstyle; ?>><?php bloginfo( 'description' ); ?></div>
	</div>
<?php
}
endif; // kelly_admin_header_image
