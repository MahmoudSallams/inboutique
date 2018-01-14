<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>

<article id="post-<?php the_ID(); ?>" <?php  post_class( 'post-item' ); ?>>
    <div class="post-media">
        <?php get_template_part( 'inc/templates/posts/post', 'media' ); ?>
    </div>

    <div class="header-post">
        <?php the_title( '<h1 class="title-detail">', '</h1>' ); ?>
    </div>

    <?php get_template_part( 'inc/templates/posts/single/post-info' ); ?>

    <div class="post-content">
        <?php the_content(); ?>
    </div>
    <?php
    get_template_part( 'inc/templates/inpost', 'pagination' );

    /* Allow custom below */
    get_template_part( 'inc/templates/posts/single/post', 'social' );
    get_template_part( 'inc/templates/posts/single/post', 'pagination' );
    get_template_part( 'inc/templates/posts/single/about', 'author' );
    get_template_part( 'inc/templates/posts/single/related', 'posts' );
    ?>

</article> <!-- #post-## -->

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
    comments_template( '', true );
}
