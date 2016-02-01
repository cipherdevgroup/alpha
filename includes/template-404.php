<?php
/**
 * Template helper functions related to entries.
 *
 * @package    Alpha
 * @subpackage Alpha\Functions\TemplateHelpers
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * Output opening markup for the 404 article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_404_entry_open() {
	echo '<article id="error-404" class="entry error-404 not-found">';
}

/**
 * Output the 404 entry title.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_404_entry_title() {
	$text = apply_filters( 'alpha_404_entry_title', __( 'Oops! That page can&rsquo;t be found.', 'alpha' ) );

	printf( '<h1 %s>%s</h1>',
		alpha_get_attr( 'entry-title' ),
		esc_attr( $text )
	);
}

/**
 * Output the 404 entry title.
 *
 * @since  0.1.0
 * @access public
 * @param  string $content The existing content.
 * @return string $content The modified content.
 */
function alpha_404_content( $content ) {
	$content = wpautop( esc_attr__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'alpha' ) );

	$content .= get_search_form( false );

	$content .= alpha_get_the_widget( 'WP_Widget_Recent_Posts' );

	// Translators: %1$s is a smile emoji.
	$content .= alpha_get_the_widget(
		'WP_Widget_Archives',
		'dropdown=1',
		'after_title=</h2> ' . wpautop( sprintf(
			__( 'Try looking in the monthly archives. %1$s', 'alpha' ),
			convert_smilies( ':)' )
		) )
	);

	$content .= alpha_get_the_widget( 'WP_Widget_Tag_Cloud' );

	return apply_filters( 'alpha_404_content', $content );
}

/**
 * Output closing markup for the 404 article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_404_entry_close() {
	echo '</article><!-- #error-404 -->';
}
