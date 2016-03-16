<?php
/**
 * A template part to display when comments are closed.
 *
 * @package   Alpha\TemplateParts\Comment
 * @author    WP Site Care
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @since     0.1.0
 */
?>
<?php if ( pings_open() && ! comments_open() ) : ?>

	<p class="comments-closed pings-open">
		<?php
			// Translators: The two %s are placeholders for HTML. The order can't be changed.
			printf(
				esc_html__( 'Comments are closed, but %strackbacks%s and pingbacks are open.', 'alpha' ),
				'<a href="' . esc_url( get_trackback_url() ) . '">',
				'</a>'
			);
		?>
	</p><!-- .comments-closed .pings-open -->

<?php elseif ( ! comments_open() ) : ?>

	<p class="comments-closed">
		<?php esc_html_e( 'Comments are closed.', 'alpha' ); ?>
	</p><!-- .comments-closed -->

	<?php

endif;
