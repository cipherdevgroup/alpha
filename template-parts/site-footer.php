<?php
/**
 * A template part for the site's default footer.
 *
 * @package    Alpha\TemplateParts
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
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
