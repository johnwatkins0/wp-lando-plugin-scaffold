<?php
/**
 * Setup of plugin Admin functionality.
 *
 * @package yournamespace/wp-land-plugin-scaffold
 */

namespace YourNamepace\Lando_Plugin_Scaffold\Admin;

use YourNamepace\Lando_Plugin_Scaffold\Common\Plugin_Setup;
use function YourNamepace\Lando_Plugin_Scaffold\Common\{asset_subpath, plugin_slug, plugin_url, plugin_path};

/**
 * Plugin_Admin class
 */
class Plugin_Admin extends Plugin_Setup {
	/**
	 * Does admin plugin setup. Runs on the init hook.
	 *
	 * @return void
	 */
	protected function set_up() {
		if ( ! is_admin() ) {
			return;
		}

		$this->register_assets();

		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	/**
	 * Registers frontend assets.
	 *
	 * @return void
	 */
	public function register_assets() {
		$script_subpath = asset_subpath( plugin_slug() . '-admin.js' );
		wp_register_script(
			plugin_slug() . '-admin',
			plugin_url( $script_subpath ),
			[],
			filemtime( plugin_path( $script_subpath ) ),
			true
		);

		$style_subpath = asset_subpath( plugin_slug() . '-admin.css' );
		wp_register_style(
			plugin_slug() . '-admin',
			plugin_url( $style_subpath ),
			[],
			filemtime( plugin_path( $style_subpath ) )
		);
	}

	/**
	 * Enqueues admin assets.
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		wp_enqueue_script( plugin_slug() . '-admin' );
		wp_enqueue_style( plugin_slug() . '-admin' );
	}
}
