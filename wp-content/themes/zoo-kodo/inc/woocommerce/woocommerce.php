<?php
/**
 * WooCommerce functions
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

/**
 * WooCommerce Custom Attribute.
 */

/* Default woocomerce. */
// Remove link close woo 2.5
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 2 );

// Custom number product display.
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . zoo_kodo_option( 'zoo_products_number_items' ) . ';' ), 20 );

/* ==============  WooCommerce - Ajax add to cart. ============== */

// Update topcart when addtocart(Ajax cart).
add_filter( 'woocommerce_add_to_cart_fragments', 'zoo_top_cart' );
if ( !function_exists( "zoo_top_cart" ) ) {
    function zoo_top_cart( $fragments ) {
        ob_start();

        get_template_part( 'woocommerce/theme-custom/topheadcart' );

        $fragments['#top-cart'] = ob_get_clean();

        return $fragments;
    }
}

/* ======  WooCommerce - Ajax remover cart. ====== */
add_action( 'wp_ajax_cart_remove_product', 'zoo_woo_remove_product' );
add_action( 'wp_ajax_nopriv_cart_remove_product', 'zoo_woo_remove_product' );
if ( !function_exists( 'zoo_woo_remove_product' ) ) {
    function zoo_woo_remove_product() {
        $product_key = $_POST['product_key'];
        $cart = WC()->instance()->cart;

        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            if ( $cart_item['product_id'] == $product_key ) {
                $removed = WC()->cart->remove_cart_item( $cart_item_key );
            }
        }

        if ( $removed ) {
            $output['status'] = '1';
            $output['cart_count'] = $cart->get_cart_contents_count();
            $output['cart_subtotal'] = $cart->get_cart_subtotal();
        } else {
            $output['status'] = '00';
        }

        echo json_encode( $output );
        exit;
    }
}

/*------- Quick view ajax. --------*/
add_action( 'wp_ajax_zoo_quickview', 'zoo_quickview' );
add_action( 'wp_ajax_nopriv_zoo_quickview', 'zoo_quickview' );

/* The Quickview Ajax Output. */
if ( !function_exists( 'zoo_quickview' ) ) {
    function zoo_quickview() {
        global $post, $product, $woocommerce;

        wp_enqueue_script( 'wc-add-to-cart-variation' );

        $product_id = $_POST['product_id'];

        $product = wc_get_product( $product_id );

        $post = get_post( $product->get_id() );

        setup_postdata( $post );

        ob_start();

        if ( class_exists( 'WPBMap' ) && method_exists( 'WPBMap', 'addAllMappedShortcodes' ) ) {
            WPBMap::addAllMappedShortcodes();
        }

        wc_get_template_part( 'theme-custom/quick', 'view' );

        $output = ob_get_contents();

        ob_end_clean();

        wp_reset_postdata();

        echo ent2ncr( $output );

        exit;
    }
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

// Move breadcrumb.
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'zoo_woocommerce_breadcrumb', 'woocommerce_breadcrumb', 10 );

function zoo_woo_change_breadcrumb_delimiter( $defaults ) {
    // Change the breadcrumb delimeter from '/' to '>'
    $defaults['delimiter'] = '<span role="presentation" class="zoo-breadcrumb-separator"> <i class="cs-font clever-icon-arrow-right"></i></span>';
    return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'zoo_woo_change_breadcrumb_delimiter' );

// Catalog Mod.
if ( !function_exists( 'zoo_woo_catalog_mod' ) ) {
    function zoo_woo_catalog_mod() {
        $zoo_catalog_status = zoo_kodo_option( 'zoo_catalog_mod' ) ? true : false;

        if ( isset( $_GET['catalog_mod'] ) ):
            $zoo_catalog_status = true;
        endif;

        if ( $zoo_catalog_status ) {
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        }

        return $zoo_catalog_status;
    }
}

// WooCommerce Sidebar.
if ( !function_exists( 'zoo_woo_sidebar' ) ) {
    function zoo_woo_sidebar() {
        $zoo_woo_sidebar = zoo_kodo_option( 'zoo_shop_sidebar_option' );

        if ( isset( $_GET['sidebar'] ) ):
            if ( $_GET['sidebar'] == 'left' ) {
                $zoo_woo_sidebar = 'left-sidebar';
            } else if ( $_GET['sidebar'] == 'no' ) {
                $zoo_woo_sidebar = 'no-sidebar';
            } else {
                $zoo_woo_sidebar = 'right-sidebar';
            }
        endif;

        return $zoo_woo_sidebar;
    }
}

