<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($tabs)) : ?>

    <div class="zoo-woo-tabs wc-tabs-wrapper">
        <?php
        if (zoo_woo_enable_share()) {
            do_action('zoo_woocommerce_template_single_sharing');
        }
        ?>
        <ul class="tabs wc-tabs">
            <?php foreach ($tabs as $key => $tab) : ?>
                <li class="<?php echo esc_attr($key); ?>_tab">
                    <a href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', esc_html($tab['title']), $key); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php foreach ($tabs as $key => $tab) : ?>
            <div class="wc-tabs-panel-wrap">
                <div class="wc-tab-title">
                    <div class="tab-title <?php echo esc_attr($key); ?>_tab">
                        <a href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', esc_html($tab['title']), $key); ?></a>
                    </div>
                </div>
                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr($key); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr($key); ?>">
                    <?php call_user_func($tab['callback'], $key, $tab); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>