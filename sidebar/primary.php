<?php
/**
 * Primary Sidebar Template
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<?php if ( ! in_array( get_theme_mod( 'theme_layout' ), array( '1c', '1c-narrow' ) ) ) : // If not a one-column layout. ?>

	<?php tha_sidebars_before(); ?>

	<aside <?php alpha_attr( 'sidebar', 'primary' ); ?>>

		<?php tha_sidebar_top(); ?>

		<span id="sidebar-primary-title" class="screen-reader-text"><?php
			// Translators: %s is the sidebar name. This is the sidebar title shown to screen readers.
			printf( _x( '%s', 'sidebar title', 'alpha' ), alpha_get_sidebar_name( 'primary' ) );
		?></span>

		<?php if ( is_active_sidebar( 'primary' ) ) : ?>

			<?php dynamic_sidebar( 'primary' ); ?>

		<?php else : ?>

			<?php
			the_widget(
				'WP_Widget_Text',
				array(
					'title'  => __( 'Example Widget', 'alpha' ),
					// Translators: The %s are placeholders for HTML, so the order can't be changed.
					'text'   => sprintf( __( 'This is an example widget to show how the Primary sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin.', 'alpha' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
					'filter' => true,
				),
				array(
					'before_widget' => '<section class="widget widget_text">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
			?>

		<?php endif; // End widgets check. ?>

		<?php tha_sidebar_bottom(); ?>

	</aside><!-- #sidebar-primary -->

	<?php tha_sidebars_after();

endif; // End layout check.
