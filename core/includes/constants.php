<?php
/**
 * URL to the plugin directory.
 *
 * @since 1.0.0
 */
define( 'BWPAdvanceDocs\URL', trailingslashit( plugin_dir_url( $file ) ) );


/**
 * Current Plugin Version.
 *
 * @since 1.0.0
 */
define( 'BWPAdvanceDocs\VERSION', '1.0.0-alpha' );

/**
 * Prefix to use in keys and other identifiers
 */
define( 'BWPAdvanceDocs\PREFIX', 'bwp-ad-' );

/**
 * Underscored prefix to use in identifiers
 */
define( 'BWPAdvanceDocs\_PREFIX', 'bwp_ad_' );

global $wpdb;

/**
 * Prefix for plugin's tables
 */
define( 'BWPAdvanceDocs\TABLE_PREFIX', $wpdb->prefix . \BWPAdvanceDocs\_PREFIX );
