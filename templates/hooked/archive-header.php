<?php
/**
 * A template part to display meta data for an archive page.
 *
 * @package    Alpha\Templates
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */
?>
<div <?php alpha_attr( 'archive-header' ); ?>>

	<div <?php alpha_attr( 'wrap', 'archive-header' ); ?>>

		<div class="archive-info">

			<h1 <?php alpha_attr( 'archive-title' ); ?>><?php the_archive_title(); ?></h1>

			<?php alpha_breadcrumbs(); ?>

			<?php if ( is_category() || is_tax() ) : ?>

				<?php get_template_part( 'menu/sub-terms' ); ?>

			<?php endif; ?>

			<?php if ( ! is_paged() && $desc = get_the_archive_description() ) : ?>

				<div <?php alpha_attr( 'archive-description' ); ?>>
					<?php echo $desc; ?>
				</div><!-- .archive-description -->

			<?php endif; ?>

		</div>

	</div>

</div><!-- .archive-header -->
