<?php
/**
 * Style Panel
 *
 * @uses    object    $wp_customize     WP_Customize_Manager
 * @uses    object    $this             Zoo_Customizer
 *
 * @package    zoo_Theme\Core\Backend\Customizer
 */

$zoo_customize->add_panel( 'style', array(
    'title'       => esc_html__( 'Style', 'zoo-kodo' ),
    'description' => esc_html__( 'Control your theme primary color, typography...', 'zoo-kodo' ),
    'priority' => 83
) );

/* ----------------------------------------------------------
                    Section - Color
---------------------------------------------------------- */
$zoo_customize->add_section( 'color', array(
    'title' => esc_html__( 'Color', 'zoo-kodo' ),
    'panel' => 'style'
) );

/* Options heading - Type colors */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_colors_type_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Base Colors', 'zoo-kodo' ) . '</div>',
) );

// Base color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_base',
    'label'    => esc_html__( 'Base Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#555'
) );

// Border color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_border',
    'label'    => esc_html__( 'Border Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#e5e5e5'
) );

// Fields color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_fields',
    'label'    => esc_html__( 'Fields Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#acacac'
) );

// Fields background color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_fields_background',
    'label'    => esc_html__( 'Fields background Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

/* Options heading - Accent colors */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_colors_main_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Accent Colors', 'zoo-kodo' ) . '</div>',
) );

// Primary color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_primary',
    'label'    => esc_html__( 'Primary Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#dc2f47'
) );

/* Options heading - Links */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_color_links_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Links', 'zoo-kodo' ) . '</div>',
) );

// Link Color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_link',
    'label'    => esc_html__( 'Link Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#252525'
) );

// Link Color: Hover
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_link_hover',
    'label'    => esc_html__( 'Link Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#dc2f47'
) );

/* Options heading - Primary Button */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_color_primary_buttons_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Primary Buttons', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_primary',
    'label'    => esc_html__( 'Button Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_primary_border',
    'label'    => esc_html__( 'Button Border Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#252525'
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_primary_background',
    'label'    => esc_html__( 'Button Background Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#252525'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_primary_hover',
    'label'    => esc_html__( 'Button Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_primary_border_hover',
    'label'    => esc_html__( 'Button Border Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#dc2f47'
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_primary_background_hover',
    'label'    => esc_html__( 'Button Background Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#dc2f47'
) );

/* Options heading - Secondary Buttons */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_color_secondary_buttons_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Secondary Buttons', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_secondary',
    'label'    => esc_html__( 'Button Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_secondary_border',
    'label'    => esc_html__( 'Button Border Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#dc2f47'
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_secondary_background',
    'label'    => esc_html__( 'Button Background Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#dc2f47'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_secondary_hover',
    'label'    => esc_html__( 'Button Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_secondary_border_hover',
    'label'    => esc_html__( 'Button Border Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#252525'
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_secondary_background_hover',
    'label'    => esc_html__( 'Button Background Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#252525'
) );

/* Options heading - Tertiary Buttons */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_color_tertiary_buttons_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Tertiary Buttons', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_tertiary',
    'label'    => esc_html__( 'Button Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_tertiary_border',
    'label'    => esc_html__( 'Button Border Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#000'
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_tertiary_background',
    'label'    => esc_html__( 'Button Background Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_tertiary_hover',
    'label'    => esc_html__( 'Button Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_tertiary_border_hover',
    'label'    => esc_html__( 'Button Border Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#000'
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_btn_tertiary_background_hover',
    'label'    => esc_html__( 'Button Background Color: Hover', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#000'
) );

/* Options heading - Helper colors */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_colors_helper_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Helper colors', 'zoo-kodo' ) . '</div>',
) );

// Error color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_error',
    'label'    => esc_html__( 'Error Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#d20000'
) );

// Error background color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_background_error',
    'label'    => esc_html__( 'Error Background Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff8f8'
) );

// Success color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_success',
    'label'    => esc_html__( 'Success Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#19a340'
) );

// Success background color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_background_success',
    'label'    => esc_html__( 'Success Background Color', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#f8fff9'
) );

/* Options heading - Shop Colors */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_colors_shop_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'color',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Shop Colors', 'zoo-kodo' ) . '</div>',
) );

// Sale Bubble Color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_sale',
    'label'    => esc_html__( 'Sale Bubble', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_sale_background',
    'label'    => esc_html__( 'Sale Bubble Background', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#dc2f47'
) );

// Review Stars Color
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_color_review',
    'label'    => esc_html__( 'Review Stars', 'zoo-kodo' ),
    'section'  => 'color',
    'default'  => '#f5b401'
) );

/* ----------------------------------------------------------
                    Section - Typography
---------------------------------------------------------- */
$zoo_customize->add_section( 'typography', array(
    'title' => esc_html__( 'Typography', 'zoo-kodo' ),
    'panel' => 'style'
) );

/* Options heading - Body */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_typo_body_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'typography',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Body Font', 'zoo-kodo' ) . '</div>',
) );

