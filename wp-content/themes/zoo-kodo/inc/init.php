<?php
/**
 * Theme functions and definitions
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
/**
 * Theme customize.
 */
include_once get_template_directory() . '/inc/customize/options-default.php';
include_once get_template_directory() . '/inc/customize/customize-style.php';

/**
 * Theme metaboxes
 */
include get_template_directory() . '/inc/metaboxes/meta-boxes.php';


/**
 * Detect plugin. For use on Front End only.
 */
if( !function_exists( 'is_plugin_active' ) ) {
   include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

/**
 * Theme functions
 */
include get_template_directory() . '/inc/theme-functions/theme-functions.php';
include get_template_directory() . '/inc/theme-functions/helper.php';

/**
 * WooCommerce functions
 */
if ( class_exists( 'WooCommerce' ) ) {
    include get_template_directory() . '/inc/woocommerce/woocommerce.php';
}

/**
 * Include widget
 */
include get_template_directory() . '/inc/widgets/widget-zoo-social.php';
include get_template_directory() . '/inc/widgets/widget-zoo-recent-post.php';
include get_template_directory() . '/inc/widgets/widget-zoo-language-switcher.php';
