<?php
/**
 * A Helper class for retrieving images.
 *
 * @package   CareLib
 * @copyright Copyright (c) 2018, Cipher Development, LLC
 * @license   GPL-2.0+
 * @since     1.0.0
 */

/**
 * Return a grabbed image.
 *
 * @since  1.0.0
 * @access public
 * @param array $args {
 *     Optional. An array of arguments.
 *
 *     @type int    $post_id The ID of the post associated with the image.
 *     @type array  $meta_key The meta key of the image in the order to search.
 *     @type bool   $featured Whether or not to use core's featured image.
 *     @type bool   $attachment Whether or not to fall back to the first attached image.
 *     @type string $size The image size to display.
 *     @type array  $responsive Whether or not to make the image responsive.
 *     @type bool|string $default_image URI to a default fallback image for when none is found.
 *     @type string $link A link to wrap around the retrieved image.
 *     @type bool   $link_attr The attributes to be applied to the link wrapping the image.
 *     @type bool   $image_attr The attributes to be applied to the image markup.
 *     @type bool   $width The width of the image to grab.
 *     @type bool   $height The height of the image to grab.
 *     @type bool   $format The format of the image to be returned. Can be img or array.
 *     @type bool   $meta_key_save Whether or not to save the grabbed image as meta data.
 *     @type bool   $thumbnail_id_save Whether or not to save the grabbed image as the post's featured image.
 *     @type bool   $cache Whether or not to cache the grabbed image result.
 *     @type string $before Markup to output before the grabbed image.
 *     @type string $after Markup to output after the grabbed image.
 * }
 * @return string|array the raw image string or an array of image attributes.
 */
function carelib_get_image( $args = array() ) {
	$defaults = apply_filters( 'carelib_image_defaults', array(
		'post_id'           => get_the_ID(),
		'meta_key'          => false,
		'featured'          => true,
		'attachment'        => false,
		'size'              => 'thumbnail',
		'responsive'        => true,
		'default_image'     => false,
		'link'              => true,
		'link_attr'         => false,
		'image_attr'        => false,
		'width'             => false,
		'height'            => false,
		'format'            => 'img',
		'meta_key_save'     => false,
		'thumbnail_id_save' => false,
		'cache'             => true,
		'before'            => '',
		'after'             => '',
	) );

	$args = wp_parse_args( $args, $defaults );

	if ( empty( $args['post_id'] ) ) {
		return false;
	}

	// Back compat for link_to_post argument.
	if ( isset( $args['link_to_post'] ) ) {
		$args['link'] = $args['link_to_post'];
	}

	if ( 'array' === $args['format'] ) {
		$args['link'] = false;
	}

	$image = _carelib_image_get_cached_image( $args );

	if ( 'array' === $args['format'] ) {
		return _carelib_image_get_raw( $image );
	}

	return empty( $image ) ? false : "{$args['before']}{$image}{$args['after']}";
}

/**
 * Display a featured image using CareLib's advanced image grabber class.
 *
 * @since  2.0.0
 * @access public
 * @uses   carelib_get_image
 * @param  array $args a list of arguments to pass to the image grabber class.
 * @return void
 */
function carelib_image( $args = array() ) {
	echo carelib_get_image( $args );
}

/**
 * Get a unique cache key based on an array of values.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $array Array to use for generating a cache key.
 * @return string A hashed key to retrieve a cached image.
 */
function _carelib_image_get_cache_key( $array ) {
	$output = false;

	if ( function_exists( 'wp_json_encode' ) ) {
		$output = wp_json_encode( $array );
	} else {
		$output = serialize( $array );
	}

	if ( $output ) {
		$output = md5( $output );
	}

	return $output;
}

/**
 * Return the cached image if it exists, otherwise search for the image and set
 * the cache for the next usage.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display an image.
 * @return bool|array $image Image properties or false if no image is found.
 */
function _carelib_image_get_cached_image( $args ) {
	$key   = _carelib_image_get_cache_key( $args );
	$cache = (array) wp_cache_get( $args['post_id'], 'carelib_image' );

	if ( $key && isset( $cache[ $key ] ) ) {
		return $cache[ $key ];
	}

	$image = _carelib_image_find( $args );

	if ( $image ) {
		$image = _carelib_image_format_image( $args, $image );

		if ( $key ) {
			$cache[ $key ] = $image;
			wp_cache_set( $args['post_id'], $cache, 'carelib_image' );
		}
	}

	return $image;
}

/**
 * Search the content are for an image to grab. Use cache if it's available.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display an image.
 * @return bool|array $image Image properties or false if no image is found.
 */
