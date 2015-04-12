<?php
/**
 * A template part for displaying a comment.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<li <?php hybrid_attr( 'comment' ); ?>>

	<?php echo get_avatar( $comment, 48 ); ?>

	<article class="comment-container">

		<header class="comment-meta">
			<cite <?php hybrid_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
			<a <?php hybrid_attr( 'comment-permalink' ); ?>>
				<time <?php hybrid_attr( 'comment-published' ); ?>>
					<?php
					printf(
						__( '%s ago', 'alpha' ),
						human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) )
					);
					?>
				</time>
			</a>
			<?php edit_comment_link(); ?>
		</header><!-- .comment-meta -->

		<div <?php hybrid_attr( 'comment-content' ); ?>>
			<?php comment_text(); ?>
		</div><!-- .comment-content -->

		<?php if ( hybrid_get_comment_reply_link() ) : ?>

			<footer class="comment-meta">
				<?php hybrid_comment_reply_link(); ?>
			</footer><!-- .comment-meta -->

		<?php endif; ?>

	</article>
