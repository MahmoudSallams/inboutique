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

if ( $zoo_main_footer ) {
    if ( is_active_sidebar( 'main-footer-layout-2' ) ) { ?>
        <div id="main-footer" class="footer-block">
            <div class="container">
                <div class="wrap-main-footer">
                    <div class="main-footer-block">
                        <?php dynamic_sidebar('main-footer-layout-2'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

$zoo_copyright_text = zoo_kodo_option( 'zoo_footer_copyright' );
if ( $zoo_copyright_text != '' ) { ?>
    <div id="bottom-footer" class="footer-block">
        <div class="container">
            <div class="bottom-footer-container">
                <div class="row">
                    <div id="copyright" class="col-xs-12 col-sm-12">
                        <?php echo wp_kses($zoo_copyright_text, array('a' => array('href' => array(), 'title' => array()), 'i' => array('class' => array()), 'br' => array('class' => array()))); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
