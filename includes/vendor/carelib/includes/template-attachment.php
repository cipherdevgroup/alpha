<?php
/**
 * Template helper functions used within the attachment pages.
 *
 * @package    CareLib
 * @copyright  Copyright (c) 2018, Cipher Development, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

/**
 * Output a formatted attachment image.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function carelib_get_attachment_image() {
	if ( ! wp_attachment_is_image() ) {
		return false;
	}

	$image = wp_get_attachment_image(
		get_the_ID(),
		'full',
		false,
		array( 'class' => 'aligncenter' )
	);

	if ( has_excerpt() ) {
		$src   = wp_get_attachment_image_src( get_the_ID(), 'full' );
		$image = img_caption_shortcode(
			array(
				'align'   => 'aligncenter',
				'width'   => esc_attr( $src[1] ),
				'caption' => get_the_excerpt(),
			),
			wp_get_attachment_image( get_the_ID(), 'full', false )
		);
	}

	return apply_filters( 'carelib_carelib_attachment_image', $image );
}

/**
 * Output a formatted attachment image.
 *
 * @since  2.0.0
 * @access public
 * @return void
 */
function carelib_attachment_image() {
	echo carelib_get_attachment_image();
}
