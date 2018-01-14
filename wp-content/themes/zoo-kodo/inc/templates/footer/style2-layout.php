<?php
/**
 * Style2 Footer Layout
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
$zoo_main_footer = zoo_main_footer();
$zoo_footer_social = zoo_footer_social();

if ( $zoo_main_footer ) {
    if ( is_active_sidebar( 'main-footer-1-layout-3' ) || is_active_sidebar( 'main-footer-2-layout-3' ) || is_active_sidebar( 'main-footer-3-layout-3' ) || is_active_sidebar( 'main-footer-4-layout-3' ) || is_active_sidebar( 'main-footer-5-layout-3' ) ) { ?>
        <div id="main-footer" class="footer-block">
            <div class="container">
                <div class="row">
                    <div class="wrap-main-footer">
                        <div class="col-xs-12 col-sm-3 col-md-3 main-footer-block">
                            <?php dynamic_sidebar('main-footer-1-layout-3'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="row">
        						<div class="col-xs-12 col-sm-4 col-md-4 main-footer-block">
        	                        <?php dynamic_sidebar('main-footer-2-layout-3'); ?>
        	                    </div>
        						<div class="col-xs-12 col-sm-4 col-md-4 main-footer-block">
        	                        <?php dynamic_sidebar('main-footer-3-layout-3'); ?>
        	                    </div>
        						<div class="col-xs-12 col-sm-4 col-md-4 main-footer-block">
        	                        <?php dynamic_sidebar('main-footer-4-layout-3'); ?>
        	                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 main-footer-block last">
                            <?php dynamic_sidebar('main-footer-5-layout-3'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

$zoo_copyright_text = zoo_kodo_option( 'zoo_footer_copyright' );
if ( $zoo_copyright_text != '' || is_active_sidebar( 'bottom-footer' ) || $zoo_footer_social ) { ?>
    <div id="bottom-footer" class="footer-block">
        <div class="container">
            <div class="bottom-footer-container">
                <div class="row">
                    <div id="copyright" class="col-xs-12 col-sm-6">
                        <?php
                        echo wp_kses($zoo_copyright_text, array('a' => array('href' => array(), 'title' => array()), 'i' => array('class' => array()), 'br' => array('class' => array())));
                        ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 bottom-footer-block">
                        <?php if ( $zoo_footer_social ) {
                            get_template_part( 'inc/templates/social' );
                        } else {
                            dynamic_sidebar('bottom-footer');
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
