<?php

/**
 * @package WOOPR
 */

defined('ABSPATH') or die();

/**
 * Core class
 *
 * Main class that runs WOOCOMMERCE SHAMSI REPORTS
 *
 * @since 1.0.0
 */
class WOOPR_Core
{
    /**
     * Construct WOOPR_Core class
     */
    function __construct()
    {
        register_activation_hook(WOOPR_FILE, array($this, 'init'));
    }

    /**
     * Activation hook callback
     *
     * @since 1.0.0
     * @return void
     */
    public function init()
    {
        $this->add_option('is_active', 1);
    }

    /**
     * Add new WordPress option
     *
     * @since 1.0.0
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function add_option($key, $value)
    {
        $add = update_option('woopr_' . $key, sanitize_text_field($value));

        return $add;
    }

    /**
     * Get plugin option
     *
     * @since 1.0.0
     * @param string $key
     * @param string $default
     * @return mixed
     */
    public function get_option($key, $default)
    {
        $get = get_option('woopr_' . esc_html($key), esc_html($default));

        return $get;
    }

    /**
     * Is plugin page
     *
     * @return boolean
     */
    protected function is_plugin_page()
    {
        $page = !empty($_GET['page']) ? sanitize_key($_GET['page']) : null;
        $check = (!empty($page) && $page == 'woopr-admin') ? true : false;

        return $check;
    }

    /**
     * Check privileges
     *
     * @return boolean
     */
    protected function has_access()
    {
        $check = current_user_can('view_woocommerce_reports') ? true : false;

        return $check;
    }
}