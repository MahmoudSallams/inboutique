<?php
/**
 * The template for displaying the header
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="zoo-mask"></div>
    <div id="quick-view-before-loading"><span class="quick-block-center"><i class="moving"></i></span></div>
    <div id="page" class="site">
        <?php
        /* Header class */
        $zoo_class_header = '';
        $zoo_header_top = zoo_enable_header_top();
        $zoo_header_layout = zoo_header_layout();
        $zoo_class_header .= zoo_header_fullwidth() . ' ' . $zoo_header_layout . ' ' . zoo_header_transparent();

        if ( 'stack-center' != $zoo_header_layout &&'stack-center-2' != $zoo_header_layout && $zoo_header_layout != 'vertical' ) {
            $zoo_class_header .= ' one-line';
        }
        ?>

        <?php if ( zoo_kodo_option( 'zoo_site_layout' ) == 'boxed' || get_post_meta( get_the_ID(), 'zoo_site_layout', true ) == 'boxed' ) : ?>
            <div class="layout-boxes container <?php if( zoo_kodo_option( 'zoo_site_layout_box_shadow' ) == 1 || ( get_post_meta( get_the_ID(), 'zoo_site_layout', true ) == 'boxed' && get_post_meta( get_the_ID(), 'zoo_site_layout_box_shadow', true ) == '1' ) ){ echo esc_attr( 'box-shadow' ); } ?>">
        <?php endif; ?>

        <div class="wrap-mobile-nav">
            <a class="close-nav"><i class="cs-font clever-icon-close"></i> </a>
            <div class="search-wrap zoo_kodo-search">
                <form method="get" class="clearfix" action="<?php echo esc_url( home_url('/') ); ?>">
                    <input type="text" class="ipt text-field body-font" name="s"
                           placeholder="<?php echo esc_html__( 'Type & hit enter...', 'zoo-kodo' ); ?>" autocomplete="off"/>
                    <i class="cs-font clever-icon-search-4"></i>
                </form>
            </div>
            <nav id="mobile-nav" class="primary-font">
                <?php
                if ( has_nav_menu( 'mobile' ) ) {
                    wp_nav_menu( array( 'container_class' => 'mobile-menu', 'theme_location' => 'mobile' ) );
                } else {
                    wp_nav_menu( array( 'container_class' => 'main-menu', 'container'=>'nav' ) );
                }
                ?>
            </nav>
        </div>

        <header id="zoo_kodo-header" class="wrap-header <?php echo esc_attr( $zoo_class_header ); ?>">
            <?php
            if ( $zoo_header_top ) {
                get_template_part( '/inc/templates/header/top', 'header' );
            }

            get_template_part( '/inc/templates/header/' . $zoo_header_layout, 'layout' );
            ?>
        </header>
        <?php get_template_part( '/inc/templates/cover', 'layout' ); ?>
