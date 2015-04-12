<?php
/**
 * Header Right Sidebar Template
 *
 * Currently not in use.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
add_filter( 'wp_nav_menu_args', 'flagship_widget_menu_args' );
add_filter( 'wp_nav_menu', 'flagship_header_menu_wrap' );

if ( is_active_sidebar( 'header-right' ) ) : ?>

	<div <?php hybrid_attr( 'header-right' ); ?>>

		<?php dynamic_sidebar( 'header-right' ); ?>

	</div><!-- .header-right -->

<?php elseif ( current_user_can( 'edit_theme_options' ) ) : ?>

	<div <?php hybrid_attr( 'header-right' ); ?>>

		<p class="no-menu">
			<?php _e( 'This is a widget area! It\'s perfect for a custom menu.', 'alpha' ); ?>

			<?php
			printf(	'<a class="button" href="%1$s">%2$s</a>',
				flagship_get_customizer_link(),
				__( 'Customize Now', 'alpha' )
			);
			?>
		</p>

	</div><!-- .header-right -->

	<?php

endif;

remove_filter( 'wp_nav_menu_args', 'flagship_widget_menu_args' );
remove_filter( 'wp_nav_menu', 'flagship_header_menu_wrap' );
