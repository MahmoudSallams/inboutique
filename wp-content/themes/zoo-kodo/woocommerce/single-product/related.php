<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
    exit;
}
wp_enqueue_script('wc-add-to-cart-variation');
if ( zoo_kodo_option( 'zoo_single_related_product' ) && $related_products ) : ?>
    <?php
    $zoo_class = '';
    $zoo_json_config = $zoo_list_wrap = '';

    if ( zoo_kodo_option( 'zoo_single_related_product_slider' ) ) {
        $zoo_class = 'zoo-carousel';
        $zoo_json_config = '{"item":"' . zoo_kodo_option( 'zoo_single_related_cols' ) . '","wrap":"ul.products","navigation":"true"}';
        $zoo_list_wrap = 'carousel';
    }
    ?>

    <div class="related <?php echo esc_attr( $zoo_class ) ?>" <?php if ( $zoo_class != '' ) { ?>data-config='<?php echo esc_attr( $zoo_json_config ); ?>'<?php }
        ?>>
        
        <h3 class="title-block"><span><?php esc_html_e( 'Related Products', 'zoo-kodo' ); ?></span></h3>

        <ul class="products grid row <?php echo esc_attr( $zoo_list_wrap ); ?>">
            <?php
            foreach ( $related_products as $related_product ) {
                $post_object = get_post( $related_product->get_id() );

                setup_postdata( $GLOBALS['post'] =& $post_object );

                wc_get_template_part( 'content-product', 'related' );
            }
            ?>
        </ul>
    </div>

<?php endif;

wp_reset_postdata();