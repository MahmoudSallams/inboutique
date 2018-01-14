<?php
/**
 * The template for displaying all single posts.
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

get_header();

$col = 12;
$main_class = 'main-content content-single';

if ( zoo_get_sidebar() != 'none' ) {
    $col = $col - 3;
    $main_class .= 'has-left-sidebar ';
}

if ( zoo_get_sidebar( 'right' ) != 'none' ) {
    $col = $col - 3;
    $main_class .= ' has-right-sidebar';
}

$main_class .= ' col-xs-12 col-sm-12 col-md-' . $col;

get_header();

get_template_part( 'inc/templates/breadcrumbs' );
?>
    <main id="main" class="wrap-site-main single-post">
        <div class="container">
            <div class="row">

                <?php get_sidebar(); ?>

                <div class="<?php echo esc_attr( $main_class ); ?>">
                    <?php if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            get_template_part( 'content', 'single' );
                        endwhile;
                    endif; ?>
                </div> <!-- #primary -->

                <?php get_sidebar( 'right' ); ?>

            </div>
        </div>
    </main> <!-- #main -->
<?php
get_footer();
