<?php

/*
Element Description: Custom Page Builder accordion element
*/

if(!function_exists('pvtl_accordion')){
    function pvtl_accordion( $atts, $content = null ) {

        extract(
            shortcode_atts(
                array(
                    'accordion_title'   => '',
                ),
                $atts
            )
        );

        ob_start();

        require('vc-templates/pvtl-accordion.php');

        return ob_get_clean();

    }
    add_shortcode('pvtl_accordion', 'pvtl_accordion');
}

// Map the block with vc_map()
if(function_exists('vc_map')) {
    vc_map(
        array(
            'name'                    => __( 'Pricing Accordion', 'text-domain' ),
            'base'                    => 'pvtl_accordion',
            'description'             => __( 'Display a PVTL Pricing Table', 'text-domain' ),
            'category'                => __( 'PVTL', 'text-domain' ),
            'icon'                    => get_stylesheet_directory_uri() . '/pvtl.png',
            'params'                  => array(
                array(
                    "type"        => "textfield",
                    "holder"      => "div",
                    "class"       => "",
                    "admin_label" => true,
                    "heading"     => __( "Title", "pvtl" ),
                    "param_name"  => "accordion_title",
                    "value"       => __( "", "pvtl" ),
                    "description" => __( "Enter the title for this pricing accordion above. Then click save changes and you will be able to add inner accordion rows.", "pvtl" ),
                ),
            ),
            'as_parent'               => array( 'only' => 'pvtl_accordion_item' ),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'is_container'            => true,
            "js_view"                 => 'VcColumnView',
        )
    );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Pvtl_Accordion extends WPBakeryShortCodesContainer {

    }
}
