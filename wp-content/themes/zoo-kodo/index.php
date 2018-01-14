<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
$col = 12;
$zoo_block_layout = zoo_kodo_option( 'zoo_blog_layout' );
$main_class = 'main-content ';

if ( zoo_get_sidebar() != 'none' ) {
    $col = $col - 3;
    $main_class .= 'has-left-sidebar ';
}

if ( zoo_get_sidebar( 'right' ) != 'none' ) {
    $col = $col - 3;
    $main_class .= ' has-right-sidebar';
}

$main_class .= ' col-xs-12 col-sm-12 col-md-' . $col . ' ' . $zoo_block_layout . '-layout';

get_header();
?>
<?php get_template_part( 'inc/templates/breadcrumbs' ); ?>
    <main id="main" class="wrap-site-main index-page">
        <div class="container">
            <div class="row">

                <?php get_sidebar(); ?>

                <div class="<?php echo esc_attr( $main_class ); ?>">
                    <div class="row">
                        <div class="zoo-container">
                            <?php if ( have_posts() ) : ?>
                                <?php
                                while ( have_posts() ) : the_post();
                                    /* Get layout. */
                                    get_template_part( 'inc/templates/posts/archive/' . $zoo_block_layout, 'layout' );
                                endwhile;
                                ?>
                            <?php else : ?>
                                <?php
                                /* If no content, include the "No posts found" template. */
                                get_template_part( 'content', 'none' );
                                ?>
                            <?php endif; ?>
                        </div> <!-- .zoo-container -->

                        <?php get_template_part('inc/templates/posts/post', 'pagination'); ?>
                    </div>
                </div>

                <?php get_sidebar( 'right' ); ?>
                
            </div>
        </div>
    </main> <!-- #main -->
<?php
get_footer();