function _carelib_image_find( $args ) {
	if ( ! $image = _carelib_image_get_by( $args ) ) {
		return false;
	}

	if ( ! empty( $args['meta_key_save'] ) ) {
		_carelib_image_get_meta_key_save( $args, $image );
	}

	return apply_filters( 'carelib_image', $image );
}

/**
 * Grab the image using a pre-defined order of available methods.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display an image.
 * @return bool|array $image a grabbed image properties or false if no image is found
 */
function _carelib_image_get_by( $args ) {
	if ( ! empty( $args['featured'] ) ) {
		if ( $image = _carelib_image_get_by_featured_image( $args ) ) {
			return $image;
		}
	}

	if ( ! empty( $args['meta_key'] ) ) {
		if ( $image = _carelib_image_get_by_meta_key( $args ) ) {
			return $image;
		}
	}

	if ( ! empty( $args['attachment'] ) ) {
		if ( $image = _carelib_image_get_by_attachment( $args ) ) {
			return $image;
		}
	}

	if ( ! empty( $args['default_image'] ) ) {
		if ( $image = _carelib_image_get_by_default( $args ) ) {
			return $image;
		}
	}

	return false;
}

/**
 * Return the raw attributes of a grabbed image.
 *
 * @since  1.0.0
 * @access protected
 * @param  string $html the formatted HTML of a grabbed image.
 * @return array $output the raw attributes of a grabbed image.
 */
function _carelib_image_get_raw( $html ) {
	if ( empty( $html ) ) {
		return false;
	}
	$output = array();

	foreach ( wp_kses_hair( (string) $html, array( 'http', 'https' ) ) as $attr ) {
		$output[ $attr['name'] ] = $attr['value'];
	}

	return empty( $output ) ? false : $output;
}

/**
 * Return a sanitized string of html classes.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $classes a raw array of html classes to be sanitized.
 * @return array a sanitized array of lowercase html class values.
 */
function _carelib_image_sanitize_classes( $classes ) {
	$classes = array_map( 'strtolower', $classes );
	return array_map( 'sanitize_html_class', $classes );
}

/**
 * Return an image size attribute.
 *
 * @since  1.0.0
 * @access protected
 * @param  array  $args Arguments for how to load and display the image.
 * @param  array  $image Array of image attributes ($image, $classes, $alt, $caption).
 * @param  string $type The type of size to get EG height or width.
 * @return string a formatted string of the image's size.
 */
function _carelib_image_get_size( $args, $image, $type ) {
	return isset( $image[ $type ] ) ? $image[ $type ] : $args[ $type ];
}

/**
 * Build a sanitized string of html classes for our grabbed image.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @param  array $image Array of image attributes ($image, $classes, $alt, $caption).
 * @return string a formatted string of sanitized HTML classes.
 */
function _carelib_image_build_classes( $args, $image ) {
	$format = 'landscape';
	if ( _carelib_image_get_size( $args, $image, 'height' ) > _carelib_image_get_size( $args, $image, 'width' ) ) {
		$format = 'portrait';
	}

	$classes = array(
		$format,
		$args['size'],
	);

	foreach ( (array) $args['meta_key'] as $key ) {
		$classes[] = $key;
	}

	return trim( join( ' ', array_unique( _carelib_image_sanitize_classes( $classes ) ) ) );
}

/**
 * Wrap a formatted <img> with a link to the associated post if the
 * argument has been set.
 *
 * @since  1.0.0
 * @access protected
 * @param  string $html Markup for an image to possibly be wrapped..
 * @param  array  $args Arguments for how to load and display the image.
 * @return string $image Formatted image markup.
 */
function _carelib_image_maybe_add_link_wrapper( $html, $args ) {
	if ( empty( $args['link'] ) ) {
		return $html;
	}

	$link = $args['link'];

	if ( true === $link ) {
		$link = get_permalink( $args['post_id'] );
	}

	$attr = array(
		'href' => esc_url( $link ),
	);

	if ( ! empty( $args['link_attr'] ) ) {
		$attr = array_merge( $attr, $args['link_attr'] );
	}

	return sprintf( '<a %s>%s</a>',
		carelib_get_attr( 'image-link-wrapper', '', $attr ),
		$html
	);
}

/**
 * Get the default image attributes.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @param  array $image Array of image attributes ($image, $classes, $alt, $caption).
 * @return array $attr The default image attributes.
 */
