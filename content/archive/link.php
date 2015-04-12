<?php
/**
 * A template part for displaying a link entry within an archive.
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

	<header class="entry-header">
		<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . hybrid_get_the_post_format_url() . '">', is_rtl() ? ' <span class="meta-nav">&larr;</span>' : ' <span class="meta-nav">&rarr;</span>' . '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<p class="entry-meta">
			<?php hybrid_post_format_link(); ?>
			<a class="entry-permalink" href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url"><?php _e( 'Permalink', 'alpha' ); ?></a>
			<?php flagship_entry_comments_link(); ?>
			<?php edit_post_link(); ?>
		</p><!-- .entry-meta -->
	</footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
