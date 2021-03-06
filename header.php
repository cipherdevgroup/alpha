<?php
/**
 * The Header for our theme.
 *
 * @package   Alpha\CoreTemplates
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
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
