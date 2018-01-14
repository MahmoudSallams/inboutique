<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 */
$zoo_sidebar = zoo_kodo_option( 'zoo_shop_sidebar' );

if ( is_single() ) {
    $zoo_sidebar = zoo_kodo_option( 'zoo_single_product_sidebar' );
}
?>
<aside id="zoo-woo-sidebar-right" class="sidebar zoo-woo-sidebar widget-area col-xs-12 col-sm-12 col-md-3">
    <a href="javascript:;" class="close-btn close-sidebar" title="<?php esc_attr__( 'Close','zoo-kodo' ); ?>"><i class="cs-font clever-icon-close"></i> </a>
    <div class="content-zoo-woo-sidebar">
        <?php dynamic_sidebar( $zoo_sidebar ); ?>
    </div>
</aside><!-- .widget-area -->
