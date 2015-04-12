<?php
/**
 * A template part for displaying single status entries.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled. ?>

		<header class="entry-header">
			<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
		</header><!-- .entry-header -->

	<?php endif; // End avatars check. ?>

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<p class="entry-meta">
			<?php hybrid_post_format_link(); ?>
			<?php flagship_entry_author(); ?>
			<?php flagship_entry_published(); ?>
			<?php edit_post_link(); ?>
			<?php hybrid_post_terms( array( 'taxonomy' => 'category', ) ); ?>
			<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', ) ); ?>
		</p>
	</footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
