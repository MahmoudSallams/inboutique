<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if (!defined('ABSPATH')) {
    exit;
}
$zoo_active_bc = zoo_kodo_option( 'zoo_site_disable_breadcrumbs' ) == '1' ? false : true;

if ( ( is_single() || is_page() ) && get_post_meta( get_the_ID(), 'zoo_disable_breadcrumbs', true ) == 1 ) {
    $zoo_active_bc = false;
}

if ( $zoo_active_bc ): 
if (!empty($breadcrumb)) {
    ?>
    <div class="wrap-breadcrumb">
        <div class="container">
            <?php
            echo ent2ncr( $wrap_before );

            foreach ($breadcrumb as $key => $crumb) {

                echo ent2ncr( $before );

                if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
                    echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
                } else {
                    echo esc_html($crumb[0]);
                }

                echo ent2ncr( $after );

                if (sizeof($breadcrumb) !== $key + 1) {
                    echo ent2ncr( $delimiter );
                }

            }
            echo ent2ncr( $wrap_after );
            if (is_single()) {
                get_template_part('woocommerce/theme-custom/single-product', 'navigation');
            }
            ?>
        </div>
    </div>
    <?php
}
endif; ?>
