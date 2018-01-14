<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( !defined('ABSPATH') ) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || !$product->is_visible() ) {
    return;
}
?>
<li <?php post_class( 'default-template' ); ?>>
    <div class="wrap-product-img">
        <?php
        /**
         * woocommerce_before_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action( 'woocommerce_before_shop_loop_item' );

        /**
         * woocommerce_before_shop_loop_item_title hook.
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );

        $zoo_img = get_post_thumbnail_id( get_the_ID() );
        $zoo_attachments = get_attached_file( $zoo_img );

        if ( has_post_thumbnail() && $zoo_attachments ) :
            $zoo_item = wp_get_attachment_image_src( $zoo_img, 'shop_catalog' );
            $zoo_img_url = $zoo_item[0];
            $zoo_width = $zoo_item[1];
            $zoo_height = $zoo_item[2];
            $resolution = $zoo_width / $zoo_height;
            $zoo_img_title = get_the_title( $zoo_img );
            ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
               data-resolution="<?php echo esc_attr( $resolution ) ?>" class="wrap-img">
                <img src="<?php echo esc_attr( $zoo_img_url ) ?>"
                    height="<?php echo esc_attr( $zoo_height ) ?>" class="wp-post-image" width="<?php echo esc_attr( $zoo_width ) ?>"
                    alt="<?php echo esc_attr( $zoo_img_title ); ?>"/>
                 <?php echo zoo_aternative_images();?>
            </a>
            <?php
        endif;

        /**
         * woocommerce_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_product_title - 10
         *
         */
        if ( function_exists( 'zoo_woo_enable_stocklabel' ) ) {
            if( zoo_woo_enable_stocklabel() ) {
                if ( !$product->is_in_stock() ) {
                ?>
                    <span class="out-stock-label stock-label"><?php esc_html_e( 'Out of Stock', 'zoo-kodo' ); ?></span>
                <?php
                } else {
                    if ( get_option( 'woocommerce_notify_low_stock_amount' ) > $product->get_stock_quantity() && $product->get_stock_quantity() ) {
                    ?>
                        <span class="low-stock-label stock-label"><?php esc_html_e( 'Low Stock', 'zoo-kodo' ); ?></span>
                    <?php
                    }
                }
            }
        }
        ?>
        <?php if ( is_plugin_active('yith-woocommerce-compare/init.php') && !zoo_kodo_option( 'zoo_product_disable_compare_button' ) ) : ?>
            <div class="action-item action-compare" data-toggle="tooltip" data-placement="right" title="<?php echo esc_html__('Add to Compare', 'zoo-kodo'); ?>">
                <?php echo do_shortcode('[yith_compare_button]'); ?>
            </div>
        <?php endif; ?>

        <?php if ( zoo_woo_enable_quickview() ) : ?>
            <?php
            wp_enqueue_style('slick');
            wp_enqueue_script('slick');
            ?>
            <a data-product_id="<?php echo esc_attr($product->get_id()); ?>" class="action-item btn quick-view"
               href="javascript:;">
                <?php echo esc_html__('Quick View', 'zoo-kodo'); ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="wrap-product-infor">
        <h3 class="product-name">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if ( is_plugin_active( 'yith-woocommerce-wishlist/init.php' ) && !zoo_kodo_option( 'zoo_product_disable_wishlist_button' ) ) : ?>
            <div class="action-item action-wishlist">
                <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
            </div>
        <?php endif; ?>

        <div class="product-description">
            <?php echo apply_filters( 'woocommerce_short_description', the_excerpt() ); ?>
        </div>

        <?php
        /**
         * woocommerce_after_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_rating - 5
         */
        do_action('woocommerce_after_shop_loop_item_title');
        ?>

        <div class="action-item-switcher-hover">
            <div class="action-item-switcher">
                <?php
                /**
                 * woocommerce_after_shop_loop_item hook.
                 *
                 * @hooked woocommerce_template_loop_price - 2
                 * @hooked woocommerce_template_loop_product_link_close - 5
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action('woocommerce_after_shop_loop_item');
                ?>
            </div>
        </div>
    </div>
</li>
