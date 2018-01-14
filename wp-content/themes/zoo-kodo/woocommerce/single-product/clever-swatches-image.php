<?php
/**
 * Clever Swatch image
 * @description: use for display image swatch
 **/
$general_settings = get_option('zoo-cw-settings', true);
$is_gallery_enabled = isset($general_settings['product_gallery']) ? intval($general_settings['product_gallery']) : 1;
if (isset ($variation_id)) {
    if ($is_gallery_enabled) {
        $gallery_images_id = get_post_meta($variation_id, 'zoo-cw-variation-gallery', true);
        $attachment_ids = array_filter(explode(',', $gallery_images_id));
    } else {
        $attachment_ids = [];
    }
} else {
    global $post, $product;
    $default_active = [];
    $default_attributes = $product->get_default_attributes();
    $variation_id = 0;
    if (count($default_attributes) && $is_gallery_enabled) {
        foreach ($default_attributes as $key => $value) {
            $default_active['attribute_' . $key] = $value;
        }
        $data_store = WC_Data_Store::load('product');
        $variation_id = $data_store->find_matching_product_variation($product, $default_active);
    }
    if ($variation_id == 0) {
        $attachment_ids = $product->get_gallery_image_ids();
    } else {
        $gallery_images_id = get_post_meta($variation_id, 'zoo-cw-variation-gallery', true);
        $attachment_ids = array_filter(explode(',', $gallery_images_id));
    }
}
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
} else $product_id = $variation_id;

$zoo_single_layout = zoo_woo_gallery_layout_single($product_id);

$thumbnail_size = apply_filters('woocommerce_product_thumbnails_large_size', 'full');
$post_thumbnail_id = get_post_thumbnail_id($variation_id);
$full_size_image = wp_get_attachment_image_src($post_thumbnail_id, $thumbnail_size);
$placeholder = has_post_thumbnail() ? 'with-images' : 'without-images';

$slide_rtl = '';
if ( is_rtl() ) {
    $slide_rtl = '"rtl": true, ';
}

