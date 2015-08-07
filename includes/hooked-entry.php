<?php
/**
 * Functions used to hook entry template parts and other markup elements.
 *
 * @package    Alpha\Functions\Hooks
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

// Prevent direct access.
defined( 'ABSPATH' ) || exit;

add_action( 'tha_entry_top',            'alpha_entry_open',           0 );
add_action( 'tha_entry_top',            'alpha_sticky_banner',        2 );
add_action( 'tha_entry_top',            'alpha_post_image',           4 );
add_action( 'tha_entry_top',            'alpha_entry_header_open',    8 );
add_action( 'tha_entry_top',            'alpha_entry_title',         10 );
add_action( 'tha_entry_before',         'alpha_entry_meta',          12 );
add_action( 'tha_entry_top',            'alpha_entry_header_close',  30 );
add_action( 'tha_entry_content_before', 'alpha_entry_content_open',  10 );
add_action( 'tha_entry_content_after',  'alpha_link_pages',           5 );
add_action( 'tha_entry_content_after',  'alpha_entry_content_close', 10 );
add_action( 'tha_entry_content_after',  'alpha_entry_footer',        10 );
add_action( 'tha_entry_bottom',         'alpha_entry_close',         99 );
add_action( 'tha_entry_after',          'alpha_post_navigation',     10 );
add_action( 'tha_entry_after',          'alpha_comments',            14 );

/**
 * Output opening markup for the entry article element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_open() {
	echo '<article ' . alpha_get_attr( 'post' ) . '>';
}

/**
 * Output markup for a sticky ribbon on sticky posts in archive views.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_sticky_banner() {
	if ( ! is_singular() && is_sticky() ) {
		get_template_part( 'templates/hooked/entry-sticky', 'banner' );
	}
}

/**
 * Output the featured post image within archives.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_post_image() {
	if ( 'post' !== get_post_type() ) {
		return;
	}
	$link = is_singular() ? false : true;
	alpha_image( apply_filters( 'alpha_post_image',
		array(
			'size'         => 'featured-image',
			'order'        => array( 'featured', 'attachment' ),
			'before'       => '<div class="featured-media image">',
			'after'        => '</div>',
			'link_to_post' => $link,
		)
	) );
}

/**
 * Output a formatted entry title.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_title
 * @param  $args array
 * @return string
 */
function alpha_entry_title( $args = array() ) {
	echo carelib_class( 'template-entry' )->get_entry_title( $args );
}

/**
 * Add hooks for the entry meta on all entries except pages and attachments.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_meta() {
	if ( is_page() || is_attachment() ) {
		return;
	}
	add_action( 'tha_entry_top', 'alpha_entry_meta_open',     12 );
	add_action( 'tha_entry_top', 'alpha_entry_author',        16 );
	add_action( 'tha_entry_top', 'alpha_entry_published',     18 );
	add_action( 'tha_entry_top', 'alpha_entry_comments_link', 20 );
	add_action( 'tha_entry_top', 'alpha_entry_meta_close',    26 );
}

/**
 * Output the opening markup for the entry header element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_header_open() {
	echo '<header ' . alpha_get_attr( 'entry-header' ) . '>';
}

/**
 * Output the opening markup for the entry meta element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_meta_open() {
	echo '<p ' . alpha_get_attr( 'entry-meta' ) . '>';
}

/**
 * Output formatted information about an entry's author.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_author
 * @param  $args array
 * @return string
 */
function alpha_entry_author( $args = array() ) {
	echo carelib_class( 'template-entry' )->get_entry_author( $args );
}

/**
 * Output a post's formatted published date.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_published
 * @param  $args array
 * @return string
 */
function alpha_entry_published( $args = array() ) {
	echo carelib_class( 'template-entry' )->get_entry_published( $args );
}

/**
 * Output a formatted link to the current entry comments.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_comments_link
 * @param  $args array Empty array if no arguments.
 * @return string output
 */
function alpha_entry_comments_link( $args = array() ) {
	echo carelib_class( 'template-entry' )->get_entry_comments_link( $args );
}

/**
 * Output the closing markup for the entry meta element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_meta_close() {
	echo '</p><!-- .entry-meta -->';
}

/**
 * Output the closing markup for the entry header element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_header_close() {
	echo '</header><!-- .entry-header -->';
}

/**
 * Output the opening markup for the entry content element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_content_open() {
	$attr = is_singular() ? 'content' : 'summary';
	echo '<div ' . alpha_get_attr( "entry-{$attr}" ) . '>';
}

/**
 * Output singular entry pagination links.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_link_pages() {
	if ( is_singular() ) {
		wp_link_pages();
	}
}

/**
 * Output the closing markup for the entry content element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_content_close() {
	echo '</div><!-- .entry-content -->';
}

/**
 * Add hooks for the entry footer on all entries except pages and attachments.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_footer() {
	if ( is_page() || is_attachment() ) {
		return;
	}
	add_action( 'tha_entry_bottom', 'alpha_entry_footer_open',     12 );
	add_action( 'tha_entry_bottom', 'alpha_entry_meta_tags',       16 );
	add_action( 'tha_entry_bottom', 'alpha_entry_meta_categories', 18 );
	add_action( 'tha_entry_bottom', 'alpha_entry_footer_close',    26 );
}

/**
 * Output the opening markup for the entry footer element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_footer_open() {
	echo '<footer ' . alpha_get_attr( 'entry-footer' ) . '>';
}

/**
 * Output formatted data about the current entry's post tag taxonomy terms.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_meta_tags() {
	if ( ! has_term( '', 'post_tag' ) ) {
		return;
	}
	alpha_entry_terms(
		array(
			'taxonomy' => 'post_tag',
			'before'   => '<p class="entry-meta tags">',
			'after'    => '</p>',
		)
	);
}

/**
 * Output formatted data about the current entry's category taxonomy terms.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_meta_categories() {
	if ( ! has_term( '', 'category' ) ) {
		return;
	}
	alpha_entry_terms(
		array(
			'taxonomy' => 'category',
			'before'   => '<p class="entry-meta categories">',
			'after'    => '</p>',
		)
	);
}

/**
 * Output the closing markup for the entry footer element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_footer_close() {
	echo '</footer><!-- .entry-footer -->';
}

/**
 * Output closing markup for the entry article element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_close() {
	echo '</article><!-- .entry -->';
}

/**
 * Output a next and previous post navigation element on single entries.
 *
 * @since  1.0.0
 * @access public
 * @uses   CareLib_Template_Entry::get_post_navigation
 * @param  $args array
 * @return string
 */
function alpha_post_navigation( $args = array() ) {
	echo carelib_class( 'template-entry' )->get_post_navigation( $args );
}

/**
 * Output the comments template.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_comments() {
	if ( apply_filters( 'alpha_display_comments', ! ( is_page() || is_attachment() ) ) ) {
		comments_template();
	}
}
