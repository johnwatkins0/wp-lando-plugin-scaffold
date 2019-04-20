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

use YourNamepace\Lando_Plugin_Scaffold\Admin\Plugin_Admin;
use YourNamepace\Lando_Plugin_Scaffold\Frontend\Plugin_Frontend;

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * WordPress has unique naming conventions for classes and class files, so we use a
 * custom WordPress-specific autoloader.
 */
\JohnWatkins0\WPAutoload\register_wp_autoload( __NAMESPACE__, PLUGIN_PATH . 'inc' );

$admin    = new Plugin_Admin();
$frontend = new Plugin_Frontend();

add_action( 'init', [ $admin, 'init' ] );
add_action( 'init', [ $frontend, 'init' ] );
