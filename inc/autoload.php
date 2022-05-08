<?php

/**
 * @package WOOPR
 */
defined('ABSPATH') or die();

spl_autoload_register('woopr_autoload');

function woopr_autoload($className)
{
    $path = plugin_dir_path(__FILE__);
    $class = $path . $className . '.class.php';
    if (file_exists($class) && !class_exists($className)) {
        require $class;
    }
}

if(is_admin()) {
    new WOOPR_Admin();
    new WOOPR_Core();
}