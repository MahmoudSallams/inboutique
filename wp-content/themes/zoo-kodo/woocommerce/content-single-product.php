<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$zoo_single_class = zoo_woo_gallery_layout_single_class();
//Custom Single Product
if($zoo_single_class == 'image-center' || $zoo_single_class == 'sticky-right-content' || $zoo_single_class == 'sticky-accordion'){
    remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs', 10 );
    add_action('woocommerce_after_single_sticky_right_content','woocommerce_output_product_data_tabs', 10);
}
?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
  echo get_the_password_form();
  return;
}

$zoo_single_layout = zoo_woo_gallery_layout_single();
if($zoo_single_layout == $zoo_single_class){
    $zoo_class = $zoo_single_layout . '  zoo-single-product';
}
else{
    $zoo_class = $zoo_single_layout . '  '. $zoo_single_class . ' zoo-single-product';
}


wp_enqueue_style('slick');
wp_enqueue_style('slick-theme');
if (zoo_woo_enable_zoom()) {
    wp_enqueue_style('zoomove');
    wp_enqueue_script('zoomove');
    $zoo_class .= ' ' . 'zoo-product-zoom';
}
$zoo_single_sidebar = zoo_woo_single_sidebar();
$zoo_class .= ' ' . $zoo_single_sidebar;
if ($zoo_single_layout != 'carousel') {
    $zoo_class.=' col-xs-12 ';
    if ($zoo_single_sidebar != 'no-sidebar') {
        $zoo_class .= ' col-sm-9';
        ?>
        <div class="row">
        <?php
    }
    if ($zoo_single_sidebar == 'left-sidebar') {
        /**
         * woocommerce_sidebar hook.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        get_template_part('woocommerce/woo-sidebar', 'left');
    }
    ?>
    <div id="product-<?php the_ID(); ?>" <?php post_class($zoo_class); ?>>
        <div class="wrap-top-single-product">
            <?php if ( $zoo_single_layout == 'sticky') : ?>
            <div class="wrap-product-sticky">
                <?php
                if($zoo_single_class == 'image-center'){?>

                    <?php do_action('woocommerce_after_single_sticky_right_content'); ?>

                <?php } ?>
            <?php endif; ?>
                <div class="wrap-left-single-product single-product-gallery">
                    <?php
                    /**
                     * woocommerce_before_single_product_summary hook.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    if ( $zoo_single_layout == 'sticky') {
                        remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
                    }

                    do_action('woocommerce_before_single_product_summary');

                    ?>
                </div>
                <div class="summary entry-summary wrap-right-single-product">
                    <div class="wrap-right-single-product-inner">
                        <?php
                        /**
                         * woocommerce_single_product_summary hook.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        do_action('woocommerce_single_product_summary');
                        ?>
                    </div>
					<?php
					if($zoo_single_class == 'sticky-right-content' || $zoo_single_class == 'sticky-accordion'){?>

						<?php do_action('woocommerce_after_single_sticky_right_content'); ?>

					<?php } ?>
                </div><!-- .summary -->
            <?php if ( $zoo_single_layout == 'sticky') : ?>
            </div>
            <?php endif;?>
        </div>
        <?php
        /**
         * woocommerce_after_single_product_summary hook.
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_upsell_display - 15
         * @hooked woocommerce_output_related_products - 20
         */
        do_action('woocommerce_after_single_product_summary');
        ?>
        <meta itemprop="url" content="<?php the_permalink(); ?>"/>
    </div><!-- #product-<?php the_ID(); ?> -->
    <?php
    if ($zoo_single_sidebar == 'right-sidebar') {
        /**
         * woocommerce_sidebar hook.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        get_template_part('woocommerce/woo-sidebar', 'right');
    }
    if ($zoo_single_sidebar != 'no-sidebar') {
        ?>
        </div>
        <?php
    }
} else {
    ?>
    <div id="product-<?php the_ID(); ?>" <?php post_class($zoo_class); ?>>
        <div class="wrap-top-single-product single-product-gallery">
            <div class="images">
                <?php
                    remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
                    do_action('woocommerce_before_single_product_summary');
                ?>
            </div>
            <div class="summary entry-summary wrap-right-single-product">
                <?php
                /**
                 * woocommerce_single_product_summary hook.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>

            </div><!-- .summary -->
        </div>
        <div class="container">
            <?php
            if ($zoo_single_sidebar != 'no-sidebar') {
            ?>
            <div class="row">
                <?php
                }
                if ($zoo_single_sidebar == 'left-sidebar') {
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    get_template_part('woocommerce/woo-sidebar', 'left');
                }
                if ($zoo_single_sidebar != 'no-sidebar') { ?>
                <div class="col-xs-12 col-sm-9">
                    <?php }
                    /**
                     * woocommerce_after_single_product_summary hook.
                     *
                     * @hooked woocommerce_output_product_data_tabs - 10
                     * @hooked woocommerce_upsell_display - 15
                     * @hooked woocommerce_output_related_products - 20
                     */
                    do_action('woocommerce_after_single_product_summary');
                    ?>
                    <meta itemprop="url" content="<?php the_permalink(); ?>"/>
                    <?php
                    if ($zoo_single_sidebar != 'no-sidebar') { ?>
                </div>
            <?php }
            if ($zoo_single_sidebar == 'right-sidebar') {
                /**
                 * woocommerce_sidebar hook.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                get_template_part('woocommerce/woo-sidebar', 'right');
            }
            if ($zoo_single_sidebar != 'no-sidebar') {
            ?>
            </div>
        <?php
        } ?>
        </div>
    </div><!-- #product-<?php the_ID(); ?> -->
    <?php
}
wp_enqueue_script( 'slick' );
wp_enqueue_script( 'lazyload-master' );
do_action( 'woocommerce_after_single_product' );
