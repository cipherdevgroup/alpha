<?php
/**
 * The Header for our theme.
 *
 * @package    Alpha
 * @subpackage Alpha\CoreTemplates
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */
?>
<!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php tha_head_top(); ?>
<?php wp_head(); ?>
<?php tha_head_bottom(); ?>
</head>

<body <?php alpha_attr( 'body' ); ?>>

	<?php tha_body_top(); ?>
