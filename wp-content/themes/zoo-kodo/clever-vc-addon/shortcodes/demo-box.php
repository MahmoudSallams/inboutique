<?php
/**
 * Demo box Shortcode
 */
wp_enqueue_style('cvca-demo-box');
$cvca_start_link = $cvca_end_link = $cvca_link_text = '';
$cvca_allow_tag = array(
    'a' => array(
        'href' => array(),
        'target' => array(),
        'rel' => array(),
        'title' => array()
    ),
    'br' => array()
);
if (isset($atts['link']) && $atts['link'] != '') {
    $cvca_link = vc_build_link($atts['link']);
    if ($cvca_link['url'] != '') {
        $cvca_start_link = '<a href="' . $cvca_link['url'] . '" title="' . $cvca_link['title'] . '" target="' . $cvca_link['target'] . '" rel="' . $cvca_link['rel'] . '">';
        $cvca_link_title= $cvca_link['title']!=''? ' title="'.$cvca_link['title'].'"':'';
        $cvca_link_target= $cvca_link['target']!=''? ' target="'.$cvca_link['target'].'"':'';
        $cvca_link_rel= $cvca_link['rel']!=''? ' rel="'.$cvca_link['rel'].'"':'';
        $cvca_start_link = '<a href="' . $cvca_link['url'] . '"'.$cvca_link_title.$cvca_link_target.$cvca_link_rel.'>';
        $cvca_end_link = '</a>';
    }
}
$cvca_class = $atts['type'] . 'style ' . $atts['el_class'];
if($atts['box_shadow']){
    $cvca_class .=' box_shadow';
}
$cvca_class .= ' ' . $atts['style'];
$cvca_icon = $atts['custom_icon'] != '' ? $atts['custom_icon']:$atts['icon'];
$cvca_class .= apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($atts['css'], ' '), 'CleverDemoBox', $atts);
?>
<div class="cvca-demo-box <?php echo esc_attr($cvca_class) ?>"
     <?php if($atts['animation_type']!='none'&&$atts['animation_type']!=''){?>animation="<?php echo esc_attr($atts['animation_type']) ?>"<?php }?>>
    <?php if ($atts['type'] == 'text'): ?>
        <div class="cvca-header-demo-box">
            <?php if ($cvca_icon != '') {
                echo wp_kses($cvca_start_link, $cvca_allow_tag);
                ?>
                <i class="<?php echo esc_attr($cvca_icon) ?>"></i>
                <?php
                echo wp_kses($cvca_end_link, $cvca_allow_tag);
            }
            ?>
            <?php if ($atts['title'] != '') { ?>
                <h3 class="title-demo-box">
                    <?php
                    echo wp_kses($cvca_start_link, $cvca_allow_tag);
                    echo esc_html($atts['title']);
                    echo wp_kses($cvca_end_link, $cvca_allow_tag);
                    ?>
                </h3>
            <?php } ?>
        </div>
        <?php if ($atts['description'] != '') { ?>
            <div class="description">
                <?php echo ent2ncr($atts['description']) ?>
            </div>
        <?php } ?>
    <?php else:
        if ($atts['style'] == 'standard') {
            ?>
            <div class="cvca-wrap-img">
                <div class="mask primary-font <?php echo esc_attr($atts['coming_label'] != '' ? 'coming-soon' : '') ?>"
                     style="background:<?php echo esc_attr($atts['mask_color']); ?>">
                    <?php if ($atts['coming_label'] != '') {
                        if (isset($atts['text_link'])) {
                            echo wp_kses($cvca_start_link, $cvca_allow_tag);
                            echo esc_html($cvca_link_text);
                            echo wp_kses($cvca_end_link, $cvca_allow_tag);
                        }
                    } else {
                        echo esc_html__('Coming soon', 'zoo-kodo');
                    } ?>
                </div>
                <?php if ($atts['hot_label'] != '') { ?><span
                        class="demobox-label hot-label"><?php echo esc_html__('Hot', 'zoo-kodo'); ?></span>
                <?php }
                if ($atts['new_label'] != '') { ?><span
                        class="demobox-label new-label"><?php echo esc_html__('New', 'zoo-kodo'); ?></span>
                <?php }
                echo wp_kses($cvca_start_link, $cvca_allow_tag);
                echo wp_get_attachment_image($atts['image'], 'full');
                echo wp_kses($cvca_end_link, $cvca_allow_tag);
                ?>
            </div>
            <?php if ($atts['title'] != '') { ?>
                <h3 class="title-demo-box">
                    <?php
                    echo wp_kses($cvca_start_link, $cvca_allow_tag);
                    echo esc_html($atts['title']);
                    echo wp_kses($cvca_end_link, $cvca_allow_tag); ?>
                </h3>
            <?php } ?>
            <?php if ($atts['description'] != '') { ?>
                <div class="description">
                    <?php echo ent2ncr($atts['description']) ?>
                </div>
            <?php }
        } else {
            ?>
            <div class="cvca-header-demo-box">
                <?php echo wp_kses($cvca_start_link, $cvca_allow_tag);
                echo wp_get_attachment_image($atts['image'], 'full');
                echo wp_kses($cvca_end_link, $cvca_allow_tag); ?>
                <?php if ($atts['title'] != '') { ?>
                    <h3 class="title-demo-box">
                        <?php
                        echo wp_kses($cvca_start_link, $cvca_allow_tag);
                        echo esc_html($atts['title']);
                        echo wp_kses($cvca_end_link, $cvca_allow_tag);
                        ?>
                    </h3>
                <?php } ?>
            </div>
            <?php if ($atts['description'] != '') { ?>
                <div class="description">
                    <?php echo ent2ncr($atts['description']) ?>
                </div>
            <?php } ?>
        <?php } endif; ?>
</div>
