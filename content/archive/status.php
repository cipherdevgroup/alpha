<?php
/**
 * A template part for displaying a status entry within an archive.
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
			<a class="alignleft" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
			</a>
		</header><!-- .entry-header -->

	<?php endif; // End avatars check. ?>

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( ! get_option( 'show_avatars' ) ) : // If avatars are not enabled. ?>

		<footer class="entry-footer">
			<p class="entry-meta">
				<?php hybrid_post_format_link(); ?>
				<?php flagship_entry_published(); ?>
				<a class="entry-permalink" href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url"><?php _e( 'Permalink', 'alpha' ); ?></a>
				<?php flagship_entry_comments_link(); ?>
				<?php edit_post_link(); ?>
			</p>
		</footer><!-- .entry-footer -->

	<?php endif; // End avatars check. ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
