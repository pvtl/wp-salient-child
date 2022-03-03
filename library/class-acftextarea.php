<?php
/**
 * Enhancements for ACF.
 *
 * @package salient-child
 */

new AcfTextarea();

/**
 * Class AcfTextarea.
 */
class AcfTextarea {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'acf/render_field_settings', array( $this, 'add_wysiwyg_settings' ), 10 );
		add_filter( 'acf/render_field/type=wysiwyg', array( $this, 'pre_render_wysiwyg_field' ), 0 );
	}

	/**
	 * Add settings for WYSIWYG editors.
	 *
	 * @param array $field The ACF field.
	 */
	public function add_wysiwyg_settings( $field ) {
		if ( 'wysiwyg' !== $field['type'] ) {
			return;
		}

		acf_render_field_setting(
			$field,
			array(
				'label' => __( 'Limit height of TinyMCE?', 'lang' ),
				'name'  => 'wpf_tinymce_low',
				'type'  => 'true_false',
				'ui'    => 1,
			),
			true
		);
	}

	/**
	 * Pre-render the WYSIWYG field.
	 *
	 * @param array $field The ACF field.
	 */
	public function pre_render_wysiwyg_field( $field ) {
		if ( ! isset( $field['wpf_tinymce_low'] ) || ! $field['wpf_tinymce_low'] ) {
			return;
		}

		ob_start();

		add_filter( 'acf/render_field/type=wysiwyg', array( $this, 'after_render_wysiwyg_field' ), 20 );
	}

	/**
	 * Post render the WYSIWYG field.
	 *
	 * @param array $field The ACF field.
	 */
	public function after_render_wysiwyg_field( $field ) {
		remove_filter( 'acf/render_field/type=wysiwyg', array( $this, 'after_render_wysiwyg_field' ), 20 );

		$output = ob_get_clean();
		$output = str_replace( 'height:300px;', 'height:150px;', $output );

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput
	}
}
