<?php
/**
 * The default framework markup file.
 *
 * @package   Alpha\Templates
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */
?>
<?php get_header(); ?>

<div <?php alpha_attr( 'site-inner' ); ?>>

	<?php tha_content_before(); ?>

	<main <?php alpha_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<?php tha_entry_before(); ?>

		<?php tha_entry_top(); ?>

		<?php tha_entry_content_before(); ?>

		<?php alpha_entry_content(); ?>

		<?php tha_entry_content_after(); ?>

		<?php tha_entry_bottom(); ?>

		<?php tha_entry_after(); ?>

		<?php tha_content_bottom(); ?>

	</main><!-- #content -->

	<?php tha_content_after(); ?>

</div><!-- #site-inner -->

<?php
get_footer();
