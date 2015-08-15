<?php
/**
 * The primary nav menu fallback template.
 *
 * @package    Alpha\Templates\Menu
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */
?>
<div class="header-right">
	<p class="no-menu">

		<?php esc_attr_e( "Ready to add your primary menu? Let's get started!", 'alpha' ); ?>

		<?php
		printf(	'<a class="button" href="%1$s">%2$s</a>',
			alpha_get_customizer_link( array(
				'focus_type'   => 'section',
				'focus_target' => 'nav',
			) ),
			esc_attr__( 'Add a Menu', 'alpha' )
		);
		?>

	</p>
</div><!-- .header-right -->
