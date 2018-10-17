<?php
/**
 * Wrapper functions for custom template hook locations.
 *
 * @package    CareLib
 * @copyright  Copyright (c) 2018, Cipher Development, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

/**
 * Add a custom action for the archive header.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_archive_header() {
	if ( carelib_has_archive_header() ) {
		do_action( 'carelib_archive_header' );
	}
}

/**
 * Add a custom hook for the entry header.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_entry_header() {
	if ( carelib_has_entry_header() ) {
		do_action( 'carelib_entry_header' );
	}
}

/**
 * Add a custom hook for the entry meta.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_entry_header_meta() {
	if ( carelib_has_entry_header_meta() ) {
		do_action( 'carelib_entry_header_meta' );
	}
}

/**
 * Add a custom hook for the entry content.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_entry_content() {
	do_action( 'carelib_entry_content' );
}

/**
 * Add a custom hook for the entry footer if the current view has an entry footer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_entry_footer() {
	if ( carelib_has_entry_footer() ) {
		do_action( 'carelib_entry_footer' );
	}
}

/**
 * Add a custom hook for the entry footer if the current view has an entry footer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function carelib_entry_footer_meta() {
	if ( carelib_has_entry_footer_meta() ) {
		do_action( 'carelib_entry_footer_meta' );
	}
}

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $carelib_supports[] = 'html;
 */
function carelib_html_before() {
	do_action( 'carelib_html_before' );
}
/**
 * HTML <body> hooks
 * $carelib_supports[] = 'body';
 */
function carelib_body_top() {
	do_action( 'carelib_body_top' );
}

function carelib_body_bottom() {
	do_action( 'carelib_body_bottom' );
}

/**
 * HTML <head> hooks
 *
 * $carelib_supports[] = 'head';
 */
function carelib_head_top() {
	do_action( 'carelib_head_top' );
}

function carelib_head_bottom() {
	do_action( 'carelib_head_bottom' );
}

/**
 * Semantic <header> hooks
 *
 * $carelib_supports[] = 'header';
 */
function carelib_header_before() {
	do_action( 'carelib_header_before' );
}

function carelib_header_after() {
	do_action( 'carelib_header_after' );
}

function carelib_header_top() {
	do_action( 'carelib_header_top' );
}

function carelib_header_bottom() {
	do_action( 'carelib_header_bottom' );
}

/**
 * Semantic <content> hooks
 *
 * $carelib_supports[] = 'content';
 */
function carelib_content_before() {
	do_action( 'carelib_content_before' );
}

function carelib_content_after() {
	do_action( 'carelib_content_after' );
}

function carelib_content_top() {
	do_action( 'carelib_content_top' );
}

function carelib_content_bottom() {
	do_action( 'carelib_content_bottom' );
}

function carelib_content_while_before() {
	do_action( 'carelib_content_while_before' );
}

function carelib_content_while_after() {
	do_action( 'carelib_content_while_after' );
}

/**
 * Semantic <entry> hooks
 *
 * $carelib_supports[] = 'entry';
 */
function carelib_entry_before() {
	do_action( 'carelib_entry_before' );
}

function carelib_entry_after() {
	do_action( 'carelib_entry_after' );
}

function carelib_entry_content_before() {
	do_action( 'carelib_entry_content_before' );
}

function carelib_entry_content_after() {
	do_action( 'carelib_entry_content_after' );
}

function carelib_entry_top() {
	do_action( 'carelib_entry_top' );
}

function carelib_entry_bottom() {
	do_action( 'carelib_entry_bottom' );
}

/**
 * Comments block hooks
 *
 * $carelib_supports[] = 'comments';
 */
function carelib_comments_before() {
	do_action( 'carelib_comments_before' );
}

function carelib_comments_after() {
	do_action( 'carelib_comments_after' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $carelib_supports[] = 'sidebar';
 */
function carelib_sidebars_before() {
	do_action( 'carelib_sidebars_before' );
}

function carelib_sidebars_after() {
	do_action( 'carelib_sidebars_after' );
}

function carelib_sidebar_top() {
	do_action( 'carelib_sidebar_top' );
}

function carelib_sidebar_bottom() {
	do_action( 'carelib_sidebar_bottom' );
}

/**
 * Semantic <footer> hooks
 *
 * $carelib_supports[] = 'footer';
 */
function carelib_footer_before() {
	do_action( 'carelib_footer_before' );
}

function carelib_footer_after() {
	do_action( 'carelib_footer_after' );
}

function carelib_footer_top() {
	do_action( 'carelib_footer_top' );
}

function carelib_footer_bottom() {
	do_action( 'carelib_footer_bottom' );
}
