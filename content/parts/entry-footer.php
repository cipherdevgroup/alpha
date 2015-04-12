<?php
/**
 * A template part for the default entry footer.
 *
 * @package     Alpha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.1.0
 */
?>
<?php if ( has_term( '', 'category' ) || has_term( '', 'post_tag' ) ) : ?>

	<footer class="entry-footer">
		<?php
		hybrid_post_terms(
			array(
				'taxonomy' => 'category',
				'before'   => '<p class="entry-meta categories">',
				'after'    => '</p>',
			)
		);
		hybrid_post_terms(
			array(
				'taxonomy' => 'post_tag',
				'before'   => '<p class="entry-meta tags">',
				'after'    => '</p>',
			)
		);
		?>
	</footer><!-- .entry-footer -->

	<?php

endif;
