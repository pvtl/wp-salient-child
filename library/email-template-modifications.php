<?php
/**
 * Customise Email Templates
 *
 * @package salient-child
 */

add_filter(
	'mailtpl/customizer_template',
	function() {
		return get_stylesheet_directory() . '/email/default.php';
	}
);
