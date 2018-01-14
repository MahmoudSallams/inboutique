<?php
/**
 * Search form
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>
<div class="header-search-block <?php echo zoo_kodo_option('zoo_site_search_box_layout'); ?>">
    <?php if ( is_plugin_active( 'ajax-search-lite/ajax-search-lite.php' ) ) : ?>
        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    <?php else : ?>
        <form method="get" class="default-search clearfix" action="<?php echo esc_url( home_url('/') ); ?>">
            <input type="text" class="ipt text-field body-font" name="s"
                   placeholder="<?php echo esc_html__( 'Type & hit enter...', 'zoo-kodo' ); ?>" autocomplete="off"/>
            <i class="cs-font clever-icon-search-5"></i>
        </form>
    <?php endif; ?>
</div>
