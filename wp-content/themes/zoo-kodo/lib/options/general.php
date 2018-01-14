<?php
/**
 * General Panel
 *
 * @uses    object    $this          CleverTheme
 * @uses    object    $this    Clever_Customizer
 *
 * @package    Clever_Theme\Core\Backend\Customizer
 */

$zoo_customize->add_section( 'general', array(
    'title'    => esc_html__( 'General', 'zoo-kodo' ),
    'priority' => 1
) );

/* Options heading - Site layout */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_site_layout_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Site layout', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'radio-buttonset',
    'settings' => 'zoo_site_layout',
    'label'    => esc_html__( 'Available Layout', 'zoo-kodo' ),
    'section'  => 'general',
    'default'  => 'full',
    'choices'  => array(
        'full'  => esc_html__( 'Full Width', 'zoo-kodo' ),
        'boxed' => esc_html__( 'Boxed', 'zoo-kodo' )
    ),
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'switch',
    'settings' => 'zoo_enable_font_awesome',
    'label'     => esc_html__( 'Enable page loader Font Awesome', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => 'off',
    'choices'     => array(
        'on'  => esc_html__( 'On', 'zoo-kodo' ),
        'off' => esc_html__( 'Off', 'zoo-kodo' ),
    ),
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_site_layout_box_shadow',
    'label'     => esc_html__( 'Add Drop Shadow to Content box', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => '1',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_site_disable_breadcrumbs',
    'label'     => esc_html__( 'If check, breadcrumbs will hide.', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => '0',
) );

/* Options heading - Search box */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_site_search_box_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Search Box', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'select',
    'settings'  => 'zoo_site_search_box_layout',
    'label'     => esc_html__( 'Choose search box layout', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => 'popup',
    'choices'     => array(
        'default'  => esc_html__( 'Default', 'zoo-kodo' ),
        'popup' => esc_html__( 'Popup', 'zoo-kodo' ),
    ),
) );

/* Options heading - Site background */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_site_background_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Site Background', 'zoo-kodo' ) . '</div>',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'color',
    'settings'  => 'zoo_site_background_color',
    'label'     => esc_html__( 'Default Background Color', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => '#fff',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'image',
    'settings'  => 'zoo_site_background_image',
    'label'     => esc_html__( 'Default Background Image', 'zoo-kodo' ),
    'section'   => 'general',
    'default'   => ''
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_site_background_size',
    'label'    => esc_html__( 'Background Size', 'zoo-kodo' ),
    'section'  => 'general',
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
    'settings' => 'zoo_site_background_repeat',
    'label'    => esc_html__( 'Background Repeat', 'zoo-kodo' ),
    'section'  => 'general',
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
    'settings' => 'zoo_site_background_position',
    'label'    => esc_html__( 'Background Position', 'zoo-kodo' ),
    'section'  => 'general',
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
    'settings' => 'zoo_site_background_attachment',
    'label'    => esc_html__( 'Background Attachment', 'zoo-kodo' ),
    'section'  => 'general',
    'default'  => 'scroll',
    'choices'  => array(
        'scroll'  => esc_html__( 'Scroll', 'zoo-kodo' ),
        'fixed' => esc_html__( 'Fixed', 'zoo-kodo' )
    ),
) );
