<?php
/* Customise Email templates */

add_filter('mailtpl/customizer_template', function(){
    return get_stylesheet_directory() . '/email_templates/default.php';
});
