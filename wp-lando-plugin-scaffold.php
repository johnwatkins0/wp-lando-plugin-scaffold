<?php
/**
 * Plugin Name: WP Lando Plugin Scaffold
 * Description:
 * Author:
 * Version: 0.1.0
 *
 * @package wp-lando-plugin-scaffold
 */

namespace YourNamepace\Lando_Plugin_Scaffold;

/**
 * Composer autoloader.
 */
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

define( 'YourNamepace\\Lando_Plugin_Scaffold\\PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'YourNamepace\\Lando_Plugin_Scaffold\\PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * WordPress has unique naming conventions for classes, so we use a custom WordPress-specific autoloader.
 */
\JohnWatkins0\WPAutoload\register_wp_autoload(
	'YourNamepace\\Lando_Plugin_Scaffold',
	plugin_dir_path( __FILE__ ) . 'inc'
);

/**
 * All plugin functionality runs after the init hook.
 */
add_action( 'init', [ new Common\Plugin_Setup(), 'init' ] );
