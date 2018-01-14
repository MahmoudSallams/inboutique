<?php
/**
 * Clever Product Shortcode
 */
$varid = mt_rand();
$class = '';
$cvca_wrap_class = "cvca-wrap-products-sc";
$product_cats = array();
$product_cats_all = '';

wp_enqueue_style( 'cvca-style' );

if ( $atts['products_type'] != 'carousel' ) {
    wp_enqueue_script( 'lazyload' );
}
wp_enqueue_script( 'cvca-woo' );
wp_enqueue_script( 'cvca-script' );
wp_enqueue_style('zoomove');
wp_enqueue_script('zoomove');
wp_enqueue_script('wc-add-to-cart-variation');
wp_enqueue_script( 'wc-single-product');

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $atts['css'], ' ' ), 'CleverProduct', $atts );
$css_class .= $atts['element_custom_class'];

if ( !isset( $_POST['show'] ) ) {
    echo '<input name="cvca-filter-page-baseurl" type="hidden" value="' . cvca_current_url() . '">';
}

$product_categories = get_categories(
    array(
        'taxonomy' => 'product_cat',
    )
);

if ( count( $product_categories ) > 0 ) {

    foreach ( $product_categories as $value ) {
        $product_cats[$value->name] = $value->slug;
    }

    $product_cats_all = implode(',', $product_cats);
}

if ( $atts['filter_categories'] === 'Array' ) {
    $atts['filter_categories'] = $product_cats_all;
}

$product_query = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $atts['wc_attr'] ) );
$product_query->query( $atts['wc_attr'] );

?>
<div class="woocommerce cvca-products-wrap cvca-products-wrap_<?php echo esc_attr( $varid ); ?> <?php echo esc_attr( $css_class ) ?>"
    <?php if ( $atts['show_filter'] || $atts['loadmore'] ) { ?>
        data-args='<?php
        //shortcode agurgument
        if ( !isset( $_POST['show'] ) ) {
            $init_atts = $atts;
            unset( $init_atts['wc_attr'] );
            echo json_encode( $init_atts );
        } else {
            echo json_encode( $_POST );
        }
        ?>'
        data-categories="<?php echo esc_attr( $atts['filter_categories'] ); ?>"
        data-url="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>"
        data-empty="<?php echo esc_attr__( 'No product found','zoo-kodo' ); ?>"<?php } ?>>
    <?php if ( $atts['show_filter'] ) : ?>
        <a href="javascript:void(0)" class="cvca-toggle-filters">
            <i class="cs-font clever-icon-funnel-o"></i> <span><?php echo esc_html__( 'Filter', 'zoo-kodo' ); ?></span>
        </a>
    <?php endif; ?>

    <?php
    echo '<div class="cvca-wrap-filters">';
    echo cvca_get_shortcode_view( 'woocommerce/product-filter', $atts );
    echo '</div>';
    ?>
    <?php if ( isset( $atts['title'] ) && $atts['title'] != '' ) { ?>
        <h3 class="title-block"><span><?php echo esc_html( $atts['title'] ) ?></span></h3>
    <?php } ?>

    <div class="cvca-wrapper-products-shortcode">
        <?php
        if ( $atts['products_type'] == 'list' ) {
            $class .= 'list';
        } else {
            $class .= 'grid';
        }

        if ( $atts['products_type'] == 'carousel' ) {
            $class .= ' products-carousel';
            $cvca_wrap_class .= ' cvca-carousel';
            $cvca_pag = $atts['show_pag'] != '' ? 'true' : 'false';
            $cvca_nav = $atts['show_nav'] != '' ? 'true' : 'false';
            $cvca_json_config = '{"item":"' . $atts['column'] . '","wrap":"ul.products","pagination":"' . $cvca_pag . '","navigation":"' . $cvca_nav . '"}';

            wp_enqueue_style( 'slick' );
            wp_enqueue_style( 'slick-theme' );
            wp_enqueue_script( 'slick' );
        } else {
            wp_enqueue_script( 'isotope' );
        }

        if ( $atts['show_rating'] != 1 ) {
            $cvca_wrap_class .= ' hide-rating';
        }

        remove_filter( 'posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses' ) );
        ?>
        <div class="<?php echo esc_attr( $cvca_wrap_class ) ?>"
            <?php if ( $atts['products_type'] == 'carousel' ) { ?>data-config='<?php echo esc_attr( $cvca_json_config ) ?>'<?php } ?>>

            <ul class="products <?php echo esc_attr( $class ) ?>" <?php if ( $atts['products_type'] != 'carousel' ) { ?> data-width="<?php echo esc_attr( $atts['col_width'] ) ?>"<?php } ?>>
                <?php $i = 0; ?>
                <?php while ( $product_query->have_posts() ) {
                    $product_query->the_post();
                    global $product;
                    echo cvca_get_shortcode_view( 'woocommerce/content-product', $atts );
                }
                ?>
            </ul>
        </div>
        <?php
        if ( !isset( $_POST['ajax'] ) ):
            if ( $atts['loadmore'] && $product_query->max_num_pages > $atts['wc_attr']['paged'] ) : ?>
                <div class="cvca_ajax_load_more">
                    <a class="cvca_ajax_load_more_button btn" href="#"
                       title="<?php esc_attr_e( 'Load more', 'zoo-kodo' ) ?>"
                       data-ajaxurl="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>"
                       data-empty="<?php esc_attr_e( 'No more Load', 'zoo-kodo' ) ?>"
                       data-maxpage='<?php echo esc_attr( $product_query->max_num_pages ); ?>'><?php esc_html_e( 'Load more', 'zoo-kodo' ); ?></a></div>
                <?php
                wp_enqueue_script( 'cvca-ajax-product' );
            endif; ?>
        <?php endif; ?>
    </div>
    <?php
    wp_reset_postdata();
    wp_reset_query();
    ?>
</div>
