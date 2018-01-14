<?php
/**
 * Menu Right layout.
 * Template of Zoo Kodo
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
get_template_part('/inc/templates/search', 'form');

if ( zoo_header_layout() == 'menu-category' ) {
    echo '<div class="block-right pull-right">';
    get_template_part('inc/templates/top', 'menu');
}

?>
<ul id="icon-header" class="list-icon <?php echo zoo_kodo_option('zoo_site_search_box_layout'); ?>-icon">
    <li class="search">
      <a href="javascript:;" class="header-link search-trigger" title="<?php echo esc_attr__('Toogle Search block', 'zoo-kodo') ?>">
        <i class="cs-font clever-icon-search-4"></i>
        <i class="cs-font clever-icon-close"></i>
      </a>
    </li>
    <?php if (class_exists('WooCommerce')) {
        if (!zoo_woo_catalog_mod()) { ?>
            <?php if ( is_plugin_active( 'yith-woocommerce-wishlist/init.php' ) && !zoo_kodo_option( 'zoo_product_disable_wishlist_button' ) && class_exists( 'YITH_WCWL' ) ) : ?>
                <?php $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
                <li class="header-link header-wishlist">
                    <a href="<?php echo esc_url( $wishlist_url )?>"><i class="cs-font clever-icon-heart-o"></i></a>
                </li>
            <?php endif; ?>
            <li class="header-link top-ajax-cart">
                <?php get_template_part('woocommerce/theme-custom/topheadcart'); ?>
            </li>
            <?php
        }
    } ?>
    <?php if ( is_active_sidebar( 'menu-action') ) : ?>
    <li class="menu-action-wrap">
      <div class="menu-action-block">
        <a href="javascript:;" class="header-link action-trigger">
          <i class="cs-font clever-icon-three-dots"></i>
        </a>
        <div class="menu-action-dropdown">
          <a class="menu-action-close"><i class="cs-font clever-icon-close"></i></a>
            <div id="menu-action">
            	<?php dynamic_sidebar( 'menu-action' ); ?>
            </div>
        </div>
        <div class="action-mask-close"></div>
      </div>
    </li>
    <?php endif; ?>
</ul>
<?php
if ( zoo_header_layout() == 'menu-category' ) {
    echo '</div>';
}
