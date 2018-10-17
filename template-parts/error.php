<?php
/**
 * A template to display when no content can be found.
 *
 * @package   Alpha\TemplateParts
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */
?>
<article <?php carelib_attr( 'post' ); ?>>

	<header class="entry-header">
		<h1 <?php carelib_attr( 'entry-title' ); ?>>
			<?php esc_attr_e( 'Nothing found', 'alpha' ); ?>
		</h1>
	</header><!-- .entry-header -->

	<div <?php carelib_attr( 'entry-content' ); ?>>
		<p><?php esc_attr_e( 'Apologies, but no entries were found.', 'alpha' ); ?></p>
	</div><!-- .entry-content -->

</article><!-- .entry -->
