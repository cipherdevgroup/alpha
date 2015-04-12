<?php
/**
 * A template part for displaying single video attachments.
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

	<?php hybrid_attachment(); // Function for handling non-image attachments. ?>

	<header class="entry-header">
		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<p class="entry-meta">
			<?php sitecare_entry_published(); ?>
			<?php edit_post_link(); ?>
		</p>
	</footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->

<div class="attachment-meta">

	<div class="media-info">

		<h3><?php _e( 'Video Info', 'alpha' ); ?></h3>

		<?php hybrid_media_meta(); ?>

	</div><!-- .media-info -->

</div><!-- .attachment-meta -->
