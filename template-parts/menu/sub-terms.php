<?php
/**
 * A template to display taxonomy terms.
 *
 * @package    Alpha\TemplateParts
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */
?>
<?php if ( is_taxonomy_hierarchical( get_queried_object()->taxonomy ) ) : ?>

	<?php
	$terms = wp_list_categories(
		array(
			'taxonomy'         => get_queried_object()->taxonomy,
			'child_of'         => get_queried_object_id(),
			'depth'            => 1,
			'title_li'         => false,
			'show_option_none' => false,
			'echo'             => false,
		)
	);
	?>

	<?php if ( ! empty( $terms ) ) : ?>

		<nav <?php alpha_attr( 'menu', 'sub-terms' ); ?>>

			<ul id="menu-sub-terms-items" class="menu-items">
				<?php echo $terms; ?>
			</ul><!-- .sub-terms -->

		</nav><!-- .menu -->

	<?php endif;

endif;
