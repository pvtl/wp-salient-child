<?php

/* Add a shortcode for Social Links */

function social_links_shortcode($atts) {
    ob_start();
    get_template_part( 'partials/footer/social-links' );
    return ob_get_clean();
}
add_shortcode('social_links', 'social_links_shortcode');
