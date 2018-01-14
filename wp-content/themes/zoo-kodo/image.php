<?php
/**
 * The template for displaying image attachments
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <nav id="image-navigation" class="navigation image-navigation">
                        <div class="nav-links">
                            <div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'zoo-kodo' ) ); ?></div><div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'zoo-kodo' ) ); ?></div>
                        </div> <!-- .nav-links -->
                    </nav> <!-- .image-navigation -->

                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header> <!-- .entry-header -->

                    <div class="entry-content">

                        <div class="entry-attachment">
                            <?php
                                $image_size = apply_filters( 'zoo_theme_attachment_size', 'large' );
                                echo wp_get_attachment_image( get_the_ID(), $image_size );
                            ?>

                            <?php if ( has_excerpt() ) : ?>
                                <div class="entry-caption">
                                    <?php the_excerpt(); ?>
                                </div> <!-- .entry-caption -->
                            <?php endif; ?>

                        </div> <!-- .entry-attachment -->

                        <?php
                            the_content();
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'zoo-kodo' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'zoo-kodo' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ) );
                        ?>
                    </div> <!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php zoo_entry_meta(); ?>
                        <?php edit_post_link( esc_html__( 'Edit', 'zoo-kodo' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer> <!-- .entry-footer -->

                </article> <!-- #post-## -->

                <?php
                    /* Previous/next post navigation. */
                    the_post_navigation( array(
                        'prev_text' => esc_html_x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'zoo-kodo' ),
                    ) );
                ?>

                <?php
                    /* If comments are open or we have at least one comment, load up the comment template */
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                ?>
            <?php endwhile; ?>
        </div>
    </main> <!-- .site-main -->
</div> <!-- .content-area -->

<?php get_footer(); ?>
