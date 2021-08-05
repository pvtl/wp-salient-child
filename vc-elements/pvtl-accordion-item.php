<?php

/*
Element Description: Custom Page Builder accordion inner row element
*/

if(!function_exists('pvtl_accordion_item')) {
    function pvtl_accordion_item( $atts, $content = null) {
        extract(
            shortcode_atts(
                array(
                    'section_title'   => '',
                    'section_price'   => '',
                    'section_btn'   => '',
                    'section_link'   => '',
                    'table'   => '',
                ),
                $atts
            )
        );

        ob_start();

        require('vc-templates/pvtl-accordion-item.php');

        return ob_get_clean();
    }
    add_shortcode('pvtl_accordion_item', 'pvtl_accordion_item');
}

// Map the block with vc_map()
if(function_exists('vc_map')) {
    vc_map(
        array(
            'name'            => __( 'Accordion Item', 'text-domain' ),
            'base'            => 'pvtl_accordion_item',
            'description'     => __( 'Display a PVTL Pricing Table', 'text-domain' ),
            'category'        => __( 'PVTL', 'text-domain' ),
            'icon'            => get_stylesheet_directory_uri() . '/pvtl.png',
            'content_element' => true,
            'as_child'        => array( 'only' => 'pvtl_accordion' ),
            'params'          => array(
                array(
                    "type"        => "textfield",
                    "holder"      => "div",
                    "class"       => "",
                    "admin_label" => true,
                    "heading"     => __( "Title", "pvtl" ),
                    "param_name"  => "section_title",
                    "value"       => __( "", "pvtl" ),
                ),
                array(
                    "type"        => "textfield",
                    "holder"      => "div",
                    "class"       => "",
                    "admin_label" => false,
                    "heading"     => __( "Button Title", "pvtl" ),
                    "param_name"  => "section_btn",
                    "value"       => __( "", "pvtl" ),
                ),
                array(
                    "type"        => "textfield",
                    "holder"      => "div",
                    "class"       => "",
                    "admin_label" => false,
                    "heading"     => __( "Button Link", "pvtl" ),
                    "param_name"  => "section_link",
                    "value"       => __( "", "pvtl" ),
                ),
                array(
                    "type"        => "textarea_html",
                    "holder"      => "div",
                    "class"       => "",
                    "admin_label" => false,
                    "heading"     => __( "Text Content (optional)", "pvtl" ),
                    "param_name"  => "content",
                    "value"       => __( "", "pvtl" ),
                ),
                array(
                    'type'        => 'param_group',
                    'param_name'  => 'table',
                    "heading"     => __( "Table", "pvtl" ),
                    'description' => __( 'Add table rows above.', 'salient' ),
                    'params'      => array(
                        array(
                            "type"        => "textfield",
                            "holder"      => "div",
                            "class"       => "",
                            "admin_label" => true,
                            "heading"     => __( "Row Title", "pvtl" ),
                            "param_name"  => "row_title",
                            "value"       => __( "", "pvtl" ),
                        ),
                        array(
                            "type"        => "textarea",
                            "holder"      => "div",
                            "class"       => "",
                            "admin_label" => false,
                            "heading"     => __( "Row Content", "pvtl" ),
                            "param_name"  => "row_content",
                            "value"       => __( "", "pvtl" ),
                        ),
                    )
                )
            )
        )
    );
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Pvtl_Accordion_Item extends WPBakeryShortCode {

    }
}
