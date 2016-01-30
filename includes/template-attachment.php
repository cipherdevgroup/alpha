<?php
/**
 * Functions used to hook attachment template parts and other markup elements.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

/**
 * Output a formatted attachment image.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_attachment_image() {
	if ( ! wp_attachment_is_image() ) {
		return;
	}
	alpha_null_the_content();

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

	echo $image;
}

/**
 * Output the opening markup for the attachment meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_attachment_meta_open() {
	echo '<div ' . alpha_get_attr( 'attachment-meta' ) . '>';
}

/**
 * Output a formatted WordPress image gallery of related attachments on
 * attachment image pages.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_attachment_image_gallery() {
	if ( ! wp_attachment_is_image() ) {
		return;
	}
	$parent  = get_queried_object()->post_parent;
	if ( empty( $parent ) ) {
		return;
	}
	$gallery = gallery_shortcode(
		array(
			'columns'     => 4,
			'numberposts' => 8,
			'orderby'     => 'rand',
			'id'          => $parent,
			'exclude'     => get_the_ID(),
		)
	);
	if ( empty( $gallery ) ) {
		return;
	}

	$markup = '<div class="image-gallery"><h3 class="attachment-meta-title">%s</h3>%s</div>';
	$title = esc_attr__( 'Related Images', 'alpha' );

	echo apply_filters( 'alpha_attachment_image_gallery', sprintf( $markup, $title, $gallery ), $markup, $title, $gallery );
}

/**
 * Output the closing markup for the attachment meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_attachment_meta_close() {
	echo '</div><!-- .attachment-meta -->';
}
