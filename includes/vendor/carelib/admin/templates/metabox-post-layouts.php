<?php
/**
 * A template part for displaying the post layout metabox.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

?>
<?php
	wp_nonce_field(
		'carelib_update_post_layout',
		'carelib_post_layout_nonce'
	);
?>

<div class="buttonset">
	<label id="carelib-default-layout" class="default-layout">
		<input type="radio" value="default" name="carelib-post-layout" <?php checked( $current_layout, 'default' ); ?> />
		<span><?php esc_html_e( 'Default Layout', 'alpha' ); ?></span>
	</label>

	<?php foreach ( carelib_get_layouts() as $name => $layout ) : ?>

		<?php if ( carelib_layout_has_post_metabox( $layout, $post->post_type ) ) : ?>

			<?php require carelib_get_dir( 'admin/templates/layout-select.php' ); ?>

		<?php endif; ?>

	<?php endforeach; ?>
</div>
