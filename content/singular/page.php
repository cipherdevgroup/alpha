<?php
/**
 * A template part for displaying single pages.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<article <?php alpha_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<header class="entry-header">
		<h1 <?php alpha_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
	</header><!-- .entry-header -->

	<div <?php alpha_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php if ( current_user_can( 'edit_pages' ) ) : ?>
		<footer class="entry-footer">
			<?php edit_post_link(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
