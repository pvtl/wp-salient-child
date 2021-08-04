<?php
/**
 * Update Gravity Forms wrappers to have the Bootstrap classes
 *
 * @package pvtl-child
 */


/*
 * Update the submit button HTML
 */
add_filter(
	'gform_submit_button',
	function ( $button, $form ) {
		$button_text = isset( $form['button']['text'] ) && ! empty( $form['button']['text'] ) ? $form['button']['text'] : 'Submit';
		return '<button class="nectar-button large regular extra-color-1 regular-button" data-color-override="false" id="gform_submit_button_' . $form['id'] . '"><span>' . $button_text . '</span></button>';
	},
	10,
	2
);

/*
 * Changes Gravity Forms Ajax Spinner (next, back, submit) to a transparent image
 */
add_filter(
	'gform_ajax_spinner_url',
	function ( $image_src, $form ) {
		return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
	},
	10,
	2
);
