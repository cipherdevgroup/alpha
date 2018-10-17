<?php
/**
 * Template functions related to posts.
 *
 * The functions in this file are for handling template tags or features of
 * template tags that WordPress core does not currently handle.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Determine if the current view should contain an entry header.
 *
 * @since  1.0.0
 * @access public
 * @return bool true on all views by default.
 */
function carelib_has_entry_header() {
	return (bool) apply_filters( 'carelib_has_entry_header', true );
}

/**
 * Determine if the current view should contain entry header meta.
 *
 * @since  1.0.0
 * @access public
 * @return bool true on all views except single pages by default.
 */
function carelib_has_entry_header_meta() {
	return (bool) apply_filters( 'carelib_has_entry_header_meta', ( 'post' === get_post_type() ) );
}

/**
 * Protected helper function to format the entry title's display.
 *
 * @since  1.0.0
 * @access protected
 * @param  mixed  $id the desired title's post id.
 * @param  string $link the desired title's link URI.
 * @return string
 */
function _carelib_get_formatted_title( $id = '', $link = '' ) {
	$post_id = empty( $id ) ? get_the_ID() : $id;
	$title   = get_the_title( absint( $post_id ) );

	if ( empty( $link ) ) {
		return $title;
	}

	if ( get_permalink() === $link && get_the_ID() !== $post_id ) {
		$link = get_permalink( absint( $post_id ) );
	}

	return sprintf( '<a href="%s">%s</a>',
		esc_url( $link ),
		$title
	);
}

/**
 * Wrapper for get_the_title format the post title without needing to add a
 * lot of extra markup in template files.
 *
 * By default, all entry titles except the main title on single entries are
 * wrapped in an anchor tag pointed to the post's permalink.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Empty array if no arguments.
 * @return string
 */
function carelib_get_entry_title( $args = array() ) {
	$is_main  = is_singular() && is_main_query();

	$defaults = apply_filters( 'carelib_entry_title_defaults',
		array(
			'tag'     => $is_main ? 'h1' : 'h2',
			'attr'    => 'entry-title',
			'link'    => $is_main ? '' : get_permalink(),
			'post_id' => get_the_ID(),
			'before'  => '',
			'after'   => '',
		)
	);

	$args = wp_parse_args( $args, $defaults );

	// Bail if required args have been removed via a filter.
	if ( ! isset( $args['tag'], $args['post_id'], $args['attr'], $args['link'] ) ) {
		return false;
	}

	$html = '';

	$html .= isset( $args['before'] ) ? $args['before'] : '';

	$html .= sprintf( '<%1$s %2$s>%3$s</%1$s>',
		$args['tag'],
		carelib_get_attr( $args['attr'] ),
		_carelib_get_formatted_title( $args['post_id'], $args['link'] )
	);

	$html .= isset( $args['after'] ) ? $args['after'] : '';

	return apply_filters( 'carelib_entry_title', $html, $args );
}

/**
 * Output a formatted entry title.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_entry_title
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function carelib_entry_title( $args = array() ) {
	echo carelib_get_entry_title( $args );
}

/**
 * Get a post's published date and format it to be displayed in a template.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Empty array if no arguments.
 * @return string
 */
function carelib_get_entry_published( $args = array() ) {
	$defaults = apply_filters( 'carelib_entry_published_defaults',
		array(
			'attr'   => 'entry-published',
			'date'   => get_the_date(),
			'wrap'   => '<time %s>%s</time>',
			'before' => '',
			'after'  => '',
		)
	);

	$args = wp_parse_args( $args, $defaults );

	// Bail if required args have been removed via a filter.
	if ( ! isset( $args['attr'], $args['date'], $args['wrap'] ) ) {
		return false;
	}

	$html = '';

	$html .= isset( $args['before'] ) ? $args['before'] : '';

	$html .= sprintf( $args['wrap'],
		carelib_get_attr( $args['attr'] ),
		$args['date']
	);

	$html .= isset( $args['after'] ) ? $args['after'] : '';

	return apply_filters( 'carelib_entry_published', $html, $args );
}

/**
 * Output a post's formatted published date.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_entry_published
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function carelib_entry_published( $args = array() ) {
	echo carelib_get_entry_published( $args );
}

/**
 * Produces a formatted link to the current entry comments.
 *
 * Supported arguments are:
 * - after (output after link, default is empty string),
 * - before (output before link, default is empty string),
 * - hide_if_off (hide link if comments are off, default is 'enabled' (true)),
 * - more (text when there is more than 1 comment, use % character as placeholder
 *   for actual number, default is '% Comments')
 * - one (text when there is exactly one comment, default is '1 Comment'),
 * - zero (text when there are no comments, default is 'Leave a Comment').
 *
 * Output passes through "carelib_get_entry_comments_link" filter before returning.
 *
 * @since  1.0.0
 * @param  array $args Empty array if no arguments.
 * @return string output
 */
