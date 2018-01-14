<?php
/**
 * Display layout control of product page
 */
?>
<ul class="layout-control-block">
    <?php if(zoo_woo_sidebar()!='no-sidebar'){?>
    <li class="control-item sidebar-control">
        <a href="javascript:;" class="<?php echo esc_attr(zoo_woo_sidebar_status())?>" title="<?php echo esc_attr__('Show/Hide Sidebar','zoo-kodo');?>">
            <i class="cs-font clever-icon-slider-2" aria-hidden="true"></i>
        </a>
    </li>
    <?php }?>
    <li class="control-item">
        <a href="javascript:;" title="<?php echo esc_attr__('Switch to Grid Layout','zoo-kodo');?>" class="layout-control grid-layout <?php echo esc_attr(zoo_woo_layout()=='grid'?'active':'')?>">
            <i class="cs-font clever-icon-grid"></i>
        </a>
    </li>
    <li class="control-item">
        <a href="javascript:;" title="<?php echo esc_attr__('Switch to List Layout','zoo-kodo');?>"  class="layout-control list-layout  <?php echo esc_attr(zoo_woo_layout()=='list'?'active':'')?>">
            <i class="cs-font clever-icon-list"></i>
        </a>
    </li>
</ul>
