<?php
/**
 * The static front page template.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<?php get_header(); ?>

<div <?php hybrid_attr( 'site-inner' ); ?>>

	<?php tha_content_before(); ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php tha_entry_before(); ?>

				<?php hybrid_get_content_template(); ?>

				<?php tha_entry_after(); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content/error' ); ?>

		<?php endif; ?>

		<?php tha_content_bottom(); ?>

	</main><!-- #content -->

	<?php tha_content_after(); ?>

	<?php hybrid_get_sidebar( 'primary' ); ?>

</div><!-- #site-inner -->

<?php
get_footer();
