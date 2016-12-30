/* global skipLinkFocus */

var AlphaParentTheme = new AlphaParentTheme( jQuery );
var AlphaMobileMenu = new AlphaMobileMenu( jQuery );

AlphaParentTheme.detectTouch();

jQuery( document ).ready(function() {
	skipLinkFocus.init();
	AlphaParentTheme.init();
	AlphaMobileMenu.init();
});
