<?php
/**
 * Functions used to hook attachment template parts and other markup elements.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'tha_entry_before', 'alpha_attachment_entry_meta', 20 );
add_action( 'tha_entry_before', 'alpha_attachment_image', 10 );
add_action( 'tha_entry_after',  'alpha_attachment_meta', 10 );

function alpha_attachment_entry_meta() {
	if ( is_attachment() ) {
		add_action( 'tha_entry_top', 'alpha_entry_meta_open',  12 );
		add_action( 'tha_entry_top', 'alpha_entry_published',  18 );
		add_action( 'tha_entry_top', 'alpha_entry_meta_close', 26 );
	}
}

function alpha_attachment_image() {
	if ( ! wp_attachment_is_image() ) {
		return;
	}
	// Null the content so we don't have two images.
	add_filter( 'the_content', '__return_null' );

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

function alpha_attachment_meta() {
	if ( is_attachment() ) {
		remove_action( 'tha_entry_after', 'comments_template', 14 );

		add_action( 'tha_entry_after', 'alpha_attachment_meta_open',     12 );
		add_action( 'tha_entry_after', 'alpha_attachment_image_gallery', 14 );
		add_action( 'tha_entry_after', 'alpha_attachment_meta_close',    22 );
	}
}

function alpha_attachment_meta_open() {
	echo '<div ' . alpha_get_attr( 'attachment-meta' ) . '>';
}

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

	echo '<div class="image-gallery">';
	printf( '<h3 class="attachment-meta-title">%s</h3>',
		esc_attr__( 'Related Images', 'alpha' )
	);
	echo $gallery;
	echo '</div>';
}

function alpha_attachment_meta_close() {
	echo '</div><!-- .attachment-meta -->';
}
