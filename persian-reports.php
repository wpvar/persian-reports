<?php

/**
 * Plugin Name:       Persian Reports
 * Plugin URI:        https://wpvar.com/woocommerce-persian-reports
 * Description:       Persian Reports generates WooCommerce sales reports in Shamsi, aka Jalali or Iranian calendar.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      5.5
 * Author:            wpvar.com
 * Author URI:        https://wpvar.com/
 * License:           GNU Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       woopr
 * @package WOOPR
 */

defined('ABSPATH') or die();

define('WOOPR_URL', plugin_dir_url(__FILE__));
define('WOOPR_PATH', plugin_dir_path(__FILE__));
define('WOOPR_BASE', plugin_basename(__FILE__));
define('WOOPR_FILE', __FILE__);
define('WOOPR_VERSION', '1.0.0');

/* Setting up PERSIAN REPORTS */
require_once 'inc/autoload.php';
