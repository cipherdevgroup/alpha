<?php
/**
 * The default framework markup file.
 *
 * @package   Alpha\Templates
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     1.0.0
 */
?>
<?php get_header(); ?>

<div <?php carelib_attr( 'site-inner' ); ?>>

	<?php carelib_content_before(); ?>

	<main <?php carelib_attr( 'content' ); ?>>

		<?php carelib_content_top(); ?>

		<?php carelib_entry_before(); ?>

		<?php carelib_entry_top(); ?>

		<?php carelib_entry_content_before(); ?>

		<?php carelib_entry_content(); ?>

		<?php carelib_entry_content_after(); ?>

		<?php carelib_entry_bottom(); ?>

		<?php carelib_entry_after(); ?>

		<?php carelib_content_bottom(); ?>

	</main><!-- #content -->

	<?php carelib_content_after(); ?>

</div><!-- #site-inner -->

<?php
get_footer();
