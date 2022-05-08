<?php

/**
 * @package WOOPR
 */

defined('ABSPATH') or die();

/**
 * Admin class
 *
 * Admin panel
 *
 * @since 1.0.0
 */
class WOOPR_Admin extends WOOPR_Core
{
    /**
     * Construct WOOPR_Admin class
     */
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'script_setup'));
        add_action('admin_menu', array($this, 'add_menu'));
        add_action('admin_head', array($this, 'hide_header'));
        add_action('admin_menu', array($this, 'hide_footer'), 1);
        add_filter('admin_footer_text', array($this, 'hide_footer_text'), 1);
        add_action('woopr_temp_footer', array($this, 'footer_text'));
        add_action('woopr_alert', array($this, 'requirements'));
        add_action('woopr_alert', array($this, 'helpers'));
        add_filter('woopr_local_scripts', array($this, 'default_font'));
        add_filter('woopr_local_scripts', array($this, 'helper_plugin'));
        add_filter('plugin_action_links_' . WOOPR_BASE, array($this, 'add_settings_link'));
    }

    /**
     * Add WordPress menu
     *
     * @since 1.0.0
     * @return void
     */
    public function add_menu()
    {
        $icon = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><defs><style>.toplevel_page_wpsh .cls-1{fill:#037cbb;}.toplevel_page_wpsh .cls-2{fill:#fff;}</style></defs><title>وردپرس فارسی</title><g id="Layer_4" data-name="Layer 4"><path fill="#a0a5aa" class="cls-1" d="M127.85,245.74h-.65c-2,0-4-.11-6.15-.22l-1.68-.08c-18.62-.9-34.92-7.63-43-11.56-1.32-.64-2.65-1.32-4.3-2.19a117.82,117.82,0,1,1,56,14.09Z"/><path class="cls-2" d="M128,18.22a109.78,109.78,0,0,1,.78,219.56l-.25,0H127.2c-1.78,0-3.7-.1-5.73-.21l-1.72-.08c-17.18-.83-32.34-7.1-39.87-10.77-1.22-.59-2.45-1.22-4-2A109.79,109.79,0,0,1,128,18.22m0-16A125.79,125.79,0,0,0,68.35,238.76c1.51.8,3,1.56,4.54,2.31,6.2,3,24.43,11.31,46.09,12.36,2.71.13,5.46.31,8.22.31a5.36,5.36,0,0,0,.8,0A125.78,125.78,0,0,0,128,2.22Z"/><path class="cls-2" d="M185.16,142.4a125.12,125.12,0,0,0-4.27-22.62,105.65,105.65,0,0,0-8.09-20.4,78.63,78.63,0,0,0-11.6-16.76Q145.8,66,127.42,66a33.1,33.1,0,0,0-16,4.18,48.49,48.49,0,0,0-14.31,12.4,71.11,71.11,0,0,0-9.42,16.62,70.89,70.89,0,0,0-5.11,17.2,87.3,87.3,0,0,0-1.12,12.49,58.06,58.06,0,0,0,.89,10.36,36.83,36.83,0,0,0,7.51,17.38q13.47,16.67,41.56,18.35c4.76.45,9,.67,12.76.67h14.71a49.68,49.68,0,0,1-8,19.74,80.33,80.33,0,0,1-17.82,19,128.28,128.28,0,0,1-27.07,16,164.06,164.06,0,0,1-33.15,10.62A125.11,125.11,0,0,0,119,253.43c2.66-1.25,5.29-2.58,7.86-4a129.84,129.84,0,0,0,21.61-14.94,110.71,110.71,0,0,0,17.69-19.06,103,103,0,0,0,12.53-22.85A97,97,0,0,0,185,166a117.2,117.2,0,0,0,.66-12.4C185.69,149.82,185.51,146.13,185.16,142.4ZM150.8,150c-2.75.05-4.58.05-5.51.05-3.82,0-7.87-.14-12.18-.4a51.41,51.41,0,0,1-5.51-.58,39.92,39.92,0,0,1-6.44-1.42,29.25,29.25,0,0,1-6.23-2.58,14.93,14.93,0,0,1-4.84-4.22,11.77,11.77,0,0,1-2.67-6.14,43.54,43.54,0,0,1-.44-5.78,53.67,53.67,0,0,1,.35-5.82A58.79,58.79,0,0,1,109.82,112a50.09,50.09,0,0,1,4.45-10.13,29.3,29.3,0,0,1,6-7.47,10.55,10.55,0,0,1,7.11-2.89,12.12,12.12,0,0,1,4.4.76,22,22,0,0,1,4,2A30.1,30.1,0,0,1,139.25,97c1.11,1,2.08,2,2.93,2.8a59.3,59.3,0,0,1,6.27,8.85A77.25,77.25,0,0,1,154,120.13a88.4,88.4,0,0,1,4,13.74,95.77,95.77,0,0,1,1.95,15.64C156.53,149.78,153.51,150,150.8,150Z"/></g></svg>');

        add_menu_page(
            esc_attr__('گزارش فارسی و شمسی ووکامرس', 'woopr'),
            esc_attr__('گزارش فارسی', 'woopr'),
            'read_private_pages',
            'woopr-admin',
            array($this, 'main_template'),
            $icon
        );
    }

    /**
     * Load template files
     *
     * @since 1.0.0
     * @return void
     */
    public function main_template()
    {
        do_action('woopr_alert');

        if (!$this->requirements(true)) {
            return;
        }

        if(!parent::has_access()) {
            echo '<p class="woopr-alert_warning">';
            echo esc_attr__('اجازه دسترسی به این صفحه را ندارید. لطفا با مدیریت تماس بگیرید.', 'woopr');
            echo '</p>';
            return;
        }

        require_once WOOPR_PATH . '/temp/header.php';
        require_once WOOPR_PATH . '/temp/sidebar.php';
        require_once WOOPR_PATH . '/temp/chart.php';
        require_once WOOPR_PATH . '/temp/footer.php';
    }

    /**
     * Enqueue styles and scripts
     *
     * @since 1.0.0
     * @param mixed $slug
     * @return void
     */
    public function script_setup($slug)
    {
        if (strpos((string) esc_attr($slug), 'woopr-admin') == false) {
            return;
        }

        wp_enqueue_style('woopr-datepicker', WOOPR_URL . 'assets/css/shamsi/datepicker.min.css', array(), WOOPR_VERSION);
        wp_enqueue_style('woopr-main', WOOPR_URL . 'assets/css/main.css', array(), WOOPR_VERSION);
        wp_register_script('woopr-plain-mode', '');
        wp_enqueue_script('woopr-plain-mode', '', array('jquery'), WOOPR_VERSION, false);

        wp_add_inline_style('woopr-main', '
            .woopr-body * {
                font-family: ' . $this->default_font(null) . ', tahoma, sans-serif, arial;
            }
            .datepicker-plot-area {
                font: 12px ' . $this->default_font(null) . ', tahoma, sans-serif, arial;
            }
        ');

        wp_add_inline_script( 'woopr-plain-mode', '
            jQuery(document).ready(function () {
                jQuery("a#wooprInstallPlugin").each(function(index) {
                    jQuery(this).on("click", function(e) {
                        return confirm("' . esc_attr__("آیا از نصب این افزونه مطمئن هستید؟", "woopr")  . '");
                    });
                });
            });
        ');

        if (!$this->requirements(true)) {
            return;
        }

        if(!parent::is_plugin_page() || !parent::has_access()) {
            return;
        }

        wp_enqueue_script('woopr-date', WOOPR_URL . 'assets/js/shamsi/date.min.js', array('jquery'), WOOPR_VERSION, true);
        wp_enqueue_script('woopr-datepicker', WOOPR_URL . 'assets/js/shamsi/datepicker.min.js', array(), WOOPR_VERSION, true);
        wp_enqueue_script('woopr-chart', WOOPR_URL . 'assets/js/charts/chart.min.js', array(), WOOPR_VERSION, true);
        wp_enqueue_script('woopr-main', WOOPR_URL . 'assets/js/core/main.min.js', array(), WOOPR_VERSION, true);

        $scripts = array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest'),
            'ajaxurl' => admin_url('admin-ajax.php'),
            'currency'  =>  get_woocommerce_currency_symbol()
        );

        wp_localize_script('woopr-main', 'wooprApi', apply_filters('woopr_local_scripts', $scripts));
    }

    /**
     * Remove notifications on plugin page
     *
     * @since 1.0.0
     * @return void
     */
    public function hide_header()
    {
        if (parent::is_plugin_page()) {
            remove_all_actions('admin_notices');
        }
    }

    /**
     * Remove footer on plugin page
     *
     * @since 1.0.0
     * @return void
     */
    public function hide_footer()
    {
        if (parent::is_plugin_page()) {
            remove_filter('update_footer', 'core_update_footer');
        }
    }

    /**
     * Remove footer text on plugin page
     *
     * @since 1.0.0
     * @return void
     */
    public function hide_footer_text()
    {
        return;
    }

    /**
     * Footer text
     *
     * @since 1.0.0
     * @return void
     */
    public function footer_text()
    {
        echo '<p class="woopr-footer_text">';
        echo sprintf(esc_html__('برنامه‌نویسی و توسعه توسط %s', 'woopr'), '<a href="https://wpvar.com" target="_blank">وردپرس فارسی</a>');
        echo '</p>';
    }

    /**
     * Check required plugins to be active
     *
     * @since 1.0.0
     * @param boolean $soft
     * @return bool
     */
    public function requirements($soft = false)
    {
        /* Dependencies */
        $requirements = array(
            'woocommerce/woocommerce.php'   =>  'ووکامرس' // WooCommerce
        );

        $fails = 0;
        foreach ($requirements as $key => $value) {
            $active = is_plugin_active($key);

            if (!$active) {
                if (!$soft) {
                    $this->alert($value, 'plugin');
                }
                $fails++;
            }
        }

        if ($fails > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Produce alert
     *
     * @since 1.0.0
     * @param string $msg
     * @param string $type
     * @return void
     */
    protected function alert($msg, $type)
    {
        if ($type == 'plugin') {
            if ($msg == 'ووکامرس') {
                $slug = 'woocommerce';
            }

            $action = 'install-plugin';
            
            $url = wp_nonce_url(
                add_query_arg(
                    array(
                        'action' => $action,
                        'plugin' => $slug
                    ),
                    admin_url('update.php')
                ),
                $action.'_'.$slug
            );

            $msg = sprintf(esc_html__('برای استفاده از افزونه گزارش فارسی٬ ابتدا باید افزونه %s را نصب و فعال کنید.', 'woopr'), '<a href="' . $url . '" target="_blank" id="wooprInstallPlugin">' . $msg . '</a>');
            $this->alert_temp($msg, 'warning'); // Warning: Plugin can NOT work
        }

        if ($type == 'helper') {

            $action = 'install-plugin';

            if ($msg == 'وردپرس فارسی') {
                $slug = 'wp-shamsi';
            }

            $url = wp_nonce_url(
                add_query_arg(
                    array(
                        'action' => $action,
                        'plugin' => $slug
                    ),
                    admin_url('update.php')
                ),
                $action.'_'.$slug
            );

            $msg = sprintf(esc_html__('برای استفاده بهتر از افزونه گزارش فارسی٬ ابتدا باید افزونه %s را نصب و فعال کنید.', 'woopr'), '<a href="' . $url . '" target="_blank" id="wooprInstallPlugin">' . $msg . '</a>');
            $this->alert_temp($msg, 'notice'); // Notice: Plugin can work
        }
    }

    /**
     * Alert box template
     *
     * @since 1.0.0
     * @param string $msg
     * @param string $type
     * @return void
     */
    protected function alert_temp($msg, $type)
    {
        echo '<div class="woopr-alert_'  . $type . '">';
        echo '<p>';
        echo $msg;
        echo '</p>';
        echo '</div>';
    }

    /**
     * Set default font
     *
     * @since 1.0.0
     * @param array $scripts
     * @return array
     */
    public function default_font($scripts)
    {
        $font = get_option('wpsh')['dashboard-font-default'];
        $font = !empty($font) ? $font : 'IRANSansWeb, tahoma';

        if ($font == 'none') {
            $font = 'tahoma';
        }

        if ($scripts == null) {
            return $font;
        }

        $font = array(
            'wooprFont' =>  $font
        );

        return array_merge($scripts, $font);
    }

    /**
     * Recommend helper plugins
     *
     * @since 1.0.0
     * @param mixed $scripts
     * @return mixed
     */
    public function helper_plugin($scripts = null)
    {
        $active = is_plugin_active('wp-shamsi/wp-shamsi.php'); // Helper plugin to generate persian numbers and fonts

        if($scripts == null) {
            return $active;
        }

        $active = array(
            'wooprWpsh' =>  $active
        );

        return array_merge($scripts, $active);

    }

    /**
     * Build recommendation box
     *
     * @since 1.0.0
     * @return void
     */
    public function helpers()
    {
        if($this->helper_plugin(null) == false) {
            $this->alert('وردپرس فارسی', 'helper');
        }
    }

    /**
     * Add action link
     *
     * @since 1.0.0
     * @param array $links
     * @return array
     */
    public function add_settings_link($links)
    {
        $reports_link = '<a href="' . get_admin_url() . 'admin.php?page=woopr-admin">' . esc_attr__('گزارش‌ها', 'woopr') . '</a>';
        array_push($links, $reports_link);

        return $links;
    }
}
