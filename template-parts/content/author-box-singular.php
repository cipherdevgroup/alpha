<?php
/**
 * The default author box template for singular entries.
 *
 * @package   Alpha\TemplateParts
 * @author    Cipher Development
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @since     1.0.0
 */

?>
<section <?php carelib_attr( 'author-box', 'singular' ); ?>>

	<div class="avatar-wrap">
		<?php echo get_avatar( get_the_author_meta( 'email' ), 100, '', get_the_author() ); ?>
	</div><!-- .avatar-wrap -->

	<div <?php carelib_attr( 'author-info' ); ?>>

		<h3 <?php carelib_attr( 'author-box-title' ); ?>>
			<?php printf( esc_html__( 'Written by %s', 'alpha' ), get_the_author_meta( 'display_name' ) ); ?>
		</h3>

		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<div <?php carelib_attr( 'author-bio' ); ?>>
				<?php echo wpautop( get_the_author_meta( 'description' ) ) ?>
			</div>
		<?php endif; ?>

		<ul <?php carelib_attr( 'social-icons' ); ?>>

			<?php if ( $twitter = get_the_author_meta( 'twitter' ) ) : ?>
			<li class="social-icon social-icon-twitter">
				<a href="<?php echo esc_url( "https://twitter.com/{$twitter}" ); ?>">
					<span class="text"><?php esc_attr_e( 'Twitter', 'alpha' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( $facebook = get_the_author_meta( 'facebook' ) ) : ?>
			<li class="social-icon social-icon-facebook">
				<a href="<?php echo esc_url( $facebook ); ?>">
					<span class="text"><?php esc_attr_e( 'Facebook', 'alpha' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<?php if ( $gplus = get_the_author_meta( 'googleplus' ) ) : ?>
			<li class="social-icon social-icon-gplus">
				<a href="<?php echo esc_url( $gplus ); ?>">
					<span class="text"><?php esc_attr_e( 'Google+', 'alpha' ); ?></span>
				</a>
			</li>
			<?php endif; ?>

			<li class="social-icon social-icon-rss">
				<a href="<?php echo esc_url( get_author_feed_link( get_the_author_meta( 'ID' ) ) ); ?>">
					<span class="text"><?php esc_attr_e( 'RSS Feed', 'alpha' ); ?></span>
				</a>
			</li>

		</ul><!-- .social-icons -->

	</div><!-- .author-info -->

</section><!-- #author-box -->
