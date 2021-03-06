<?php
/**
 * Load Theme JavaScript and CSS
 *
 * @package   Alpha\Functions\Scripts
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

/**
 * Load a minified version of the theme's stylesheet along with any other
 * required theme CSS files.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_enqueue_styles() {
	wp_enqueue_style( 'carelib-style' );

	if ( apply_filters( 'alpha_enable_google_fonts', true ) ) {
		wp_enqueue_style(
			'alpha-google-fonts',
			carelib_get_google_fonts_string( 'Raleway:400,600|Lato:400,400italic,700' ),
			array(),
			null
		);
	}

	wp_enqueue_style(
		'alpha-font-awesome',
		'//use.fontawesome.com/releases/v5.2.0/css/all.css',
		array(),
		'5.2.0'
	);
}

/**
 * Register and load JavaScript files.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_enqueue_scripts() {
	$suffix  = carelib_get_suffix();

	wp_enqueue_script(
		'alpha-general',
		PARENT_THEME_URI . "js/theme{$suffix}.js",
		array( 'jquery' ),
		PARENT_THEME_VERSION,
		true
	);
}

/**
 * Replace the default theme stylesheet with a RTL version when a RTL
 * language is being used.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_rtl_add_data() {
	wp_style_add_data( 'carelib-style', 'rtl', 'replace' );
	wp_style_add_data( 'carelib-style', 'suffix', carelib_get_suffix() );
}

/**
 * Add custom styles to the WordPress editor to give a better representation of
 * what the front of the site will look like.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_add_editor_styles() {
	$styles = array(
		'css/editor-style' . carelib_get_suffix() . '.css',
	);

	if ( apply_filters( 'alpha_enable_google_fonts', true ) ) {
		$styles[] = carelib_get_google_fonts_string( 'Raleway:400,600|Lato:400,400italic,700', true );
	}

	add_editor_style( $styles );
}
