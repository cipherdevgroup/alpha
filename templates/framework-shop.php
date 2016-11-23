<?php
/**
 * The WooCommerce framework markup file.
 *
 * @package   Alpha\Templates
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

?>
<?php get_header( 'shop' ); ?>

<div <?php alpha_attr( 'site-inner' ); ?>>

	<?php tha_content_before(); ?>

	<main <?php alpha_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<?php if ( have_posts() ) : ?>

			<?php tha_content_while_before(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php tha_entry_before(); ?>

					<?php tha_entry_top(); ?>

					<?php tha_entry_content_before(); ?>

					<?php alpha_wc_content(); ?>

					<?php tha_entry_content_after(); ?>

					<?php tha_entry_bottom(); ?>

				<?php tha_entry_after(); ?>

			<?php endwhile; ?>

			<?php tha_content_while_after(); ?>

		<?php elseif ( ! is_product() && ! alpha_wc_product_subcategories() ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/error' ); ?>

		<?php endif; ?>

		<?php tha_content_bottom(); ?>

	</main><!-- #content -->

	<?php tha_content_after(); ?>

</div><!-- #site-inner -->

<?php
get_footer( 'shop' );
