/**
 * Alpha Mobile Menu
 *
 * Merge existing menus into an a11y-compliant, off-canvas mobile menu.
 *
 * @version   0.2.0
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   MIT
 */
function AlphaMobileMenu( $ ) {
	'use strict';

	var that = this;
	var $root = $( document.documentElement );
	var settings, $mobileMenu, menuClass;

	function setupOptions( options ) {
		settings = {
			mainMenu: $( document.getElementById( 'menu-primary' ) ),
			menuButton: $( document.getElementById( 'menu-toggle-primary' ) ),
			extraMenus: $( document.getElementById( 'menu-secondary' ) ),
			activeClass: 'activated',
			mobileMenuClass: 'menu-mobile',
			menuOpenClass:  'menu-open',
			resetClass: true
		};

		if ( options ) {
			$.extend( settings, options );
		}
	}

	function setupVars() {
		$mobileMenu = settings.mainMenu;

		// Use the secondary menu as the mobile menu if we don't have a primary.
		if ( 0 === $mobileMenu.length && 0 !== settings.extraMenus.length ) {
			$mobileMenu = settings.extraMenus;
		}

		menuClass = $mobileMenu.attr( 'class' );
	}

	function isElementInViewport( el ) {
		var rect = el[0].getBoundingClientRect();
		var $window = $( window );

		return (
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= $window.height() &&
			rect.right <= $window.width()
		);
	}

	/**
	 * Check whether or not the menu is in a mobile state.
	 *
	 * @return {bool} true if the menu has been made mobile.
	 */
	this.isMenuMobile = function() {
		var element = settings.menuButton[0];

		return ( null === element.offsetParent );
	};

	/**
	 * Check whether or not the mobile menu is currently open and visible.
	 *
	 * @since  0.1.0
	 * @return {Boolean} Returns true if the menu is open.
	 */
	this.isMenuOpen = function() {
		if ( isElementInViewport( $mobileMenu ) ) {
			return true;
		}

		return false;
	};

	/**
	 * Check whether or not our existing menus have been merged into a
	 * single menu for mobile display.
	 *
	 * @since  0.1.0
	 * @return {Boolean} Returns true if the menus have been merged.
	 */
	this.areMenusMerged = function() {
		if ( 0 === $mobileMenu.find( '.appended' ).length ) {
			return false;
		}

		return true;
	};

	/**
	 * Force the focus state of either the mobile menu or the menu button
	 * when a user is tabbing through the mobile menu.
	 *
	 * When a user opens the mobile menu, it is given the focus so keyboard
	 * navigation will work correctly while the user tabs through menu items.
	 *
	 * When a user tabs out of either the beginning or end of the menu,
	 * focus is restored to the mobile menu button so the menu can be
	 * closed by pressing enter.
	 *
	 * @since  0.1.0
	 * @todo   Maybe split this into multiple functions
	 * @return {booleen} false when focus has been changed.
	 */
	function focusMobileMenu() {
		var nav        = $mobileMenu[0];
		var $items     = $( '#' + $mobileMenu.attr( 'id' ) + ' a' );
		var $firstItem = $items.first();
		var $lastItem  = $items.last();

		$mobileMenu.focus();

		$mobileMenu.on( 'keydown', function( e ) {
			// Return early if we're not using the tab key.
			if ( 9 !== e.keyCode ) {
				return;
			}
			// Tabbing forwards and tabbing out of the last link.
			if ( $lastItem[0] === e.target && ! e.shiftKey ) {
				settings.menuButton.focus();
				return false;
			}
			// Tabbing backwards and tabbing out of the first link or the menu.
			if ( ( $firstItem[0] === e.target || nav === e.target ) && e.shiftKey ) {
				settings.menuButton.focus();
				return false;
			}
		});

		settings.menuButton.on( 'keydown', function( e ) {
			// Return early if we're not using the tab key.
			if ( 9 !== e.keyCode ) {
				return;
			}
			if ( that.isMenuOpen() && settings.menuButton[0] === e.target && ! e.shiftKey ) {
				$firstItem.focus();
				return false;
			}
		});
	}

	/**
	 * Fire all methods required to open the mobile menu.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	this.openMenu = function() {
		var $button = settings.menuButton;

		$mobileMenu.addClass( 'visible' );
		$mobileMenu.attr( 'tabindex', '0' );

		$button.addClass( settings.activeClass );
		$button.attr( 'aria-pressed', 'true' );
		$button.attr( 'aria-expanded', 'true' );

		$root.addClass( settings.menuOpenClass );

		focusMobileMenu();
	};

	/**
	 * Fires all methods required to close the mobile menu.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	this.closeMenu = function() {
		var $button = settings.menuButton;

		$mobileMenu.removeClass( 'visible' );
		$mobileMenu.removeAttr( 'tabindex' );

		$button.removeClass( settings.activeClass );
		$button.attr( 'aria-pressed', 'false' );
		$button.attr( 'aria-expanded', 'false' );

		$root.removeClass( settings.menuOpenClass );
	};

	/**
	 * Prepare our mobile menu by merging our existing menus together if we
	 * have more than one.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	function maybeMergeMenus() {
		var $extras = settings.extraMenus;

		if ( 0 !== $extras.length && ! that.areMenusMerged() ) {
			var $main = $mobileMenu.find( 'ul:first' );

			$extras.find( 'ul:first' ).children( 'li' ).each( function() {
				var $that = $( this );
				$that.addClass( 'appended' );
				$that.appendTo( $main );
			});
		}
	}

	/**
	 * If we have two menus which have been merged, split them back into two
	 * separate menus using the same format as before they were merged.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	function maybeSplitMenus() {
		var $appendedItems = $mobileMenu.find( '.appended' );

		if ( 0 === $appendedItems.length ) {
			return;
		}

		$appendedItems.each( function() {
			var $that = $( this );
			$that.removeClass( 'appended' );
			$that.appendTo( settings.extraMenus.find( 'ul:first' ) );
		});
	}

	this.createMobileMenu = function() {
		if ( settings.resetClass ) {
			$mobileMenu.removeClass( menuClass );
		}

		$mobileMenu.addClass( settings.mobileMenuClass );

		maybeMergeMenus();
	};

	this.destroyMobileMenu = function() {
		that.closeMenu();

		if ( settings.resetClass ) {
			$mobileMenu.addClass( menuClass );
		}

		$mobileMenu.removeClass( settings.mobileMenuClass );

		maybeSplitMenus();
	};

	/**
	 * Fire all methods required to either open or close the mobile menu.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	this.toggleMenu = function() {
		if ( that.isMenuOpen() ) {
			that.closeMenu();
		} else {
			that.openMenu();
		}
	};

	/**
	 * Returns a function, that, as long as it continues to be invoked, will not
	 * be triggered. The function will be called after it stops being called for
	 * N milliseconds.
	 *
	 * @source underscore.js
	 * @see http://unscriptable.com/2009/03/20/debouncing-javascript-methods/
	 * @param {Function} func to wrap
	 * @param {Number} wait in ms (`100`)
	 */
	function debounce( func, wait ) {
		var timeout;

		return function() {
			var context = this;
			var args = arguments;

			clearTimeout( timeout );

			timeout = setTimeout( function() {
				timeout = null;
				func.apply( context, args );
			}, wait );
		};
	}

	function initMenu() {
		if ( that.isMenuMobile() ) {
			that.destroyMobileMenu();
		} else {
			that.createMobileMenu();
		}
	}

	/**
	 * Load all of our mobile menu functionality.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	this.init = function( options ) {
		setupOptions( options );
		setupVars();

		if ( 0 !== $mobileMenu.length ) {
			initMenu();
			window.onresize = debounce( initMenu, 200 );

			settings.menuButton.on( 'click', function( event ) {
				event.preventDefault();
				that.toggleMenu();
			});
		}
	};
}
