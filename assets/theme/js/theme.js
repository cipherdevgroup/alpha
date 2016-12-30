/* global skipLinkFocus */
/**
 * JavaScript for Alpha
 *
 * Includes all JS which is required within all sections of the theme.
 */
function AlphaParentTheme( $ ) {
	'use strict';

	var $body = $( document.body );

	this.detectTouch = function() {
		$body.addClass( 'ontouchstart' in window || 'onmsgesturechange' in window ? 'touch' : 'no-touch' );
	};

	this.init = function() {
		var $siteInner = $( document.getElementById( 'site-inner' ) );

		skipLinkFocus.init();
		$( document ).gamajoAccessibleMenu();
		$siteInner.fitVids();
	};
}

var AlphaParentTheme = new AlphaParentTheme( jQuery );
var AlphaMobileMenu = new AlphaMobileMenu( jQuery );

AlphaParentTheme.detectTouch();

jQuery( document ).ready(function() {
	AlphaParentTheme.init();
	AlphaMobileMenu.init();
});