if ( !function_exists( 'zoo_woo_sidebar_status' ) ) {
    function zoo_woo_sidebar_status() {
        $zoo_sb_status = '';

        if ( isset( $_COOKIE['sidebar-status'] ) ) {
            $zoo_sb_status = ( $_COOKIE['sidebar-status'] == 'true' ? ' disable-sidebar' : '' );
        }

        return $zoo_sb_status;
    }

}

// Layout options.
if ( !function_exists( 'zoo_woo_layout' ) ) {
    function zoo_woo_layout() {
        $zoo_layout = zoo_kodo_option( 'zoo_products_layout' );

        if ( isset( $_GET['product-layout'] ) ):
            $zoo_layout = $_GET['product-layout'];
        endif;

        if ( isset( $_COOKIE['product-layout'] ) ):
            $zoo_layout = $_COOKIE['product-layout'];
        endif;

        return $zoo_layout;
    }
}

/* Product item options. */
// Disable cart.
if ( ! zoo_kodo_option( 'zoo_product_cart_button' ) ) {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}

// Sale label status.
if ( ! zoo_kodo_option( 'zoo_product_sale_label' ) ) {
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
}

// Remove Rating.
if ( zoo_kodo_option( 'zoo_product_rating' ) ) {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
}

// Hide Quick view.
if ( !function_exists( 'zoo_woo_enable_quickview' ) ) {
    function zoo_woo_enable_quickview() {
        $zoo_qv_status = true;

        if ( zoo_kodo_option( 'zoo_product_disable_qv' ) ) {
            $zoo_qv_status = false;
        }

        return $zoo_qv_status;
    }

}

// Hide Stock label.
if ( !function_exists( 'zoo_woo_enable_stocklabel' ) ) {
    function zoo_woo_enable_stocklabel() {
        $zoo_status = true;

        if ( zoo_kodo_option( 'zoo_product_stock_label' ) ) {
            $zoo_status = false;
        }

        return $zoo_status;
    }

}
/*-------End Shop page functions--------*/

/*-------Single WooCommerce functions-------*/
// Single product navigation
if ( !function_exists( 'zoo_woo_single_nav' ) ) {
    function zoo_woo_single_nav() {
        $zoo_status = false;

        if ( zoo_kodo_option( 'zoo_single_link_product' ) ) {
            $zoo_status = true;
        }

        return $zoo_status;
    }
}

// Disable Zoom.
if ( !function_exists( 'zoo_woo_enable_zoom' ) ) {
    function zoo_woo_enable_zoom() {
        $zoo_status = false;

        if ( zoo_kodo_option( 'zoo_single_product_zoom' ) ) {
            $zoo_status = true;
        }

        return $zoo_status;
    }
}

// Single Product share.
if ( !function_exists( 'zoo_woo_enable_share' ) ) {
    function zoo_woo_enable_share() {
        $zoo_status = false;

        if ( zoo_kodo_option( 'zoo_single_share' ) ) {
            $zoo_status = true;
        }

        return $zoo_status;
    }
}

// Product Detail Layout
if ( !function_exists( 'zoo_woo_gallery_layout_single' ) ) {
    function zoo_woo_gallery_layout_single($id='') {
        $id=$id!=''?$id: get_the_ID();
        $zoo_layout_single = get_post_meta( $id, 'zoo_single_gallery_layout', true );

        $zoo_layout_single == 'vertical-gallery-right'? $zoo_layout_single = 'vertical-gallery': $zoo_layout_single;
        $zoo_layout_single == 'sticky-accordion'? $zoo_layout_single = 'sticky': $zoo_layout_single;
        $zoo_layout_single == 'image-center'? $zoo_layout_single = 'sticky': $zoo_layout_single;
        $zoo_layout_single == 'sticky-right-content'? $zoo_layout_single = 'sticky': $zoo_layout_single;

        if ( $zoo_layout_single == 'inherit' || $zoo_layout_single == '' ) {
            $zoo_layout_single = zoo_kodo_option( 'zoo_single_gallery_layout' );

            $zoo_layout_single == 'vertical-gallery-right'? $zoo_layout_single = 'vertical-gallery': $zoo_layout_single;
            $zoo_layout_single == 'sticky-accordion'? $zoo_layout_single = 'sticky': $zoo_layout_single;
            $zoo_layout_single == 'image-center'? $zoo_layout_single = 'sticky': $zoo_layout_single;
            $zoo_layout_single == 'sticky-right-content'? $zoo_layout_single = 'sticky': $zoo_layout_single;
        }

        return $zoo_layout_single;
    }
}

