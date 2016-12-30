<?php
/**
 * Modifications to TinyMCE, the default WordPress editor.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Add styleselect button to the end of the first row of TinyMCE buttons.
 *
 * @since  1.0.0
 * @access public
 * @param  array $buttons existing TinyMCE buttons.
 * @return array $buttons modified TinyMCE buttons.
 */
function carelib_tinymce_add_styleselect( $buttons ) {
	unset( $buttons['styleselect'] );

	array_push( $buttons, 'styleselect' );

	return $buttons;
}

/**
 * Remove styleselect button if it's been added to the second row of TinyMCE
 * buttons.
 *
 * @since  1.0.0
 * @access public
 * @param  array $buttons existing TinyMCE buttons.
 * @return array $buttons modified TinyMCE buttons.
 */
function carelib_tinymce_disable_styleselect( $buttons ) {
	unset( $buttons['styleselect'] );

	return $buttons;
}

/**
 * Add our custom CareLib styles to the styleselect dropdown button.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args existing TinyMCE arguments.
 * @return array $args modified TinyMCE arguments.
 * @see    http://wordpress.stackexchange.com/a/128950/9844
 */
function carelib_tinymce_formats( $args ) {
	$formats = apply_filters( 'carelib_tiny_mce_formats',
		array(
			array(
				'title'    => __( 'Drop Cap', 'alpha' ),
				'inline'   => 'span',
				'classes'  => 'dropcap',
			),
			array(
				'title'    => __( 'Pull Quote Left', 'alpha' ),
				'block'    => 'blockquote',
				'classes'  => 'pullquote alignleft',
				'wrapper'  => true,
			),
			array(
				'title'    => __( 'Pull Quote Right', 'alpha' ),
				'block'    => 'blockquote',
				'classes'  => 'pullquote alignright',
				'wrapper'  => true,
			),
			array(
				'title'    => __( 'Intro Paragraph', 'alpha' ),
				'selector' => 'p',
				'classes'  => 'intro-paragraph',
				'wrapper'  => true,
			),
			array(
				'title'    => __( 'Call to Action', 'alpha' ),
				'block'    => 'div',
				'classes'  => 'call-to-action',
				'wrapper'  => true,
				'exact'    => true,
			),
			array(
				'title'    => __( 'Feature Box', 'alpha' ),
				'block'    => 'div',
				'classes'  => 'feature-box',
				'wrapper'  => true,
				'exact'    => true,
			),
			array(
				'title'    => __( 'Code Block', 'alpha' ),
				'format'   => 'pre',
			),
			array(
				'title'    => __( 'Buttons', 'alpha' ),
				'items'    => array(
					array(
						'title'    => __( 'Standard', 'alpha' ),
						'selector' => 'a',
						'classes'  => 'button',
						'exact'    => true,
					),
					array(
						'title'    => __( 'Standard Block', 'alpha' ),
						'selector' => 'a',
						'classes'  => 'button block',
						'exact'    => true,
					),
					array(
						'title'    => __( 'Call to Action', 'alpha' ),
						'selector' => 'a',
						'classes'  => 'button secondary cta',
						'exact'    => true,
					),
					array(
						'title'    => __( 'Call to Action Block', 'alpha' ),
						'selector' => 'a',
						'classes'  => 'button secondary cta block',
						'exact'    => true,
					),
				),
			),
		)
	);
	// Merge with any existing formats which have been added by plugins.
	if ( ! empty( $args['style_formats'] ) ) {
		$existing_formats = json_decode( $args['style_formats'] );
		$formats = array_merge( $formats, $existing_formats );
	}

	$args['style_formats'] = wp_json_encode( $formats );

	return $args;
}