/* Layout options */
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
    $slick_class = ' zoo-slick';
    $slick_data = ' data-slick=\'{"slidesToShow": 1, ' . $slide_rtl . '"slidesToScroll": 1, "asNavFor": ".single-product-thumbnails", "fade": true}\'';
    break;
  case 'horizontal-gallery':
    $slick_class = ' zoo-slick';
    $slick_data = ' data-slick=\'{"slidesToShow": 1, ' . $slide_rtl . '"slidesToScroll": 1, "asNavFor": ".single-product-thumbnails", "fade": true}\'';
    break;

  default:
    $slick_class = '';
    $slick_data = '';
    break;
}
if ($product->is_type('variable')):
?>
<div class="images">
    <div class="product-main-image">
        <ul class="single-product-image<?php echo esc_attr($slick_class); ?>"<?php echo wp_kses_post($slick_data); ?>>
            <?php
            $attributes = array(
                    'title' => get_post_field('post_title', $post_thumbnail_id),
                    'data-caption' => get_post_field('post_excerpt', $post_thumbnail_id),
                    'data-src' => $full_size_image[0],
                    'data-large_image' => $full_size_image[0],
                    'data-large_image_width' => $full_size_image[1],
                    'data-large_image_height' => $full_size_image[2],
                );
            if (has_post_thumbnail($variation_id)) {
                $html = '<li class="woocommerce-product-gallery__image zoom woocommerce-main-image" data-zoo-image="' . get_the_post_thumbnail_url($variation_id, 'full') . '"><a href="' . esc_url(get_the_post_thumbnail_url($variation_id, 'full')) . '" class="zoo-woo-lightbox" data-rel="prettyPhoto[product-gallery]"><i class="cs-font  clever-icon-expand"></i></a>';
                $html .= get_the_post_thumbnail($variation_id, 'shop_single', $attributes);
                $html .= '</li>';
                $thumb_html = '<li class="product-thumb">' . get_the_post_thumbnail($variation_id, 'shop_thumbnail', $attributes) . '</li>';
            }
            else {
                if (has_post_thumbnail($product_id)) {
                    $post_thumbnail_id = get_post_thumbnail_id( $product_id );
                    $thumbnail_size = apply_filters('woocommerce_product_thumbnails_large_size', 'full');
                    $full_size_image = wp_get_attachment_image_src($post_thumbnail_id, $thumbnail_size);
                    $attributes = array(
                        'title' => get_post_field('post_title', $post_thumbnail_id),
                        'data-caption' => get_post_field('post_excerpt', $post_thumbnail_id),
                        'data-src' => $full_size_image[0],
                        'data-large_image' => $full_size_image[0],
                        'data-large_image_width' => $full_size_image[1],
                        'data-large_image_height' => $full_size_image[2],
                    );
                    $html = '<li class="woocommerce-product-gallery__image  woocommerce-main-image zoom"  data-zoo-image="' . esc_url($full_size_image[0]) . '"><a href="' . esc_url($full_size_image[0]) . '" class="zoo-woo-lightbox" data-rel="prettyPhoto[product-gallery]"><i class="cs-font  clever-icon-expand"></i></a>';
                    $html .= get_the_post_thumbnail($product_id, 'shop_single', $attributes);
                    $html .= '</li>';
                    $thumb_html = '<li class="product-thumb">' . get_the_post_thumbnail($product_id, 'shop_thumbnail') . '</li>';
                    $product = new WC_product($product_id);
                    $attachment_ids = $product->get_gallery_image_ids();
                }
                else{
                    $html = '<li class="woocommerce-product-gallery__image woocommerce-main-image"><a data-rel="prettyPhoto[product-gallery]" class="">';
                    $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'woocommerce'));
                    $html .= '</a></li>';
                }

            }
            //thumb image
            foreach ($attachment_ids as $attachment_id) {
                $full_size_image = wp_get_attachment_image_src($attachment_id, 'full');
                $image_title = get_post_field('post_excerpt', $attachment_id);

                $attributes = array(
                    'title' => $image_title,
                    'data-src' => $full_size_image[0],
                    'data-large_image' => $full_size_image[0],
                    'data-large_image_width' => $full_size_image[1],
                    'data-large_image_height' => $full_size_image[2],
                );
                $html .= '<li class="woocommerce-product-gallery__image  zoom woocommerce-main-image" data-zoo-image="' . esc_url($full_size_image[0]) . '"><a href="' . esc_url($full_size_image[0]) . '"  class="zoo-woo-lightbox"  title="' . $image_title . '"><i class="cs-font  clever-icon-expand"></i></a>';
                $html .= wp_get_attachment_image($attachment_id, 'shop_single', false, $attributes);
                $html .= '</li>';
                $thumb_html .= '<li class="product-thumb">' . wp_get_attachment_image($attachment_id, 'shop_thumbnail', $attributes) . '</li>';
            }
            echo $html;
            ?>
        </ul>
    </div>
    <?php
    if ($zoo_single_layout == 'horizontal-gallery' || $zoo_single_layout == 'vertical-gallery') {
        ?>
        <ul class="single-product-thumbnails<?php echo esc_attr( $slick_class ); ?>" data-slick='{"slidesToShow": 4, <?php echo esc_attr( $slide_rtl ); ?>"slidesToScroll": 1, "asNavFor": ".product-main-image .single-product-image", "arrows": false, "focusOnSelect": true,<?php echo esc_attr( $vertical_gallery ); ?> "responsive":[{"breakpoint": 768,"settings":{"slidesToShow": 3, "vertical":false}}]}'>
            <?php if($attachment_ids){
                echo $thumb_html;
            } ?>
        </ul>
        <?php
    }
    ?>
</div>
<?php
else:
    wc_get_template_part('single-product/product', 'image');
endif;
?>