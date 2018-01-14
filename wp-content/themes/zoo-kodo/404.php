<?php
/**
 * The template for displaying 404 pages (not found).
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
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( '404', 'zoo-kodo' ); ?></h1>
                </header> <!-- .page-header -->

                <div class="page-content error-404-content">
                    <p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'zoo-kodo' ); ?></p>

                    <?php get_search_form(); ?>
                </div> <!-- .page-content -->
            </section> <!-- .error-404 -->
        </div>
    </main> <!-- .site-main -->
</div> <!-- .content-area -->

<?php get_footer(); ?>
