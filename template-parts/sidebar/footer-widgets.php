<?php
/**
 * Footer Widgets Sidebar Template
 *
 * @package   Alpha\TemplateParts\Sidebar
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */
?>
<div <?php carelib_attr( 'footer-widgets' ); ?>>
	<div <?php carelib_attr( 'wrap', 'footer-widgets' ); ?>>
		<?php dynamic_sidebar( 'footer-widgets' ); ?>
	</div>
</div><!-- #footer-widgets -->
