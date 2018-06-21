<?php
/**
 * Contains the main plugin file with headers
 *
 * @since 1.0.0
 */

/*
Plugin Name: Advance Docs
Plugin URI:
Description: An Advanced Documentation plugin for WordPress products
Version: 1.0.0-alpha
Author: saurabhshukla, baapwp
Author URI: https://baapwp.me/
License: GPLv3
Text Domain:  bwp-advance-docs
Domain Path:  /languages
*/

/*
Copyright (C) 2018 saurabhshukla
*/

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

// assign current filename to variable to use in activation hook
$file = __FILE__;

/**
 * Path to the plugin directory.
 *
 * @since 1.0.0
 */
define( 'BWP\AdvanceDocs\PATH', trailingslashit( plugin_dir_path( $file ) ) );

/**
 * Other application constants
 */
require_once \BWP\AdvanceDocs\PATH . 'core/includes/constants.php';

/**
 * The autoloader
 */
require_once \BWP\AdvanceDocs\PATH . 'core/includes/autoloader.php';

/**
 * The application core loader
 */
require_once \BWP\AdvanceDocs\PATH . 'core/includes/loader.php';

unset($file);
