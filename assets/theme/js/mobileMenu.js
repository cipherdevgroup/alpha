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
	var $body = $( document.body );
	var settings, $mobileMenu, menuClass;

	function setupOptions( options ) {
		settings = {
			mainMenu: $( document.getElementById( 'menu-primary' ) ),
			menuButton: $( document.getElementById( 'menu-toggle-primary' ) ),
			extraMenus: $( document.getElementById( 'menu-secondary' ) ),
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

	/**
	 * Debounce a window resize event.
	 *
	 * @since  0.2.0
	 * @return {Boolean} Returns true if the menu is open.
	 */
	function debouncedResize( c, t ) {
		onresize = function() {
			clearTimeout( t );
			t = setTimeout( c, 100 );
		};
		return c;
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
	 * Check whether or not a given element is visible.
	 *
	 * @param  {object} $object a jQuery object to check
	 * @return {bool} true if the current element is hidden
	 */
	function isHidden( $object ) {
		var element = $object[0];
		return ( null === element.offsetParent );
	}

	/**
	 * Check whether or not the mobile menu is currently open and visible.
	 *
	 * @since  0.1.0
	 * @return {Boolean} Returns true if the menu is open.
	 */
	this.menuIsOpen = function() {
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
	function menusMerged() {
		if ( 0 === $mobileMenu.find( '.appended' ).length ) {
			return false;
		}

		return true;
	}

	/**
	 * Prepare our mobile menu by merging our existing menus together if we
	 * have more than one.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	function mergeMenus() {
		var $extras = settings.extraMenus;

		if ( 0 !== $extras.length && ! menusMerged() && ! that.menuIsOpen() ) {
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
	function splitMenus() {
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
			if ( that.menuIsOpen() && settings.menuButton[0] === e.target && ! e.shiftKey ) {
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

		$button.addClass( 'activated' );
		$button.attr( 'aria-pressed', 'true' );
		$button.attr( 'aria-expanded', 'true' );

		$body.addClass( settings.menuOpenClass );

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

		$button.removeClass( 'activated' );
		$button.attr( 'aria-pressed', 'false' );
		$button.attr( 'aria-expanded', 'false' );

		$body.removeClass( settings.menuOpenClass );
	};

	/**
	 * Split or merge our existing menus based on screen width and force the
	 * menu to close if the screen is larger than the specified width for a
	 * mobile menu to be displayed.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	function reflowMenus() {
		if ( isHidden( settings.menuButton ) ) {
			if ( menusMerged() ) {
				splitMenus();
			}

			that.closeMenu();

			if ( settings.resetClass ) {
				$mobileMenu.addClass( menuClass );
			}

			$mobileMenu.removeClass( settings.mobileMenuClass );
		} else {
			if ( settings.resetClass ) {
				$mobileMenu.removeClass( menuClass );
			}

			$mobileMenu.addClass( settings.mobileMenuClass );

			if ( ! menusMerged() ) {
				mergeMenus();
			}
		}
	}

	/**
	 * Fire all methods required to either open or close the mobile menu.
	 *
	 * @since  0.1.0
	 * @param {object} event The current event being fired.
	 * @return void
	 */
	this.toggleMenu = function( event ) {
		event.preventDefault();

		if ( that.menuIsOpen() ) {
			that.closeMenu();
		} else {
			that.openMenu();
		}
	};

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
			settings.menuButton.on( 'click', that.toggleMenu );
			debouncedResize(function() {
				reflowMenus();
			})();
		}
	};
}
