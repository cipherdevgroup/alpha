<?php
/**
 * A template part for displaying a comment.
 *
 * @package   Alpha\TemplateParts\Comment
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */
?>
<li <?php carelib_attr( 'comment' ); ?>>

	<?php echo get_avatar( $comment, 90 ); ?>

	<article <?php carelib_attr( 'comment-container' ); ?>>

		<header <?php carelib_attr( 'comment-meta' ); ?>>
			<cite <?php carelib_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
			<a <?php carelib_attr( 'comment-permalink' ); ?>>
				<time <?php carelib_attr( 'comment-published' ); ?>>
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

		<div <?php carelib_attr( 'comment-content' ); ?>>
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
			'before' => sprintf( '<footer %s>', carelib_get_attr( 'comment-meta' ) ),
			'after'  => '</footer>',
		) ) );
		?>

	</article>
