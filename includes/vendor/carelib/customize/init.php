<?php
/**
 * Defines all default globals used throughout the library.
 *
 * @package    CareLib\Globals
 * @author     WP Site Care
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Provide reliable access to the library's functions before the global
 * actions, filters, and classes are initialized.
 *
 * @since  1.0.0
 * @access public
 */
do_action( 'carelib_customize_before_init' );

require_once CARELIB_DIR . 'customize/control-radio-image.php';
require_once CARELIB_DIR . 'customize/control-layout.php';
require_once CARELIB_DIR . 'customize/register.php';
require_once CARELIB_DIR . 'customize/scripts.php';
require_once CARELIB_DIR . 'customize/styles.php';
require_once CARELIB_DIR . 'customize/actions.php';

/**
 * Provide reliable access to the library's functions before the global
 * actions, filters, and classes are initialized.
 *
 * @since  1.0.0
 * @access public
 */
do_action( 'carelib_customize_after_init' );
