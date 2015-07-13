<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
		<?php tha_footer_before(); ?>

		<footer <?php alpha_attr( 'footer' ); ?>>

			<div <?php alpha_attr( 'wrap', 'footer' ); ?>>

				<?php tha_footer_top(); ?>

				<?php tha_footer_bottom(); ?>

			</div><!-- .wrap -->

		</footer><!-- .footer -->

		<?php tha_footer_after(); ?>

	</div><!-- .site-container -->

	<?php tha_body_bottom(); ?>
	<?php wp_footer(); ?>

</body>
</html>
