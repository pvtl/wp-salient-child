<?php
/**
 * Body of the email
 *
 * @package salient-child
 */

if ( is_customize_preview() ) {
	include_once apply_filters( 'mailtpl/customizer_template_message', 'default-message.php' );
} else {
	echo '%%MAILCONTENT%%';
}
