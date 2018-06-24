<?php
/**
 * Contains the Core Loader
 *
 * @since 1.0.0
 */
namespace BWPAdvanceDocs\Core;

/**
 * Loads the plugin
 */
class Loader {

	/**
	 * Hooks into WordPress
	 */
	public function hook() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Initilaise plugin
	 */
	public function init() {

		$GLOBALS['wp_advance_docs'] = array(
			'objects' => null,
		);

		// Register Custom Content Types
		$register_objects = new \Core\Register_Objects;
		$register_objects->init();
	}

}
