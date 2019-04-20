<?php
/**
 * Functionality common to both the admin and the front end.
 *
 * @package yournamespace/wp-lando-plugin-scaffold
 */

namespace YourNamepace\Lando_Plugin_Scaffold\Common;

/**
 * Returns the plugin slug.
 *
 * @return string
 */
function plugin_slug() : string {
	return 'wp-lando-plugin-scaffold';
}

/**
 * Starts the plugin.
 *
 * @return void
 */
function plugin_init() : void {
	$admin    = new Plugin_Admin();
	$frontend = new Plugin_Frontend();

	add_action( 'init', [ $admin, 'init' ] );
	add_action( 'init', [ $frontend, 'init' ] );
}

/**
 * Removes a leading slash from a string.
 *
 * @param string $input Any string.
 * @return string Unleadingslashed string.
 */
function unleadingslashit( string $input = '' ) : string {
	if ( '/' === substr( $input, 0, 1 ) ) {
		return substr( $input, 1 );
	}

	return $input;
}

/**
 * Provides the plugin path.
 *
 * @param string $subpath Subpath to append to the plugin path.
 * @return string The path.
 */
function plugin_path( string $subpath = '' ) : string {
	return trailingslashit( \YourNamepace\Lando_Plugin_Scaffold\PLUGIN_PATH ) . unleadingslashit( $subpath );
}

/**
 * Returns the plugin URL.
 *
 * @param string $subpath A subpath to append to the URL.
 * @return string The path.
 */
function plugin_url( string $subpath = '' ) : string {
	return trailingslashit( \YourNamepace\Lando_Plugin_Scaffold\PLUGIN_URL ) . unleadingslashit( $subpath );
}

/**
 * Returns the path from the plugin root to a specified file.
 *
 * @param string $filename The file name.
 * @return string
 */
function asset_subpath( string $filename ) : string {
	return 'assets/dist/' . unleadingslashit( $filename );
}