function carelib_get_entry_comments_link( $args = array() ) {
	$defaults = apply_filters( 'carelib_entry_comments_link_defaults',
		array(
			'hide_if_off' => 'enabled',
			'attr'        => 'entry-comments-link',
			'more'        => __( '% Comments', 'alpha' ),
			'one'         => __( '1 Comment', 'alpha' ),
			'zero'        => __( 'Leave a Comment', 'alpha' ),
			'before'      => '',
			'after'       => '',
		)
	);
	$args = wp_parse_args( $args, $defaults );

	$required = isset(
		$args['hide_if_off'],
		$args['attr'],
		$args['more'],
		$args['one'],
		$args['zero']
	);

	// Bail if required args have been removed via a filter or comments are closed.
	if ( ! $required || ! ( comments_open() && 'enabled' === $args['hide_if_off'] ) ) {
		return false;
	}

	$link = get_comments_link();
	$text = get_comments_number_text( $args['zero'], $args['one'], $args['more'] );
	$html = '';

	$html .= isset( $args['before'] ) ? $args['before'] : '';

	$html .= sprintf( '<span %s><a rel="nofollow" href="%s">%s</a></span>',
		carelib_get_attr( $args['attr'] ),
		$link,
		$text
	);

	$html .= isset( $args['after'] ) ? $args['after'] : '';

	return apply_filters( 'carelib_entry_comments_link', $html, $link, $text, $args );
}

/**
 * Output a formatted link to the current entry comments.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_entry_comments_link
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function carelib_entry_comments_link( $args = array() ) {
	echo carelib_get_entry_comments_link( $args );
}

/**
 * Backwards compatible wrapper for get_the_author_posts_link() which was
 * added to WordPress core in 4.4.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function _carelib_get_the_author_posts_link() {
	if ( function_exists( 'get_the_author_posts_link' ) ) {
		return get_the_author_posts_link();
	}

	ob_start();
	the_author_posts_link();
	return ob_get_clean();
}

/**
 * Get the current post's author in The Loop and optionally link to their
 * archive page.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Empty array if no arguments.
 * @return string
 */
function carelib_get_entry_author( $args = array() ) {
	$defaults = apply_filters( 'carelib_entry_author_defaults',
		array(
			'text'   => '%s',
			'link'   => _carelib_get_the_author_posts_link(),
			'attr'   => 'entry-author',
			'wrap'   => '<span %s>%s</span>',
			'before' => '',
			'after'  => '',
		)
	);

	$args = wp_parse_args( $args, $defaults );

	// Bail if required args have been removed via a filter.
	if ( ! isset( $args['text'], $args['link'], $args['attr'], $args['wrap'] ) ) {
		return false;
	}

	$html = '';

	$html .= isset( $args['before'] ) ? $args['before'] : '';

	$html .= sprintf( $args['wrap'],
		carelib_get_attr( $args['attr'] ),
		sprintf( $args['text'], $args['link'] )
	);

	$html .= isset( $args['after'] ) ? $args['after'] : '';

	return apply_filters( 'carelib_entry_author', $html, $args );
}

/**
 * Output formatted information about an entry's author.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_entry_author
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function carelib_entry_author( $args = array() ) {
	echo carelib_get_entry_author( $args );
}

/**
 * Filters the excerpt more output with internationalized text and a link to
 * the post.
 *
 * @since  1.0.0
 * @access public
 * @param  string $text
 * @return string
 */
function carelib_excerpt_more( $text ) {
	if ( 0 !== strpos( $text, '<a' ) ) {
		$text = sprintf( ' <a rel="nofollow" href="%s" class="more-link">%s</a>',
			esc_url( get_permalink() ),
			trim( apply_filters( 'carelib_read_more_text', $text ) )
		);
	}
	return $text;
}

/**
 * Wraps the output of `wp_link_pages()` with `<p class="page-links">` if
 * it's simply wrapped in a `<p>` tag.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args
 * @return array
 */
function carelib_link_pages_args( $args ) {
	$args['before'] = str_replace( '<p>', '<p class="page-links">', $args['before'] );
	return $args;
}

