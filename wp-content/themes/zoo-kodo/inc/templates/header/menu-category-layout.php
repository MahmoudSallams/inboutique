<?php
/**
 * Menu Category 2 layout.
 * Template of Zoo Kodo
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
$zoo_sticky = zoo_header_stick();
?>
<div class="wrap-header-block header-category-layout">
    <div id="bottom-header" class=" <?php echo esc_attr($zoo_sticky) ?>">
        <div class="container">
            <a id="menu-mobile-trigger" href="javascript:;"
               class="mobile-menu-icon">
                <i class="clever-icon-menu-1 cs-font"></i>
                <i class="cs-font clever-icon-close"></i>
            </a>
            <a href="javascript:;" class="search-trigger" title="<?php echo esc_attr__('Toogle Search block', 'zoo-kodo') ?>">
              <i class="cs-font clever-icon-search-4"></i>
              <i class="cs-font clever-icon-close"></i>
            </a>
            <div id="site-branding">
                <?php get_template_part('inc/templates/logo'); ?>
            </div>
            <?php get_template_part('inc/templates/sticky-logo'); ?>
            <div id="main-navigation" class="primary-nav menu-category-block">

                <?php get_template_part('inc/templates/navigation'); ?>
            </div>
            <?php get_template_part('inc/templates/header/icon', 'header'); ?>
        </div>
    </div>
</div>
