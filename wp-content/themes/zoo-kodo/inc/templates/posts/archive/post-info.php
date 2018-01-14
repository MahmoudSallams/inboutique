<?php
/**
 * Block information for post
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>
<div class="post-info">
    <span class="author-post">
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
            <?php echo esc_html( get_the_author() ); ?>
        </a>
    </span>
    <span class="post-date"><?php echo esc_html( get_the_date() ); ?> </span>
</div>
