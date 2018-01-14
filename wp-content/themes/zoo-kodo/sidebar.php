<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>
<?php if ( zoo_get_sidebar() != 'none' ) : ?>
    <aside id="sidebar-left" class="sidebar widget-area col-xs-12 col-sm-12 col-md-3">
        <?php dynamic_sidebar( zoo_get_sidebar() ); ?>
    </aside> <!-- .sidebar -->
<?php endif; ?>
