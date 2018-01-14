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
$class = 'zoo-blog-item layout-item list-layout-item col-xs-12';
?>
<article <?php echo post_class( $class ) ?>>
    <div class="zoo-post-inner">

        <?php get_template_part( 'inc/templates/posts/post', 'media' ); ?>

        <div class="wrap-main-post">
            <?php
            get_template_part( 'inc/templates/posts/archive/post', 'info' );

            the_title( sprintf( '<h3 class="entry-title title-post"><a href="%s" rel="' . esc_html__( 'bookmark', 'zoo-kodo' ) . '">', esc_url( get_permalink() ) ), '</a></h3>' );
            ?>
            <?php if( zoo_kodo_option( 'zoo_blog_show_excerpt' ) ) : ?>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            <?php endif; ?>
            <a href="<?php echo esc_url( the_permalink() ); ?>" class="readmore"><?php echo esc_html__( 'Continue reading', 'zoo-kodo' ); ?><i class="cs-font clever-icon-arrow-bold"></i> </a>
        </div>
    </div>
</article>
