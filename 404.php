<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<?php get_header(); ?>

<div <?php alpha_attr( 'site-inner' ); ?>>

	<?php tha_content_before(); ?>

	<main <?php alpha_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<?php hybrid_get_menu( 'breadcrumbs' ); ?>

		<?php tha_entry_before(); ?>

		<?php get_template_part( 'content/error', '404' ); ?>

		<?php tha_entry_after(); ?>

		<?php tha_content_bottom(); ?>

	</main><!-- #content -->

	<?php tha_content_after(); ?>

	<?php alpha_get_sidebar( 'primary' ); ?>

</div><!-- #site-inner -->

<?php
get_footer();
