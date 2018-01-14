<?php
/**
 * Post pagination template
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

$zoo_pag_type = zoo_kodo_option('zoo_blog_pagination');

if ($zoo_pag_type == 'infinity' || $zoo_pag_type == 'ajaxload') {
  $args = array(
     'type'                 => $zoo_pag_type,                             // If not this option, type will set by 'zoo_blog_pagination' customizer controll.
     'delay'                => 500,
     'container_selector'   => '.zoo-container',
     'item_selector'        => '.post',
     'more_text'            => esc_html__('Load More', 'zoo-kodo'),     // or use filter hook: zoo_ajax_pagination_more_text
     'no_more_text'         => esc_html__('No More Posts', 'zoo-kodo'), // or use filter hook: zoo_ajax_pagination_no_more_text
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
    the_posts_pagination( array(
        'prev_text'          =>'<i class="cs-font clever-icon-arrow-left"></i>',
        'next_text'          => '<i class="cs-font clever-icon-arrow-right"></i>',
        'before_page_number' => '',
    ) );
}