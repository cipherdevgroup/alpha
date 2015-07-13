<?php
/**
 * The primary nav menu template.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<nav <?php alpha_attr( 'menu', 'primary' ); ?>>

		<span id="menu-primary-title" class="screen-reader-text">
			<?php
			// Translators: %s is the nav menu name. This is the nav menu title shown to screen readers.
			printf( _x( '%s', 'nav menu title', 'alpha' ), hybrid_get_menu_location_name( 'primary' ) );
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
				'items_wrap'      => '<div ' . alpha_get_attr( 'wrap', 'primary-menu' ) . '><ul id="%s" class="%s">%s</ul></div>',
			)
		);
		?>

	</nav><!-- #menu-primary -->

<?php elseif ( current_user_can( 'edit_theme_options' ) && ! has_nav_menu( 'secondary' ) ) : ?>

	<div class="header-right">
		<p class="no-menu">

			<?php _e( "Ready to add your primary menu? Let's get started!", 'alpha' ); ?>

			<?php
			printf(	'<a class="button" href="%1$s">%2$s</a>',
				sitecare_get_customizer_link(  array(
					'focus_type'   => 'section',
					'focus_target' => 'nav',
				) ),
				__( 'Add a Menu', 'alpha' )
			);
			?>

		</p>
	</div><!-- .header-right -->

	<?php

endif;
