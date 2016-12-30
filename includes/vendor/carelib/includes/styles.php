<?php
/**
 * Methods for handling CSS in the library.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Build a Google Fonts string.
 *
 * @since  1.0.0
 * @access public
 * @param  string $families the font families to include.
 * @param  bool   $editor_style set to true if string is being used as editor style.
 * @return string
 */
function carelib_get_google_fonts_string( $families, $editor_style = false ) {
	$string = "https://fonts.googleapis.com/css?family={$families}";
	return $editor_style ? str_replace( ',', '%2C', $string ) : $string;
}

/**
 * Register front-end stylesheets for the library.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_register_styles() {
	wp_register_style(
		'carelib-parent',
		carelib_get_parent_stylesheet_uri(),
		array(),
		carelib_get_parent_version()
	);

	wp_register_style(
		'carelib-style',
		get_stylesheet_uri(),
		array(),
		carelib_get_theme_version()
	);
}

/**
 * Returns the parent theme stylesheet URI. Will return the active theme's
 * stylesheet URI if no child theme is active. Be sure to check
 * `is_child_theme()` when using.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_parent_stylesheet_uri() {
	$suffix = carelib_get_suffix();

	// Get the parent theme stylesheet.
	$stylesheet_uri = carelib_get_parent_uri() . 'style.css';

	// If a '.min' version of the parent theme stylesheet exists, use it.
	if ( $suffix && file_exists( carelib_get_parent_dir() . "style{$suffix}.css" ) ) {
		$stylesheet_uri = carelib_get_parent_uri() . "style{$suffix}.css";
	}

	return apply_filters( 'parent_stylesheet_uri', $stylesheet_uri );
}

/**
 * Filter the 'stylesheet_uri' to load a minified version of 'style.css'
 * file if it is available.
 *
 * @since  1.0.0
 * @access public
 * @param  string $stylesheet_uri The URI of the active theme's stylesheet.
 * @param  string $stylesheet_dir_uri The directory URI of the active theme's stylesheet.
 * @return string $stylesheet_uri
 */
function carelib_min_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {
	$suffix = carelib_get_suffix();

	if ( ! $suffix ) {
		return $stylesheet_uri;
	}

	// Remove the stylesheet directory URI from the file name.
	$stylesheet = str_replace( trailingslashit( $stylesheet_dir_uri ), '', $stylesheet_uri );

	// Change the stylesheet name to 'style.min.css'.
	$stylesheet = str_replace( '.css', "{$suffix}.css", $stylesheet );

	if ( file_exists( carelib_get_child_dir() . $stylesheet ) ) {
		$stylesheet_uri = esc_url( trailingslashit( $stylesheet_dir_uri ) . $stylesheet );
	}

	return $stylesheet_uri;
}

/**
 * Retrieve the theme file with the highest priority that exists.
 *
 * @since  1.0.0
 * @access public
 * @link   http://core.trac.wordpress.org/ticket/18302
 * @param  array $file_names The files to search for.
 * @return string
 */
function _carelib_locate_theme_file( $file_names ) {
	$located = '';

	foreach ( (array) $file_names as $file ) {
		// If the file exists in the stylesheet (child theme) directory.
		if ( is_child_theme() && file_exists( carelib_get_child_dir() . $file ) ) {
			$located = carelib_get_child_uri() . $file;
			break;
		}
		// If the file exists in the template (parent theme) directory.
		if ( file_exists( carelib_get_parent_dir() . $file ) ) {
			$located = carelib_get_parent_uri() . $file;
			break;
		}
	}

	return $located;
}

/**
 * Searches for a locale stylesheet. This function looks for stylesheets in
 * the `css` folder in the following order:
 *
 * 1) $lang-$region.css,
 * 2) $region.css,
 * 3) $lang.css,
 * 4) $text_direction.css.
 *
 * It first checks the child theme for these files. If they are not present,
 * it will check the parent theme. This is much more robust than the
 * WordPress locale stylesheet, allowing for multiple variations and a more
 * flexible hierarchy.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_locale_style() {
	$styles = array();

	// Get the locale, language, and region.
	$locale = strtolower( str_replace( '_', '-', get_locale() ) );
	$lang   = strtolower( carelib_get_language() );
	$region = strtolower( carelib_get_region() );

	$styles[] = "css/{$locale}.css";

	if ( $region !== $locale ) {
		$styles[] = "css/{$region}.css";
	}

	if ( $lang !== $locale ) {
		$styles[] = "css/{$lang}.css";
	}

	$styles[] = is_rtl() ? 'css/rtl.css' : 'css/ltr.css';

	return _carelib_locate_theme_file( $styles );
}

/**
 * Filters `locale_stylesheet_uri` with a more robust version for checking
 * locale/language/region/direction stylesheets.
 *
 * @since  1.0.0
 * @access public
 * @param  string $stylesheet_uri
 * @return string
 */
function carelib_locale_stylesheet_uri( $stylesheet_uri ) {
	$locale_style = carelib_get_locale_style();

	return $locale_style ? esc_url( $locale_style ) : $stylesheet_uri;
}
