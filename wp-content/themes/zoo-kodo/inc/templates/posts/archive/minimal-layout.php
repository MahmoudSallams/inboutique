<?php
/**
 * List layout for post
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
$class = 'zoo-blog-item layout-item minimal-layout-item col-xs-12';
?>
<article <?php echo post_class( $class ) ?>>
    <div class="zoo-post-inner">
        <div class="post-info">
            <span class="post-date"><?php echo esc_html( get_the_date() ); ?> </span>
        </div>

        <?php the_title( sprintf( '<h3 class="entry-title title-post"><a href="%s" rel="' . esc_html__( 'bookmark', 'zoo-kodo' ) . '">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

        <?php get_template_part( 'inc/templates/posts/archive/media' ); ?>
    </div>
</article>
