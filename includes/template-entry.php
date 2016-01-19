<?php
/**
 * Template helper functions related to entries.
 *
 * @package    Alpha\Fucntions\TemplateHelpers
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Display a formatted markup block with information about the entry's terms.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_terms
 * @param  array $args a list of arguments to pass to the entry terms method.
 * @return void
 */
function alpha_entry_terms( $args = array() ) {
	echo carelib_get( 'template-entry' )->get_entry_terms( $args );
}

/**
 * Display either an excerpt or the content depending on what page the user is
 * currently viewing.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::get_content
 * @return void
 */
function alpha_content() {
	echo carelib_get( 'template-entry' )->get_content();
}

/**
 * Remove all actions from THA entry hooks and filter the WordPress post
 * content to return null.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::null_entry
 * @return void
 */
function alpha_null_entry() {
	carelib_get( 'template-entry' )->null_entry();
}

/**
 * Filter the WordPress content to null between the entry_content_before
 * and entry_content_after hook locations.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::null_entry_content
 * @return void
 */
function alpha_null_entry_content() {
	carelib_get( 'template-entry' )->null_entry_content();
}

/**
 * Hookable wrapper around a filter to null the WordPress core post content.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::null_the_content
 * @return void
 */
function alpha_null_the_content() {
	carelib_get( 'template-entry' )->null_the_content();
}

/**
 * A custom comment callback to use with WordPress' `comments_template` function.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Comments::comments_callback
 * @param  object  $comment the comment object.
 * @param  array   $args list of arguments passed from wp_list_comments().
 * @param  integer $depth What level the particular comment is.
 * @return void
 */
function alpha_comments_callback( $comment, $args, $depth ) {
	carelib_get( 'template-comments' )->comments_callback( $comment, $args, $depth );
}

/**
 * Output opening markup for the entry article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_open() {
	echo '<article ' . alpha_get_attr( 'post' ) . '>';
}

/**
 * Output markup for a sticky ribbon on sticky posts in archive views.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_sticky_banner() {
	if ( ! is_singular() && is_sticky() ) {
		printf( '<div %s><p class="ribbon-content">%s<p></div>',
			alpha_get_attr( 'corner-ribbon', 'sticky' ),
			esc_html__( 'Featured', 'alpha' )
		);
	}
}

/**
 * Output the featured post image within archives.
 *
 * @since  0.1.0
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
			'size'         => 'featured',
			'before'       => '<div class="featured-media image">',
			'after'        => '</div>',
			'link_to_post' => $link,
		)
	) );
}

/**
 * Output a formatted entry title.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_title
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_title( $args = array() ) {
	echo carelib_get( 'template-entry' )->get_entry_title( $args );
}

/**
 * Add hooks for the entry meta on all entries except pages and attachments.
 *
 * @since  0.1.0
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
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_header_open() {
	echo '<header ' . alpha_get_attr( 'entry-header' ) . '>';
}

/**
 * Output the opening markup for the entry meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_open() {
	echo '<p ' . alpha_get_attr( 'entry-meta' ) . '>';
}

/**
 * Output formatted information about an entry's author.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_author
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_author( $args = array() ) {
	echo carelib_get( 'template-entry' )->get_entry_author( $args );
}

/**
 * Output a post's formatted published date.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_published
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_published( $args = array() ) {
	echo carelib_get( 'template-entry' )->get_entry_published( $args );
}

/**
 * Output a formatted link to the current entry comments.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::get_entry_comments_link
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_entry_comments_link( $args = array() ) {
	echo carelib_get( 'template-entry' )->get_entry_comments_link( $args );
}

/**
 * Output the closing markup for the entry meta element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_meta_close() {
	echo '</p><!-- .entry-meta -->';
}

/**
 * Output the closing markup for the entry header element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_header_close() {
	echo '</header><!-- .entry-header -->';
}

/**
 * Output the opening markup for the entry content element.
 *
 * @since  0.1.0
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
 * @since  0.1.0
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
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_content_close() {
	echo '</div><!-- .entry-content -->';
}

/**
 * Add hooks for the entry footer on all entries except pages and attachments.
 *
 * @since  0.1.0
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
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_footer_open() {
	echo '<footer ' . alpha_get_attr( 'entry-footer' ) . '>';
}

/**
 * Output formatted data about the current entry's post tag taxonomy terms.
 *
 * @since  0.1.0
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
 * @since  0.1.0
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
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_footer_close() {
	echo '</footer><!-- .entry-footer -->';
}

/**
 * Output closing markup for the entry article element.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_entry_close() {
	echo '</article><!-- .entry -->';
}

/**
 * Output a next and previous post navigation element on single entries.
 *
 * @since  0.1.0
 * @access public
 * @uses   CareLib_Template_Entry::get_post_navigation
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function alpha_post_navigation( $args = array() ) {
	echo carelib_get( 'template-entry' )->get_post_navigation( $args );
}

/**
 * Output the comments template.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function alpha_comments() {
	if ( apply_filters( 'alpha_display_comments', ! ( is_page() || is_attachment() ) ) ) {
		comments_template();
	}
}
