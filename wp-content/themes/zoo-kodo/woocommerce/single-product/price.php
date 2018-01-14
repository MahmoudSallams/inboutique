<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;
$zoo_single_layout= zoo_woo_gallery_layout_single();
?>
<div class="wrap-price<?php echo ( $product->is_type( 'variable' ) ) ? ' price-variable' : ''; ?>">
	<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '"><label>' . esc_html__( 'Availability', 'zoo-kodo' ) . '</label>: <span>' . esc_html( $availability['availability'] ) . '</span></p>';
	?>
	<p class="price">
        <?php
        if ( $zoo_single_layout == 'carousel' || $zoo_single_layout == 'sticky' ) {
            do_action( 'zoo_woocommerce_show_product_sale_flash' );
        }
        echo ent2ncr( $product->get_price_html() );
        ?>
    </p>
	<?php if (!empty( $availability['availability'] )) : 
		echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
	endif ?>
</div>
<?php
get_template_part('/woocommerce/single-product/sale-count','down');
