<?php
/*
 * Zoo Quick View Template
 */
global $quick_view;
$quick_view = true;
?>
<div class="zoo-quickview-mask"></span></div>
<div id="zoo-quickview-lb" class="animated fadeIn woocommerce">
  <div id="product-<?php the_ID(); ?>">
    <div class="wrap-top-single-product product zoo-single-product">
        <a href="javascript:;" class="close-btn close-quickview" title="<?php esc_attr__('Close','zoo-kodo')?>"><i class="cs-font clever-icon-close"></i> </a>
        <div class="wrap-left-single-product single-product-gallery">
            <?php
            /**
             * woocommerce_before_single_product_summary hook.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action('woocommerce_before_single_product_summary');
            ?>
        </div>
        <div class="summary entry-summary wrap-right-single-product">
            <?php
            zoo_woo_catalog_mod();
            /**
             * woocommerce_single_product_summary hook.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_sharing - 50
             */
            do_action( 'zoo_quickview_product' );
            ?>

            <?php if ( is_plugin_active( 'yith-woocommerce-wishlist/init.php' ) ) { ?>
                <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
            <?php } ?>
            <?php if ( is_plugin_active( 'yith-woocommerce-compare/init.php' ) ) { ?>
                <a href="<?php home_url('') ?>?action=yith-woocompare-add-product&amp;id<?php echo get_the_ID() ?>" class="compare button" data-product_id="<?php echo get_the_ID() ?>" rel="nofollow"><?php echo esc_html__( 'Compare', 'zoo-kodo' ); ?></a>
            <?php } ?>

            <?php do_action( 'zoo_quickview_product_sharing' ); ?>
        </div><!-- .summary -->
    </div>
  </div>
</div>
