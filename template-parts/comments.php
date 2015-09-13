<?php
/**
 * The template for displaying comments.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<?php if ( ! post_password_required() ) : ?>

	<?php tha_comments_before(); ?>

	<section id="comments" class="comments-area">

		<?php if ( have_comments() ) : ?>

			<h3 class="comments-number" id="comments-number"><?php comments_number(); ?></h3>

			<ol class="comment-list">
				<?php
				wp_list_comments(
					array(
						'style'    => 'ol',
						'callback' => 'alpha_comments_callback',
					)
				);
				?>
			</ol><!-- .comment-list -->

			<?php get_template_part( 'template-parts/comment/navigation' ); ?>

			<?php if ( ! comments_open() || ! pings_open() ) : ?>

				<?php get_template_part( 'template-parts/comment/error' ); ?>

			<?php endif; ?>

		<?php endif; // End check for comments. ?>

		<?php comment_form(); ?>

	</section><!-- #comments -->

	<?php tha_comments_after(); ?>

<?php endif; ?>
