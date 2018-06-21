<?php

namespace BWP\AdvanceDocs\Core;

class Loader {

	public function hook() {
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {

		$_GLOBALS['wp_advance_docs'] = array(
			'objects' => null,
		);

		$register_objects = new \Core\Register_Objects;

		$register_objects->init();
	}

}
