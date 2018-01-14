<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
wp_enqueue_script('lazyload-master');
wp_enqueue_script('imagesloaded');
wp_enqueue_script('isotope');
wp_enqueue_style('zoomove');
wp_enqueue_script('zoomove');
wp_enqueue_script('wc-add-to-cart-variation');
wp_enqueue_script( 'wc-single-product');

?>
<main id="main-page" class="wrap-main-page">
    <?php get_template_part('/woocommerce/theme-custom/woo', 'cover'); ?>
    <?php
    if ( zoo_kodo_option( 'zoo_shop_cover' ) == 'disable' || zoo_kodo_option( 'zoo_shop_cover' ) == 'slider-shortcode') {
        do_action('zoo_woocommerce_breadcrumb');
    }
    ?>
    <div id="primary" class="zoo-woo-page container <?php echo esc_attr(zoo_woo_sidebar() . ' ' . zoo_woo_sidebar_status()) ?>">
        <div class="mask-sidebar"></div>
        <?php if (have_posts()) : ?>
            <div id="top-product-page" class="row">
                <ul class="layout-control-block col-xs-3">
                    <li class="control-item sidebar-control">
                        <a href="javascript:;" class="<?php echo esc_attr(zoo_woo_sidebar_status()) ?>"
                           title="<?php echo esc_attr__('Show/Hide Sidebar', 'zoo-kodo'); ?>">
                            <i class="cs-font clever-icon-slider-1" aria-hidden="true"></i><?php echo esc_html__('Filter', 'zoo-kodo'); ?>
                        </a>
                    </li>
                    <li class="control-item">
                        <a href="javascript:;" title="<?php echo esc_attr__('Switch to Grid Layout', 'zoo-kodo'); ?>"
                           class="layout-control grid-layout <?php echo esc_attr(zoo_woo_layout() == 'grid' ? 'active' : '') ?>">
                            <i class="cs-font clever-icon-grid"></i>
                        </a>
                    </li>
                    <li class="control-item">
                        <a href="javascript:;" title="<?php echo esc_attr__('Switch to List Layout', 'zoo-kodo'); ?>"
                           class="layout-control list-layout  <?php echo esc_attr(zoo_woo_layout() == 'list' ? 'active' : '') ?>">
                            <i class="cs-font clever-icon-list"></i>
                        </a>
                    </li>
                </ul>
                <ul class="layout-control-column col-xs-6 toolbar-center">
                    <li class="item col-1" data-column="1"></li>
                    <li class="item col-2" data-column="2"></li>
                    <li class="item col-3" data-column="3"></li>
                    <li class="item col-4" data-column="4"></li>
                    <li class="item col-5" data-column="5"></li>
                </ul>
                <div class="toolbar-right col-xs-3">
                    <?php
                    /**
                     * woocommerce_before_shop_loop hook.
                     *
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action('woocommerce_before_shop_loop');
                    ?>
                    <span id="hide-span" style="display: none;"><span>
                </div>

            </div>
        <?php endif; ?>
        <div class="row">
            <?php
            if ( zoo_woo_sidebar() == 'left-sidebar' || zoo_woo_sidebar() == 'no-sidebar' ) {
                /**
                 * woocommerce_sidebar hook.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                get_template_part('woocommerce/woo-sidebar', 'left');
            }
            /**
             * woocommerce_before_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action('woocommerce_before_main_content');

            if (have_posts()) : ?>
                <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; // end of the loop. ?>

                <?php woocommerce_product_loop_end(); ?>
                <?php get_template_part('/woocommerce/theme-custom/woo', 'pagination'); ?>

                <?php
                /**
                 * woocommerce_after_shop_loop hook.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
            elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) :
                wc_get_template('loop/no-products-found.php');
            endif;
            /**
             * woocommerce_after_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action('woocommerce_after_main_content');
            if (zoo_woo_sidebar() == 'right-sidebar') {
                /**
                 * woocommerce_sidebar hook.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                get_template_part('woocommerce/woo-sidebar', 'right');
            }
            ?>
        </div>
    </div>
</main>
<?php
get_footer('shop'); ?>
