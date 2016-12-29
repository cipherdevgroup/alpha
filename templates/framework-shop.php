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

<div <?php carelib_attr( 'site-inner' ); ?>>

	<?php carelib_content_before(); ?>

	<main <?php carelib_attr( 'content' ); ?>>

		<?php carelib_content_top(); ?>

		<?php if ( have_posts() ) : ?>

			<?php carelib_content_while_before(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php carelib_entry_before(); ?>

					<?php carelib_entry_top(); ?>

					<?php carelib_entry_content_before(); ?>

					<?php carelib_wc_content(); ?>

					<?php carelib_entry_content_after(); ?>

					<?php carelib_entry_bottom(); ?>

				<?php carelib_entry_after(); ?>

			<?php endwhile; ?>

			<?php carelib_content_while_after(); ?>

		<?php elseif ( ! is_product() && ! carelib_wc_product_subcategories() ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/error' ); ?>

		<?php endif; ?>

		<?php carelib_content_bottom(); ?>

	</main><!-- #content -->

	<?php carelib_content_after(); ?>

</div><!-- #site-inner -->

<?php
get_footer( 'shop' );
