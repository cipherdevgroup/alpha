<?php
/**
 * Footer Widgets Sidebar Template
 *
 * @package    Alpha
 * @subpackage Alpha\TemplateParts\Sidebar
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */
?>
<div <?php alpha_attr( 'footer-widgets' ); ?>>
	<div <?php alpha_attr( 'wrap', 'footer-widgets' ); ?>>
		<?php dynamic_sidebar( 'footer-widgets' ); ?>
	</div>
</div><!-- #footer-widgets -->
