<?php
/**
 * A template part to display comment pagination.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<?php if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : ?>

	<nav id="comments-nav" class="comments-nav pagination" role="navigation" aria-labelledby="comments-nav-title">

		<h3 id="comments-nav-title" class="screen-reader-text"><?php _e( 'Comments Navigation', 'alpha' ); ?></h3>

		<?php
		paginate_comments_links(
			array(
				'prev_text' => sprintf( '<span class="screen-reader-text">%s</span>' , __( 'Previous Comment Page', 'alpha' ) ),
				'next_text' => sprintf( '<span class="screen-reader-text">%s</span>', __( 'Next Comment Page', 'alpha' ) ),
			)
		);
		?>

	</nav><!-- .comments-nav -->

	<?php

endif;
