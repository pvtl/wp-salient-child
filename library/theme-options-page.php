<?php
/**
 * Create Admin Pages for ACF fields
 *
 * @package salient-child
 */

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title'  => 'Theme Options',
			'menu_title'  => 'Theme Options',
			'menu_slug'   => 'theme-options',
			'icon_url'    => 'dashicons-menu',
			'position'    => '30.1',
			'parent_slug' => 'themes.php',
		)
	);
}
