/* global skipLinkFocus */
/**
 * JavaScript for Alpha
 *
 * Includes all JS which is required within all sections of the theme.
 */
(function( window, $, undefined ) {
	'use strict';

	var $document = $( document ),
		$body     = $( 'body' );

	$body.addClass( 'ontouchstart' in window || 'onmsgesturechange' in window ? 'touch' : 'no-touch' );

	// Global script initialization
	function globalInit() {
		var $siteInner = $( '#site-inner' );
		$document.gamajoAccessibleMenu();
		$( '#menu-primary' ).alphaMobileMenu();
		$siteInner.fitVids();
	}

	// Document ready.
	$document.ready(function() {
		skipLinkFocus.init();
		globalInit();
	});
})( this, jQuery );
