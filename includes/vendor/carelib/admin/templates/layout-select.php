<?php
/**
 * A template part for displaying the post layout metabox.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */
?>
<label class="theme-layout">
	<input type="radio" value="<?php echo esc_attr( $name ); ?>" name="carelib-post-layout" <?php checked( $current_layout, $name ); ?> />
	<span class="screen-reader-text"><?php echo esc_html( $layout['label'] ); ?></span>
	<img src="<?php echo esc_url( sprintf( $layout['image'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" alt="<?php echo esc_attr( $layout['label'] ); ?>" />
</label>
