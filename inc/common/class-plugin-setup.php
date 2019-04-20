<?php
/**
 * Sets up the plugin
 *
 * @package yournamespace/wp-lando-plugin-scaffold
 */

namespace YourNamepace\Lando_Plugin_Scaffold\Common;

use YourNamepace\Lando_Plugin_Scaffold\Frontend\Plugin_Frontend;
use YourNamepace\Lando_Plugin_Scaffold\Admin\Plugin_Admin;

/**
 * Plugin_Setup class
 */
class Plugin_Setup {
	/**
	 * Whether the init function was already called.
	 *
	 * @var boolean
	 */
	protected $init_called = false;

	/**
	 * Adds hooks.
	 *
	 * @param boolean $reset_init_called whether to reset the called static variable.
	 *
	 * @action init Hook added in plugin bootstrap file.
	 */
	public function init( $reset_init_called = false ) {
		/**
		 * Allow overriding called variable for testing.
		 */
		if ( true === $reset_init_called ) {
			$this->init_called = false;
		}

		/**
		 * This method may only be called once.
		 */
		if ( true === $this->init_called ) {
			return;
		}

		$this->init_called = true;

		if ( method_exists( $this, 'set_up' ) ) {
			$this->set_up();
		}
	}

	/**
	 * Does setup business. Runs on the init hook.
	 *
	 * @return void
	 */
	protected function set_up() {
		require_once __DIR__ . '/functions.php';

		( new Plugin_Frontend() )->init();
		( new Plugin_Admin() )->init();
	}
}
