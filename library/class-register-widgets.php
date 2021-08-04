<?php
/**
 * Register Widgets
 *
 * @package pvtl-child
 */

namespace App\Themes\Pvtl\Library;

use \WP_Widget;

/**
 * Register all widgets
 */
class Register_Widgets {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'register_all_widgets' ) );
	}

	/**
	 * Register all of our Widgets that reside in /widgets/
	 */
	public function register_all_widgets() {
		// Get all widget files from cache (or re-cache).
		$cache_key    = 'GLOB/WIDGETS';
		$cache_expire = ( 60 * 60 ) * 1; // 1hr

		// wp_cache_delete( $cache_key ); // For debugging @codingStandardsIgnoreLine
		$files = wp_cache_get( $cache_key, '' );

		if ( false === $files ) {
			$files = glob( dirname( dirname( __FILE__ ) ) . '/widgets/*.php' );
			wp_cache_set( $cache_key, $files, '', $cache_expire );
		}

		foreach ( $files as $file ) {
			if ( ! file_exists( $file ) ) {
				wp_cache_delete( $cache_key );
				continue; // File now doesn't exist for whatever reason.
			}

			require_once $file;

			$class_name = $this->get_class_name_from_widget( $file );
			if ( ! class_exists( $class_name ) ) {
				continue; // Class doesn't exist or named incorrectly.
			}

			// Register the widget with WordPress, only if valid.
			if ( $this->widget_is_valid( new $class_name() ) ) {
				\register_widget( $class_name );
			}
		}
	}

	/**
	 * Validate that a widget has the required params
	 *
	 * @param class $class_ref - the class.
	 */
	protected function widget_is_valid( $class_ref ) {
		// $title and $name needs to be set in each widget.
		// update() method need to exist in each widget because it won't save, which could be hard to notice.
		if ( empty( $class_ref->name )
			|| empty( $class_ref->title )
			|| ! method_exists( $class_ref, 'update' )
		) {
			return false;
		}

		return true; // Success.
	}

	/**
	 * Assume a Class Name from a given path
	 *
	 * @param str $path - the path of the widget.
	 * @return str
	 */
	private function get_class_name_from_widget( $path ) {
		// '/var/www/class-file.php' becomes 'class-file'.
		$filename = basename( $path, '.php' );

		// 'class-file' becomes 'file'.
		$filename = \str_replace( 'class-', '', $filename );

		// 'one-column-image-banner' becomes 'One_Column_Image_Banner'.
		$class_name = str_replace( ' ', '_', ucwords( str_replace( array( '-', '_' ), ' ', $filename ) ) );

		return 'App\\Themes\\Pvtl\\Widgets\\' . $class_name;
	}
}

/**
 * Register all widgets
 */
class PVTL_WP_Widget extends WP_Widget { // @codingStandardsIgnoreLine
	/**
	 * Title of the widget shown in the backend
	 *
	 * @var string
	 */
	public $title = null;

	/**
	 * Unique name - should be in lower-kebab-case
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Description of the widget shown in the backend in the widget list
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * CSS class for the frontend wrapper div
	 *
	 * @var string
	 */
	public $css_class_name = null;

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'pvtl-' . $this->name,
			$this->title,
			array(
				'classname'   => $this->css_class_name ?: $this->name,
				'description' => $this->description ?: $this->title,
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		?>
		<p>Missing <pre>widget</pre> method from Widget Class</p>
		<?php
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?>
		<p>Missing <pre>form</pre> method from Widget Class</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		return $instance;
	}
}

new Register_Widgets();