// Product Detail Layout
if ( !function_exists( 'zoo_woo_gallery_layout_single_class' ) ) {
    function zoo_woo_gallery_layout_single_class($id='') {
        $id=$id!=''?$id: get_the_ID();
        $zoo_layout_single = get_post_meta( $id, 'zoo_single_gallery_layout', true );
        
        if ( $zoo_layout_single == 'inherit' || $zoo_layout_single == '' ) {
            $zoo_layout_single = zoo_kodo_option( 'zoo_single_gallery_layout' );
        }

        return $zoo_layout_single;
    }
}

// WooCommerce Sidebar
if ( !function_exists( 'zoo_woo_single_sidebar' ) ) {
    function zoo_woo_single_sidebar() {
        $zoo_woo_sidebar = zoo_kodo_option( 'zoo_single_product_sidebar_option' );

        if ( isset( $_GET['sidebar'] ) ):
            if ( $_GET['sidebar'] == 'left' ) {
                $zoo_woo_sidebar = 'left-sidebar';
            } else if ( $_GET['sidebar'] == 'no' ) {
                $zoo_woo_sidebar = 'no-sidebar';
            } else {
                $zoo_woo_sidebar = 'right-sidebar';
            }
        endif;

        return $zoo_woo_sidebar;
    }
}

// Change location of single product hook (remove if not use it)
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 35 );
add_action( 'zoo_quickview_product', 'woocommerce_template_single_title', 5 );
add_action( 'zoo_quickview_product', 'woocommerce_template_single_rating', 10 );
add_action( 'zoo_quickview_product', 'woocommerce_template_single_price', 10 );
add_action( 'zoo_quickview_product', 'woocommerce_template_single_excerpt', 20 );
add_action( 'zoo_quickview_product', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'zoo_quickview_product_sharing', 'woocommerce_template_single_sharing', 50 );

// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
// add_action('zoo_woocommerce_template_single_sharing', 'woocommerce_template_single_sharing', 5);
add_action( 'zoo_woocommerce_show_product_sale_flash', 'woocommerce_show_product_sale_flash', 5 );

// Cart page
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'zoo_woocommerce_cart_collaterals', 'woocommerce_cross_sell_display',5 );

//Theme support lightbox
add_action( 'after_setup_theme', 'zoo_support_lb' );
if ( !function_exists( 'zoo_support_lb' ) ) {
    function zoo_support_lb() {
        add_theme_support( 'wc-product-gallery-lightbox' );
        // add_theme_support( 'wc-product-gallery-zoom' );
    }
}
if(!function_exists('zoo_aternative_images')){
    function zoo_aternative_images(){
        if(get_theme_mod('zoo_aternative_images','0')!='0'){
            $id = get_the_ID();
            $gallery = get_post_meta($id, '_product_image_gallery', true);
           if (!empty($gallery)) {
                $gallery = explode(',', $gallery);
                $first_image_id = $gallery[0];
                $zoo_item = wp_get_attachment_image_src($first_image_id, 'shop_catalog');
                $zoo_img_url = $zoo_item[0];
                $zoo_width = $zoo_item[1];
                $zoo_height = $zoo_item[2];
                $zoo_img_title = get_the_title($first_image_id);
                ?>
                    <img src="<?php echo esc_url($zoo_img_url) ?>"
                        height="<?php echo esc_attr($zoo_height) ?>" width="<?php echo esc_attr($zoo_width) ?>"
                        class="hover-image" data-original="<?php echo esc_attr($zoo_img_url) ?>"
                        alt="<?php echo esc_attr($zoo_img_title); ?>"/>
                <?php
            }
        }
    }
}