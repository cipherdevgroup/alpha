<?php
/**
 * A template part for displaying a ping.
 *
 * @package   Alpha\TemplateParts\Comment
 * @author    WP Site Care
 * @copyright Copyright (c) 2017, WP Site Care, LLC
 * @since     1.0.0
 */
?>
<li <?php carelib_attr( 'comment' ); ?>>

	<article <?php carelib_attr( 'comment-container', 'ping' ); ?>>

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

	</article>
