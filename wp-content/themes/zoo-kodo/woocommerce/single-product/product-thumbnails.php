<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author         WooThemes
 * @package     WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product;

//$attachment_ids = $product->get_gallery_image_ids();

$general_settings = get_option('zoo-cw-settings',true);
$is_gallery_enabled = isset($general_settings['product_gallery']) ? intval($general_settings['product_gallery']) : 1;
$default_active = [];
$default_attributes = $product->get_default_attributes();
$variation_id = 0;
if (count($default_attributes) && $is_gallery_enabled) {
    foreach ($default_attributes as $key => $value) {
        $default_active['attribute_'.$key] = $value;
    }
    $data_store   = WC_Data_Store::load( 'product' );
    $variation_id = $data_store->find_matching_product_variation( $product, $default_active );
}

if($variation_id==0){
    $attachment_ids = $product->get_gallery_image_ids();
}else {
    $gallery_images_id = get_post_meta($variation_id, 'zoo-cw-variation-gallery', true);
    $attachment_ids = array_filter(explode(',', $gallery_images_id));
}

$slide_rtl = '';
if ( is_rtl() ) {
    $slide_rtl = '"rtl": true, ';
}

/* Layout options */
$zoo_single_layout = zoo_woo_gallery_layout_single();
$vertical_gallery = '';
if ( $zoo_single_layout == 'vertical-gallery' ) {
    $vertical_gallery = ' "vertical": true,';

    if ( is_rtl() ) {
        $slide_rtl = '"rtl": false, ';
    }
} else {
	$vertical_gallery = ' "vertical": false,';
}

if ( $zoo_single_layout == 'carousel' || $zoo_single_layout == 'horizontal-gallery' || $zoo_single_layout == 'vertical-gallery' ) {
	$slick_class = ' zoo-slick';
}

if ( $attachment_ids ) { ?>
    <ul class="single-product-thumbnails<?php echo esc_attr( $slick_class ); ?>" data-slick='{"slidesToShow": 4, <?php echo esc_attr( $slide_rtl ); ?>"slidesToScroll": 1, "asNavFor": ".product-main-image .single-product-image", "arrows": false, "focusOnSelect": true,<?php echo esc_attr( $vertical_gallery ); ?> "responsive":[{"breakpoint": 768,"settings":{"slidesToShow": 3, "vertical":false}}]}'>
    <?php
    if (has_post_thumbnail()) {
        $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
        $full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
        $thumbnail_post    = get_post( $post_thumbnail_id );
        $image_title       = $thumbnail_post->post_content;
        $attributes = array(
            'title' => $image_title,
            'data-src' => $full_size_image[0],
            'data-large_image' => $full_size_image[0],
            'data-large_image_width' => $full_size_image[1],
            'data-large_image_height' => $full_size_image[2],
        );
        if (has_post_thumbnail()) {
            $html = '<li class="product-thumb">';
            $html .= get_the_post_thumbnail($variation_id, 'shop_single', $attributes);
            $html .= '</li>';
        } else {
            $html = '<li class="product-thumb">';
            $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
            $html .= '</li>';
        }
        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $variation_id ) );
    }

    if ( $attachment_ids && has_post_thumbnail() ) {
        foreach ( $attachment_ids as $attachment_id ) {
            $full_size_image  = wp_get_attachment_image_src( $attachment_id, 'full' );
            $thumbnail        = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
            $thumbnail_post   = get_post( $attachment_id );
            $image_title      = $thumbnail_post->post_content;

            $attributes = array(
                'title'                   => $image_title,
                'data-src'                => $full_size_image[0],
                'data-large_image'        => $full_size_image[0],
                'data-large_image_width'  => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2],
            );

            $html  = '<li class="product-thumb"  title="'.$image_title.'">';
            $html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
            $html .= '</li>';

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
        }
    }

    $product_video_link = get_post_meta( get_the_ID(), 'zoo_woo_video_link', true );
    $product_video_width = get_post_meta( get_the_ID(), 'zoo_woo_video_width', true );
    $product_video_height = get_post_meta( get_the_ID(), 'zoo_woo_video_height', true );
    $product_video_thumb = get_post_meta( get_the_ID(), 'zoo_woo_video_thumb', true );

    if ( $product_video_link != '' ) {
      $html  = '<li class="product-thumb video">';
      if ( $product_video_thumb !== '' ) {
        $html .= wp_get_attachment_image( $product_video_thumb );
      } else {
        $html .= '<i class="cs-font clever-icon-online-video"></i>';
      }

      $html .= '</li>';

      //echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
    }
    ?></ul>
    <?php
}
