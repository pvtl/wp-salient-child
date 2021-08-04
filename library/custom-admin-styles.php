<?php
/**
 * Add some additional styles to the admin
 *
 * @package pvtl-child
 */

add_action(
	'admin_head',
	function () { ?>
	<style>
		/* Increase the width of the Goots */
		.wp-block { max-width: 1000px; }

		/* Adds a class we can use in ACF, to right align multiple fields */
		.acf-pull-right {
			clear: none !important;
			float: right !important;
			min-height: 40px !important;
			border-left: 1px solid #eeeeee !important;
		}

		/* Adds a class we can use in ACF to have WYSIWYG editors that aren't so huge */
		.tiniest-mce iframe {
			height: 200px !important;
		}

		/* We hopefully won't need this long term */
		.acf-fields>.acf-tab-wrap:first-child .acf-tab-group { padding: 5px 5px 0 5px; }

		/* ACF Grid */
		[class*="acf-col-"] {
			width: 100%;
			display: block;
			float: left;
			min-width: 250px;
			clear: none;
		}

		@media (min-width: 768px) {
			.acf-col-md-quarter { width: 25%; }
			.acf-col-md-third { width: 33%; }
			.acf-col-md-half { width: 50%; }
			.acf-col-md-two-thirds { width: 66%; }
			.acf-col-md-three-quarters { width: 75%; }
			.acf-col-md-full { width: 100%; }
		}

		@media (min-width: 1024px) {
			.acf-col-lg-quarter { width: 25%; }
			.acf-col-lg-third { width: 33%; }
			.acf-col-lg-half { width: 50%; }
			.acf-col-lg-two-thirds { width: 66%; }
			.acf-col-lg-three-quarters { width: 75%; }
			.acf-col-lg-full { width: 100%; }
		}
	</style>
		<?php
	}
);
