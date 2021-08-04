<?php

/** Template for the Pricing Accordion */

$acc_title = $atts['accordion_title'] ?? false;

?>
<div class="pvtl-accordion">
    <h2 class="acc-title"><?php echo esc_attr( $acc_title ); ?></h2>
    <div class="toggles accordion" data-starting="default" data-style="default">
        <?php echo do_shortcode($content); ?>
    </div>
</div>