function _carelib_image_get_default_attr( $args, $image ) {
	$attr = array(
		'id'       => "image-{$args['post_id']}",
		'src'      => $image['src'],
		'alt'      => empty( $image['alt'] ) ? get_the_title( $args['post_id'] ): $image['alt'],
		'class'    => _carelib_image_build_classes( $args, $image ),
	);

	if ( ! empty( $image['srcset'] ) ) {
		$attr['srcset'] = $image['srcset'];

		if ( ! empty( $image['sizes'] ) ) {
			$attr['sizes'] = $image['sizes'];
		}
	}

	if ( $width = _carelib_image_get_size( $args, $image, 'width' ) ) {
		$attr['width'] = $width;
	}

	if ( $height = _carelib_image_get_size( $args, $image, 'height' ) ) {
		$attr['height'] = $height;
	}

	return $attr;
}

/**
 * Return a formatted <img> string.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @param  array $image Array of image attributes ($image, $classes, $alt, $caption).
 * @return string $image Formatted image markup.
 */
function _carelib_image_format_image_html( $args, $image ) {
	if ( isset( $image['post_thumbnail_id'] ) ) {
		do_action( 'begin_fetch_post_thumbnail_html',
			$args['post_id'],
			$image['post_thumbnail_id'],
			$args['size']
		);
	}

	$attr = _carelib_image_get_default_attr( $args, $image );

	if ( ! empty( $args['image_attr'] ) ) {
		$attr = array_merge( $attr, $args['image_attr'] );
	}

	$html = sprintf( '<img %s />',
		carelib_get_attr( 'image', '', $attr )
	);

	if ( isset( $image['post_thumbnail_id'] ) ) {
		do_action( 'end_fetch_post_thumbnail_html',
			$args['post_id'],
			$image['post_thumbnail_id'],
			$args['size']
		);
	}

	return _carelib_image_maybe_add_link_wrapper( $html, $args );
}

/**
 * Apply the post_thumbnail_html filter if a given image has a thumbnail id.
 *
 * @since  1.0.0
 * @access protected
 * @param  string $html a formatted <img> string.
 * @param  array  $image Array of image attributes ($image, $classes, $alt, $caption).
 * @param  array  $args Arguments for how to load and display the image.
 * @return string $image Formatted image markup.
 */
function _carelib_image_maybe_add_thumbnail_html( $html, $image, $args ) {
	if ( empty( $image['post_thumbnail_id'] ) ) {
		return $html;
	}
	return apply_filters( 'post_thumbnail_html', $html,
		$args['post_id'],
		$image['post_thumbnail_id'],
		$args['size'],
		''
	);
}

/**
 * Format an image with appropriate alt text and class. Adds a link if the
 * argument is set.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @param  array $image Array of image attributes ($image, $classes, $alt, $caption).
 * @return string $image Formatted image (w/link to post if the option is set).
 */
function _carelib_image_format_image( $args, $image ) {
	if ( empty( $image['src'] ) ) {
		return false;
	}
	return _carelib_image_maybe_add_thumbnail_html(
		_carelib_image_format_image_html( $args, $image ),
		$image,
		$args
	);
}

/**
 * Get image by custom field key.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @return array|bool Array of image attributes. | False if no image is found.
 */
function _carelib_image_get_by_meta_key( $args ) {
	foreach ( (array) $args['meta_key'] as $meta_key ) {

		$image = get_post_meta( $args['post_id'], $meta_key, true );

		if ( ! empty( $image ) ) {
			break;
		}
	}

	if ( ! empty( $image ) ) {
		if ( is_numeric( $image ) ) {
			return _carelib_image_get_attachment( $image, $args );
		}
		return array( 'src' => $image );
	}

	return false;
}

/**
 * Get the featured image (i.e., WP's post thumbnail).
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @return array|bool Array of image attributes. | False if no image is found.
 */
function _carelib_image_get_by_featured_image( $args ) {
	$id = get_post_thumbnail_id( $args['post_id'] );

	if ( empty( $id ) ) {
		return false;
	}

	$args['size'] = apply_filters( 'post_thumbnail_size', $args['size'] );

	return _carelib_image_get_attachment( $id, $args );
}

/**
 * Check for attachment images.
 *
 * Uses get_children() to check if the post has images attached.  If image
 * attachments are found, loop through each.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @return array|bool Array of image attributes. | False if no image is found.
 */
function _carelib_image_get_by_attachment( $args ) {
	$id = false;
	// Check if the post itself is an image attachment.
	if ( wp_attachment_is_image( $args['post_id'] ) ) {
		$id = $args['post_id'];
	} else {
		// Get attachments for the inputted $post_id.
		$attachments = get_children(
			array(
				'numberposts'      => 1,
				'post_parent'      => $args['post_id'],
				'post_status'      => 'inherit',
				'post_type'        => 'attachment',
				'post_mime_type'   => 'image',
				'order'            => 'ASC',
				'orderby'          => 'menu_order ID',
				'fields'           => 'ids',
			)
		);

		// Check if any attachments were found.
		if ( ! empty( $attachments ) ) {
			$id = array_shift( $attachments );
		}
	}

	return _carelib_image_get_attachment( $id, $args );
}