/**
 * Wraps page "links" that aren't actually links (just text) with
 * `<span class="page-numbers">` so that they can also be styled. This makes
 * `wp_link_pages()` consistent with the output of `paginate_links()`.
 *
 * @since  1.0.0
 * @access public
 * @param  string $link
 * @return string
 */
function carelib_link_pages_link( $link ) {
	return 0 !== strpos( $link, '<a' ) ? "<span class='page-numbers'>{$link}</span>" : $link;
}

/**
 * The WordPress.org theme review requires that a link be provided to the
 * single post page for untitled posts. This is a filter on 'the_title' so
 * that an '(Untitled)' title appears in that scenario, allowing for the
 * normal method to work.
 *
 * @since  1.0.0
 * @access public
 * @param  string $title
 * @return string
 */
function carelib_untitled_post( $title ) {
	// Translators: Used as a placeholder for untitled posts on non-singular views.
	if ( ! $title && ! is_singular() && in_the_loop() && ! is_admin() ) {
		$title = esc_html__( '(Untitled)', 'alpha' );
	}

	return $title;
}

/**
 * Helper function to determine whether we should display the full content
 * or an excerpt.
 *
 * @since  1.0.0
 * @access public
 * @return bool true on singular entries by default
 */
function _carelib_is_full_content() {
	return apply_filters( 'carelib_is_full_content', is_singular() );
}

/**
 * Returns either an excerpt or the content depending on what page the user is
 * currently viewing.
 *
 * @since  1.0.0
 * @access public
 * @return string the desired content
 */
function carelib_get_content() {
	return apply_filters( 'the_content', _carelib_is_full_content() ? get_the_content() : get_the_excerpt() );
}

/**
 * Display either an excerpt or the content depending on what page the user is
 * currently viewing.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_content
 * @return void
 */
function carelib_content() {
	echo carelib_get_content();
}

/**
 * Checks if a post has any content. Useful if you need to check if the user
 * has written any content before performing any actions.
 *
 * @since  1.0.0
 * @access public
 * @param  int $post_id The ID of the post to check for content.
 * @return bool
 */
function carelib_entry_has_content( $post_id = 0 ) {
	$post    = get_post( $post_id );
	$content = apply_filters( 'the_content', $post->post_content );
	return ! empty( $content );
}

/**
 * Remove all actions from THA entry hooks.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_null_entry_containers() {
	remove_all_actions( 'carelib_entry_top' );
	remove_all_actions( 'carelib_entry_before' );
	remove_all_actions( 'carelib_entry_content_before' );
	remove_all_actions( 'carelib_entry_content_after' );
	remove_all_actions( 'carelib_entry_bottom' );
	remove_all_actions( 'carelib_entry_after' );
}

/**
 * Determine if the current view should contain entry footer meta.
 *
 * @since  1.0.0
 * @access public
 * @return bool
 */
function carelib_has_entry_footer_meta() {
	$has_meta = false;

	if ( has_category() || has_tag() ) {
		$has_meta = true;
	}

	return (bool) apply_filters( 'carelib_has_entry_footer_meta', $has_meta );
}

/**
 * Determine if the current view should contain an entry footer.
 *
 * @since  1.0.0
 * @access public
 * @return bool
 */
function carelib_has_entry_footer() {
	$has_footer = false;

	if ( carelib_has_entry_footer_meta() ) {
		$has_footer = true;
	}

	return (bool) apply_filters( 'carelib_has_entry_footer', $has_footer );
}

/**
 * Replacement for template tags like `the_category()`, `the_terms()`, etc.
 *
 * These core WordPress template tags don't offer proper translation and
 * RTL support without having to write a lot of messy code within templates.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Empty array if no arguments.
 * @return string
 */
function carelib_get_entry_terms( $args = array() ) {
	$defaults = array(
		'post_id'    => get_the_ID(),
		'attr'       => 'entry-terms',
		'taxonomy'   => 'category',
		'text'       => '%s',
		'wrap'       => '<span %s>%s</span>',
		// Translators: Separates tags, categories, etc. when displaying a post.
		'sep'        => _x( ', ', 'taxonomy terms separator', 'alpha' ),
		'before'     => '',
		'after'      => '',
	);

	$args = wp_parse_args( $args, $defaults );

	$required = isset(
		$args['post_id'],
		$args['attr'],
		$args['taxonomy'],
		$args['text'],
		$args['wrap'],
		$args['sep']
	);

	// Bail if required args have been removed via a filter.
	if ( ! $required ) {
		return false;
	}

	$terms = get_the_term_list(
		$args['post_id'],
		$args['taxonomy'],
		'',
		$args['sep'],
		''
	);

	if ( ! $terms ) {
		return false;
	}

	$html = '';

	$html .= isset( $args['before'] ) ? $args['before'] : '';

	$html .= sprintf( $args['wrap'],
		carelib_get_attr( $args['attr'], $args['taxonomy'] ),
		sprintf( $args['text'], $terms )
	);

	$html .= isset( $args['after'] ) ? $args['after'] : '';

	return apply_filters( 'carelib_entry_terms', $html, $terms, $args );
}

