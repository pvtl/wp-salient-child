<?php // phpcs:disable WordPress.WP.I18n.NoEmptyStrings
/**
 * Table (Visual Composer Element)
 *
 * @package salient-child
 */

if ( ! function_exists( 'pvtl_table' ) ) {
	/**
	 * Table VC Element
	 *
	 * @param arr $atts - the attributes.
	 * @param str $content - the content.
	 */
	function pvtl_table( $atts, $content = null ) {
		extract( // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
			shortcode_atts(
				array(
					'auto'  => '',
					'white' => '',
					'table' => '',
				),
				$atts
			)
		);

		ob_start();
		require 'views/table.php';
		return ob_get_clean();
	}

	add_shortcode( 'pvtl_table', 'pvtl_table' );
}

// Map the block with vc_map().
if ( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			'name'        => __( 'Table', 'text-domain' ),
			'base'        => 'pvtl_table',
			'description' => __( 'Display a PVTL Table', 'text-domain' ),
			'category'    => __( 'PVTL', 'text-domain' ),
			'icon'        => get_stylesheet_directory_uri() . '/pvtl.png',
			'params'      => array(
				array(
					'type'        => 'checkbox',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Auto Width Columns', 'pvtl' ),
					'param_name'  => 'auto',
					'value'       => __( '', 'pvtl' ),
				),
				array(
					'type'        => 'checkbox',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'White Row BG', 'pvtl' ),
					'param_name'  => 'white',
					'value'       => __( '', 'pvtl' ),
				),
				array(
					'type'        => 'param_group',
					'param_name'  => 'table',
					'heading'     => __( 'Table', 'pvtl' ),
					'description' => __( 'Add table rows above.', 'salient' ),
					'admin_label' => false,
					'params'      => array(
						array(
							'type'        => 'textfield',
							'holder'      => 'div',
							'class'       => '',
							'admin_label' => false,
							'heading'     => __( 'Row Title', 'pvtl' ),
							'param_name'  => 'row_title',
							'value'       => __( '', 'pvtl' ),
						),
						array(
							'type'        => 'textarea',
							'holder'      => 'div',
							'class'       => '',
							'admin_label' => false,
							'heading'     => __( 'Row Content', 'pvtl' ),
							'param_name'  => 'row_content',
							'value'       => __( '', 'pvtl' ),
						),
					),
				),
			),
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/**
	 * Accordion Short Code VC Element
	 */
	class WPBakeryShortCode_Pvtl_Table extends WPBakeryShortCode {
	}
}

