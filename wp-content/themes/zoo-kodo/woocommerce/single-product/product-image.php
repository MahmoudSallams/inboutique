<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $quick_view;

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

$zoo_single_layout = zoo_woo_gallery_layout_single();

$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$thumbnail_post    = get_post( $post_thumbnail_id );
$image_title       = get_post_field( 'post_title', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';

$slide_rtl = '';
if ( is_rtl() ) {
    $slide_rtl = '"rtl": true, ';
}

switch ( $zoo_single_layout ) {
  case 'carousel':
    $slick_class = ' zoo-slick';
    $slick_data = ' data-slick=\'{"slidesToShow": 3, ' . $slide_rtl . '"slidesToScroll": 1, "responsive":[{"breakpoint": 768,"settings":{"slidesToShow": 1}}]}\'';
    break;

  case 'vertical-gallery':
  case 'horizontal-gallery':
    $slick_class = ' zoo-slick';
    $slick_data = ' data-slick=\'{"slidesToShow": 1, ' . $slide_rtl . '"slidesToScroll": 1, "asNavFor": ".single-product-thumbnails", "fade": true}\'';
    break;

  default:
    $slick_class = '';
    $slick_data = '';
    break;
}

if ( isset( $quick_view ) && $quick_view ) {
  $slick_class = ' zoo-slick';
  $slick_data = ' data-slick=\'{"slidesToShow": 1, ' . $slide_rtl . '"slidesToScroll": 1, "fade": true}\'';
}
?>
<div class="product-main-image">
  <?php
  if ( $zoo_single_layout == 'horizontal-gallery' || $zoo_single_layout == 'vertical-gallery' ) {
    do_action('zoo_woocommerce_show_product_sale_flash');
  }
  ?>
  <div class="single-product-image<?php echo esc_attr($slick_class); ?>"<?php echo wp_kses_post($slick_data); ?>>
      <?php
      $attributes = array(
		  'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
		  'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
          'data-src'                => $full_size_image[0],
          'data-large_image'        => $full_size_image[0],
          'data-large_image_width'  => $full_size_image[1],
          'data-large_image_height' => $full_size_image[2],
      );

      if ( has_post_thumbnail() ) {
          $html  = '<a href="' . esc_url( $full_size_image[0] ) . '" data-rel="prettyPhoto[product-gallery]" data-zoo-image="' . esc_url( $full_size_image[0] ) . '" class="woocommerce-main-image zoom">';
          $html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
          $html .= '</a>';
      } else {
          $html  = '<a class="woocommerce-main-image" data-zoo-image="' . esc_url( $full_size_image[0] ) . '">';
          $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
          $html .= '</a>';
      }

      echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

      //$attachment_ids = $product->get_gallery_image_ids();

      if ( $attachment_ids && has_post_thumbnail() ) {
          foreach ( $attachment_ids as $attachment_id ) {
              $full_size_image  = wp_get_attachment_image_src( $attachment_id, 'full' );
              $thumbnail        = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
              $thumbnail_post   = get_post( $attachment_id );
              $image_title      = $thumbnail_post->post_content;

              $attributes = array(
				  'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
				  'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
                  'data-src'                => $full_size_image[0],
                  'data-large_image'        => $full_size_image[0],
                  'data-large_image_width'  => $full_size_image[1],
                  'data-large_image_height' => $full_size_image[2],
              );

              $html  = '<a href="' . esc_url( $full_size_image[0] ) . '" data-rel="prettyPhoto[product-gallery]" data-zoo-image="' . esc_url( $full_size_image[0] ) . '" class="woocommerce-main-image zoom"  title="'.$image_title.'">';
              $html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
              $html .= '</a>';

              echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
          }
      }

      $product_video_link = get_post_meta( get_the_ID(), 'zoo_woo_video_link', true );
      $product_video_width = ( get_post_meta( get_the_ID(), 'zoo_woo_video_width', true ) != '' ) ? get_post_meta( get_the_ID(), 'zoo_woo_video_width', true ) : 'auto';
      $product_video_height = ( get_post_meta( get_the_ID(), 'zoo_woo_video_height', true ) != '' ) ? get_post_meta( get_the_ID(), 'zoo_woo_video_height', true ) : 'auto';

      if ( function_exists('zoo_get_embed') && $product_video_link != '' ) {

        $video_frame = zoo_get_embed($product_video_link, $product_video_width, $product_video_height);

        $html  = '<a href="javascript:;" class="woocommerce-main-image">';
        $html .= $video_frame;
        $html .= '</a>';

        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

      }
      ?>

  </div>
</div>

<?php
if ( $zoo_single_layout != 'sticky' &&  $zoo_single_layout != 'carousel') {
    do_action('woocommerce_product_thumbnails');
} ?>
