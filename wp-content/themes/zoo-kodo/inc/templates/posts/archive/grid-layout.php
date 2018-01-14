<?php
/**
 * Grid layout for post
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
$class = 'zoo-blog-item layout-item grid-layout-item ';
switch ( zoo_kodo_option( 'zoo_blog_col' ) ) {
    case '2':
        $class .= "col-xs-12 col-sm-6";
        break;
    case '3':
        $class .= "col-xs-12 col-sm-4";
        break;
    case '4':
        $class .= "col-xs-12 col-sm-3";
        break;
    case '5':
        $class .= "col-xs-12 col-sm-1-5";
        break;
    case '6':
        $class .= "col-xs-12 col-sm-2";
        break;
    default:
        $class .= "col-xs-12 col-sm-12";
        break;
}
?>
<article <?php echo post_class( $class ); ?>>
    <div class="zoo-post-inner">
        <div class="post-media">
            <?php get_template_part( 'inc/templates/posts/post', 'media' ); ?>
        </div>
        <?php the_title( sprintf( '<h3 class="entry-title title-post"><a href="%s" rel="' . esc_html__( 'bookmark', 'zoo-kodo' ) . '">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        <?php get_template_part( 'inc/templates/posts/archive/post', 'info' ); ?>
        <?php if( zoo_kodo_option( 'zoo_blog_show_excerpt' ) ) : ?>
	        <div class="entry-content">
	                <?php the_excerpt(); ?>
	        </div>
        <?php endif; ?>

        <div class="entry-action">
            <a href="<?php echo esc_url( the_permalink() ); ?>" class="btn-readmore"><?php echo esc_html__( 'Continue reading', 'zoo-kodo' ); ?></a>
        </div>
    </div>
</article>
