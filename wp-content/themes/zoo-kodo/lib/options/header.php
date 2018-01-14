<?php
/**
 * Header Panel
 *
 * @uses    object    $this          CleverTheme
 * @uses    object    $this    zoo_Customizer
 *
 * @package    zoo_Theme\Core\Backend\Customizer
 */

/* ----------------------------------------------------------
					Section - Site Identity
---------------------------------------------------------- */

$zoo_customize->add_field( 'zoo_customizer',  array(
    'type'     => 'number',
    'settings' => 'zoo_logo_height',
    'label'    => esc_html__( 'Logo Height', 'zoo-kodo' ),
    'description' => esc_html__( 'Height of logo. If it blank, logo will use keep original size of logo image', 'zoo-kodo' ),
    'section'  => 'title_tagline',
    'default'  => '',
) );
$zoo_customize->add_field( 'zoo_customizer',  array(
    'type'     => 'number',
    'settings' => 'zoo_logo_mobile_height',
    'label'    => esc_html__( 'Logo Mobile Height', 'zoo-kodo' ),
    'description' => esc_html__( 'Height of logo in mobile. If it blank, logo will use keep original size of logo image', 'zoo-kodo' ),
    'section'  => 'title_tagline',
    'default'  => '',
) );

$zoo_customize->add_field( 'zoo_customizer',  array(
    'type'     => 'slider',
    'settings' => 'zoo_logo_padding_top',
    'label'    => esc_html__( 'Logo Padding Top', 'zoo-kodo' ),
    'section'  => 'title_tagline',
    'default'  => 0,
    'choices'  => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1
    ),
) );

$zoo_customize->add_field( 'zoo_customizer',  array(
    'type'     => 'slider',
    'settings' => 'zoo_logo_padding_bottom',
    'label'    => esc_html__( 'Logo Padding Bottom', 'zoo-kodo' ),
    'section'  => 'title_tagline',
    'default'  => 0,
    'choices'  => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1
    ),
) );

$zoo_customize->add_field( 'zoo_customizer',  array(
    'type'        => 'image',
    'settings'    => 'zoo_site_logo_sticky',
    'label'       => esc_html__( 'Site Logo - Sticky', 'zoo-kodo' ),
    'description' => esc_html__( 'An alternative logo image used on headers sticky.', 'zoo-kodo' ),
    'section'     => 'title_tagline',
    'transport'   => $transport,
) );

$zoo_customize->add_field( 'zoo_customizer',  array(
    'type'     => 'number',
    'settings' => 'zoo_logo_sticky_height',
    'label'    => esc_html__( 'Sticky Logo Height', 'zoo-kodo' ),
    'description' => esc_html__( 'Height of sticky logo. If it blank, logo will use keep original size of sticky logo image', 'zoo-kodo' ),
    'section'  => 'title_tagline',
    'default'  => '',
) );

$zoo_customize->add_panel( 'header', array(
    'title'    => esc_html__( 'Header', 'zoo-kodo' ),
    'priority' => 80
) );
/* ----------------------------------------------------------
					Section - Header Presets
---------------------------------------------------------- */
$zoo_customize->add_section( 'header-layout-options', array(
    'title' => esc_html__( 'Header Layout', 'zoo-kodo' ),
    'panel' => 'header',
) );
$zoo_customize->add_section( 'header-presets', array(
    'title' => esc_html__( 'Header Presets', 'zoo-kodo' ),
    'panel' => 'header',
) );

/* Options heading - Header */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_header_layout_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'header-layout-options',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Header Layout', 'zoo-kodo' ) . '</div>',
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'radio-image',
    'settings' => 'zoo_header_layout',
    'label'    => esc_html__( 'Header layout', 'zoo-kodo' ),
    'section'  => 'header-layout-options',
    'default'  => 'menu-right',
    'choices'  => array(
        'menu-left' => esc_url(get_template_directory_uri() . '/lib/assets/icons/menu-left.png'),
        'menu-right' => esc_url(get_template_directory_uri() . '/lib/assets/icons/menu-right.png'),
        'menu-center' => esc_url(get_template_directory_uri() . '/lib/assets/icons/menu-center.png'),
        'stack-center' => esc_url(get_template_directory_uri() . '/lib/assets/icons/stack-center.png'),
        'stack-center-2' => esc_url(get_template_directory_uri() . '/lib/assets/icons/stack-center-2.png'),
        'stack-center-3' => esc_url(get_template_directory_uri() . '/lib/assets/icons/stack-center-3.png'),
        'logo-center' => esc_url(get_template_directory_uri() . '/lib/assets/icons/logo-center.png'),
        'landing-header' => esc_url(get_template_directory_uri() . '/lib/assets/icons/landing-header.png'),
    ),
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_header_transparent',
    'label'     => esc_html__( 'Use header transparent', 'zoo-kodo' ),
    'section'   => 'header-layout-options',
    'default'   => '0',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_header_sticky',
    'label'     => esc_html__( 'Use sticky header', 'zoo-kodo' ),
    'section'   => 'header-layout-options',
    'default'   => '1',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_header_fullwidth',
    'label'     => esc_html__( '100% Header Width', 'zoo-kodo' ),
    'section'   => 'header-layout-options',
    'default'   => '0',
) );

/* Options heading - Top Bar */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_header_top_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'header-layout-options',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Top Bar', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_header_top',
    'label'     => esc_html__( 'Enable top bar header', 'zoo-kodo' ),
    'section'   => 'header-layout-options',
    'default'   => '1',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_header_top_presets_heading',
    'section'   => 'header-presets',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Top Bar', 'zoo-kodo' ) . '</div>',
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_top_color',
    'label'    => esc_html__( 'Color', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#252525'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_top_link_color',
    'label'    => esc_html__( 'Link color', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#252525'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_top_link_color_hover',
    'label'    => esc_html__( 'Link color hover', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#dc2f47'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_top_border_color',
    'label'    => esc_html__( 'Border color', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#ebebeb'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_top_background_color',
    'label'    => esc_html__( 'Background', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#fff'
) );

/* Options heading - Header main */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_header_main_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'header-presets',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Header Main', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_main_color',
    'label'    => esc_html__( 'Color', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#252525'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_main_link_color',
    'label'    => esc_html__( 'Link color', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#252525'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_main_link_color_hover',
    'label'    => esc_html__( 'Link color hover', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#dc2f47'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_main_background_color',
    'label'    => esc_html__( 'Background', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#fff'
) );

/* Options heading - Header sticky */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_header_sticky_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'header-presets',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Header Sticky', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_sticky_color',
    'label'    => esc_html__( 'Color', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#252525'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_sticky_link_color',
    'label'    => esc_html__( 'Link color', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#252525'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_sticky_link_color_hover',
    'label'    => esc_html__( 'Link color hover', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#dc2f47'
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_header_sticky_background_color',
    'label'    => esc_html__( 'Background', 'zoo-kodo' ),
    'section'  => 'header-presets',
    'default'  => '#fff'
) );
