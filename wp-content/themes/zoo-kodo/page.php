<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

get_header();

get_template_part( 'inc/templates/breadcrumbs' );
?>
    <main id="main" class="single-page<?php echo ( get_post_meta( get_the_ID(), 'zoo_site_page_toc', true ) == '1' ) ? ' page-toc' : '';?>">
        <div class="container">
            <?php while ( have_posts() ) : the_post();
                /* Include the page content template. */
                get_template_part( 'content', 'page' );

                /* If comments are open or we have at least one comment, load up the comment template. */
                if ( comments_open() || get_comments_number() ) {
                    comments_template( '', true );
                }
            endwhile; ?>
        </div>
    </main> <!-- #main -->
<?php
get_footer();
