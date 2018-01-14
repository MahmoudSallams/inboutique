<?php
/**
 * The template for displaying archive pages.
 *
 * @package     Zoo Theme
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

get_header();

$zoo_block_layout = zoo_kodo_option( 'zoo_blog_layout' );

get_template_part( 'inc/templates/breadcrumbs' );
?>

<main id="main" class="wrap-site-main archive-page block-page">
    <div class="container">
        <div class="row">
            <div id="content" class="main-content author-page">
                <div class="col-xs-12 col-sm-12">
                    <!-- This sets the $curauth variable -->
                    <?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>

                    <?php if ( !empty( $curauth->user_url ) ) : ?>
                        <?php if ( !empty( $curauth->nickname ) ) : ?>
                            <h2><?php esc_html_e( 'About', 'zoo-kodo' ); ?>: <?php echo esc_html( $curauth->nickname ); ?></h2>
                        <?php endif; ?>

                        <dl>
                            <dt><?php esc_html_e( 'Website', 'zoo-kodo' ); ?></dt>
                            <dd><a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a></dd>
                            <dt><?php esc_html_e( 'Profile', 'zoo-kodo' ); ?></dt>
                            <dd><?php echo esc_html( $curauth->user_description ); ?></dd>
                        </dl>
                    <?php endif; ?>

                    <h2><?php esc_html_e( 'Posts by', 'zoo-kodo' ); ?> <?php echo esc_html( $curauth->nickname ); ?>:</h2>
                </div>
                <div class="zoo-container">
                    <?php if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            // Get layout.
                            get_template_part( 'inc/templates/posts/archive/' . $zoo_block_layout, 'layout' );
                        endwhile;
                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );
                    endif; ?>
                </div> <!-- .zoo-container -->

                <?php get_template_part('inc/templates/posts/post', 'pagination'); ?>
            </div>
        </div>
    </div>
</main> <!-- #main -->

<?php
get_footer();
