<?php

/** Custom Fonts */

function salient_redux_custom_fonts() {
    return array(
        'Custom Fonts' => array(
            'ADD FONT TITLE HERE' => 'ADD FONT TITLE HERE',
        )
    );
}

add_filter( "redux/salient_redux/field/typography/custom_fonts", "salient_redux_custom_fonts" );
