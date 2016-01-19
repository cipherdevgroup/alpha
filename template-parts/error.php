<?php
/**
 * A template to display when no content can be found.
 *
 * @package    Alpha\TemplateParts
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
 */
?>
<article <?php alpha_attr( 'post' ); ?>>

	<header class="entry-header">
		<h1 <?php alpha_attr( 'entry-title' ); ?>>
			<?php esc_attr_e( 'Nothing found', 'alpha' ); ?>
		</h1>
	</header><!-- .entry-header -->

	<div <?php alpha_attr( 'entry-content' ); ?>>
		<p><?php esc_attr_e( 'Apologies, but no entries were found.', 'alpha' ); ?></p>
	</div><!-- .entry-content -->

</article><!-- .entry -->
