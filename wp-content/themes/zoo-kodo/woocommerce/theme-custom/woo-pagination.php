<?php
// $zoo_pag_type = 'simple';
// $zoo_block_layout = 'inc/woocommerce/content-product.php';
$zoo_pag_type = zoo_kodo_option('zoo_products_pagination');

if ($zoo_pag_type == 'infinity' || $zoo_pag_type == 'ajaxload') {
  $args = array(
      'type'                 => $zoo_pag_type,
      'delay'                => 500,
      'container_selector'   => '.products',
      'item_selector'        => '.product.status-publish',
      'prev_text'            => esc_html__('Prev Products', 'zoo-kodo'),
      'next_text'            => esc_html__('Next Products', 'zoo-kodo'),
      'no_more_text'         => esc_html__('No More Products', 'zoo-kodo'), // or use filter hook: zoo_ajax_pagination_no_more_text
  );

  zoo_ajax_pagination($GLOBALS['wp_query'], $args);
} else if ($zoo_pag_type == 'simple') {
    /* Previous/next link. */ ?>
    <div class="zoo-wrap-pagination primary-font simple">
        <div class="prev-page">
            <?php
            previous_posts_link(esc_html__('Previous page', 'zoo-kodo'));
            ?>
        </div>
        <div class="next-page">
            <?php
            next_posts_link(esc_html__('Next page', 'zoo-kodo'));
            ?>
        </div>
    </div>
    <?php
} else if ($zoo_pag_type == 'numeric') {
    add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 15 );
}
