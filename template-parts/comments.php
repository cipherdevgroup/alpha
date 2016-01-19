<?php
/**
 * The template for displaying comments.
 *
 * @package    Alpha\TemplateParts
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
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

		<?php endif; ?>

		<?php comment_form(); ?>

	</section><!-- #comments -->

	<?php tha_comments_after(); ?>

<?php endif; ?>
