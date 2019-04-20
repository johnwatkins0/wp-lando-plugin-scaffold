<?php
/**
 * Setup of plugin non-admin functionality.
 *
 * @package yournamespace/wp-land-plugin-scaffold
 */

namespace YourNamepace\Lando_Plugin_Scaffold\Frontend;

/**
 * Plugin_Admin class
 */
class Plugin_Frontend {
	/**
	 * Adds hooks.
	 *
	 * @param boolean $reset_called whether to reset the called static variable.
	 *
	 * @action init Hook added in plugin bootstrap file.
	 */
	public function init( $reset_called = false ) {
		static $called;

		/**
		 * Allow overriding called variable for testing.
		 */
		if ( true === $reset_called ) {
			$called = null;
		}

		/**
		 * This method may only be called once.
		 */
		if ( true === $called ) {
			return;
		}
	}
}
