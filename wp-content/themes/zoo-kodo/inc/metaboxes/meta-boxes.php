<?php
/**
 * Meta box for theme
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

add_filter( 'rwmb_meta_boxes', 'zoo_add_meta_box_options' );
if (!function_exists('zoo_add_meta_box_options')){
    function zoo_add_meta_box_options() {
    $prefix = "zoo_";
    $meta_boxes = array();

    /**
     * Page - Layout Options
     */
    $meta_boxes[] = array(
        'id'        => 'title_meta_box',
        'title'     => esc_html__( 'Layout Options', 'zoo-kodo' ),
        'pages'     => array('page'),
        'context'   => 'advanced',
        'fields'    => array(
            array(
                'name'  => esc_html__( 'Page TOC.', 'zoo-kodo' ),
                'id'    => $prefix . "site_page_toc",
                'type'  => 'checkbox',
                'std'   => '0',
            ),
            array(
                'name'  => esc_html__( 'Page padding top.', 'zoo-kodo' ),
                'id'    => $prefix . "single_page_padding_top",
                'type'  => 'text',
                'std'   => 'inherit',
                'desc'  => esc_html__( 'Padding top of this page (px). Default: inherit. Ex: 50px', 'zoo-kodo' ),
            ),
            array(
                'name'  => esc_html__( 'Page padding bottom.', 'zoo-kodo' ),
                'id'    => $prefix . "single_page_padding_bottom",
                'type'  => 'text',
                'std'   => 'inherit',
                'desc'  => esc_html__( 'Padding bottom of this page (px). Default: inherit. Ex: 50px', 'zoo-kodo' ),
            ),
            array(
                'name'  => esc_html__( 'Available Layout', 'zoo-kodo' ),
                'id'    => $prefix . "site_layout",
                'type'      => 'select',
                'options'   => array(
                    'inherit'   => 'Inherit',
                    'full'      => esc_html__( 'Full Width', 'zoo-kodo' ),
                    'boxed'     => esc_html__( 'Boxed', 'zoo-kodo' )
                ),
                'std'       => 'inherit',
            ),
            array(
                'name'  => esc_html__( 'Add Drop Shadow to Content box.', 'zoo-kodo' ),
                'id'    => $prefix . "site_layout_box_shadow",
                'type'  => 'checkbox',
                'std'   => '1',
            ),
            array(
                'name'  => esc_html__( 'Site Background Color', 'zoo-kodo' ),
                'id'    => $prefix . "site_background_color",
                'type'  => 'color',
                'std'   => '#fff',
            ),
            array(
                'name'  => esc_html__( 'Site Background Image', 'zoo-kodo' ),
                'id'    => $prefix . "site_background_image",
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'type'  => 'image_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name'  => esc_html__( 'Background Size', 'zoo-kodo' ),
                'id'    => $prefix . "site_background_size",
                'type'  => 'select',
                'std'   => 'cover',
                'options'   => array(
                    'auto'  => esc_html__( 'Auto', 'zoo-kodo' ),
                    'cover' => esc_html__( 'Cover', 'zoo-kodo' ),
                    'contain' => esc_html__( 'Contain', 'zoo-kodo' ),
                    'initial' => esc_html__( 'Initial', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__( 'Background Repeat', 'zoo-kodo' ),
                'id'    => $prefix . "site_background_repeat",
                'type'  => 'select',
                'std'   => 'no-repeat',
                'options'   => array(
                    'no-repeat'  => esc_html__( 'No Repeat', 'zoo-kodo' ),
                    'repeat' => esc_html__( 'Repeat', 'zoo-kodo' ),
                    'repeat-x' => esc_html__( 'Repeat X', 'zoo-kodo' ),
                    'repeat-y' => esc_html__( 'Repeat Y', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__( 'Background Position', 'zoo-kodo' ),
                'id'    => $prefix . "site_background_position",
                'type'  => 'select',
                'std'   => 'center center',
                'options'   => array(
                    'left top'  => esc_html__( 'Left Top', 'zoo-kodo' ),
                    'left center' => esc_html__( 'Left Center', 'zoo-kodo' ),
                    'left bottom' => esc_html__( 'Left Bottom', 'zoo-kodo' ),
                    'right top' => esc_html__( 'Right Top', 'zoo-kodo' ),
                    'right center' => esc_html__( 'Right Center', 'zoo-kodo' ),
                    'right bottom' => esc_html__( 'Right Bottom', 'zoo-kodo' ),
                    'center top' => esc_html__( 'Center Top', 'zoo-kodo' ),
                    'center bottom' => esc_html__( 'Center Bottom', 'zoo-kodo' ),
                    'center center' => esc_html__( 'Center Center', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__( 'Background Attachment', 'zoo-kodo' ),
                'id'    => $prefix . "site_background_attachment",
                'type'  => 'select',
                'std'   => 'scroll',
                'options'   => array(
                    'scroll'  => esc_html__( 'Scroll', 'zoo-kodo' ),
                    'fixed' => esc_html__( 'Fixed', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__('Use Custom Menu', 'zoo-kodo'),
                'desc'  => '',
                'id'    => $prefix . 'header_custom_menu',
                'type'  => 'navs',
                'std'   => 'none'
            ),
            array(
                'name'  => esc_html__( 'Logo page', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "logo_stt",
                'type'  => 'heading'
            ),
            array(
                'name'  => esc_html__( 'Logo for page', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "logo_page",
                'type'  => 'image_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name'  => esc_html__( 'Sticky Logo for page', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "sticky_logo_page",
                'type'  => 'image_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name'  => esc_html__( 'Hide site Tag line.', 'zoo-kodo' ),
                'id'    => $prefix . "hide_tag_line",
                'type'  => 'checkbox',
            ),

            array(
                'name'  => esc_html__( 'Primary Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_primary",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Link Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_link",
                'type'  => 'color',
                'std'   => '#252525',
            ),
            array(
                'name'  => esc_html__( 'Link Hover Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_link_hover",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),

            array(
                'name'  => esc_html__( 'Button Primary Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_primary",
                'type'  => 'color',
                'std'   => '#fff',
            ),
            array(
                'name'  => esc_html__( 'Button Primary Border Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_primary_border",
                'type'  => 'color',
                'std'   => '#252525',
            ),
            array(
                'name'  => esc_html__( 'Button Primary Background Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_primary_background",
                'type'  => 'color',
                'std'   => '#252525',
            ),
            array(
                'name'  => esc_html__( 'Button Primary Color: Hover', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_primary_hover",
                'type'  => 'color',
                'std'   => '#fff',
            ),
            array(
                'name'  => esc_html__( 'Button Primary Border Color: Hover', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_primary_border_hover",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Button Primary Background Color: Hover', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_primary_background_hover",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Button Secondary Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_secondary",
                'type'  => 'color',
                'std'   => '#fff',
            ),
            array(
                'name'  => esc_html__( 'Button Secondary Border Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_secondary_border",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Button Secondary Background Color', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_secondary_background",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Button Secondary Color: Hover', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_secondary_hover",
                'type'  => 'color',
                'std'   => '#fff',
            ),
            array(
                'name'  => esc_html__( 'Button Secondary Border Color: Hover', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_secondary_border_hover",
                'type'  => 'color',
                'std'   => '#252525',
            ),
            array(
                'name'  => esc_html__( 'Button Secondary Background Color: Hover', 'zoo-kodo' ),
                'id'    => $prefix . "color_btn_secondary_background_hover",
                'type'  => 'color',
                'std'   => '#252525',
            ),

            array(
                'name'  => esc_html__( 'Title & Breadcrumbs Options', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "heading_title",
                'type'  => 'heading'
            ),
            array(
                'name'  => esc_html__( 'Disable Title', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "disable_title",
                'std'   => '0',
                'type'  => 'checkbox'
            ),
            array(
                'name'  => esc_html__( 'Disable Breadcrumbs', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "disable_breadcrumbs",
                'std'   => '0',
                'type'  => 'checkbox'
            ),
            array(
                'name'  => esc_html__('Header Options', 'zoo-kodo'),
                'desc'  => esc_html__('', 'zoo-kodo'),
                'id'    => $prefix . "heading_header",
                'type'  => 'heading'
            ),
            array(
                'name'  => esc_html__( 'Disable topbar.', 'zoo-kodo' ),
                'id'    => $prefix . "header_top",
                'type'  => 'checkbox',
                'std'   => '0',
            ),
            array(
                'name'  => esc_html__( 'Header Layout', 'zoo-kodo' ),
                'id'    => $prefix . "header_layout",
                'type'  => 'image_select',
                'options' => array(
                    'inherit' => esc_url( get_template_directory_uri() . '/lib/assets/icons/inherit.png' ),
                    'menu-left' => esc_url( get_template_directory_uri() . '/lib/assets/icons/menu-left.png' ),
                    'menu-right' => esc_url( get_template_directory_uri() . '/lib/assets/icons/menu-right.png' ),
                    'menu-center' => esc_url( get_template_directory_uri() . '/lib/assets/icons/menu-center.png' ),
                    'stack-center' => esc_url( get_template_directory_uri() . '/lib/assets/icons/stack-center.png' ),
                    'stack-center-2' => esc_url( get_template_directory_uri() . '/lib/assets/icons/stack-center-2.png' ),
                    'stack-center-3' => esc_url( get_template_directory_uri() . '/lib/assets/icons/stack-center-3.png' ),
                    'logo-center' => esc_url( get_template_directory_uri() . '/lib/assets/icons/logo-center.png' ),
                    'landing-header' => esc_url( get_template_directory_uri() . '/lib/assets/icons/landing-header.png' ),
                ),
                'std' => 'inherit',
                'desc' => esc_html__( 'Choose Options Header Layout. If set Inherit, it follow option of customize', 'zoo-kodo' )
            ),
            
            array(
                'name'  => esc_html__( 'Hide border bottom.', 'zoo-kodo' ),
                'id'    => $prefix . "header_hide_border_bottom",
                'type'  => 'checkbox',
            ),
            array(
                'name'  => esc_html__( 'Enable Header Transparency', 'zoo-kodo' ),
                'id'    => $prefix . "header_transparent",
                'type'  => 'checkbox',
                'std'   => '0',
                'desc'  => esc_html__( 'If check, header will be use transparent style.', 'zoo-kodo' )
            ),
            array(
                'name'  => esc_html__( '100% Header Width', 'zoo-kodo' ),
                'id'    => $prefix . "header_fullwidth",
                'type'  => 'checkbox',
                'std'   => '0',
                'desc'  => esc_html__( 'Check this box to set the header to 100% of the browser width. Uncheck to follow the site width.', 'zoo-kodo' )
            ),
            /* Page Cover Options ================================================*/

            array(
                'name' => esc_html__('Page Cover Options', 'zoo-navigator'),
                'desc' => esc_html__('', 'zoo-navigator'),
                'id' => "zoo_heading_page_cover",
                'type' => 'heading',
                'class' => 'clear',
            ),
            array(
                'name' => esc_html__('Select Page Cover', 'zoo-navigator'),
                'id' => "zoo_page_cover",
                'type' => 'select',
                'options' => array(
                    'inherit' => esc_html__('Inherit', 'zoo-navigator'),
                    'color' => esc_html__('Color', 'zoo-navigator'),
                    'image' => esc_html__('Image', 'zoo-navigator'),
                    'none' => esc_html__('None', 'zoo-navigator'),
                ),
                'std' => 'inherit',
                'desc' => esc_html__('', 'zoo-navigator')
            ),
            array(
                'name' => esc_html__('Page Cover Color', 'zoo-navigator'),
                'id' => "zoo_page_cover_color",
                'type' => 'color',
                'hidden' => ['zoo_page_cover', '!=', 'color']
            ),
            array(
                'name' => esc_html__('Page Cover Image', 'zoo-navigator'),
                'id' => "zoo_page_cover_image",
                'type' => 'image_advanced',
                'hidden' => ['zoo_page_cover', '!=', 'image']
            ),
            array(
                'name' => esc_html__('Page Cover Height', 'zoo-navigator'),
                'id' => "zoo_page_cover_height",
                'type' => 'text',
                'hidden' => ['zoo_page_cover', '!=', 'image']
            ),
            array(
                'name' => esc_html__('Page Cover Title', 'zoo-navigator'),
                'id' => "zoo_page_cover_title",
                'type' => 'text',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),
            array(
                'name' => esc_html__('Page Cover Title Color', 'zoo-navigator'),
                'id' => "zoo_page_cover_title_color",
                'type' => 'color',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),
            array(
                'name' => esc_html__('Page Cover Description', 'zoo-navigator'),
                'id' => "zoo_page_cover_des",
                'type' => 'textarea',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),
            array(
                'name' => esc_html__('Page Cover Description Color', 'zoo-navigator'),
                'id' => "zoo_page_cover_des_color",
                'type' => 'color',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),


            /*Footer */
            array(
                'name'  => esc_html__( 'Footer Options', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "heading_footer",
                'type'  => 'heading',
                'class' => 'clear',
            ),
            array(
                'name'  => esc_html__( 'Enable Footer Social', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "footer_social",
                'type'  => 'checkbox',
                'std'   => '0',
            ),
            array(
                'name'  => esc_html__( 'Disable Top Footer', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "top_footer",
                'type'  => 'checkbox',
                'std'   => '0',
            ),
            array(
                'name'  => esc_html__( 'Disable Main Footer', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "main_footer",
                'type'  => 'checkbox',
                'std'   => '0',
            ),
            array(
                'name'  => esc_html__( 'Hide Border Bottom of Footer Top.', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "footer_top_hide_border",
                'type'  => 'checkbox',
                'std'   => '1',
            ),
            array(
                'name'  => esc_html__( 'Hide Border Bottom of Footer Main.', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "footer_main_hide_border",
                'type'  => 'checkbox',
                'std'   => '1',
            ),
            array(
                'name'  => esc_html__( 'Hide Border Bottom of Footer Copyright.', 'zoo-kodo' ),
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'id'    => $prefix . "footer_copyright_hide_border",
                'type'  => 'checkbox',
                'std'   => '0',
            ),
            array(
                'name'  => esc_html__( 'Background Color', 'zoo-kodo' ),
                'id'    => $prefix . "footer_background_color",
                'type'  => 'color',
                'std'   => '#fff',
            ),
            array(
                'name'  => esc_html__( 'Background Image', 'zoo-kodo' ),
                'id'    => $prefix . "footer_background_image",
                'desc'  => esc_html__( '', 'zoo-kodo' ),
                'type'  => 'image_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name'  => esc_html__( 'Background Size', 'zoo-kodo' ),
                'id'    => $prefix . "footer_background_size",
                'type'  => 'select',
                'std'   => 'cover',
                'options'   => array(
                    'auto'  => esc_html__( 'Auto', 'zoo-kodo' ),
                    'cover' => esc_html__( 'Cover', 'zoo-kodo' ),
                    'contain' => esc_html__( 'Contain', 'zoo-kodo' ),
                    'initial' => esc_html__( 'Initial', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__( 'Background Repeat', 'zoo-kodo' ),
                'id'    => $prefix . "footer_background_repeat",
                'type'  => 'select',
                'std'   => 'no-repeat',
                'options'   => array(
                    'no-repeat'  => esc_html__( 'No Repeat', 'zoo-kodo' ),
                    'repeat' => esc_html__( 'Repeat', 'zoo-kodo' ),
                    'repeat-x' => esc_html__( 'Repeat X', 'zoo-kodo' ),
                    'repeat-y' => esc_html__( 'Repeat Y', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__( 'Background Position', 'zoo-kodo' ),
                'id'    => $prefix . "footer_background_position",
                'type'  => 'select',
                'std'   => 'center center',
                'options'   => array(
                    'left top'  => esc_html__( 'Left Top', 'zoo-kodo' ),
                    'left center' => esc_html__( 'Left Center', 'zoo-kodo' ),
                    'left bottom' => esc_html__( 'Left Bottom', 'zoo-kodo' ),
                    'right top' => esc_html__( 'Right Top', 'zoo-kodo' ),
                    'right center' => esc_html__( 'Right Center', 'zoo-kodo' ),
                    'right bottom' => esc_html__( 'Right Bottom', 'zoo-kodo' ),
                    'center top' => esc_html__( 'Center Top', 'zoo-kodo' ),
                    'center bottom' => esc_html__( 'Center Bottom', 'zoo-kodo' ),
                    'center center' => esc_html__( 'Center Center', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__( 'Background Attachment', 'zoo-kodo' ),
                'id'    => $prefix . "footer_background_attachment",
                'type'  => 'select',
                'std'   => 'scroll',
                'options'   => array(
                    'scroll'  => esc_html__( 'Scroll', 'zoo-kodo' ),
                    'fixed' => esc_html__( 'Fixed', 'zoo-kodo' )
                )
            ),
            array(
                'name'  => esc_html__( 'Footer Layout', 'zoo-kodo' ),
                'id'    => $prefix . "footer_layout",
                'type'  => 'image_select',
                'options' => array(
                    'inherit' =>esc_url( get_template_directory_uri() . '/lib/assets/icons/inherit.png' ),
                    'default' => esc_url( get_template_directory_uri() . '/lib/assets/icons/footer-style1.png' ),
                    'style2' => esc_url( get_template_directory_uri() . '/lib/assets/icons/footer-style2.png' ),
                    'style3' => esc_url( get_template_directory_uri() . '/lib/assets/icons/footer-style3.png' ),
                    'style4' => esc_url( get_template_directory_uri() . '/lib/assets/icons/footer-style4.png' ),
                    'style5' => esc_url( get_template_directory_uri() . '/lib/assets/icons/footer-style5.png' ),
                ),
                'std' => 'inherit',
                'desc' => esc_html__( 'Choose Footer Layout.', 'zoo-kodo' )
            ),
            array(
                'name'  => esc_html__( 'Footer Top Color', 'zoo-kodo' ),
                'id'    => $prefix . "top_footer_color",
                'type'  => 'color',
                'std'   => '#777',
            ),
            array(
                'name'  => esc_html__( 'Footer Top Link Color', 'zoo-kodo' ),
                'id'    => $prefix . "top_footer_link_color",
                'type'  => 'color',
                'std'   => '#777',
            ),
            array(
                'name'  => esc_html__( 'Footer Top Link Hover Color', 'zoo-kodo' ),
                'id'    => $prefix . "top_footer_link_color_hover",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Footer Top Block Title Color', 'zoo-kodo' ),
                'id'    => $prefix . "top_footer_block_title_color",
                'type'  => 'color',
                'std'   => '#222',
            ),
            array(
                'name'  => esc_html__( 'Background Color of Input Field in Footer Top', 'zoo-kodo' ),
                'id'    => $prefix . "top_footer_field_background_color",
                'type'  => 'color',
                'std'   => '#f5f5f5',
            ),
            array(
                'name'  => esc_html__( 'Footer Top Background Color', 'zoo-kodo' ),
                'id'    => $prefix . "top_footer_background_color",
                'type'  => 'color',
                'std'   => '#f5f5f5',
            ),

            array(
                'name'  => esc_html__( 'Footer Main Color', 'zoo-kodo' ),
                'id'    => $prefix . "main_footer_color",
                'type'  => 'color',
                'std'   => '#777',
            ),
            array(
                'name'  => esc_html__( 'Footer Main Link Color', 'zoo-kodo' ),
                'id'    => $prefix . "main_footer_link_color",
                'type'  => 'color',
                'std'   => '#777',
            ),
            array(
                'name'  => esc_html__( 'Footer Main Link Hover Color', 'zoo-kodo' ),
                'id'    => $prefix . "main_footer_link_color_hover",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Footer Main Block Title Color', 'zoo-kodo' ),
                'id'    => $prefix . "main_footer_block_title_color",
                'type'  => 'color',
                'std'   => '#222',
            ),
            array(
                'name'  => esc_html__( 'Background Color of Input Field in Footer Main', 'zoo-kodo' ),
                'id'    => $prefix . "main_footer_field_background_color",
                'type'  => 'color',
                'std'   => '#f5f5f5',
            ),
            array(
                'name'  => esc_html__( 'Footer Main Background Color', 'zoo-kodo' ),
                'id'    => $prefix . "main_footer_background_color",
                'type'  => 'color',
                'std'   => '#fff',
            ),

            array(
                'name'  => esc_html__( 'Footer Copyright Color', 'zoo-kodo' ),
                'id'    => $prefix . "copyright_footer_color",
                'type'  => 'color',
                'std'   => '#777',
            ),
            array(
                'name'  => esc_html__( 'Footer Copyright Link Color', 'zoo-kodo' ),
                'id'    => $prefix . "copyright_footer_link_color",
                'type'  => 'color',
                'std'   => '#777',
            ),
            array(
                'name'  => esc_html__( 'Footer Copyright Link Hover Color', 'zoo-kodo' ),
                'id'    => $prefix . "copyright_footer_link_color_hover",
                'type'  => 'color',
                'std'   => '#dc2f47',
            ),
            array(
                'name'  => esc_html__( 'Footer Copyright Border Color', 'zoo-kodo' ),
                'id'    => $prefix . "copyright_footer_border_color",
                'type'  => 'color',
                'std'   => '#ebebeb',
            ),
            array(
                'name'  => esc_html__( 'Footer Copyright Background Color', 'zoo-kodo' ),
                'id'    => $prefix . "copyright_footer_background_color",
                'type'  => 'color',
                'std'   => '#fff',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'    => $prefix . 'heading_sidebar',
        'title' => esc_html__( 'Post Options', 'zoo-kodo' ),
        'pages' => array('post'),
        'context' => 'advanced',
        'fields' => array(
            array(
                'name'  => esc_html__( 'Left Sidebar', 'zoo-kodo' ),
                'id'    => $prefix . "blog_sidebar_left",
                'type'  => 'sidebars',
            ),
            array(
                'name'  => esc_html__( 'Right Sidebar', 'zoo-kodo' ),
                'id'    => $prefix . "blog_sidebar_right",
                'type'  => 'sidebars',
            ),
            /* Page Cover Options ================================================*/

            array(
                'name' => esc_html__('Post Cover Options', 'zoo-navigator'),
                'desc' => esc_html__('', 'zoo-navigator'),
                'id' => "zoo_heading_page_cover",
                'type' => 'heading',
                'class' => 'clear',
            ),
            array(
                'name' => esc_html__('Select Post Cover', 'zoo-navigator'),
                'id' => "zoo_page_cover",
                'type' => 'select',
                'options' => array(
                    'inherit' => esc_html__('Inherit', 'zoo-navigator'),
                    'color' => esc_html__('Color', 'zoo-navigator'),
                    'image' => esc_html__('Image', 'zoo-navigator'),
                    'none' => esc_html__('None', 'zoo-navigator'),
                ),
                'std' => 'inherit',
                'desc' => esc_html__('', 'zoo-navigator')
            ),
            array(
                'name' => esc_html__('Post Cover Color', 'zoo-navigator'),
                'id' => "zoo_page_cover_color",
                'type' => 'color',
                'hidden' => ['zoo_page_cover', '!=', 'color']
            ),
            array(
                'name' => esc_html__('Post Cover Image', 'zoo-navigator'),
                'id' => "zoo_page_cover_image",
                'type' => 'image_advanced',
                'hidden' => ['zoo_page_cover', '!=', 'image']
            ),
            array(
                'name' => esc_html__('Post Cover Height', 'zoo-navigator'),
                'id' => "zoo_page_cover_height",
                'type' => 'text',
                'hidden' => ['zoo_page_cover', '!=', 'image']
            ),
            array(
                'name' => esc_html__('Post Cover Title', 'zoo-navigator'),
                'id' => "zoo_page_cover_title",
                'type' => 'text',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),
            array(
                'name' => esc_html__('Post Cover Title Color', 'zoo-navigator'),
                'id' => "zoo_page_cover_title_color",
                'type' => 'color',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),
            array(
                'name' => esc_html__('Post Cover Description', 'zoo-navigator'),
                'id' => "zoo_page_cover_des",
                'type' => 'textarea',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),
            array(
                'name' => esc_html__('Post Cover Description Color', 'zoo-navigator'),
                'id' => "zoo_page_cover_des_color",
                'type' => 'color',
                'hidden' => ['zoo_page_cover', 'in', ['inherit','none']]
            ),
        )
    );

    /**
     * Testimonial
     */
    $meta_boxes[] = array(
        'id'        => 'post_meta_box',
        'title'     => esc_html__( 'Post Meta', 'zoo-kodo' ),
        'pages'     => array('testimonial'),
        'context'   => 'normal',
        'fields'    => array(
            array(
                'name'  => esc_html__( 'Author avatar', 'zoo-kodo' ),
                'desc'  => esc_html__( 'Author avatar display in frontend', 'zoo-kodo' ),
                'id'    => $prefix . "author_img",
                'type'  => 'image_advanced',
                'max_file_uploads' => 1
            ),
            array(
                'name'  => esc_html__( 'Author name', 'zoo-kodo' ),
                'desc'  => esc_html__( 'Author name display in frontend', 'zoo-kodo' ),
                'id'    => $prefix . "author",
                'type'  => 'text',
            ),
            array(
                'name'  => esc_html__( 'Author description', 'zoo-kodo' ),
                'desc'  => esc_html__( 'Author description display in frontend', 'zoo-kodo' ),
                'id'    => $prefix . "author_des",
                'type'  => 'text',
            ),
        )
    );

    /**
     * Product
     */
    $meta_boxes[] = array(
        'id'        => $prefix . 'layout_single_heading',
        'title'     => esc_html__( 'Layout Single Product', 'zoo-kodo' ),
        'pages'     => array('product'),
        'context'   => 'advanced',
        'fields'    => array(
            array(
                'name'      => esc_html__( 'Layout Options', 'zoo-kodo' ),
                'id'        => $prefix . "single_gallery_layout",
                'type'      => 'select',
                'options'   => array(
                    'inherit'            => 'Inherit',
                    'horizontal-gallery' => esc_html__( 'Horizontal Gallery', 'zoo-kodo' ),
                    'vertical-gallery'   => esc_html__( 'Vertical Gallery', 'zoo-kodo' ),
                    'vertical-gallery-right'   => esc_html__( 'Vertical Gallery  Center Thumb', 'zoo-kodo' ),
                    'carousel'           => esc_html__( 'Carousel', 'zoo-kodo' ),
                    'sticky'             => esc_html__( 'Sticky', 'zoo-kodo' ),
                    'sticky-right-content'  => esc_html__( 'Sticky Right Content', 'zoo-kodo' ),
                    'sticky-accordion'  => esc_html__( 'Sticky Accordion', 'zoo-kodo' ),
                    'image-center'  => esc_html__( 'Image Center', 'zoo-kodo' ),
                ),
                'std'       => 'inherit',
                'desc'      => esc_html__( 'Choose Options Sidebar.', 'zoo-kodo' )
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => $prefix . 'layout_single_heading_side',
        'title' => esc_html__( 'Video Gallery', 'zoo-kodo' ),
        'pages' => array('product'),
        'context' => 'side',
        'fields' => array(
            array(
                'name' => esc_html__( 'Video Link', 'zoo-kodo' ),
                'id' => $prefix . "woo_video_link",
                'desc' => esc_html__( 'Type a video link on youtube or vimeo', 'zoo-kodo' ),
                'type' => 'oembed',
                'size' => '22',
            ),

            array(
                'name' => esc_html__( 'Video Width', 'zoo-kodo' ),
                'id' => $prefix . "woo_video_width",
                'type' => 'text',
                'size' => '8',
            ),
            array(
                'name' => esc_html__( 'Video Height', 'zoo-kodo' ),
                'id' => $prefix . "woo_video_height",
                'type' => 'text',
                'size' => '8',
            ),

            array(
                'name' => esc_html__( 'Video Thumbnail', 'zoo-kodo' ),
                'id' => $prefix . "woo_video_thumb",
                'type' => 'image_advanced',
            ),
        )
    );

    return $meta_boxes;
}
}


include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {
    get_template_part( 'inc/metaboxes/field/sidebars' );
    get_template_part( 'inc/metaboxes/field/navs' );
}
