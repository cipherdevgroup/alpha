<?php
/**
 * Template helper functions used within the 404 page.
 *
 * @package    CareLib
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

/**
 * Output the 404 entry title.
 *
 * @since  1.0.0
 * @access public
 * @return string The 404 entry title.
 */
function carelib_get_404_entry_title() {
	$text = apply_filters( 'carelib_404_entry_title', __( 'Oops! That page can&rsquo;t be found.', 'alpha' ) );

	return sprintf( '<h1 %s>%s</h1>',
		carelib_get_attr( 'entry-title' ),
		esc_attr( $text )
	);
}

/**
 * Output the 404 entry title.
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
function carelib_404_entry_title() {
	echo carelib_get_404_entry_title();
}

/**
 * Output the 404 entry title.
 *
 * @since  1.0.0
 * @access public
 * @return string $content The modified content.
 */
function carelib_get_404_content() {
	$content = wpautop( esc_attr__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'alpha' ) );

	$content .= get_search_form( false );

	$content .= carelib_get_the_widget( 'WP_Widget_Recent_Posts' );

	// Translators: %1$s is a smile emoji.
	$after_title = wpautop( sprintf( __( 'Try looking in the monthly archives. %1$s', 'alpha' ),
		convert_smilies( ':)' )
	) );

	$content .= carelib_get_the_widget( 'WP_Widget_Archives', 'dropdown=1', 'after_title=</h2> ' . $after_title );

	$content .= carelib_get_the_widget( 'WP_Widget_Tag_Cloud' );

	return apply_filters( 'carelib_404_content', $content );
}
