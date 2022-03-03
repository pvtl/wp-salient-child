<?php
/**
 * Move Yoast to bottom of the pages
 *
 * @package salient-child
 */

add_filter(
	'wpseo_metabox_prio',
	function() {
		return 'low';
	}
);
