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

		$( document ).gamajoAccessibleMenu();
		$siteInner.fitVids();
	};
}
