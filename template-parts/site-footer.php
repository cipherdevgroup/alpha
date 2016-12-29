<?php
/**
 * A template part for the site's default footer.
 *
 * @package   Alpha\TemplateParts
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */
?>
<?php carelib_footer_before(); ?>

<footer <?php alpha_attr( 'site-footer' ); ?>>

	<div <?php alpha_attr( 'wrap', 'footer' ); ?>>

		<?php carelib_footer_top(); ?>

		<?php carelib_footer_bottom(); ?>

	</div><!-- .wrap -->

</footer><!-- .site-footer -->

<?php carelib_footer_after(); ?>
