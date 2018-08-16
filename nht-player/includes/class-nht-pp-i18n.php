<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       henryholtgeerts.com
 * @since      1.0.0
 *
 * @package    Nht_Pp
 * @subpackage Nht_Pp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Nht_Pp
 * @subpackage Nht_Pp/includes
 * @author     Henry Holtgeerts <henryholtgeerts@gmail.com>
 */
class Nht_Pp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'nht-pp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
