<?php
/**
 * A template part for displaying single entries.
 *
 * @package     Alpha
 * @subpackage  CareLib
 * @copyright   Copyright (c) 2015, WP Site Care, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>
<article <?php alpha_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<header class="entry-header">

		<h1 <?php alpha_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		<p class="entry-meta">
			<?php sitecare_entry_author(); ?>
			<?php sitecare_entry_published(); ?>
			<?php sitecare_entry_comments_link(); ?>
			<?php edit_post_link(); ?>
		</p><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div <?php alpha_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'content/parts/entry-footer' ); ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
