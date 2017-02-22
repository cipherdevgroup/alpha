<?php
/**
 * Template helper functions related to entries.
 *
 * @package   Alpha\Functions\TemplateHelpers
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */

/**
 * Output opening markup for the entry article element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_open() {
	echo '<article ' . carelib_get_attr( 'post' ) . '>';
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
		printf( '<div %s><p class="ribbon-content">%s<p></div>',
			carelib_get_attr( 'corner-ribbon', 'sticky' ),
			esc_html__( 'Featured', 'alpha' )
		);
	}
}

/**
 * Output the featured image for all post types except pages and attachments.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_featured_image() {
	if ( in_array( get_post_type(), array( 'page', 'attachment' ), true ) ) {
		return;
	}

	carelib_image( apply_filters( 'alpha_featured_image',
		array(
			'size'   => 'alpha-featured',
			'before' => '<div class="featured-media image">',
			'after'  => '</div>',
			'link'   => ! is_singular(),
		)
	) );
}

/**
 * Output a formatted entry title.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_entry_title
 * @return void
 */
function alpha_entry_title() {
	carelib_entry_title();
}

/**
 * Output the opening markup for the entry header element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_header_open() {
	echo '<header ' . carelib_get_attr( 'entry-header' ) . '>';
}

/**
 * Output the opening markup for the entry meta element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_meta_open() {
	echo '<p ' . carelib_get_attr( 'entry-meta' ) . '>';
}

/**
 * Output formatted information about an entry's author.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_entry_author
 * @return void
 */
function alpha_entry_author() {
	carelib_entry_author();
}

/**
 * Output a post's formatted published date.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_entry_published
 * @return void
 */
function alpha_entry_published() {
	carelib_entry_published();
}

/**
 * Output a formatted link to the current entry comments.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_entry_comments_link
 * @return void
 */
function alpha_entry_comments_link() {
	carelib_entry_comments_link();
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
	echo '<div ' . carelib_get_attr( "entry-{$attr}" ) . '>';
}

/**
 * Display either an excerpt or the content depending on what page the user is
 * currently viewing.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_content
 * @return void
 */
function alpha_content() {
	carelib_content();
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
 * Output the opening markup for the entry footer element.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_footer_open() {
	echo '<footer ' . carelib_get_attr( 'entry-footer' ) . '>';
}

/**
 * Output formatted data about the current entry's post tag taxonomy terms.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_entry_meta_tags() {
	carelib_entry_terms(
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
	carelib_entry_terms(
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
 * Load a template for an author box on singular entries.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function alpha_author_box_singular() {
	if ( is_singular( 'post' ) ) {
		get_template_part( 'template-parts/content/author-box', 'singular' );
	}
}

/**
 * Output a next and previous post navigation element on single entries.
 *
 * @since  1.0.0
 * @access public
 * @uses   carelib_get_post_navigation
 * @return void
 */
function alpha_post_navigation() {
	carelib_post_navigation();
}
