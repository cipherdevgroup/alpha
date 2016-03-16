<?php
/**
 * A template part for the site's default header.
 *
 * @package   Alpha\TemplateParts
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */
?>
<?php tha_header_before(); ?>

<header <?php alpha_attr( 'site-header' ); ?>>

	<div <?php alpha_attr( 'wrap', 'header' ); ?>>

		<?php tha_header_top(); ?>

		<?php tha_header_bottom(); ?>

	</div><!-- .wrap -->

</header><!-- #header -->

<?php tha_header_after(); ?>
