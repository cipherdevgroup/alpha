<?php
/**
 * The primary nav menu template.
 *
 * @package   Alpha\TemplateParts\Menu
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */
?>
<nav <?php carelib_attr( 'menu', 'primary' ); ?>>

	<span id="menu-primary-title" class="screen-reader-text">
		<?php
		// Translators: %s is the nav menu name. This is the nav menu title shown to screen readers.
		printf( _x( '%s', 'nav menu title', 'alpha' ), carelib_get_menu_location_name( 'primary' ) );
		?>
	</span>

	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container'       => '',
			'menu_id'         => 'primary',
			'menu_class'      => 'nav-menu primary',
			'fallback_cb'     => '',
			'items_wrap'      => '<div ' . carelib_get_attr( 'wrap', 'primary-menu' ) . '><ul id="%s" class="%s">%s</ul></div>',
		)
	);
	?>

</nav><!-- #menu-primary -->
