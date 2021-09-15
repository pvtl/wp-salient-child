<?php
/**
 * Custom Fonts
 *
 * @package salient-child
 */

/**
 * Add custom fonts to the array
 *
 * @return arr
 */
function salient_redux_custom_fonts() {
	return array(
		/* phpcs:disable Squiz.Commenting.BlockComment.NoEmptyLineBefore
		'Custom Fonts' => array(
			'ADD FONT TITLE HERE' => 'ADD FONT TITLE HERE',
		),
		*/
	);
}
add_filter( 'redux/salient_redux/field/typography/custom_fonts', 'salient_redux_custom_fonts' );