/**
 * Retrieves the value for an image attachment’s ‘srcset’ attribute.
 *
 * @since  1.0.0
 * @access protected
 * @param  int   $id The ID of the current attachment.
 * @param  array $args Arguments for how to load and display the image.
 * @return false|string A 'srcset' value string or false.
 */
function _carelib_image_get_srcset( $id, $args ) {
	if ( ! $args['responsive'] || ! function_exists( 'wp_get_attachment_image_srcset' ) ) {
		return false;
	}

	return wp_get_attachment_image_srcset( $id, $args['size'] );
}

/**
 * Retrieves the value for an image attachment’s ‘sizes’ attribute
 *
 * @since  1.0.0
 * @access protected
 * @param  int   $id The ID of the current attachment.
 * @param  array $args Arguments for how to load and display the image.
 * @return false|string A 'sizes' value string or false.
 */
function _carelib_image_get_sizes( $id, $args ) {
	if ( ! $args['responsive'] || ! function_exists( 'wp_get_attachment_image_srcset' ) ) {
		return false;
	}

	return wp_get_attachment_image_sizes( $id, $args['size'] );
}

/**
 * Get a WordPress image attachment.
 *
 * @since  1.0.0
 * @access protected
 * @param  int   $id The ID of the current attachment.
 * @param  array $args Arguments for how to load and display the image.
 * @return false|array A list of image attributes.
 */
function _carelib_image_get_attachment( $id, $args ) {
	if ( false === $id ) {
		return false;
	}

	// Get the attachment image.
	$image = wp_get_attachment_image_src( $id, $args['size'] );
	$alt   = get_post_meta( $id, '_wp_attachment_image_alt', true );

	// Save the attachment as the 'featured image'.
	if ( true === $args['thumbnail_id_save'] ) {
		set_post_thumbnail( $args['post_id'], $id );
	}

	return empty( $image ) ? false : array(
		'id'      => $id,
		'src'     => $image[0],
		'width'   => $image[1],
		'height'  => $image[2],
		'alt'     => trim( esc_attr( $alt, true ) ),
		'caption' => get_post_field( 'post_excerpt', $id ),
		'srcset'  => _carelib_image_get_srcset( $id, $args ),
		'sizes'   => _carelib_image_get_sizes( $id, $args ),
	);
}

/**
 * Set a default image.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @return array|bool Array of image attributes. | False if no image is found.
 */
function _carelib_image_get_by_default( $args ) {
	return array(
		'src' => $args['default_image'],
	);
}

/**
 * Save the image URL as the value of the meta key provided.
 *
 * This allows users to set a custom meta key for their image. By doing
 * this, users can trim off database queries when grabbing attachments.
 *
 * @since  1.0.0
 * @access protected
 * @param  array $args Arguments for how to load and display the image.
 * @param  array $image Array of image attributes ($image, $classes, $alt, $caption).
 */
function _carelib_image_get_meta_key_save( $args, $image ) {
	if ( empty( $args['meta_key_save'] ) || empty( $image['src'] ) ) {
		return;
	}

	$meta = get_post_meta( $args['post_id'], $args['meta_key_save'], true );

	if ( $meta === $image['src'] ) {
		return false;
	}

	update_post_meta( $args['post_id'], $args['meta_key_save'], $image['src'], $meta );
}

/**
 * Delete the image cache.
 *
 * @since  1.0.0
 * @access protected
 * @param  int $post_id The ID of the post to delete the cache for.
 * @return bool true when cache is deleted, false otherwise
 */
function _carelib_delete_image_cache( $post_id ) {
	return wp_cache_delete( $post_id, 'carelib_image' );
}

/**
 * Delete the image cache for the specific post when the 'save_post' hook
 * is fired.
 *
 * @since  1.0.0
 * @access protected
 * @param  int $post_id The ID of the post to delete the cache for.
 * @return bool true when cache is deleted, false otherwise
 */
function carelib_delete_image_cache_by_post( $post_id ) {
	return _carelib_delete_image_cache( $post_id );
}

/**
 * Delete the image cache for a specific post when the 'added_post_meta',
 * 'deleted_post_meta', or 'updated_post_meta' hooks are called.
 *
 * @since  1.0.0
 * @access protected
 * @param  int $meta_id The ID of the metadata being updated.
 * @param  int $post_id The ID of the post to delete the cache for.
 * @return bool true when cache is deleted, false otherwise
 */
function carelib_delete_image_cache_by_meta( $meta_id, $post_id ) {
	return _carelib_delete_image_cache( $post_id );
}
