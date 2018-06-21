<?php
/**
 * URL to the plugin directory.
 *
 * @since 1.0.0
 */
define( 'BWP\AdvanceDocs\URL', trailingslashit( plugin_dir_url( $file ) ) );


/**
 * Current Plugin Version.
 *
 * @since 1.0.0
 */
define( 'BWP\AdvanceDocs\VERSION', '1.0.0-alpha' );

/**
 * Prefix to use in keys and other identifiers
 */
define( 'BWP\AdvanceDocs\PREFIX', 'bwp-ad-' );

/**
 * Underscored prefix to use in identifiers
 */
define( 'BWP\AdvanceDocs\_PREFIX', 'bwp_ad_' );

global $wpdb;

/**
 * Prefix for plugin's tables
 */
define( 'BWP\AdvanceDocs\TABLE_PREFIX', $wpdb->prefix . \BWP\AdvanceDocs\_PREFIX );