// Body font
$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'select',
    'settings' => 'zoo_typo_body_font_choices',
    'label' => esc_html__('', 'zoo-kodo'),
    'section' => 'typography',
    'default' => 'custom-font',
    'description' => esc_html__('Choose custom font(FuturaStd) or google font.', 'zoo-kodo'),
    'choices'   => array(
        'custom-font' => esc_html__( 'FuturaStd font', 'zoo-kodo' ),
        'google-font' => esc_html__( 'Google font', 'zoo-kodo' ),
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'text',
    'settings' => 'zoo_typo_body_font_size',
    'label' => esc_html__('Font size', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '18px',
    'description' => esc_html__('', 'zoo-kodo'),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_body_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'select',
    'settings' => 'zoo_typo_body_font_variant',
    'label' => esc_html__('Variant', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '400',
    'description' => esc_html__('Choose Variant of font.', 'zoo-kodo'),
    'choices'   => array(
        '400' => esc_html__( '400 (Normal)', 'zoo-kodo' ),
        '500' => esc_html__( '500 (Medium)', 'zoo-kodo' ),
        '600' => esc_html__( '600 (Heavy)', 'zoo-kodo' ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_body_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'text',
    'settings' => 'zoo_typo_body_font_line_height',
    'label' => esc_html__('Line height', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '25px',
    'description' => esc_html__('', 'zoo-kodo'),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_body_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'text',
    'settings' => 'zoo_typo_body_font_letter_spacing',
    'label' => esc_html__('Letter Spacing', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '0',
    'description' => esc_html__('', 'zoo-kodo'),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_body_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'        => 'typography',
    'settings'    => 'zoo_typo_body_font',
    'label'       => esc_html__( '', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for your site.', 'zoo-kodo' ),
    'section'     => 'typography',
    'default'     => array(
        'font-family'    => 'Montserrat',
        'variant'        => 'regular',
        'subsets'        => array(),
        'font-size'      => '18px',
        'line-height'    => '25px',
        'letter-spacing' => '0'
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_body_font_choices',
            'operator' => '==',
            'value'    => 'google-font',
        )
    )
) );

/* Options heading - Heading font */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_typo_heading_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'typography',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Heading font', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'select',
    'settings' => 'zoo_typo_heading_font_choices',
    'label' => esc_html__('', 'zoo-kodo'),
    'section' => 'typography',
    'default' => 'custom-font',
    'description' => esc_html__('Choose custom font(FuturaStd) or google font.', 'zoo-kodo'),
    'choices'   => array(
        'custom-font' => esc_html__( 'FuturaStd font', 'zoo-kodo' ),
        'google-font' => esc_html__( 'Google font', 'zoo-kodo' ),
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'select',
    'settings' => 'zoo_typo_heading_font_variant',
    'label' => esc_html__('Variant', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '600',
    'description' => esc_html__('Choose Variant of font.', 'zoo-kodo'),
    'choices'   => array(
        '400' => esc_html__( '400 (Normal)', 'zoo-kodo' ),
        '500' => esc_html__( '500 (Medium)', 'zoo-kodo' ),
        '600' => esc_html__( '600 (Heavy)', 'zoo-kodo' ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_heading_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'text',
    'settings' => 'zoo_typo_heading_font_letter_spacing',
    'label' => esc_html__('Letter Spacing', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '0',
    'description' => esc_html__('', 'zoo-kodo'),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_heading_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'        => 'typography',
    'settings'    => 'zoo_typo_heading_font',
    'label'       => esc_html__( '', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for a heading tag ( h1, h2, h3, h4, h5, h6 ).', 'zoo-kodo' ),
    'section'     => 'typography',
    'default'     => array(
        'font-family'    => 'Montserrat',
        'variant'        => '600',
        'letter-spacing' => '0'
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_heading_font_choices',
            'operator' => '==',
            'value'    => 'google-font',
        )
    )
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_typo_heading_size_h1',
    'label'       => esc_html__( 'H1', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for h1 tag.', 'zoo-kodo' ),
    'section'  => 'typography',
    'default'  => '36px',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_typo_heading_size_h2',
    'label'       => esc_html__( 'H2', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for h2 tag.', 'zoo-kodo' ),
    'section'  => 'typography',
    'default'  => '30px',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_typo_heading_size_h3',
    'label'       => esc_html__( 'H3', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for h3 tag.', 'zoo-kodo' ),
    'section'  => 'typography',
    'default'  => '26px',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_typo_heading_size_h4',
    'label'       => esc_html__( 'H4', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for h4 tag.', 'zoo-kodo' ),
    'section'  => 'typography',
    'default'  => '24px',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_typo_heading_size_h5',
    'label'       => esc_html__( 'H5', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for h5 tag.', 'zoo-kodo' ),
    'section'  => 'typography',
    'default'  => '21px',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_typo_heading_size_h6',
    'label'       => esc_html__( 'H6', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for h6 tag.', 'zoo-kodo' ),
    'section'  => 'typography',
    'default'  => '18px',
) );

/* Options heading - Navigation */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_typo_navigation_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'typography',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Navigation Font', 'zoo-kodo' ) . '</div>',
) );

// Navigation font
$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'select',
    'settings' => 'zoo_typo_navigation_font_choices',
    'label' => esc_html__('', 'zoo-kodo'),
    'section' => 'typography',
    'default' => 'custom-font',
    'description' => esc_html__('Choose custom font(FuturaStd) or google font.', 'zoo-kodo'),
    'choices'   => array(
        'custom-font' => esc_html__( 'FuturaStd font', 'zoo-kodo' ),
        'google-font' => esc_html__( 'Google font', 'zoo-kodo' ),
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'text',
    'settings' => 'zoo_typo_navigation_font_size',
    'label' => esc_html__('Font size', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '18px',
    'description' => esc_html__('', 'zoo-kodo'),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_navigation_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'select',
    'settings' => 'zoo_typo_navigation_font_variant',
    'label' => esc_html__('Variant', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '400',
    'description' => esc_html__('Choose Variant of font.', 'zoo-kodo'),
    'choices'   => array(
        '400' => esc_html__( '400 (Normal)', 'zoo-kodo' ),
        '500' => esc_html__( '500 (Medium)', 'zoo-kodo' ),
        '600' => esc_html__( '600 (Heavy)', 'zoo-kodo' ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_navigation_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'text',
    'settings' => 'zoo_typo_navigation_font_line_height',
    'label' => esc_html__('Line height', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '25px',
    'description' => esc_html__('', 'zoo-kodo'),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_navigation_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'text',
    'settings' => 'zoo_typo_navigation_font_letter_spacing',
    'label' => esc_html__('Letter Spacing', 'zoo-kodo'),
    'section' => 'typography',
    'default' => '0',
    'description' => esc_html__('', 'zoo-kodo'),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_navigation_font_choices',
            'operator' => '==',
            'value'    => 'custom-font',
        )
    )
));

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'        => 'typography',
    'settings'    => 'zoo_typo_navigation_font',
    'label'       => esc_html__( '', 'zoo-kodo' ),
    'description' => esc_html__( 'Select the main typography options for site navigation ', 'zoo-kodo' ),
    'section'     => 'typography',
    'default'     => array(
        'font-family'    => 'Montserrat',
        'variant'        => '500',
        'subsets'        => array(),
        'font-size'      => '18px',
        'line-height'    => '25px',
        'letter-spacing' => '0'
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'zoo_typo_navigation_font_choices',
            'operator' => '==',
            'value'    => 'google-font',
        )
    )
) );
