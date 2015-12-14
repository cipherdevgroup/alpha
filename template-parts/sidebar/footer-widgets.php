<?php
/**
 * Footer Widgets Sidebar Template
 *
 * @package    Alpha\TemplateParts
 * @subpackage Alpha
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */
?>
<div <?php alpha_attr( 'footer-widgets' ); ?>>
	<div <?php alpha_attr( 'wrap', 'footer-widgets' ); ?>>
		<?php dynamic_sidebar( 'footer-widgets' ); ?>
	</div>
</div><!-- #footer-widgets -->
