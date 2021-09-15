<?php
/**
 * Automatically require_once all php files within ./library/ and ./vc-elemets/.
 * - Don't add functions/code here, give the code context in it's own file within /library
 *
 * @package salient-child
 */

// Get all library files from cache (or re-cache).
$cache_key    = 'GLOB/LIBRARY';
$cache_expire = ( 60 * 60 ) * 1; // 1hr

// wp_cache_delete( $cache_key ); // For debugging @codingStandardsIgnoreLine
$files = wp_cache_get( $cache_key, '' );

if ( false === $files ) {
	$files = glob( dirname( __FILE__ ) . '/{library,vc-elements}/*.php', GLOB_BRACE );
	wp_cache_set( $cache_key, $files, '', $cache_expire );
}

foreach ( $files as $file ) {
	if ( ! file_exists( $file ) ) {
		wp_cache_delete( $cache_key );
		continue; // File now doesn't exist for whatever reason.
	}

	require_once $file;
}

// Remember:
// Don't add functions/code here,
// give the code context in it's own file within /library/.
