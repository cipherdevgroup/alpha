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

add_action( 'tha_head_bottom',  'alpha_force_attachment_layout',  10 );
add_action( 'tha_entry_before', 'alpha_attachment_entry_content', 10 );

/**
 * Force the layout on attachment pages.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_force_attachment_layout() {
	if ( is_attachment() ) {
		add_filter( 'theme_mod_theme_layout', 'alpha_return_full_width_narrow_layout' );
	}
}

/**
 * Add hooks for displaying all entry meta data and content on attachment pages.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_attachment_entry_content() {
	if ( is_attachment() ) {
		add_action( 'tha_entry_top',    'alpha_attachment_image', 4 );
		add_action( 'tha_entry_top',    'alpha_entry_meta_open',  12 );
		add_action( 'tha_entry_top',    'alpha_entry_published',  18 );
		add_action( 'tha_entry_top',    'alpha_entry_meta_close', 26 );
		add_action( 'tha_entry_bottom', 'alpha_attachment_meta_open',     12 );
		add_action( 'tha_entry_bottom', 'alpha_attachment_image_gallery', 14 );
		add_action( 'tha_entry_bottom', 'alpha_attachment_meta_close',    22 );
	}
}

/**
 * Output a formatted attachment image.
 *
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since  1.0.0
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
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_attachment_meta_close() {
	echo '</div><!-- .attachment-meta -->';
}
