<?php
/**
 * Configure responsive images sizes
 *
 * @package pvtl-child
 */

// Add additional image sizes.
add_image_size( 'pvtl-small', 640 );
add_image_size( 'pvtl-medium', 1024 );
add_image_size( 'pvtl-large', 1200 );
add_image_size( 'pvtl-xlarge', 1920 );

/**
 * Register the new image sizes for use in the add media modal in wp-admin.
 *
 * @param array $sizes - the sizes.
 */
add_filter(
	'image_size_names_choose',
	function ( $sizes ) {
		return array_merge(
			$sizes,
			array(
				'pvtl-small'  => __( 'PVTL Small' ),
				'pvtl-medium' => __( 'PVTL Medium' ),
				'pvtl-large'  => __( 'PVTL Large' ),
				'pvtl-xlarge' => __( 'PVTL XLarge' ),
			)
		);
	}
);
