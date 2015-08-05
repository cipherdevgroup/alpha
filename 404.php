<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package    Alpha\Templates
 * @subpackage CareLib
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @license    GPL-2.0+
 * @since      1.0.0
 */
?>
<?php get_header(); ?>

<div <?php alpha_attr( 'site-inner' ); ?>>

	<?php tha_content_before(); ?>

	<main <?php alpha_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<article class="entry error-404 not-found">

			<header class="entry-header">
				<h1 <?php alpha_attr( 'entry-title' ); ?>>
					<?php esc_attr_e( 'Oops! That page can&rsquo;t be found.', 'wp-site-care' ); ?>
				</h1>
			</header><!-- .page-header -->

			<div class="entry-content">

				<p><?php esc_attr_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wp-site-care' ); ?></p>

				<?php get_search_form(); ?>

				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				<?php
				// Translators: %1$s: smiley
				the_widget(
					'WP_Widget_Archives',
					'dropdown=1',
					'after_title=</h2> ' . wpautop( sprintf(
						__( 'Try looking in the monthly archives. %1$s', 'wp-site-care' ),
						convert_smilies( ':)' )
					) )
				);
				?>

				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

			</div><!-- .entry-content -->

		</article><!-- .error-404 -->

		<?php tha_content_bottom(); ?>

	</main><!-- #content -->

	<?php tha_content_after(); ?>

</div><!-- #site-inner -->

<?php
get_footer();
