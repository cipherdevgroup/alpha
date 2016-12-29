<?php
/**
 * Functions used to hook attachment template parts and other markup elements.
 *
 * @package   Alpha\Functions\TemplateHelpers
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */

/**
 * Output a formatted attachment image.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_attachment_image() {
	carelib_attachment_image();
}

/**
 * Output the opening markup for the attachment meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_attachment_meta_open() {
	echo '<div ' . carelib_get_attr( 'attachment-meta' ) . '>';
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
	echo carelib_get_attachment_image_gallery();
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
