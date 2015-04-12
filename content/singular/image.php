<?php
/**
 * A template part for displaying single image entries.
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

	<?php
	// Display a featured image if we can find something to display.
	get_the_image(
		array(
			'size'          => 'alpha-full',
			'split_content' => true,
			'scan_raw'      => true,
			'scan'          => true,
			'order'         => array( 'scan_raw', 'scan', 'featured', 'attachment', ),
			'before'        => '<div class="featured-media image">',
			'after'         => '</div>',
		)
	);
	?>

	<header class="entry-header">

		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		<p class="entry-meta">
			<?php hybrid_post_format_link(); ?>
			<?php flagship_entry_author(); ?>
			<?php flagship_entry_published(); ?>
			<?php flagship_entry_comments_link(); ?>
			<?php edit_post_link(); ?>
		</p><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'content/parts/entry-footer' ); ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
