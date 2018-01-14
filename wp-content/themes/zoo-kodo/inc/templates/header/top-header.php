<?php
/**
 * Top Header Template
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

$showTopHead = false;

if ( zoo_kodo_option( 'zoo_header_top' ) && ( is_active_sidebar( 'top-left-header' ) || is_active_sidebar( 'top-right-header' ) ) ) {
    $showTopHead = true;
}

if ( is_single() || is_page() ) {
    if ( get_post_meta( get_the_ID(), 'zoo_header_top', true ) == true ) {
        $showTopHead = true;
    }
}

?>

<?php if ( $showTopHead ) : ?>
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7" id="top-left-header">
                    <?php dynamic_sidebar('top-left-header'); ?>
                </div>
                <div class="col-xs-12 col-sm-5" id="top-right-header">
                    <?php dynamic_sidebar( 'top-right-header' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
