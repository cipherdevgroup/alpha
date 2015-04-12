<?php
/**
 * A template part for displaying single image attachments.
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

	<?php if ( has_excerpt() ) : // If the image has an excerpt/caption. ?>

		<?php $src = wp_get_attachment_image_src( get_the_ID(), 'full' ); ?>

		<?php echo img_caption_shortcode( array( 'align' => 'aligncenter', 'width' => esc_attr( $src[1] ), 'caption' => get_the_excerpt() ), wp_get_attachment_image( get_the_ID(), 'full', false ) ); ?>

	<?php else : // If the image doesn't have a caption. ?>

		<?php echo wp_get_attachment_image( get_the_ID(), 'full', false, array( 'class' => 'aligncenter' ) ); ?>

	<?php endif; // End check for image caption. ?>

	<header class="entry-header">

		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		<div class="entry-byline">
			<span class="image-sizes"><?php printf( __( 'Sizes: %s', 'alpha' ), hybrid_get_image_size_links() ); ?></span>
		</div><!-- .entry-byline -->

	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<p class="entry-meta">
			<?php flagship_entry_published(); ?>
			<?php edit_post_link(); ?>
		</p>
	</footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->

<div class="attachment-meta">

	<div class="media-info image-info">

		<h3 class="attachment-meta-title"><?php _e( 'Image Info', 'alpha' ); ?></h3>

		<?php hybrid_media_meta(); ?>

	</div><!-- .media-info -->

	<?php $gallery = gallery_shortcode( array( 'columns' => 4, 'numberposts' => 8, 'orderby' => 'rand', 'id' => get_queried_object()->post_parent, 'exclude' => get_the_ID() ) ); ?>

	<?php if ( ! empty( $gallery ) ) : // Check if the gallery is not empty. ?>

		<div class="image-gallery">
			<h3 class="attachment-meta-title"><?php _e( 'Gallery', 'alpha' ); ?></h3>
			<?php echo $gallery; ?>
		</div>

	<?php endif; // End gallery check. ?>

</div><!-- .attachment-meta -->
