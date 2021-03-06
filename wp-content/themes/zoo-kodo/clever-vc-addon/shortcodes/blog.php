<?php
/**
 * Blog Shortcode
 */
wp_enqueue_style('cvca-style');
$wrapID = 'shortcode_blog_' . uniqid();
$args = array(
    'post_type' => 'post',
    'posts_per_page' => ($atts['number'] > 0) ? $atts['number'] : get_option('posts_per_page')
);
if ($atts['cat'] != '') {
    if ($atts['parent']) {
        $args['category_name'] = $atts['cat'];
    } else {
        $catid = array();
        foreach (explode(',', $atts['cat']) as $catslug) {
            $catid[] .= get_category_by_slug($catslug)->term_id;
        }
        $args['category__in'] = $catid;
    }
}
if ($atts['post_in'] != '') {
    $args['post__in'] = explode(",", $atts['post_in']);
}
if (!isset($atts['paged'])) {
    $args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
} else {
    $args['paged'] = $atts['paged'];
}
$the_query = new WP_Query($args);
$layout = $atts['layout'];
$wrapClass = $atts['el_class'] . ' ' . $atts['layout'];
$wrapClass .= ' cvca-blog-shortcode';
if ($atts['animation_type'] != '' && $atts['animation_type'] != 'none') {
    wp_enqueue_style('animations');
}
if ($atts['layout'] == 'grid') {
    $wrapClass .= ' grid-' . $atts['columns'] . '-col';
}
?>
<div id="<?php echo esc_attr($wrapID); ?>" class="<?php echo esc_attr($wrapClass) ?>">
    <?php
    if ($atts['title'] != '') {
        ?>
        <h3 class="title-block"><?php echo esc_html($atts['title']) ?> </h3>
        <?php
    }
    if ($the_query->have_posts()):
        if ($atts['layout'] != 'grid') {
            ?>
            <div class="row">
            <?php
        }
        while ($the_query->have_posts()): $the_query->the_post();
            if ($atts['layout'] == 'grid') {
                echo cvca_get_shortcode_view('post-layout/grid-layout', $atts);
            } else {
                echo cvca_get_shortcode_view('post-layout/list-layout', $atts);
            }
        endwhile;
        if ($atts['layout'] != 'grid') {
            ?>
            </div>
            <?php
        }
        //paging
        if ($atts['pagination'] == 'standard') :
            if (function_exists("cvca_pagination")) :
                cvca_pagination(3, $the_query, '', '<i class="fa fa-angle-double-left" aria-hidden="true"></i> ' . esc_html__('Previous', 'zoo-kodo'), esc_html__('Next', 'zoo-kodo') . ' <i class="fa fa-angle-double-right" aria-hidden="true"></i>');
            endif;
        //end paging
        endif;
    endif;
    wp_reset_postdata();
    ?>
</div>
