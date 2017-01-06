<?php
/**
 * Theme functions which set up theme elements, defaults, and settings.
 *
 * @package   Alpha\Functions
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */

/**
 * Set the content width and allow it to be filtered directly.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alpha_content_width', 1140 );
}

/**
 * Return the parent theme's textdomain to avoid getting it from the file system.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function alpha_get_parent_textdomain() {
	return 'alpha';
}

/**
 * Set up theme defaults and add support for WordPress and CareLib features.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
}

/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_image_sizes() {
	set_post_thumbnail_size( 175, 130, true );
	add_image_size( 'alpha-featured',      1025, 600, true );
	add_image_size( 'alpha-featured-small', 513, 300, true );
}

/**
 * Register custom nav menus for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_nav_menus() {
	register_nav_menus( array(
		'primary'   => _x( 'Primary Menu', 'nav menu location', 'alpha' ),
		'secondary' => _x( 'Secondary Menu', 'nav menu location', 'alpha' ),
	) );
}

/**
 * Register our theme's custom layout options.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_layouts() {
	carelib_register_layouts(
		array(
			'2c-r' => array(
				'label'            => _x( '2 Columns: Right Sidebar', 'theme layout', 'alpha' ),
				'is_global_layout' => true,
				'is_post_layout'   => true,
				'image'            => '%s/images/sidebar-right.svg',
			),
			'2c-l' => array(
				'label'            => _x( '2 Columns: Left Sidebar', 'theme layout', 'alpha' ),
				'is_global_layout' => true,
				'is_post_layout'   => true,
				'image'            => '%s/images/sidebar-left.svg',
			),
			'1c' => array(
				'label'            => _x( '1 Column Wide', 'theme layout', 'alpha' ),
				'is_global_layout' => true,
				'is_post_layout'   => true,
				'image'            => '%s/images/one-column.svg',
			),
			'1c-narrow' => array(
				'label'            => _x( '1 Column Narrow', 'theme layout', 'alpha' ),
				'is_global_layout' => true,
				'is_post_layout'   => true,
				'image'            => '%s/images/one-column-narrow.svg',
			),
		)
	);
}

/**
 * Set the default layout for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_set_default_layout() {
	carelib_set_default_layout( is_rtl() ? '2c-l' : '2c-r' );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_register_sidebars() {
	carelib_register_sidebar( array(
		'id'          => 'primary',
		'name'        => _x( 'Primary Sidebar', 'sidebar', 'alpha' ),
		'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'alpha' ),
	) );
	carelib_register_sidebar( array(
		'id'          => 'footer-widgets',
		'name'        => _x( 'Footer Widgets', 'sidebar', 'alpha' ),
		'description' => __( 'A widgeted area which displays just before the main site footer on all pages.', 'alpha' ),
	) );
}
