/* global skipLinkFocus */
/**
 * JavaScript for Alpha
 *
 * Includes all JS which is required within all sections of the theme.
 */
window.alpha = window.alpha || {};

(function( window, $, undefined ) {
	'use strict';

	var $document = $( document ),
		$body     = $( 'body' ),
		alpha   = window.alpha;

	$.extend( alpha, {

		// Global script initialization
		globalInit: function() {
			var $videos = $( '#site-inner' );
			$body.addClass( 'ontouchstart' in window || 'onmsgesturechange' in window ? 'touch' : 'no-touch' );
			$document.gamajoAccessibleMenu();
			$( '#menu-primary' ).alphaMobileMenu();
			$videos.fitVids();
		}

	});

	// Document ready.
	jQuery(function() {
		skipLinkFocus.init();
		alpha.globalInit();
	});
})( this, jQuery );
