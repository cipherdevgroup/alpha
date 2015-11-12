/**
 * Alpha Mobile Menu
 *
 * Merge existing menus into an a11y-compliant, off-canvas mobile menu.
 *
 * @version   0.2.0
 * @copyright Copyright (c) 2015, WP Site Care, LLC
 * @license   MIT
 */
(function( $, undefined ) {
	'use strict';

	var $$,
		cache = {};

	$$ = function( selector ) {
		var temp = cache[selector];
		if ( undefined !== temp ) {
			return temp;
		}
		return cache[selector] = $( selector );
	};

	$$.clear = function( selector ) {
		cache[selector] = undefined;
	};

	$$.fresh = function( selector ) {
		cache[selector] = undefined;
		return $$( selector );
	};

	$.fn.alphaMobileMenu = function() {
		var $menuButton = $$( '#menu-toggle-primary' ),
			$mobileMenu = $$( '#menu-primary' ),
			menuClass   = 'menu-primary';

		// Return early if we don't have any menus to work with.
		if ( 0 === $$( '#menu-primary' ).length && 0 === $$( '#menu-secondary' ).length ) {
			return;
		}

		// Use the secondary menu as the mobile menu if we don't have a primary.
		if ( 0 === $$( '#menu-primary' ).length ) {
			$mobileMenu = $$( '#menu-secondary' );
			menuClass   = 'menu-secondary';
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

		/**
		 * Check whether or not the mobile menu is currently open and visible.
		 *
		 * @since  0.1.0
		 * @return {Boolean} Returns true if the menu is open.
		 */
		function menuIsOpen() {
			if ( $$( 'body' ).hasClass( 'menu-open' ) ) {
				return true;
			}
			return false;
		}

		/**
		 * Check whether or not our existing menus have been merged into a
		 * single menu for mobile display.
		 *
		 * @since  0.1.0
		 * @return {Boolean} Returns true if the menus have been merged.
		 */
		function menusMerged() {
			if ( 0 === $$.fresh( '#menu-primary #secondary' ).length ) {
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
			if ( 0 === $$( '#menu-primary' ).length || 0 === $$( '#menu-secondary' ).length ) {
				return;
			}
			if ( ! menusMerged() && ! menuIsOpen() ) {
				$$( '#menu-secondary .nav-menu' ).appendTo( '#menu-primary .nav-menu' );
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
			if ( 0 === $$( '#menu-secondary' ).length || 0 === $$( '#menu-primary #secondary' ).length ) {
				return;
			}
			$$( '#menu-primary #secondary' ).appendTo( '#menu-secondary .wrap' );
		}

		/**
		 * Toggle all classes related to a menu being in an open or closed state
		 * except for the body class as it is used as a guide for whether or
		 * not the mobile menu has been opened.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function toggleClasses() {
			$mobileMenu.toggleClass( 'visible' );
			$menuButton.toggleClass( 'activated' );
		}

		/**
		 * Toggle aria attributes.
		 *
		 * @since  0.2.0
		 * @param  {button} $object passed through
		 * @param  {aria-xx} attribute aria attribute to toggle
		 * @return {bool}
		 */
		function toggleAria( $object, attribute ) {
			$object.attr( attribute, function( index, value ) {
				return 'false' === value ? 'true' : 'false';
			});
		}

		/**
		 * Toggle all attributes related to a menu being in an open or closed
		 * state. Most of these changes are made for a11y reasons.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function toggleAttributes() {
			toggleAria( $menuButton, 'aria-pressed' );
			toggleAria( $menuButton, 'aria-expanded' );
			if ( $mobileMenu.attr( 'tabindex' ) ) {
				$mobileMenu.removeAttr( 'tabindex' );
			} else {
				$mobileMenu.attr( 'tabindex', '0' );
			}
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
			var nav        = $mobileMenu[0],
				navID      = $mobileMenu.attr( 'id' ),
				$items     = $$( '#' + navID + ' a' ),
				$firstItem = $items.first(),
				$lastItem  = $items.last();

			$mobileMenu.focus();

			$mobileMenu.on( 'keydown', function( e ) {
				// Return early if we're not using the tab key.
				if ( 9 !== e.keyCode ) {
					return;
				}
				// Tabbing forwards and tabbing out of the last link.
				if ( $lastItem[0] === e.target && ! e.shiftKey ) {
					$menuButton.focus();
					return false;
				}
				// Tabbing backwards and tabbing out of the first link or the menu.
				if ( ( $firstItem[0] === e.target || nav === e.target ) && e.shiftKey ) {
					$menuButton.focus();
					return false;
				}
			});

			$menuButton.on( 'keydown', function( e ) {
				// Return early if we're not using the tab key.
				if ( 9 !== e.keyCode ) {
					return;
				}
				if ( menuIsOpen() && $menuButton[0] === e.target && ! e.shiftKey ) {
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
		function openMenu() {
			if ( menuIsOpen() ) {
				return;
			}
			if ( ! menusMerged() ) {
				mergeMenus();
			}
			toggleClasses();
			toggleAttributes();
			focusMobileMenu();
		}

		/**
		 * Fires all methods required to close the mobile menu.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function closeMenu() {
			if ( ! menuIsOpen() ) {
				return;
			}
			if ( menusMerged() && ! isHidden( $menuButton ) ) {
				splitMenus();
			}
			toggleClasses();
			toggleAttributes();
		}

		/**
		 * Split or merge our existing menus based on screen width and force the
		 * menu to close if the screen is larger than the specified width for a
		 * mobile menu to be displayed.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function reflowMenus() {
			if ( isHidden( $menuButton ) ) {
				if ( menusMerged() ) {
					splitMenus();
				}
				closeMenu();
				$mobileMenu.addClass( menuClass );
				$mobileMenu.removeClass( 'menu-mobile' );
				$$( 'body' ).removeClass( 'menu-open' );
			} else {
				$mobileMenu.removeClass( menuClass );
				$mobileMenu.addClass( 'menu-mobile' );
				if ( ! menusMerged() ) {
					mergeMenus();
				}
			}
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
		 * Fire all methods required to either open or close the mobile menu.
		 *
		 * @since  0.1.0
		 * @param {object} event The current event being fired.
		 * @return void
		 */
		function toggleMenu( event ) {
			event.preventDefault();
			openMenu();
			closeMenu();
			$$( 'body' ).toggleClass( 'menu-open' );
		}

		/**
		 * Load all of our mobile menu functionality.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function loadMobileMenu() {
			$menuButton.on( 'click', toggleMenu );
			debouncedResize(function() {
				reflowMenus();
			})();
		}

		loadMobileMenu();
	};
}( jQuery ) );
