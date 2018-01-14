<?php
/**
 * Image Gallery Shortcode
 */
$cvca_wrap_class = $atts['el_class'];
if($atts['shadow']){
    $cvca_wrap_class.=' shadow';
}
$cvca_content = vc_param_group_parse_atts($atts['images']);
$cvca_start_link = $cvca_end_link = '';
$cvca_allow_tag = array(
    'a' => array(
        'href' => array(),
        'target' => array(),
        'rel' => array(),
        'title' => array()
    ),
    'br' => array()
);
$pagination = $atts['show_pag'] ? "true" : "false";
$navigation = $atts['show_nav'] ? "true" : "false";
wp_enqueue_style('slick');
wp_enqueue_style('cvca-style');
wp_enqueue_script('slick');
wp_enqueue_script('cvca-script');
?>

<div class="cvca-images-gallery">
    <?php if ( !empty($atts['title']) ) : ?>
    <h3 class="title-block">
        <span><?php echo esc_html( $atts['title'] ); ?></span>
    </h3>
    <?php endif; ?>

    <div class="cvca-wrap_sc_images_gallery cvca-carousel <?php echo esc_attr($cvca_wrap_class) ?>" data-config='{"item":"<?php echo esc_attr($atts['columns'])?>","pagination":"<?php echo esc_attr($pagination)?>","navigation":"<?php echo esc_attr($navigation)?>"}'>
    <?php foreach ($cvca_content as $cvca_item) { ?>
        <div class="image_gallery_item"><?php
            if (isset($cvca_item['link']) && $cvca_item['link'] != '') {
                $cvca_link = vc_build_link($cvca_item['link']);
                $cvca_link_title= $cvca_link['title']!=''? ' title="'.$cvca_link['title'].'"':'';
                $cvca_link_target= $cvca_link['target']!=''? ' target="'.$cvca_link['target'].'"':'';
                $cvca_link_rel= $cvca_link['rel']!=''? ' rel="'.$cvca_link['rel'].'"':'';
                $cvca_start_link = '<a href="' . $cvca_link['url'] . '"'.$cvca_link_title.$cvca_link_target.$cvca_link_rel.'>';
                $cvca_end_link = '</a>';
            }
            echo wp_kses($cvca_start_link, $cvca_allow_tag);
            echo wp_get_attachment_image($cvca_item['image'], 'full');
            echo wp_kses($cvca_end_link, $cvca_allow_tag);
            ?>
            <?php if ( !empty($cvca_link['title']) ) : ?>
            <h4 class="item-title">
                <span><?php echo esc_html( $cvca_link['title'] ); ?></span>
            </h4>
            <?php endif; ?>
        </div>
    <?php } ?>
    </div>
</div>
