<?php
/**
 * A template part for displaying a comment.
 *
 * @package    Alpha\TemplateParts
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */
?>
<li <?php alpha_attr( 'comment' ); ?>>

	<?php echo get_avatar( $comment, 90 ); ?>

	<article <?php alpha_attr( 'comment-container' ); ?>>

		<header <?php alpha_attr( 'comment-meta' ); ?>>
			<cite <?php alpha_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
			<a <?php alpha_attr( 'comment-permalink' ); ?>>
				<time <?php alpha_attr( 'comment-published' ); ?>>
					<?php
					printf(
						esc_attr__( '%s ago', 'alpha' ),
						human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) )
					);
					?>
				</time>
			</a>
			<?php edit_comment_link(); ?>
		</header><!-- .comment-meta -->

		<div <?php alpha_attr( 'comment-content' ); ?>>
			<?php if ( ! $comment->comment_approved ) : ?>
				<p class="alert">
					<?php esc_attr_e( 'Your comment is awaiting moderation.', 'alpha' ); ?>
				</p>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div><!-- .comment-content -->

		<?php
		comment_reply_link( array_merge( $args, array(
			'depth'  => $depth,
			'before' => sprintf( '<footer %s>', alpha_get_attr( 'comment-meta' ) ),
			'after'  => '</footer>',
		) ) );
		?>

	</article>
