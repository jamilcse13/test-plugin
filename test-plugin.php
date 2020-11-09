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

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

if ( file_exists( dirname(__FILE__) . '/vendor/autoload.php' ) ) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define( 'TP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'TP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}