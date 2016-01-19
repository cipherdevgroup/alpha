<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package    Alpha\Templates
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */
?>
<?php get_header(); ?>

<div <?php alpha_attr( 'site-inner' ); ?>>

	<?php tha_content_before(); ?>

	<main <?php alpha_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<article class="entry error-404 not-found">

			<header <?php alpha_attr( 'entry-header' ); ?>>
				<h1 <?php alpha_attr( 'entry-title' ); ?>>
					<?php esc_attr_e( 'Oops! That page can&rsquo;t be found.', 'alpha' ); ?>
				</h1>
			</header><!-- .page-header -->

			<div <?php alpha_attr( 'entry-content' ); ?>>

				<p><?php esc_attr_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'alpha' ); ?></p>

				<?php get_search_form(); ?>

				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				<?php
				// Translators: %1$s is a smile emoji.
				the_widget(
					'WP_Widget_Archives',
					'dropdown=1',
					'after_title=</h2> ' . wpautop( sprintf(
						__( 'Try looking in the monthly archives. %1$s', 'alpha' ),
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
