<?php
/**
 * The Header for our theme.
 *
 * @package   Alpha\CoreTemplates
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */
?>
<!DOCTYPE html>
<?php carelib_html_before(); ?>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php carelib_head_top(); ?>
<?php wp_head(); ?>
<?php carelib_head_bottom(); ?>
</head>

<body <?php carelib_attr( 'body' ); ?>>

	<?php carelib_body_top(); ?>
