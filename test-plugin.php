<?php

/**
 * Plugin Name
 *
 * @package           TestPlugin
 * @author            J&T
 * @copyright         2020 J&T
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Test Plugin
 * Plugin URI:        https://islamqa.com/
 * Description:       This is a test plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            J&T
 * Author URI:        https://www.linkedin.com/in/md-jamil-ahsan-cuet/
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

 // if this file is called directly, abort!
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

// require once the Composer aitoload
if ( file_exists( dirname(__FILE__) . '/vendor/autoload.php' ) ) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * the code that runs during plugin activation
 */
function activate_test_plugin()
{
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__ , 'activate_test_plugin' );

/**
 * the code that runs during plugin deactivation
 */
function deactivate_test_plugin()
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__ , 'deactivate_test_plugin' );

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}