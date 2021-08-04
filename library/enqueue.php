<?php

if ( ! function_exists( 'pvtl_enqueue' ) ) {
    /**
     * Function to make enqueueing scripts and stylesheets easier
     * Adds the last modified time as the version number
     *
     * @param string $handle - Name of the script. Should be unique.
     * @param string $relpath - Full URL of the script, or path of the script relative to the WordPress root directory.
     * @param string $type - style or script.
     * @param array  $deps - Optional. An array of registered script handles this script depends on. Default empty array.
     * @param bool   $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
     */
    function pvtl_enqueue( $handle, $relpath, $type = 'script', $deps = array(), $in_footer = false ) {
        $uri = get_theme_file_uri( $relpath );
        $vsn = filemtime( get_theme_file_path( $relpath ) );

        if ( 'script' === $type ) {
            wp_enqueue_script( $handle, $uri, $deps, $vsn, $in_footer );

        } elseif ( 'style' === $type ) {
            wp_enqueue_style( $handle, $uri, $deps, $vsn );
        }
    }
}

/** Theme enqueues */

function pvtl_salient_child_enqueue_styles() {

    wp_dequeue_style('salient-child-style');

    // CSS Stylesheets.
    pvtl_enqueue( 'pvtl-salient-child-style', '/dist/css/app.css', 'style', array() );

    // Javascript Scripts.
    pvtl_enqueue( 'pvtl-salient-child-js', '/dist/js/app.js', 'script', array( 'jquery' ), true );

    if ( is_rtl() ) {
        wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
    }

}
add_action( 'wp_enqueue_scripts', 'pvtl_salient_child_enqueue_styles', 1000);
