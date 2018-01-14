<?php
/**
 * Footer Panel
 *
 * @uses    object    $this          CleverTheme
 * @uses    object    $this    Clever_Customizer
 *
 * @package    Clever_Theme\Core\Backend\Customizer
 */
$zoo_customize->add_panel( 'footer', array(
    'title'    => esc_html__( 'Footer', 'zoo-kodo' ),
    'priority' => 82
) );

$zoo_customize->add_section( 'footer-layout-options', array(
    'title' => esc_html__( 'Footer Layout', 'zoo-kodo' ),
    'panel' => 'footer',
) );

$zoo_customize->add_section( 'footer-presets', array(
    'title' => esc_html__( 'Footer Presets', 'zoo-kodo' ),
    'panel' => 'footer',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'radio-image',
    'settings' => 'zoo_footer_layout',
    'label'    => esc_html__( 'Footer Layout', 'zoo-kodo' ),
    'section'  => 'footer-layout-options',
    'default'  => 'default',
    'choices'  => array(
        'default' => esc_url(get_template_directory_uri() . '/lib/assets/icons/footer-style1.png'),
        'style2' => esc_url(get_template_directory_uri() . '/lib/assets/icons/footer-style2.png'),
        'style3' => esc_url(get_template_directory_uri() . '/lib/assets/icons/footer-style3.png'),
        'style4' => esc_url(get_template_directory_uri() . '/lib/assets/icons/footer-style4.png'),
        'style5' => esc_url(get_template_directory_uri() . '/lib/assets/icons/footer-style5.png'),
    ),
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_top_footer',
    'label'     => esc_html__( 'Enable Top Footer', 'zoo-kodo' ),
    'section'   => 'footer-layout-options',
    'default'   => '1',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_main_footer',
    'label'     => esc_html__( 'Enable Main Footer', 'zoo-kodo' ),
    'section'   => 'footer-layout-options',
    'default'   => '1',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_footer_social',
    'label'     => esc_html__( 'Enable Footer Social', 'zoo-kodo' ),
    'section'   => 'footer-layout-options',
    'default'   => '0',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_footer_top_hide_border',
    'label'     => esc_html__( 'Hide Border Bottom of Footer Top.', 'zoo-kodo' ),
    'section'   => 'footer-layout-options',
    'default'   => '1',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_footer_main_hide_border',
    'label'     => esc_html__( 'Hide Border Bottom of Footer Main.', 'zoo-kodo' ),
    'section'   => 'footer-layout-options',
    'default'   => '1',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_footer_copyright_hide_border',
    'label'     => esc_html__( 'Hide Border Bottom of Footer Copyright.', 'zoo-kodo' ),
    'section'   => 'footer-layout-options',
    'default'   => '0',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'textarea',
    'settings' => 'zoo_footer_copyright',
    'label'    => esc_html__( 'Copyright text', 'zoo-kodo' ),
    'section'  => 'footer-layout-options',
    'default'  => esc_attr( 'Copyright &#169; 2017 Cleversoft. All rights reserved.','zoo-kodo' )
) );

/* Footer Background */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_footer_background_color',
    'label'    => esc_html__( 'Background Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'image',
    'settings'  => 'zoo_footer_background_image',
    'label'     => esc_html__( 'Background Image', 'zoo-kodo' ),
    'section'   => 'footer-presets',
    'default'   => ''
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_footer_background_size',
    'label'    => esc_html__( 'Background Size', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => 'cover',
    'choices'  => array(
        'auto'  => esc_html__( 'Auto', 'zoo-kodo' ),
        'cover' => esc_html__( 'Cover', 'zoo-kodo' ),
        'contain' => esc_html__( 'Contain', 'zoo-kodo' ),
        'initial' => esc_html__( 'Initial', 'zoo-kodo' )
    ),
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_footer_background_repeat',
    'label'    => esc_html__( 'Background Repeat', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => 'no-repeat',
    'choices'  => array(
        'no-repeat'  => esc_html__( 'No Repeat', 'zoo-kodo' ),
        'repeat' => esc_html__( 'Repeat', 'zoo-kodo' ),
        'repeat-x' => esc_html__( 'Repeat X', 'zoo-kodo' ),
        'repeat-y' => esc_html__( 'Repeat Y', 'zoo-kodo' )
    ),
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_footer_background_position',
    'label'    => esc_html__( 'Background Position', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => 'center center',
    'choices'  => array(
        'left top'  => esc_html__( 'Left Top', 'zoo-kodo' ),
        'left center' => esc_html__( 'Left Center', 'zoo-kodo' ),
        'left bottom' => esc_html__( 'Left Bottom', 'zoo-kodo' ),
        'right top' => esc_html__( 'Right Top', 'zoo-kodo' ),
        'right center' => esc_html__( 'Right Center', 'zoo-kodo' ),
        'right bottom' => esc_html__( 'Right Bottom', 'zoo-kodo' ),
        'center top' => esc_html__( 'Center Top', 'zoo-kodo' ),
        'center bottom' => esc_html__( 'Center Bottom', 'zoo-kodo' ),
        'center center' => esc_html__( 'Center Center', 'zoo-kodo' )
    ),
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_footer_background_attachment',
    'label'    => esc_html__( 'Background Attachment', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => 'scroll',
    'choices'  => array(
        'scroll'  => esc_html__( 'Scroll', 'zoo-kodo' ),
        'fixed' => esc_html__( 'Fixed', 'zoo-kodo' )
    ),
) );

/* Options heading - Top footer */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_top_footer_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'footer-presets',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Top Footer', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_top_footer_color',
    'label'    => esc_html__( 'Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#777'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_top_footer_link_color',
    'label'    => esc_html__( 'Link color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#777'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_top_footer_link_color_hover',
    'label'    => esc_html__( 'Link Color Hover', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#dc2f47'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_top_footer_block_title_color',
    'label'    => esc_html__( 'Block title color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#222'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_top_footer_field_background_color',
    'label'    => esc_html__( 'Field Background Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_top_footer_background_color',
    'label'    => esc_html__( 'Background Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#f5f5f5'
) );

/* Options heading - Main footer */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_main_footer_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'footer-presets',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Main Footer', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_main_footer_color',
    'label'    => esc_html__( 'Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#777'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_main_footer_link_color',
    'label'    => esc_html__( 'Link color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#777'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_main_footer_link_color_hover',
    'label'    => esc_html__( 'Link Color Hover', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#dc2f47'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_main_footer_block_title_color',
    'label'    => esc_html__( 'Block title color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#222'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_main_footer_field_background_color',
    'label'    => esc_html__( 'Field Background Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#fff'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_main_footer_background_color',
    'label'    => esc_html__( 'Background Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#fff'
) );

/* Options heading - Copyright footer */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_copyright_footer_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'footer-presets',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Copyright Footer', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_copyright_footer_color',
    'label'    => esc_html__( 'Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#777'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_copyright_footer_link_color',
    'label'    => esc_html__( 'Link color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#777'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_copyright_footer_link_color_hover',
    'label'    => esc_html__( 'Link Color Hover', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#dc2f47'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_copyright_footer_border_color',
    'label'    => esc_html__( 'Border Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#ebebeb'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_copyright_footer_background_color',
    'label'    => esc_html__( 'Background Color', 'zoo-kodo' ),
    'section'  => 'footer-presets',
    'default'  => '#fff'
) );