/**
 * Display a formatted markup block with information about the entry's terms.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_entry_terms
 * @param  array $args a list of arguments to pass to the entry terms method.
 * @return void
 */
function carelib_entry_terms( $args = array() ) {
	echo carelib_get_entry_terms( $args );
}

/**
 * Retrieves the singular name label for a given post object.
 *
 * @since  1.0.0
 * @access protected
 * @param  object $object a post object to use for retrieving the name.
 * @return mixed null if no object is provided, otherwise the label string
 */
function _carelib_get_post_type_name( $object ) {
	if ( ! is_object( $object ) ) {
		return null;
	}
	$obj = get_post_type_object( $object->post_type );
	return isset( $obj->labels->singular_name ) ? '&nbsp;' . $obj->labels->singular_name : null;
}

/**
 * Helper function to build a next and previous post navigation element on
 * single entries. This takes care of all the annoying formatting which usually
 * would need to be done within a template.
 *
 * I originally wanted to use the new get_the_post_navigation tag for this;
 * however, it's lacking a lot of the flexibility provided by using the old
 * template tags directly. Until WordPress core gets its act together, I guess
 * I'll just have to duplicate code for no good reason.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Empty array if no arguments.
 * @return string
 */
function carelib_get_post_navigation( $args = array() ) {
	if ( is_attachment() || ! is_singular() ) {
		return;
	}

	$name = _carelib_get_post_type_name( get_queried_object() );

	$defaults = apply_filters( 'carelib_post_navigation_defaults',
		array(
			'post_types'     => array( 'post' ),
			'prev_format'    => '<span class="nav-previous">%link</span>',
			'next_format'    => '<span class="nav-next">%link</span>',
			'prev_text'      => __( 'Previous', 'alpha' ) . esc_html( $name ),
			'next_text'      => __( 'Next', 'alpha' ) . esc_html( $name ),
			'in_same_term'   => false,
			'excluded_terms' => '',
			'taxonomy'       => 'category',
		)
	);

	$args = wp_parse_args( $args, $defaults );

	$types = (array) $args['post_types'];

	// Bail if we're not on a single entry. All post types except pages are allowed by default.
	if ( ! is_singular( $types ) || ( ! in_array( 'page', $types, true ) && is_page() ) ) {
		return false;
	}

	$required = isset(
		$args['prev_format'],
		$args['prev_text'],
		$args['next_format'],
		$args['next_text'],
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	// Bail if required args have been removed via a filter.
	if ( ! $required ) {
		return false;
	}

	$links = '';

	// Previous post link. Can be filtered via WP Core's previous_post_link filter.
	$links .= get_adjacent_post_link(
		$args['prev_format'],
		$args['prev_text'],
		$args['in_same_term'],
		$args['excluded_terms'],
		true,
		$args['taxonomy']
	);

	// Next post link. Can be filtered via WP Core's next_post_link filter.
	$links .= get_adjacent_post_link(
		$args['next_format'],
		$args['next_text'],
		$args['in_same_term'],
		$args['excluded_terms'],
		false,
		$args['taxonomy']
	);

	// Bail if we don't have any posts to link to.
	if ( empty( $links ) ) {
		return false;
	}

	return sprintf( '<nav %s>%s</nav><!-- .nav-single -->',
		carelib_get_attr( 'nav', 'single' ),
		$links
	);
}

/**
 * Output a next and previous post navigation element on single entries.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_post_navigation
 * @param  array $args A list of arguments to be merged with defaults.
 * @return void
 */
function carelib_post_navigation( $args = array() ) {
	echo carelib_get_post_navigation( $args );
}

/**
 * Gets a URL from the content, even if it's not wrapped in an <a> tag.
 *
 * @since  1.0.0
 * @access public
 * @param  string $content The content to search for links.
 * @return string The content with links made clickable.
 */
function carelib_get_content_url( $content ) {
	// Catch links that are not wrapped in an '<a>' tag.
	preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', make_clickable( $content ), $matches );
	return ! empty( $matches[1] ) ? esc_url_raw( $matches[1] ) : '';
}
