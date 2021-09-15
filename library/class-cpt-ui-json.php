<?php
/**
 * Automatically export Custom Post Type UI json.
 *
 * @package salient-child
 */

namespace App\Themes\Pvtl\Library;

/**
 * Class Cpt_Ui_Json.
 */
class Cpt_Ui_Json {
	/**
	 * Construct.
	 */
	public function __construct() {
		add_action( 'cptui_after_update_post_type', array( $this, 'export_post_types_to_json' ) );
		add_action( 'cptui_after_update_taxonomy', array( $this, 'export_taxonomies_to_json' ) );
		add_action( 'admin_print_footer_scripts-cpt-ui_page_cptui_tools', array( $this, 'import_js' ), 20 );
	}

	/**
	 * Export post types JSON to the theme directory.
	 */
	public function export_post_types_to_json() {
		$this->export( cptui_get_post_type_data(), 'post-types' );
	}

	/**
	 * Export taxonomies JSON to the theme directory.
	 */
	public function export_taxonomies_to_json() {
		$this->export( cptui_get_taxonomy_data(), 'taxonomies' );
	}

	/**
	 * Export data to theme directory as JSON.
	 *
	 * @param mixed  $data The data to encode.
	 * @param string $type The export type.
	 */
	protected function export( $data, $type ) {
		if ( empty( $data ) ) {
			return;
		}

		$json = wp_json_encode( $data, JSON_PRETTY_PRINT );

		if ( ! $json ) {
			return;
		}

		$file_path = get_stylesheet_directory() . '/cpt-ui-' . $type . '.json';

		file_put_contents( $file_path, $json );
	}

	/**
	 * Setup import tools for CPT JSON.
	 */
	public function import_js() {
		$post_types_json_path = get_stylesheet_directory() . '/cpt-ui-post-types.json';
		$taxonomies_json_path = get_stylesheet_directory() . '/cpt-ui-taxonomies.json';

		$post_types_json_exists = file_exists( $post_types_json_path );
		$taxonomies_json_exists = file_exists( $taxonomies_json_path );

		if ( ! $post_types_json_exists && ! $taxonomies_json_exists ) {
			return;
		}

		$post_types_json = null;
		$taxonomies_json = null;

		if ( $post_types_json_exists ) {
			$post_types_json = wp_json_encode( json_decode( file_get_contents( $post_types_json_path ) ) );
			$previous_json   = wp_json_encode( cptui_get_post_type_data() );

			if ( $post_types_json && $post_types_json === $previous_json ) {
				$post_types_json = null;
			}
		}

		if ( $taxonomies_json_exists ) {
			$taxonomies_json = wp_json_encode( json_decode( file_get_contents( $taxonomies_json_path ) ) );
			$previous_json   = wp_json_encode( cptui_get_taxonomy_data() );

			if ( $taxonomies_json && $taxonomies_json === $previous_json ) {
				$taxonomies_json = null;
			}
		}

		?>
		<script>
			(() => {
				const initImportButton = (json, buttonLabel, inputName) => {
					const label = document.querySelector(`label[for="${inputName}"]`);
					const input = document.querySelector(`textarea[name="${inputName}"]`);

					if (!label || !input) {
						return;
					}

					const button = document.createElement('button');

					if (json) {
						button.innerHTML = `Sync ${buttonLabel} JSON`;
					} else {
						button.innerHTML = `${buttonLabel} JSON Synced`;
						button.disabled = true;
					}

					button.classList.add('button', 'button-secondary');
					button.style = 'margin-left: 1rem; font-weight: 400;';

					label.parentNode.insertBefore(button, label.nextSibling);

					if (json) {
						button.addEventListener('click', () => input.value = json);
					}
				};

				const postTypesJson = '<?php echo $post_types_json; // phpcs:ignore ?>';
				const taxonomiesJson = '<?php echo $taxonomies_json; // phpcs:ignore ?>';

				initImportButton(postTypesJson, 'Post Type', 'cptui_post_import');
				initImportButton(taxonomiesJson, 'Taxonomy', 'cptui_tax_import');
			})();
		</script>
		<?php
	}
}

new Cpt_Ui_Json();
