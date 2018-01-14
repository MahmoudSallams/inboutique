<?php
/**
 * Block information for post
 *
 * @package     Zoo Theme
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>
<div class="post-info">
    <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
    <span class="post-comment"><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?>.</span>
</div>
