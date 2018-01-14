<?php
/**
 * The template for displaying category pages.
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

$col = 12;
$main_class = 'main-content ';
$zoo_get_sidebar = '';
$zoo_block_layout = zoo_kodo_option( 'zoo_blog_layout' );

if ( isset( $_GET['layout'] ) ) {
    $zoo_block_layout = $_GET['layout'];
}

if ( zoo_get_sidebar() != 'none' ) {
    $col = $col - 3;
    $main_class .= 'has-left-sidebar ';
}

if ( zoo_get_sidebar( 'right' ) != 'none' ) {
    $col = $col - 3;
    $main_class .= ' has-right-sidebar';
}

if ( isset( $_GET['sidebar'] ) ) {
    $zoo_get_sidebar = $_GET['sidebar'];
}

if ( $zoo_get_sidebar == 'left' ) {
    $col = $col - 3;
    $main_class .= 'has-left-sidebar ';
}

if ( $zoo_get_sidebar == 'right' ) {
    $col = $col - 3;
    $main_class .= ' has-right-sidebar';
}

if ( $zoo_get_sidebar == 'none' ) {
    $col = 12;
    $main_class = 'main-content ';
}

$main_class .= ' col-xs-12 col-sm-12 col-md-' . $col . ' ' . $zoo_block_layout . '-layout';

get_header();
?>

<?php get_template_part( 'inc/templates/breadcrumbs' ); ?>

<main id="main" class="wrap-site-main category-page block-page">
    <div class="container">
        <div class="row">

            <?php
            if ( $zoo_get_sidebar != 'none' ) {
                get_sidebar();
            }
            ?>

            <div class="<?php echo esc_attr( $main_class ); ?>">
                <div class="row">
                    <div class="zoo-container">
                        <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                // Get layout.
                                get_template_part( 'inc/templates/posts/archive/' . $zoo_block_layout, 'layout' );
                            endwhile;
                        else :
                            // If no content, include the "No posts found" template.
                            get_template_part( 'content', 'none' );
                        endif; ?>
                    </div><!-- .zoo-container -->

                    <?php get_template_part('inc/templates/posts/post', 'pagination'); ?>
                </div>
            </div> <!-- #primary -->

            <?php
            if ( $zoo_get_sidebar != 'none' ) {
                get_sidebar( 'right' );
            }
            ?>

        </div>
    </div>
</main> <!-- #main -->

<?php
get_footer();
