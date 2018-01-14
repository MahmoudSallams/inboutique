<?php
/**
 * zoo_option_defaults
 *
 * @return    mixed
 */
if ( ! function_exists( 'zoo_option_defaults' ) ) {
    function zoo_option_defaults( $option )
    {
        $deaults = array(
            // General Panel
            'zoo_site_layout'                    => 'full',
            'zoo_site_layout_box_shadow'         => true,
            'zoo_site_disable_breadcrumbs'       => false,
            'zoo_site_search_box_layout'         => 'popup',
            'zoo_enable_font_awesome'            => 'off',
            'zoo_site_background_color'          => '#fff',
            'zoo_site_background_image'          => '',
            'zoo_site_background_size'           => 'cover',
            'zoo_site_background_repeat'         => 'no-repeat',
            'zoo_site_background_position'       => 'center center',
            'zoo_site_background_attachment'     => 'scroll',

            // Header Panel
            'zoo_logo_height'                    => '',
            'zoo_logo_mobile_height'                    => '',
            'zoo_logo_padding_top'               => 0,
            'zoo_logo_padding_bottom'            => 0,
            'zoo_site_logo_sticky'               => '',
            'zoo_logo_sticky_height'             => '',
            'zoo_header_layout'                  => 'menu-right',
            'zoo_header_transparent'             => false,
            'zoo_header_sticky'                  => true,
            'zoo_header_fullwidth'               => false,
            'zoo_header_top'                     => true,
            'zoo_header_top_color'               => '#252525',
            'zoo_header_top_link_color'          => '#888',
            'zoo_header_top_link_color_hover'    => '#dc2f47',
            'zoo_header_top_border_color'        => '#ebebeb',
            'zoo_header_top_background_color'    => '#fff',
            'zoo_header_main_color'              => '#252525',
            'zoo_header_main_link_color'         => '#252525',
            'zoo_header_main_link_color_hover'   => '#dc2f47',
            'zoo_header_main_background_color'   => '#fff',
            'zoo_header_sticky_color'              => '#252525',
            'zoo_header_sticky_link_color'         => '#252525',
            'zoo_header_sticky_link_color_hover'   => '#dc2f47',
            'zoo_header_sticky_background_color'   => '#fff',

            // Footer Panel
            'zoo_footer_layout'                  => 'default',
            'zoo_top_footer'                     => true,
            'zoo_main_footer'                    => true,
            'zoo_footer_social'                  => false,
            'zoo_footer_top_hide_border'         => true,
            'zoo_footer_main_hide_border'        => true,
            'zoo_footer_copyright_hide_border'   => false,
            'zoo_footer_copyright'               => 'Copyright &#169; 2017 Cleversoft. All rights reserved.',

            'zoo_footer_background_color'           => '#fff',
            'zoo_footer_background_image'           => '',
            'zoo_footer_background_size'            => 'cover',
            'zoo_footer_background_repeat'          => 'no-repeat',
            'zoo_footer_background_position'        => 'center center',
            'zoo_footer_background_attachment'      => 'scroll',

            'zoo_top_footer_color'                  => '#777',
            'zoo_top_footer_link_color'             => '#777',
            'zoo_top_footer_link_color_hover'       => '#dc2f47',
            'zoo_top_footer_block_title_color'      => '#252525',
            'zoo_top_footer_field_background_color' => '#fff',
            'zoo_top_footer_background_color'       => '#f5f5f5',

            'zoo_main_footer_color'                 => '#777',
            'zoo_main_footer_link_color'            => '#777',
            'zoo_main_footer_link_color_hover'      => '#dc2f47',
            'zoo_main_footer_block_title_color'     => '#252525',
            'zoo_main_footer_field_background_color' => '#fff',
            'zoo_main_footer_background_color'      => '#fff',

            'zoo_copyright_footer_color'                => '#636363',
            'zoo_copyright_footer_link_color'           => '#636363',
            'zoo_copyright_footer_link_color_hover'     => '#dc2f47',
            'zoo_copyright_footer_border_color'         => '#e5e5e5',
            'zoo_copyright_footer_background_color'     => '#fff',

            // Blog Panel
            'zoo_blog_layout'                    => 'grid',
            'zoo_blog_col'                       => '1',
            'zoo_blog_show_excerpt'              => true,
            'zoo_blog_excerpt_length'            => '60',
            'zoo_blog_pagination'                => 'numeric',
            'zoo_blog_single_tags'               => true,
            'zoo_blog_single_related'            => true,
            'zoo_blog_single_related_number_items' => '3',
            'zoo_blog_sidebar_left'              => 'none',
            'zoo_blog_sidebar_right'             => 'sidebar-1',

            // Shop Panel
            'zoo_shop_cover'                     => 'disable',
            'zoo_shop_cover_height'              => '200',
            'zoo_shop_cover_background_color'    => '#ccc',
            'zoo_shop_slider_cover'              => '',
            'zoo_shop_custom_image_cover'        => '',
            'zoo_shop_custom_content_cover'      => '0',
            'zoo_shop_custom_title_cover'        => '',
            'zoo_shop_custom_description_cover'  => '',
            'zoo_catalog_mod'                    => false,
            'zoo_shop_sidebar_option'            => 'left-sidebar',
            'zoo_shop_sidebar'                   => 'shop',
            'zoo_products_layout'                => 'grid',
            'zoo_products_number_items'          => '12',
            'zoo_products_item_min_width'        => 280,
            'zoo_products_pagination'            => 'numeric',
            'zoo_product_cart_button'            => true,
            'zoo_product_sale_label'             => true,
            'zoo_sale_type'                      => 'text',
            'zoo_product_rating'                 => true,
            'zoo_product_stock_label'            => false,
            'zoo_product_disable_qv'             => false,
            'zoo_product_disable_wishlist_button' => false,
            'zoo_product_disable_compare_button' => true,
            'zoo_single_gallery_layout'          => 'vertical-gallery',
            'zoo_single_product_sidebar_option'  => 'no-sidebar',
            'zoo_single_product_sidebar'         => '',
            'zoo_single_product_zoom'            => true,
            'zoo_single_link_product'            => true,
            'zoo_single_share'                   => true,
            'zoo_single_related_product'         => true,
            'zoo_single_related_product_slider'  => true,
            'zoo_single_related_product_number'  => 6,
            'zoo_single_related_cols'            => 4,

            // Style Panel
            'zoo_color_base'                     => '#555',
            'zoo_color_border'                   => '#e5e5e5',
            'zoo_color_fields'                   => '#acacac',
            'zoo_color_fields_background'        => '#fff',
            'zoo_color_primary'                  => '#dc2f47',
            'zoo_color_link'                     => '#252525',
            'zoo_color_link_hover'               => '#dc2f47',
            'zoo_color_btn_primary'              => '#fff',
            'zoo_color_btn_primary_border'       => '#252525',
            'zoo_color_btn_primary_background'   => '#252525',
            'zoo_color_btn_primary_hover'        => '#fff',
            'zoo_color_btn_primary_border_hover' => '#dc2f47',
            'zoo_color_btn_primary_background_hover' => '#dc2f47',
            'zoo_color_btn_secondary'            => '#fff',
            'zoo_color_btn_secondary_border'     => '#dc2f47',
            'zoo_color_btn_secondary_background' => '#dc2f47',
            'zoo_color_btn_secondary_hover'      => '#fff',
            'zoo_color_btn_secondary_border_hover' => '#252525',
            'zoo_color_btn_secondary_background_hover' => '#252525',
            'zoo_color_btn_tertiary'            => '#fff',
            'zoo_color_btn_tertiary_border'     => '#000',
            'zoo_color_btn_tertiary_background' => '#fff',
            'zoo_color_btn_tertiary_hover'      => '#fff',
            'zoo_color_btn_tertiary_border_hover' => '#000',
            'zoo_color_btn_tertiary_background_hover' => '#000',

            'zoo_color_error'                    => '#d20000',
            'zoo_color_background_error'         => '#fff8f8',
            'zoo_color_success'                  => '#19a340',
            'zoo_color_background_success'       => '#f8fff9',
            'zoo_color_sale'                     => '#fff',
            'zoo_color_sale_background'          => '#dc2f47',
            'zoo_color_review'                   => '#ffcc00',
            'zoo_typo_body_font'                 => array( 'font-family' => 'Montserrat', 'variant' => '400', 'subsets' => array(), 'font-size' => '18px', 'line-height' => '25px', 'letter-spacing' => '0' ),
            'zoo_typo_heading_font'              => array( 'font-family' => 'Montserrat', 'variant' => '600', 'subsets' => array(), 'letter-spacing' => '0' ),
            'zoo_typo_navigation_font'           => array( 'font-family' => 'Montserrat', 'variant' => '500', 'subsets' => array(), 'font-size' => '18px', 'line-height' => '25px', 'letter-spacing' => '0' ),
            'zoo_typo_heading_size_h1'           => '36px',
            'zoo_typo_heading_size_h2'           => '30px',
            'zoo_typo_heading_size_h3'           => '26px',
            'zoo_typo_heading_size_h4'           => '24px',
            'zoo_typo_heading_size_h5'           => '21px',
            'zoo_typo_heading_size_h6'           => '18px',
            'zoo_typo_body_font_choices'         => 'custom-font',
            'zoo_typo_heading_font_choices'      => 'custom-font',
            'zoo_typo_navigation_font_choices'   => 'custom-font',
            'zoo_typo_body_font_size'            => '18px',
            'zoo_typo_body_font_variant'         => '400',
            'zoo_typo_body_font_line_height'     => '25px',
            'zoo_typo_body_font_letter_spacing'  => '0',
            'zoo_typo_heading_font_variant'      => '600',
            'zoo_typo_heading_font_letter_spacing' => '',
            'zoo_typo_navigation_font_size'      => '18px',
            'zoo_typo_navigation_font_variant'   => '400',
            'zoo_typo_navigation_font_line_height' => '25px',
            'zoo_typo_navigation_font_letter_spacing' => '',

            // Social Panel
            'zoo_social_facebook'                => '#',
            'zoo_social_twitter'                 => '#',
            'zoo_social_instagram'               => '',
            'zoo_social_dribbble'                => '',
            'zoo_social_vimeo'                   => '',
            'zoo_social_tumblr'                  => '',
            'zoo_social_skype'                   => '#',
            'zoo_social_linkedin'                => '',
            'zoo_social_googleplus'              => '#',
            'zoo_social_flickr'                  => '',
            'zoo_social_youtube'                 => '#',
            'zoo_social_pinterest'               => '',
            'zoo_social_foursquare'              => '',
            'zoo_social_github'                  => '',
            'zoo_social_xing'                    => '',

            // Reset Panel
        );

        if( isset( $deaults[$option] ) ) {
            return $deaults[$option];
        }
    }
}

/**
 * zoo_option
 *
 * @return    mixed
 */
if ( ! function_exists( 'zoo_kodo_option' ) ) {
    function zoo_kodo_option( $option )
    {
        $defaults = zoo_option_defaults( $option );

        return get_theme_mod( $option, $defaults );
    }
}
