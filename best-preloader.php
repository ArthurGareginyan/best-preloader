<?php
/**
 * Plugin Name: Best Preloader
 * Plugin URI: https://github.com/ArthurGareginyan/best-preloader
 * Description: Easily add cross browser animated preloader to your website. It will be responsive and compatible with all major browsers. It will work with any theme!
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 4.0.1
 * License: GPL3
 * Text Domain: best-preloader
 * Domain Path: /languages/
 *
 * Copyright 2016-2017 Arthur Gareginyan (email : arthurgareginyan@gmail.com)
 *
 * This file is part of "Best Preloader".
 *
 * "Best Preloader" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "Best Preloader" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "Best Preloader".  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 *               █████╗ ██████╗ ████████╗██╗  ██╗██╗   ██╗██████╗
 *              ██╔══██╗██╔══██╗╚══██╔══╝██║  ██║██║   ██║██╔══██╗
 *              ███████║██████╔╝   ██║   ███████║██║   ██║██████╔╝
 *              ██╔══██║██╔══██╗   ██║   ██╔══██║██║   ██║██╔══██╗
 *              ██║  ██║██║  ██║   ██║   ██║  ██║╚██████╔╝██║  ██║
 *              ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═╝
 *
 *   ██████╗  █████╗ ██████╗ ███████╗ ██████╗ ██╗███╗   ██╗██╗   ██╗ █████╗ ███╗   ██╗
 *  ██╔════╝ ██╔══██╗██╔══██╗██╔════╝██╔════╝ ██║████╗  ██║╚██╗ ██╔╝██╔══██╗████╗  ██║
 *  ██║  ███╗███████║██████╔╝█████╗  ██║  ███╗██║██╔██╗ ██║ ╚████╔╝ ███████║██╔██╗ ██║
 *  ██║   ██║██╔══██║██╔══██╗██╔══╝  ██║   ██║██║██║╚██╗██║  ╚██╔╝  ██╔══██║██║╚██╗██║
 *  ╚██████╔╝██║  ██║██║  ██║███████╗╚██████╔╝██║██║ ╚████║   ██║   ██║  ██║██║ ╚████║
 *   ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝
 *
 */


/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Define global constants
 *
 * @since 3.2
 */
defined('BESTPL_DIR') or define('BESTPL_DIR', dirname(plugin_basename(__FILE__)));
defined('BESTPL_BASE') or define('BESTPL_BASE', plugin_basename(__FILE__));
defined('BESTPL_URL') or define('BESTPL_URL', plugin_dir_url(__FILE__));
defined('BESTPL_PATH') or define('BESTPL_PATH', plugin_dir_path(__FILE__));
defined('BESTPL_TEXT') or define('BESTPL_TEXT', 'best-preloader');
defined('BESTPL_VERSION') or define('BESTPL_VERSION', '4.0.1');

/**
 * Load the plugin modules
 *
 * @since 4.0
 */
require_once( BESTPL_PATH . 'inc/php/core.php' );
require_once( BESTPL_PATH . 'inc/php/enqueue.php' );
require_once( BESTPL_PATH . 'inc/php/version.php' );
require_once( BESTPL_PATH . 'inc/php/functional.php' );
require_once( BESTPL_PATH . 'inc/php/page.php' );
require_once( BESTPL_PATH . 'inc/php/messages.php' );
require_once( BESTPL_PATH . 'inc/php/uninstall.php' );
