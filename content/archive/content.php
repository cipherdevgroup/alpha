<?php
/**
 * A template part for displaying an entry within an archive.
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

	<?php
	// Display a featured image if we can find something to display.
	get_the_image(
		array(
			'size'   => 'alpha-full',
			'order'  => array( 'featured', 'attachment' ),
			'before' => '<div class="featured-media image">',
			'after'  => '</div>',
		)
	);
	?>

	<header class="entry-header">

		<?php the_title( '<h2 ' . alpha_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		<p class="entry-meta">
			<?php sitecare_entry_author(); ?>
			<?php sitecare_entry_published(); ?>
			<?php sitecare_entry_comments_link(); ?>
			<?php edit_post_link(); ?>
		</p><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div <?php alpha_attr( 'entry-summary' ); ?>>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php get_template_part( 'content/parts/entry-footer' ); ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
