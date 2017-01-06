<?php
/**
 * A template part for the site's default header.
 *
 * @package   Alpha\TemplateParts
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */
?>
<?php carelib_header_before(); ?>

<header <?php carelib_attr( 'site-header' ); ?>>

	<div <?php carelib_attr( 'wrap', 'header' ); ?>>

		<?php carelib_header_top(); ?>

		<?php carelib_header_bottom(); ?>

	</div><!-- .wrap -->

</header><!-- #header -->

<?php carelib_header_after(); ?>
