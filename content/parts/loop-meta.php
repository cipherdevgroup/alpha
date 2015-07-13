<?php
/**
 * A template part to display meta data for an archive page.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<div <?php alpha_attr( 'loop-meta' ); ?>>

	<div <?php alpha_attr( 'wrap', 'loop-meta' ); ?>>

		<h1 <?php alpha_attr( 'loop-title' ); ?>><?php hybrid_loop_title(); ?></h1>

		<?php if ( is_category() || is_tax() ) : ?>

			<?php hybrid_get_menu( 'sub-terms' ); ?>

		<?php endif; ?>

		<?php if ( ! is_paged() && $desc = hybrid_get_loop_description() ) : ?>

			<div <?php alpha_attr( 'loop-description' ); ?>>
				<?php echo $desc; ?>
			</div><!-- .loop-description -->

		<?php endif; ?>

	</div>

</div><!-- .loop-meta -->
