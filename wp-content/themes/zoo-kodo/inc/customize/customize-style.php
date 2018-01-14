<?php
/**
 * Import customize style
 *
 * @return Css inline at header.
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
// Render css customize
add_action( 'wp_enqueue_scripts', 'zoo_enqueue_render', 1000 );
if(!function_exists('zoo_enqueue_render')){
    function zoo_enqueue_render() {
    // Load custom style
        wp_add_inline_style( 'zoo-kodo', zoo_customize_style() );
    }
}

if(!function_exists('zoo_customize_style')){
    function zoo_customize_style() {

        /* ----------------------------------------------------------
                                    Typography
        ---------------------------------------------------------- */
        $zoo_fonts = array();
        $zoo_fonts[] = $body_font = zoo_kodo_option( 'zoo_typo_body_font' );
        $zoo_fonts[] = $heading_font = zoo_kodo_option( 'zoo_typo_heading_font' );
        $zoo_fonts[] = $navigation_font = zoo_kodo_option( 'zoo_typo_navigation_font' );

        $body_font_family = $body_font['font-family'];
        $body_font_size = $body_font['font-size'];
        $body_font_weight = ( $body_font['variant'] == 'regular' ) ? 'normal' : $body_font['variant'];
        $body_font_line_height = $body_font['line-height'];
        $body_font_letter_spacing = $body_font['letter-spacing'];

        $heading_font_family = $heading_font['font-family'];
        $heading_font_weight = ( $heading_font['variant'] == 'regular' ) ? 'normal' : $heading_font['variant'];
        $heading_font_letter_spacing = $heading_font['letter-spacing'];

        $navigation_font_family = $navigation_font['font-family'];
        $navigation_font_size = $navigation_font['font-size'];
        $navigation_font_weight = ( $navigation_font['variant'] == 'regular' ) ? 'normal' : $navigation_font['variant'];
        $navigation_font_line_height = $navigation_font['line-height'];
        $navigation_font_letter_spacing = $navigation_font['letter-spacing'];

        if ( zoo_kodo_option( 'zoo_typo_body_font_choices' ) == 'custom-font' ) {
            $body_font_family = 'FuturaStd';
            $body_font_size = zoo_kodo_option( 'zoo_typo_body_font_size' );
            $body_font_weight = zoo_kodo_option( 'zoo_typo_body_font_variant' );
            $body_font_line_height = zoo_kodo_option( 'zoo_typo_body_font_line_height' );
            $body_font_letter_spacing = zoo_kodo_option( 'zoo_typo_body_font_letter_spacing' );
        }

        if ( zoo_kodo_option( 'zoo_typo_heading_font_choices' ) == 'custom-font' ) {
            $heading_font_family = 'FuturaStd';
            $heading_font_weight = zoo_kodo_option( 'zoo_typo_heading_font_variant' );
            $heading_font_letter_spacing = zoo_kodo_option( 'zoo_typo_heading_font_letter_spacing' );
        }

        if ( zoo_kodo_option( 'zoo_typo_navigation_font_choices' ) == 'custom-font' ) {
            $navigation_font_family = 'FuturaStd';
            $navigation_font_size = zoo_kodo_option( 'zoo_typo_navigation_font_size' );
            $navigation_font_weight = zoo_kodo_option( 'zoo_typo_navigation_font_variant' );
            $navigation_font_line_height = zoo_kodo_option( 'zoo_typo_navigation_font_line_height' );
            $navigation_font_letter_spacing = zoo_kodo_option( 'zoo_typo_navigation_font_letter_spacing' );
        }

        $heading_size_h1 = zoo_kodo_option( 'zoo_typo_heading_size_h1' );
        $heading_size_h2 = zoo_kodo_option( 'zoo_typo_heading_size_h2' );
        $heading_size_h3 = zoo_kodo_option( 'zoo_typo_heading_size_h3' );
        $heading_size_h4 = zoo_kodo_option( 'zoo_typo_heading_size_h4' );
        $heading_size_h5 = zoo_kodo_option( 'zoo_typo_heading_size_h5' );
        $heading_size_h6 = zoo_kodo_option( 'zoo_typo_heading_size_h6' );

        $css = "";

        /* Import fonts */
        if ( !empty( $zoo_fonts ) && ( zoo_kodo_option( 'zoo_typo_body_font_choices' ) != 'custom-font' || zoo_kodo_option( 'zoo_typo_heading_font_choices' ) != 'custom-font' || zoo_kodo_option( 'zoo_typo_navigation_font_choices' ) != 'custom-font' ) ) {
            $css .= '@import url("' . zoo_custom_import_fonts($zoo_fonts) . '");';
        }

        /* Body font */
        $css .= "body {";
            if ( !empty( $body_font_family ) ) {
                $css .= "font-family: '{$body_font_family}', sans-serif;";
            }

            if ( !empty( $body_font_size ) ) {
                $css .= "font-size: {$body_font_size};";
            }

            if ( !empty( $body_font_weight ) ) {

                $css .= "font-weight: {$body_font_weight};";
            }

            if ( !empty( $body_font_line_height ) ) {
                $css .= "line-height: {$body_font_line_height};";
            }

            if ( !empty( $body_font_letter_spacing ) ) {
                $css .= "letter-spacing: {$body_font_letter_spacing};";
            }

        $css .= "}";

        /* Heading font */

        if ( !empty( $heading_font_family ) ) {
            $css .= "h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .heading-thin, .post-author .author-name, ul.check-list, .title-login, .title-register, .woocommerce .main-shop div.product .woocommerce-tabs ul.tabs li a, .entry-action a, .post-actions .tags, .post-related .post-box .post-box-title, .comments-area .comments-title, .comment-respond .comment-reply-title, .woocommerce #reviews #comments h2, .widget .widget-title, .widget .widgettitle, .block-title, .zoo-heading, h2.title-cover-page, .menu-wrap .menu > li > a, .menu-wrap .menu > ul > li > a, .woocommerce .price, .woocommerce .quantity input, .woocommerce a.added_to_cart, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.btn-register, .woocommerce-cart .woocommerce .cart-collaterals .wc-proceed-to-checkout a.button, .woocommerce input.button-login, .woocommerce button.button.alt.single_add_to_cart_button, .woocommerce div.product div.woocommerce-tabs #respond input#submit.submit, .woocommerce a.btn-register,.bottom-cart .buttons .button, .posts-navigation .nav-links a, .site-footer .top-footer .top-footer-toggle, .sidebar .woocommerce.widget_price_filter .price_slider_amount .button, .zoo-button, .zoo-ajax-load-more .ajax-func, .btn-readmore, .comment-form .form-submit input, .form-submit input, input.submit, input[type='submit'], button, .btn {
                font-family: '{$heading_font_family}', sans-serif;
            }";
        }

        if ( !empty( $heading_font_weight ) ) {
            $css .= "h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .heading-thin, .post-author .author-name, ul.check-list, .title-login, .title-register, .woocommerce .main-shop div.product .woocommerce-tabs ul.tabs li a, .entry-action a, .post-actions .tags, .post-related .post-box .post-box-title, .comments-area .comments-title, .comment-respond .comment-reply-title, .woocommerce #reviews #comments h2, .widget .widget-title, .widget .widgettitle, .block-title, .zoo-heading, h2.title-cover-page, .menu-wrap .menu > li > a, .menu-wrap .menu > ul > li > a, .woocommerce .price, .woocommerce .quantity input, .woocommerce a.added_to_cart, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.btn-register, .woocommerce-cart .woocommerce .cart-collaterals .wc-proceed-to-checkout a.button, .woocommerce input.button-login, .woocommerce button.button.alt.single_add_to_cart_button, .woocommerce div.product div.woocommerce-tabs #respond input#submit.submit, .woocommerce a.btn-register,.bottom-cart .buttons .button, .posts-navigation .nav-links a, .site-footer .top-footer .top-footer-toggle, .sidebar .woocommerce.widget_price_filter .price_slider_amount .button, .zoo-button, .zoo-ajax-load-more .ajax-func, .btn-readmore, .comment-form .form-submit input, .form-submit input, input.submit, input[type='submit'], button, .btn {
                font-weight: {$heading_font_weight};
            }";
        }

        if ( !empty( $heading_font_letter_spacing ) ) {
            $css .= "h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .heading-thin, .post-author .author-name, ul.check-list, .title-login, .title-register, .woocommerce .main-shop div.product .woocommerce-tabs ul.tabs li a, .entry-action a, .post-actions .tags, .post-related .post-box .post-box-title, .comments-area .comments-title, .comment-respond .comment-reply-title, .woocommerce #reviews #comments h2, .widget .widget-title, .widget .widgettitle, .block-title, .zoo-heading, h2.title-cover-page, .menu-wrap .menu > li > a, .menu-wrap .menu > ul > li > a, .woocommerce .price, .woocommerce .quantity input, .woocommerce a.added_to_cart, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.btn-register, .woocommerce-cart .woocommerce .cart-collaterals .wc-proceed-to-checkout a.button, .woocommerce input.button-login, .woocommerce button.button.alt.single_add_to_cart_button, .woocommerce div.product div.woocommerce-tabs #respond input#submit.submit, .woocommerce a.btn-register,.bottom-cart .buttons .button, .posts-navigation .nav-links a, .site-footer .top-footer .top-footer-toggle, .sidebar .woocommerce.widget_price_filter .price_slider_amount .button, .zoo-button, .zoo-ajax-load-more .ajax-func, .btn-readmore, .comment-form .form-submit input, .form-submit input, input.submit, input[type='submit'], button, .btn {
                letter-spacing: {$heading_font_letter_spacing};
            }";
        }

        $css .="
            h1 {
              font-size: {$heading_size_h1};
            }

            h2 {
              font-size: {$heading_size_h2};
            }

            h3 {
              font-size: {$heading_size_h3};
            }

            h4 {
              font-size: {$heading_size_h4};
            }

            h5 {
              font-size: {$heading_size_h5};
            }

            h6 {
              font-size: {$heading_size_h6};
            }
        ";

        /* Navigation font */
        $css .= ".primary-nav .menu > li > a, .primary-nav ul.menu > li > a, .primary-nav .menu > ul > li > a, .post-info, .tags-link-wrap, .tags-link-wrap h1, .tags-link-wrap h2, .tags-link-wrap h3, .tags-link-wrap h4, .tags-link-wrap h5, .tags-link-wrap h6, .share-links .share-text, .post-navigation a .post-title, .posts-navigation a .post-title {";
            if ( !empty( $navigation_font_family ) ) {
                $css .= "font-family: '{$navigation_font_family}';";
            }

            if ( !empty( $navigation_font_size ) ) {
                $css .= "font-size: {$navigation_font_size};";
            }

            if ( !empty( $navigation_font_weight ) ) {
                $css .= "font-weight: {$navigation_font_weight};";
            }

            if ( !empty( $navigation_font_line_height ) ) {
                $css .= "line-height: {$navigation_font_line_height};";
            }

            if ( !empty( $navigation_font_letter_spacing ) ) {
                $css .= "letter-spacing: {$navigation_font_letter_spacing};";
            }
        $css .= "}";

        /* Single page */
        $single_page_padding_top       = get_post_meta( get_the_ID(), 'zoo_single_page_padding_top', true );
        $single_page_padding_bottom       = get_post_meta( get_the_ID(), 'zoo_single_page_padding_bottom', true );

        if ( isset( $single_page_padding_top ) || isset( $single_page_padding_bottom ) ) {
            $css .= ".single-page {";
                if ( isset( $single_page_padding_top ) && $single_page_padding_top != 'inherit' && $single_page_padding_top != '' ) {
                    $css .= "padding-top: {$single_page_padding_top};";
                }

                if ( isset( $single_page_padding_bottom ) && $single_page_padding_bottom != 'inherit' && $single_page_padding_bottom != '' ) {
                    $css .= "padding-bottom: {$single_page_padding_bottom};";
                }
            $css .= "}";
        }

        /* Logo size*/
        $logo_height = zoo_kodo_option('zoo_logo_height');
        if($logo_height != 0 && $logo_height != ''){
            $css .= " #logo img{height: {$logo_height}px;}";
        }
        $logo_mobile_height = zoo_kodo_option('zoo_logo_mobile_height');
        if($logo_mobile_height != 0 && $logo_mobile_height != ''){
            $css .= "@media (max-width: 992px) { #logo img{height: {$logo_mobile_height}px;}}";
        }

        $header_image = zoo_kodo_option('header_image');
        if($header_image != ''){
            $css .= "#zoo_kodo-header{background: url('{$header_image}')}";
        }

        /* Colors */
        $color_body                 = zoo_kodo_option( 'zoo_color_base' );
        $site_background_color      = zoo_kodo_option( 'zoo_site_background_color' );
        $site_background_image      = zoo_kodo_option( 'zoo_site_background_image' );
        $site_background_size       = zoo_kodo_option( 'zoo_site_background_size' );
        $site_background_repeat     = zoo_kodo_option( 'zoo_site_background_repeat' );
        $site_background_position   = zoo_kodo_option( 'zoo_site_background_position' );
        $site_background_attachment = zoo_kodo_option( 'zoo_site_background_attachment' );

        if ( get_post_meta( get_the_ID(), 'zoo_site_background_color', true ) ) {
            $site_background_color = get_post_meta( get_the_ID(), 'zoo_site_background_color', true );
        }

        if ( get_post_meta( get_the_ID(), 'zoo_site_background_image', true ) != '' ) {
            $site_background_image      = esc_url( wp_get_attachment_url( get_post_meta( get_the_ID(), 'zoo_site_background_image', true ) ) );

            if ( get_post_meta( get_the_ID(), 'zoo_site_background_size', true ) != '' ) {
                $site_background_size       = get_post_meta( get_the_ID(), 'zoo_site_background_size', true );
            } else {
                $site_background_size = 'cover';
            }

            if ( get_post_meta( get_the_ID(), 'zoo_site_background_repeat', true ) != '' ) {
                $site_background_repeat           = get_post_meta( get_the_ID(), 'zoo_site_background_repeat', true );
            } else {
                $site_background_repeat = 'no-repeat';
            }

            if ( get_post_meta( get_the_ID(), 'zoo_site_background_position', true ) != '' ) {
                $site_background_position           = get_post_meta( get_the_ID(), 'zoo_site_background_position', true );
            } else {
                $site_background_position = 'center center';
            }

            if ( get_post_meta( get_the_ID(), 'zoo_site_background_attachment', true ) != '' ) {
                $site_background_attachment           = get_post_meta( get_the_ID(), 'zoo_site_background_attachment', true );
            } else {
                $site_background_attachment = 'scroll';
            }
        }

        $color_border               = zoo_kodo_option( 'zoo_color_border' );
        $color_fields               = zoo_kodo_option( 'zoo_color_fields' );
        $color_fields_background    = zoo_kodo_option( 'zoo_color_fields_background' );
        $color_primary              = zoo_kodo_option( 'zoo_color_primary' );
        $color_link                 = zoo_kodo_option( 'zoo_color_link' );
        $color_link_hover           = zoo_kodo_option( 'zoo_color_link_hover' );
        $color_error                = zoo_kodo_option( 'zoo_color_error' );
        $color_background_error     = zoo_kodo_option( 'zoo_color_background_error' );
        $color_success              = zoo_kodo_option( 'zoo_color_success' );
        $color_background_success   = zoo_kodo_option( 'zoo_color_background_success' );
        $color_sale                 = zoo_kodo_option( 'zoo_color_sale' );
        $color_sale_background      = zoo_kodo_option( 'zoo_color_sale_background' );
        $color_review               = zoo_kodo_option( 'zoo_color_review' );

        if ( get_post_meta( get_the_ID(), 'zoo_color_primary', true ) != '' ) {
            $color_primary           = get_post_meta( get_the_ID(), 'zoo_color_primary', true );
        }

        if ( get_post_meta( get_the_ID(), 'zoo_color_link', true ) != '' ) {
            $color_link           = get_post_meta( get_the_ID(), 'zoo_color_link', true );
        }

        if ( get_post_meta( get_the_ID(), 'zoo_color_link_hover', true ) != '' ) {
            $color_link_hover           = get_post_meta( get_the_ID(), 'zoo_color_link_hover', true );
        }

        $css .= "
            body {
                color: {$color_body};
                background-color: {$site_background_color};
            }
        ";

        if ( $site_background_image != '' ) {
            $css .= "
            body {
                background-image: url({$site_background_image});
                background-size: {$site_background_size};
                background-position: {$site_background_position};
                background-attachment: {$site_background_attachment};
                background-repeat: {$site_background_repeat};
            }";
        }

        $css .= "
            .rating .whole .l,
            .rating .whole .r {
                background-color: {$color_review};
            }

            .woocommerce p.stars a,
            .woocommerce p.stars a:hover,
            .woocommerce .star-rating:before,
            .woocommerce .star-rating span:before {
                color: {$color_review};
            }
            a {
                color: $color_link;
            }
            a:hover {
                color: $color_link_hover;
            }

            abbr[title], table, th, td, li.comment, #comments-list .title-block,
            .widget_product_categories li,
            .woocommerce .widget_layered_nav ul li,
            .widget_archive li,
            .widget_categories li,
            .widget_links li,
            .widget_meta li,
            .widget_nav_menu li,
            .widget_pages li,
            .widget_recent_entries li,
            .widget_recent_comments li,
            .post-social,
            #top-product-page,
            .stack-center-layout.type-2 .header-search-block .ipt,
            #mobile-nav li {
                border-color: $color_border;
            }

            input[type='text'],
            input[type='email'],
            input[type='url'],
            input[type='password'],
            input[type='search'],
            input[type='tel'],
            .woocommerce-checkout .select2-container .select2-choice,
            textarea,
            select {
                border-color: $color_border;
                color: $color_fields;
                background-color: $color_fields_background;
            }
            .zoo-cw-active .zoo-cw-active .zoo-cw-attr-item,
            .products .zoo-cw-active .zoo-cw-attr-item,
            input[type='text']:focus,
            input[type='email']:focus,
            input[type='url']:focus,
            input[type='password']:focus,
            input[type='search']:focus,
            textarea:focus,
            .zoo-cw-attribute-option.active .zoo-cw-attr-item, 
            .zoo-cw-attribute-option:not(.disabled):hover .zoo-cw-attr-item,
            select:focus {
                border-color: $color_primary;
            }

            .btn-link a:hover,
            .btn-link .vc_general:hover,
            .cvca-carousel-btn:hover i {
                color: $color_primary !important;
            }

            .header-transparent.wrap-header .top-cart-icon:hover,
            .header-transparent.wrap-header a.search-trigger:hover,
            .header-transparent.wrap-header .widget ul li a:hover,
            .header-transparent .wrap-icon-cart i:hover,
            .header-transparent .wrap-icon-cart a:hover,
            .header-transparent #icon-header .search a:hover,
            .header-transparent #icon-header .header-link > a:hover,
            .header-transparent #menu-mobile-trigger:hover,
            .header-transparent #icon-header .search a:hover,
            .header-transparent.wrap-header .is-sticky .top-cart-icon:hover,
            .header-transparent.wrap-header .is-sticky a.search-trigger:hover,
            .header-transparent.wrap-header .is-sticky .widget ul li a:hover,
            .header-transparent .is-sticky .wrap-icon-cart i:hover,
            .header-transparent .is-sticky .wrap-icon-cart a:hover,
            .header-transparent .is-sticky #icon-header .search a:hover,
            .header-transparent .is-sticky #icon-header .header-link > a:hover,
            .header-transparent .is-sticky #menu-mobile-trigger:hover,
            .header-transparent .is-sticky #icon-header .search a:hover,
            #icon-header .header-link > a:hover,
            .header-transparent .primary-nav .menu > li > a:hover,
            .header-transparent .primary-nav ul.menu > li > a:hover,
            .cvca-shortcode-banner-slider.style-2 .banner-description,
            .cvca-shortcode-banner-slider.style-3 .banner-readmore a,
            .cvca-shortcode-banner-slider .banner-readmore a:hover,
            .woocommerce div.product form.cart .reset_variations:hover:before,
            .zoo-mini-cart .mini_cart_item .right-mini-cart-item .amount,
            .widget-area .prdctfltr_wc.prdctfltr_square .prdctfltr_filter label.prdctfltr_active > span,
            .widget-area .prdctfltr_wc.prdctfltr_square .prdctfltr_filter label:hover > span,
            .widget-area .prdctfltr_wc.prdctfltr_square .prdctfltr_filter label.prdctfltr_active > span:before,
            .widget-area .prdctfltr_wc.prdctfltr_square .prdctfltr_filter label:hover > span:before,
            .menu-action-wrap #alg_currency_selector a:first-child,
            .menu-action-wrap #alg_currency_selector a:hover,
            .woocommerce .zoo-single-product.product .price,
            .cvca-wrap-filters .cvca-ajax-load li a.active,
            .cvca-wrap-filters .cvca-ajax-load li a:hover,
            .post-info a:hover,
            .post-content a,
            .zoo-blog-item .btn-readmore,
            .zoo-blog-item .link-more,
            .zoo-blog-item.sticky .zoo-post-inner .title-post a,
            .zoo-blog-item.tag-sticky .zoo-post-inner .title-post a,
            .zoo-blog-item.tag-sticky-1 .zoo-post-inner .title-post a,
            .zoo-blog-item.tag-sticky-2 .zoo-post-inner .title-post a,
            .sidebar .widget.widget_recent_entries ul li a:hover,
            .sidebar .widget.zoo_posts_widget ul li a:hover,
            .sidebar .widget ul li a:hover,
            .sidebar .widget ul li a.url:hover,
            .sidebar.zoo-woo-sidebar .widget ul li a:hover,
            .woocommerce .products .product h3.product-name a:hover,
            .woocommerce .products .wrap-product-img .actions-group .yith-wcwl-add-to-wishlist:hover,
            .woocommerce .products .wrap-product-img .actions-group .yith-wcwl-add-to-wishlist.added,
            .woocommerce .products .wrap-product-img .actions-group .quick-view:hover,
            .woocommerce .products .wrap-product-img .actions-group .quick-view.added,
            .woocommerce .products .wrap-product-img .actions-group .compare:hover,
            .woocommerce .products .wrap-product-img .actions-group .compare.added,
            .products.grid .product .button:hover,
            .products.grid .product .product_type_variable:hover,
            .products.grid .product .add_to_cart_button:hover,
            .products.grid .product:hover .product_type_variable,
            .products.grid .product:hover .add_to_cart_button,
            .products.grid .product .added_to_cart,
            .products.grid .product:hover .added_to_cart,
            .woocommerce .zoo-single-product.product .entry-summary .woo-custom-share .woo-share-label:hover {
              color: $color_primary;
            }

            .home11-box .cvca-links .cvca-links-content a {
              color: $color_primary;
              background: none;
            }

            .home11-box .cvca-links .cvca-links-content a:hover {
              color: #222;
              background: none;
            }
            #zoo-quickview-lb.woocommerce span.onsale, 
            .woocommerce span.onsale,
            .woocommerce .widget_price_filter .price_slider_amount button.button,
            .products .wrap-product-img:before,
            .newsletter-widget .tnp-widget .tnp-field input[type=submit],
            .load-more-pagination .button:hover,
            .infinite-pagination .button:hover,
            .btn-link a:hover:after,
            .btn-link .vc_general:hover:after,
            .datepicker table tr td.active.active,
            .datepicker table tr td span.active.active {
                background: $color_primary;
            }
            .woocommerce-checkout .woocommerce-info .zoo-woo-info a,
            .zoo-single-product-nav .product-link-btn:hover, 
            .zoo-single-product-nav .product-title:hover,
            .woocommerce ul.products li.product .price ins,
            .woocommerce .products.grid .product:hover .add_to_cart_button, 
            .woocommerce .products.grid .product:hover .added_to_cart, 
            .woocommerce .products.grid .product:hover .product_type_variable
            .color, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .h1 a:hover, .h2 a:hover, .h3 a:hover, .h4 a:hover, .h5 a:hover, .h6 a:hover, .heading-thin a:hover, .cvca-testimonial-shortcode .cvca-testimonial-author a:hover, .cvca-testimonial-shortcode.style-1 .cvca-testimonial-item .cvca-testimonial-author, .tagcloud a:hover, .zoo-breadcrumb-container .zoo-breadcrumb-url:hover,
            .zoo-breadcrumb-container a:hover, .share-links .social-icons li a:hover, .post-author .author-name,
            .wrap-author-social li a:hover, .readmore,
            .woocommerce .woocommerce-breadcrumb a:hover,
            .layout-control-block li a.active,
            .lout-control-block li a.disable-sidebar,
            .woocommerce .products .product h3.product-name a:hover,
            .wrap-icon-cart:hover i, #icon-header .search a:hover, #menu-mobile-trigger.active,
            .main-content.author-page li a:hover,
            .main-content.author-page li a.post-title:hover,
            .main-content.author-page .entry-pagination ul li.active a {
                color: $color_primary;
            }

            .readmore:hover {
                color: #252525;
            }
            .woocommerce-checkout #payment.woocommerce-checkout-payment #place_order:hover,
            .woocommerce .zoo-single-product.product .entry-summary .cart .button:hover,
            .woocommerce .woocommerce-MyAccount-navigation ul li:after,
            [data-tooltip]:before,
            .wrap-mini-cart.loading:before,
            #quick-view-before-loading.active .quick-block-center .moving,
            .zoo-cw-gallery-loading .wrap-left-single-product:before,
            .comment-reply-link:hover,
            .comment-edit-link:hover,
            .widget_calendar tbody #today,
            .widget_product_tag_cloud .tagcloud a:hover,
            .instagram-feed-heading i,
            .wrap-img:before,
            .products .wrap-product-img:before,
            .top-cart-total {
                background: $color_primary;
            }


            .woocommerce .zoo-woo-page span.onsale,
            #zoo-quickview-lb.woocommerce span.onsale {
                color: $color_sale;
                background: $color_sale_background;
            }
        ";

        /* Buttons */
        $color_btn_primary          = zoo_kodo_option( 'zoo_color_btn_primary' );
        $color_btn_primary_border   = zoo_kodo_option( 'zoo_color_btn_primary_border' );
        $color_btn_primary_background = zoo_kodo_option( 'zoo_color_btn_primary_background' );
        $color_btn_primary_hover    = zoo_kodo_option( 'zoo_color_btn_primary_hover' );
        $color_btn_primary_border_hover = zoo_kodo_option( 'zoo_color_btn_primary_border_hover' );
        $color_btn_primary_background_hover = zoo_kodo_option( 'zoo_color_btn_primary_background_hover' );
        $color_btn_secondary         = zoo_kodo_option( 'zoo_color_btn_secondary' );
        $color_btn_secondary_border  = zoo_kodo_option( 'zoo_color_btn_secondary_border' );
        $color_btn_secondary_background = zoo_kodo_option( 'zoo_color_btn_secondary_background' );
        $color_btn_secondary_hover  = zoo_kodo_option( 'zoo_color_btn_secondary_hover' );
        $color_btn_secondary_border_hover = zoo_kodo_option( 'zoo_color_btn_secondary_border_hover' );
        $color_btn_secondary_background_hover = zoo_kodo_option( 'zoo_color_btn_secondary_background_hover' );

        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_primary', true ) != '' ) {
            $color_btn_primary           = get_post_meta( get_the_ID(), 'zoo_color_btn_primary', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_primary_border', true ) != '' ) {
            $color_btn_primary_border           = get_post_meta( get_the_ID(), 'zoo_color_btn_primary_border', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_primary_background', true ) != '' ) {
            $color_btn_primary_background           = get_post_meta( get_the_ID(), 'zoo_color_btn_primary_background', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_primary_hover', true ) != '' ) {
            $color_btn_primary_hover           = get_post_meta( get_the_ID(), 'zoo_color_btn_primary_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_primary_border_hover', true ) != '' ) {
            $color_btn_primary_border_hover           = get_post_meta( get_the_ID(), 'zoo_color_btn_primary_border_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_primary_background_hover', true ) != '' ) {
            $color_btn_primary_background_hover           = get_post_meta( get_the_ID(), 'zoo_color_btn_primary_background_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_secondary', true ) != '' ) {
            $color_btn_secondary           = get_post_meta( get_the_ID(), 'zoo_color_btn_secondary', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_border', true ) != '' ) {
            $color_btn_secondary_border           = get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_border', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_background', true ) != '' ) {
            $color_btn_secondary_background           = get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_background', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_hover', true ) != '' ) {
            $color_btn_secondary_hover           = get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_border_hover', true ) != '' ) {
            $color_btn_secondary_border_hover           = get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_border_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_background_hover', true ) != '' ) {
            $color_btn_secondary_background_hover           = get_post_meta( get_the_ID(), 'zoo_color_btn_secondary_background_hover', true );
        }

        $css .= "
        .cvca-links .cvca-links-content a:hover,
        .cvca-links .cvca-links-content a +a:hover,
        .btn-landing a,
        .wrap-header-block .btn-landing a,
        .is-sticky .wrap-header-block .btn-landing a,
        .wrap-style5-layout .wrap-main-footer .widget_text a,
        .wrap-style5-layout .wrap-main-footer .widget_text .btn-landing a,
        .wrap-style5-layout #main-footer .wrap-main-footer .widget_text a,
        .wrap-style5-layout #main-footer .wrap-main-footer .footer-block .widget_text a,
        .zoo-button.btn-second:hover, input.submit.btn-second:hover, input[type='submit'].btn-second:hover, button.btn-second:hover, .btn.btn-second:hover, .zoo-button.single_add_to_cart_button:hover, input.submit.single_add_to_cart_button:hover, button.single_add_to_cart_button:hover, .btn.single_add_to_cart_button:hover, .woocommerce .register.form input[type='submit'],
        .woocommerce a.added_to_cart:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce a.btn-register:hover, .woocommerce-cart .woocommerce .cart-collaterals .wc-proceed-to-checkout a.button:hover, .woocommerce input.button-login:hover, .woocommerce button.button.alt.single_add_to_cart_button:hover, .woocommerce div.product div.woocommerce-tabs #respond input#submit.submit:hover, .zoo-mini-cart-contents p.buttons a.button:not(.checkout), .woocommerce a.btn-register:hover, .zoo-mini-cart-contents p.buttons a.button.checkout:not(.checkout):hover, .zoo-mini-cart-contents p.buttons a.button.checkout:hover, .posts-navigation .nav-links a:hover, .site-footer .top-footer .top-footer-toggle:hover, .price_slider_amount .button:hover, .zoo-button:hover, .zoo-ajax-load-more .ajax-func:hover, .comment-form .form-submit input:hover, .form-submit input:hover, input.submit:hover, input[type='submit']:hover, button:hover, .btn:hover {
            color: {$color_btn_secondary};
            border-color: {$color_btn_secondary_border};
            background-color: {$color_btn_secondary_background};
        }

        .btn-landing a:hover,
        .wrap-header-block .btn-landing a:hover,
        .is-sticky .wrap-header-block .btn-landing a:hover,
        .wrap-style5-layout .wrap-main-footer .widget_text a:hover,
        .wrap-style5-layout .wrap-main-footer .widget_text .btn-landing a:hover,
        .wrap-style5-layout #main-footer .wrap-main-footer .widget_text a:hover,
        .wrap-style5-layout #main-footer .wrap-main-footer .footer-block .widget_text a:hover,
        .woocommerce .login.form input[type='submit'],
        .woocommerce .register.form input[type='submit'],
        #customer_login form.login .btn,
        #customer_login form.login .button,
        #customer_login form.register .btn,
        #customer_login form.register .button {
            color: {$color_btn_secondary_hover};
            border-color: {$color_btn_secondary_border_hover};
            background-color: {$color_btn_secondary_background_hover};
        }

        .zoo-banner-image .banner-readmore a,
        .cvca-shortcode-banner-slider.style-2 .banner-readmore a,
        #top-footer .widget_newsletterwidget .tnp.tnp-widget .tnp-field .tnp-submit,
        #top-footer .widget_newsletterwidget .tnp.tnp-widget .tnp-field input[type=submit] {
            color: $color_btn_primary;
            border-color: $color_btn_primary_border;
            background: $color_btn_primary_background;
        }

        .zoo-banner-image .banner-readmore a:hover,
        .cvca-shortcode-banner-slider.style-2 .banner-readmore a:hover,
        #top-footer .widget_newsletterwidget .tnp.tnp-widget .tnp-field .tnp-submit:hover,
        #top-footer .widget_newsletterwidget .tnp.tnp-widget .tnp-field input[type=submit]:hover {
            color: $color_btn_primary_hover;
            border-color: $color_btn_primary_border_hover;
            background: $color_btn_primary_background_hover;
        }

        .woocommerce .login.form input[type='submit']:hover,
        .woocommerce .register.form input[type='submit']:hover,
        #customer_login form.login .btn:hover,
        #customer_login form.login .button:hover,
        #customer_login form.register .btn:hover,
        #customer_login form.register .button:hover {
            border-color: #111;
            background: #111;
        }

        .woocommerce .login.form .btn.light,
        .woocommerce .register.form .btn.light,
        #customer_login form.login .btn.light,
        #customer_login form.register .btn.light {
            color: #252525;
            border-color: #252525;
        }

        .woocommerce .login.form .btn.light:hover,
        .woocommerce .register.form .btn.light:hover,
        #customer_login form.login .btn.light:hover,
        #customer_login form.register .btn.light:hover {
            border-color: #252525;
            background: #252525;
        }";

        /* Header configs */
        if ( get_post_meta( get_the_ID(), 'zoo_header_hide_border_bottom', true ) == true ) {
            $css .= "
                .wrap-header-block,
                .wrap-header-block.stack-center-layout #bottom-header.sticker {
                    border-bottom: 0 !important;
                }
            ";
        }

        /* Logo */
        $logo_padding_top                       = zoo_kodo_option( 'zoo_logo_padding_top' );
        $logo_padding_bottom                    = zoo_kodo_option( 'zoo_logo_padding_bottom' );

        $css .= "
            #site-branding {
                padding-top: {$logo_padding_top}px;
                padding-bottom: {$logo_padding_bottom}px;
            }
        ";

        /* Header Colors */
        $header_top_color                       = zoo_kodo_option( 'zoo_header_top_color' );
        $header_top_link_color                  = zoo_kodo_option( 'zoo_header_top_link_color' );
        $header_top_link_color_hover            = zoo_kodo_option( 'zoo_header_top_link_color_hover' );
        $header_top_border_color                = zoo_kodo_option( 'zoo_header_top_border_color' );
        $header_top_background_color            = zoo_kodo_option( 'zoo_header_top_background_color' );
        $header_main_color                      = zoo_kodo_option( 'zoo_header_main_color' );
        $header_main_link_color                 = zoo_kodo_option( 'zoo_header_main_link_color' );
        $header_main_link_color_hover           = zoo_kodo_option( 'zoo_header_main_link_color_hover' );
        $header_main_background_color           = zoo_kodo_option( 'zoo_header_main_background_color' );
        $header_sticky_color                    = zoo_kodo_option( 'zoo_header_sticky_color' );
        $header_sticky_link_color               = zoo_kodo_option( 'zoo_header_sticky_link_color' );
        $header_sticky_link_color_hover         = zoo_kodo_option( 'zoo_header_sticky_link_color_hover' );
        $header_sticky_background_color         = zoo_kodo_option( 'zoo_header_sticky_background_color' );

        $css .= "
            #top-header {
                color: $header_top_color;
                background: $header_top_background_color;
            }

            #top-header .widget-title {
                color: $header_top_color;
            }

            #top-header a,
            #top-header a i {
                color: $header_top_link_color;
            }

            #top-header .zoo-social-widget a {
            #top-header .zoo-social-widget a i,
                color: #222;
            }

            #top-header .zoo-social-widget a:hover,
            #top-header .zoo-social-widget a:hover i,
            #top-header .widget_text a,
            #top-header i,
            #top-header a:hover,
            #top-header a:hover i {
                color: $header_top_link_color_hover;
            }

            #top-header .contact-info li {
                border-color: {$header_top_border_color};
            }

            #top-header .contact-info li:last-child {
                border-color: {$header_top_border_color};
            }

            .wrap-header {
                color: {$header_main_color};
            }

            .wrap-header a,
            #icon-header .search a {
                color: {$header_main_color};
            }

            .wrap-header a:hover,
            .wrap-header .widget ul li a:hover,
            .wrap-icon-cart:hover i,
            #icon-header .search a:hover,
            #menu-mobile-trigger.active,
            #icon-header .search a:hover {
                color: {$header_main_link_color_hover};
            }

            .wrap-header-block {
                background: {$header_main_background_color};
            }

            .is-sticky .wrap-header-block {
                color: {$header_sticky_color};
                background: {$header_sticky_background_color};
            }

            .is-sticky .wrap-header-block a,
            .is-sticky .wrap-header a, .is-sticky #icon-header .search a,
            .is-sticky .primary-nav ul.menu > li > a,
            .is-sticky .primary-nav .menu > ul > li > a {
                color: {$header_sticky_link_color};
            }

            .is-sticky .wrap-header-block a:hover,
            .is-sticky #icon-header .search a:hover,
            .is-sticky .wrap-icon-cart:hover i,
            .is-sticky .primary-nav ul.menu > li > a:hover,
            .is-sticky .primary-nav .menu > ul > li > a:hover {
                color: {$header_sticky_link_color_hover};
            }

            .wrap-header .header-cart,
            .comment-reply-link:hover,
            .comment-edit-link:hover,
            .widget_calendar tbody #today,
            .widget_product_tag_cloud .tagcloud a:hover,
            .instagram-feed-heading i, .inpost-pagination a:hover,
            .inpost-pagination .pagination > span,
            .wrap-img:before,
            .products .wrap-product-img:before,
            .top-cart-total,
            .bottom-cart .buttons .button,
            .bottom-cart .buttons .button::hover,
            .bottom-cart .buttons .button:not(.checkout):hover,
            .woocommerce .button.checkout,
            .woocommerce .zoo-single-product .wrap-thumbs-gal .zoo-carousel-btn:hover {
                background: $color_primary;
            }

            .bottom-cart .buttons .button:not(.checkout) {
                background: #252525;
            }

            .zoo-mini-cart:before,
            .zoo-mini-cart:after,
            table.shop_attributes ul > li:hover:before,
            table.shop_attributes ul > li.selected:before,
            .variations ul > li:hover:before,
            .variations ul > li.selected:before {
                border-color: $color_primary;
            }

            table.shop_attributes ul > li.color:hover:before,
            table.shop_attributes ul > li.color.selected:before,
            .variations ul > li.color:hover:before,
            .variations ul > li.color.selected:before {
                border-color: inherit;
            }

            .wrap-header-block.header-category-layout a:hover,
            .widget_product_categories ul .current-cat > a,
            .widget_tag_cloud .tagcloud a:hover,
            .woocommerce .widget_top_rated_products ul.product_list_widget li .product-title:hover,
            .zoo-single-product-nav.product-link-btn:hover,
            .zoo-single-product-nav.product-title:hover,
            .woocommerce .wrap-single-carousel .zoo-carousel-btn:hover {
                color: $color_primary;
            }

            .zoo-mini-cart .mini_cart_item .cart-detail .qty,
            .wrap-header-block.header-category-layout .header-search-block form {
                border-color: $color_border;
            }

            table.shop_attributes ul > li.color:hover:before,
            table.shop_attributes ul > li.color.selected:before,
            .variations ul > li.color:hover:before,
            .variations ul > li.color.selected:before {
                border-color: inherit;
            }
        ";
        /* Footer configs */
        $footer_top_hide_border                = zoo_kodo_option( 'zoo_footer_top_hide_border' );
        $footer_main_hide_border               = zoo_kodo_option( 'zoo_footer_main_hide_border' );
        $footer_copyright_hide_border          = zoo_kodo_option( 'zoo_footer_copyright_hide_border' );

        if ( get_post_meta( get_the_ID(), 'zoo_footer_top_hide_border', true ) != '' && get_post_meta( get_the_ID(), 'zoo_footer_top_hide_border', true ) == true ) {
            $footer_top_hide_border           = true;
        }

        if ( get_post_meta( get_the_ID(), 'zoo_footer_main_hide_border', true ) != '' && get_post_meta( get_the_ID(), 'zoo_footer_main_hide_border', true ) == true ) {
            $footer_main_hide_border          = true;
        }

        if ( get_post_meta( get_the_ID(), 'zoo_footer_copyright_hide_border', true ) != '' && get_post_meta( get_the_ID(), 'zoo_footer_copyright_hide_border', true ) == true ) {
            $footer_copyright_hide_border     = true;
        }

        if ( $footer_top_hide_border ) {
            $css .= "
                #top-footer {
                    border: 0 !important;
                }
            ";
        }

        if ( $footer_main_hide_border ) {
            $css .= "
                #main-footer,
                #main-footer .wrap-main-footer {
                    border: 0 !important;
                }
            ";
        }

        if ( $footer_copyright_hide_border ) {
            $css .= "
                #bottom-footer,
                #bottom-footer .bottom-footer-container {
                    border: 0 !important;
                }
            ";
        }

        /* Footer Colors */
        $footer_background_color               = zoo_kodo_option( 'zoo_footer_background_color' );
        $footer_background_image               = zoo_kodo_option( 'zoo_footer_background_image' );
        $footer_background_size                = zoo_kodo_option( 'zoo_footer_background_size' );
        $footer_background_repeat              = zoo_kodo_option( 'zoo_footer_background_repeat' );
        $footer_background_position            = zoo_kodo_option( 'zoo_footer_background_position' );
        $footer_background_attachment          = zoo_kodo_option( 'zoo_footer_background_attachment' );

        $top_footer_color                      = zoo_kodo_option( 'zoo_top_footer_color' );
        $top_footer_link_color                 = zoo_kodo_option( 'zoo_top_footer_link_color' );
        $top_footer_link_color_hover           = zoo_kodo_option( 'zoo_top_footer_link_color_hover' );
        $top_footer_block_title_color          = zoo_kodo_option( 'zoo_top_footer_block_title_color' );
        $top_footer_background_color           = zoo_kodo_option( 'zoo_top_footer_background_color' );
        $top_footer_field_background_color     = zoo_kodo_option( 'zoo_top_footer_field_background_color' );

        $main_footer_color                      = zoo_kodo_option( 'zoo_main_footer_color' );
        $main_footer_link_color                 = zoo_kodo_option( 'zoo_main_footer_link_color' );
        $main_footer_link_color_hover           = zoo_kodo_option( 'zoo_main_footer_link_color_hover' );
        $main_footer_block_title_color          = zoo_kodo_option( 'zoo_main_footer_block_title_color' );
        $main_footer_background_color           = zoo_kodo_option( 'zoo_main_footer_background_color' );
        $main_footer_field_background_color     = zoo_kodo_option( 'zoo_main_footer_field_background_color' );

        $copyright_footer_color                           = zoo_kodo_option( 'zoo_copyright_footer_color' );
        $copyright_footer_link_color                      = zoo_kodo_option( 'zoo_copyright_footer_link_color' );
        $copyright_footer_link_color_hover                = zoo_kodo_option( 'zoo_copyright_footer_link_color_hover' );
        $copyright_footer_border_color                    = zoo_kodo_option( 'zoo_copyright_footer_border_color' );
        $copyright_footer_background_color                = zoo_kodo_option( 'zoo_copyright_footer_background_color' );

        if ( get_post_meta( get_the_ID(), 'zoo_footer_background_color', true ) != '' ) {
            $footer_background_color           = get_post_meta( get_the_ID(), 'zoo_footer_background_color', true );
        }

        if ( get_post_meta( get_the_ID(), 'zoo_footer_background_image', true ) != '' ) {
            $footer_background_image      = esc_url( wp_get_attachment_url( get_post_meta( get_the_ID(), 'zoo_footer_background_image', true ) ) );

            if ( get_post_meta( get_the_ID(), 'zoo_footer_background_size', true ) != '' ) {
                $footer_background_size           = get_post_meta( get_the_ID(), 'zoo_footer_background_size', true );
            } else {
                $footer_background_size = 'cover';
            }

            if ( get_post_meta( get_the_ID(), 'zoo_footer_background_repeat', true ) != '' ) {
                $footer_background_repeat           = get_post_meta( get_the_ID(), 'zoo_footer_background_repeat', true );
            } else {
                $footer_background_repeat = 'no-repeat';
            }

            if ( get_post_meta( get_the_ID(), 'zoo_footer_background_position', true ) != '' ) {
                $footer_background_position           = get_post_meta( get_the_ID(), 'zoo_footer_background_position', true );
            } else {
                $footer_background_position = 'center center';
            }

            if ( get_post_meta( get_the_ID(), 'zoo_footer_background_attachment', true ) != '' ) {
                $footer_background_attachment           = get_post_meta( get_the_ID(), 'zoo_footer_background_attachment', true );
            } else {
                $footer_background_attachment = 'scroll';
            }
        }

        if ( get_post_meta( get_the_ID(), 'zoo_top_footer_color', true ) != '' ) {
            $top_footer_color              = get_post_meta( get_the_ID(), 'zoo_top_footer_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_top_footer_link_color', true ) != '' ) {
            $top_footer_link_color                      = get_post_meta( get_the_ID(), 'zoo_top_footer_link_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_top_footer_link_color_hover', true ) != '' ) {
            $top_footer_link_color_hover                = get_post_meta( get_the_ID(), 'zoo_top_footer_link_color_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_top_footer_block_title_color', true ) != '' ) {
            $top_footer_block_title_color                    = get_post_meta( get_the_ID(), 'zoo_top_footer_block_title_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_top_footer_background_color', true ) != '' ) {
            $top_footer_background_color                = get_post_meta( get_the_ID(), 'zoo_top_footer_background_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_top_footer_field_background_color', true ) != '' ) {
            $top_footer_field_background_color          = get_post_meta( get_the_ID(), 'zoo_top_footer_field_background_color', true );
        }

        if ( get_post_meta( get_the_ID(), 'zoo_main_footer_color', true ) != '' ) {
            $main_footer_color              = get_post_meta( get_the_ID(), 'zoo_main_footer_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_main_footer_link_color', true ) != '' ) {
            $main_footer_link_color                      = get_post_meta( get_the_ID(), 'zoo_main_footer_link_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_main_footer_link_color_hover', true ) != '' ) {
            $main_footer_link_color_hover                = get_post_meta( get_the_ID(), 'zoo_main_footer_link_color_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_main_footer_block_title_color', true ) != '' ) {
            $main_footer_block_title_color                    = get_post_meta( get_the_ID(), 'zoo_main_footer_block_title_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_main_footer_background_color', true ) != '' ) {
            $main_footer_background_color                = get_post_meta( get_the_ID(), 'zoo_main_footer_background_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_main_footer_field_background_color', true ) != '' ) {
            $main_footer_field_background_color          = get_post_meta( get_the_ID(), 'zoo_main_footer_field_background_color', true );
        }

        if ( get_post_meta( get_the_ID(), 'zoo_copyright_footer_color', true ) != '' ) {
            $copyright_footer_color                           = get_post_meta( get_the_ID(), 'zoo_copyright_footer_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_copyright_footer_link_color', true ) != '' ) {
            $copyright_footer_link_color                      = get_post_meta( get_the_ID(), 'zoo_copyright_footer_link_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_copyright_footer_link_color_hover', true ) != '' ) {
            $copyright_footer_link_color_hover                = get_post_meta( get_the_ID(), 'zoo_copyright_footer_link_color_hover', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_copyright_footer_border_color', true ) != '' ) {
            $copyright_footer_border_color                    = get_post_meta( get_the_ID(), 'zoo_copyright_footer_border_color', true );
        }
        if ( get_post_meta( get_the_ID(), 'zoo_copyright_footer_background_color', true ) != '' ) {
            $copyright_footer_background_color                = get_post_meta( get_the_ID(), 'zoo_copyright_footer_background_color', true );
        }

        $css .= "
            #top-footer {
                color: {$top_footer_color};
                background-color: {$top_footer_background_color};
            }

            #top-footer .footer-widget-title {
                color: {$top_footer_block_title_color};
            }

            #top-footer a,
            #top-footer .footer-block a {
                color: {$top_footer_link_color};
            }

            #top-footer a:hover,
            #top-footer .footer-block a:hover,
            .wrap-style3-layout #top-footer ul li a:hover,
            .wrap-style3-layout #top-footer .widget_nav_menu li a:hover,
            .wrap-style4-layout #top-footer ul li a:hover,
            .wrap-style4-layout #top-footer .widget_nav_menu li a:hover {
                color: {$top_footer_link_color_hover};
            }

            #top-footer .tnp.tnp-widget input[type=text],
            #top-footer .tnp.tnp-widget input[type=email],
            #top-footer .tnp.tnp-widget input[type=submit],
            #top-footer .tnp.tnp-widget select,
            .wrap-style3-layout #top-footer .tnp.tnp-widget input[type=text],
            .wrap-style3-layout #top-footer .tnp.tnp-widget input[type=email],
            .wrap-style3-layout #top-footer .tnp.tnp-widget input[type=submit],
            .wrap-style3-layout #top-footer .tnp.tnp-widget select,
            .wrap-style4-layout #top-footer .tnp.tnp-widget input[type=text],
            .wrap-style4-layout #top-footer .tnp.tnp-widget input[type=email],
            .wrap-style4-layout #top-footer .tnp.tnp-widget input[type=submit],
            .wrap-style4-layout #top-footer .tnp.tnp-widget select {
                background-color: {$top_footer_field_background_color};
            }

            #main-footer {
                color: {$main_footer_color};
                background-color: {$main_footer_background_color};
            }

            #main-footer a,
            #main-footer .footer-block a {
                color: {$main_footer_link_color};
            }

            #main-footer a:hover,
            #main-footer .footer-block a:hover,
            .wrap-style3-layout #main-footer ul li a:hover,
            .wrap-style3-layout #main-footer .widget_nav_menu li a:hover,
            .wrap-style4-layout #main-footer ul li a:hover,
            .wrap-style4-layout #main-footer .widget_nav_menu li a:hover {
                color: {$main_footer_link_color_hover};
            }

            #main-footer .tnp.tnp-widget input[type=text],
            #main-footer .tnp.tnp-widget input[type=email],
            #main-footer .tnp.tnp-widget input[type=submit],
            #main-footer .tnp.tnp-widget select,
            .wrap-style3-layout #main-footer .tnp.tnp-widget input[type=text],
            .wrap-style3-layout #main-footer .tnp.tnp-widget input[type=email],
            .wrap-style3-layout #main-footer .tnp.tnp-widget input[type=submit],
            .wrap-style3-layout #main-footer .tnp.tnp-widget select,
            .wrap-style4-layout #main-footer .tnp.tnp-widget input[type=text],
            .wrap-style4-layout #main-footer .tnp.tnp-widget input[type=email],
            .wrap-style4-layout #main-footer .tnp.tnp-widget input[type=submit],
            .wrap-style4-layout #main-footer .tnp.tnp-widget select {
                background-color: {$main_footer_field_background_color};
            }

            #main-footer .footer-widget-title {
                color: {$main_footer_block_title_color};
            }

            #bottom-footer {
                color: {$copyright_footer_color};
                background: {$copyright_footer_background_color};
            }

            #bottom-footer a {
                color: {$copyright_footer_link_color};
            }

            #bottom-footer a:hover {
                color: {$copyright_footer_link_color_hover};
            }

            .bottom-footer-container {
                border-color: {$copyright_footer_border_color};
            }
        ";

        if ( !empty($footer_background_image) ) {
            $css .= "
                #top-footer,
                #main-footer,
                #bottom-footer {
                    background: transparent;
                }

                #zoo-footer {
                    background-color: {$footer_background_color};
                    background-image: url({$footer_background_image});
                    background-size: {$footer_background_size};
                    background-position: {$footer_background_position};
                    background-attachment: {$footer_background_attachment};
                    background-repeat: {$footer_background_repeat};
                }
            ";
        }

        return $css;
    }
}