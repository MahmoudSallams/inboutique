<?php
/**
 * Default site footer
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
$zoo_top_footer = zoo_top_footer();
$zoo_footer_layout = zoo_footer_layout();
$zoo_footer_class = 'wrap-' . $zoo_footer_layout . '-layout';

if ( $zoo_top_footer ) {
    $zoo_footer_class .= ' top-footer-active';
}
?>
            <footer id="zoo-footer" class="<?php echo esc_attr( $zoo_footer_class ) ?>">
                <div class="wrap-footer-view-btn">
                    <a href="javascript:;" class="footer-view btn" data-text="<?php esc_attr_e( 'Show Less', 'zoo-kodo' ); ?>"><?php esc_html_e( 'Show More', 'zoo-kodo' ); ?></a>
                </div>

                <?php
                if ( $zoo_top_footer ) {
                    get_template_part( '/inc/templates/footer/top', 'footer' );
                }

                get_template_part( '/inc/templates/footer/' . $zoo_footer_layout, 'layout' );
                ?>

                <div id="back-to-top"><i class="cs-font clever-icon-up"></i></div> <!-- #back-to-top -->
            </footer>



            <?php if ( zoo_kodo_option( 'zoo_site_layout' ) == 'boxed' || get_post_meta( get_the_ID(), 'zoo_site_layout', true ) == 'boxed' ) : ?>
                </div>
            <?php endif; ?>
            <?php if ( get_post_meta( get_the_ID(), 'zoo_site_page_toc', true ) == '1' ) : ?>
                <div id="fp-nav" class="right">
                    <ul></ul>
                </div>
            <?php endif; ?>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>
