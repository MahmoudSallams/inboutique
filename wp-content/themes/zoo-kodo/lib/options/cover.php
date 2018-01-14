<?php
/**
 * Blog Panel
 *
 * @uses    object    $this          CleverTheme
 * @uses    object    $this    Clever_Customizer
 *
 * @package    Clever_Theme\Core\Backend\Customizer
 */
$zoo_customize->add_panel( 'cover', array(
    'title'       => esc_html__( 'Cover Layout', 'zoo-kodo' ),
    'priority' => 84
) );
/* ----------------------------------------------------------
					Cover Page
---------------------------------------------------------- */
$zoo_customize->add_section( 'cover-page', array(
    'title'       => esc_html__( 'Cover Page', 'zoo-kodo' ),
    'panel'       => 'cover',
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'custom',
    'settings' => 'zoo_heading_page_cover',
    'label'    => esc_html__( '', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Page Cover Layout', 'zoo-kodo' ) . '</div>',
    'section'  => 'cover-page',
    'priority'    => 7
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_page_cover',
    'label'    => esc_html__( 'Page cover', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'section'  => 'cover-page',
    'default'  => 'none',
    'choices'  => array(
        'image'  => esc_html__('Images','zoo-kodo'),
        'color'  => esc_html__('Color','zoo-kodo'),
        'none'  => esc_html__('None','zoo-kodo'),
    ),
    'priority'    => 7
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_page_cover_color',
    'label'    => esc_html__( 'Page cover color', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'section'  => 'cover-page',
    'default'  => '#dc2f47',
    'active_callback'    => array(
        array(
            'setting'  => 'zoo_page_cover',
            'operator' => '==',
            'value'    => 'color',
        ),
    ),
    'priority'    => 7
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'image',
    'settings' => 'zoo_page_cover_image',
    'label'    => esc_html__( 'Page cover image', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'section'  => 'cover-page',
    'default'  => '',
    'active_callback'    => array(
        array(
            'setting'  => 'zoo_page_cover',
            'operator' => '==',
            'value'    => 'image',
        ),
    ),
    'priority'    => 7
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'number',
    'settings' => 'zoo_page_cover_height',
    'label'    => esc_html__( 'Page cover height', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'active_callback'    => array(
        array(
            'setting'  => 'zoo_page_cover',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'section'  => 'cover-page',
    'default'  => '',
    'priority'    => 7
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_page_cover_title',
    'label'    => esc_html__( 'Page cover title', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'active_callback'    => array(
        array(
            'setting'  => 'zoo_page_cover',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'section'  => 'cover-page',
    'default'  => '',
    'priority'    => 7
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_page_cover_title_color',
    'label'    => esc_html__( 'Page cover title color', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'active_callback'    => array(
        array(
            'setting'  => 'zoo_page_cover',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'section'  => 'cover-page',
    'default'  => '#fff',
    'priority'    => 7
) );

$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'text',
    'settings' => 'zoo_page_cover_des',
    'label'    => esc_html__( 'Page cover description', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'active_callback'    => array(
        array(
            'setting'  => 'zoo_page_cover',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'section'  => 'cover-page',
    'default'  => '',
    'priority'    => 7
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'color',
    'settings' => 'zoo_page_cover_des_color',
    'label'    => esc_html__( 'Page cover description color', 'zoo-kodo' ),
    'description'=> esc_html__( '', 'zoo-kodo' ),
    'active_callback'    => array(
        array(
            'setting'  => 'zoo_page_cover',
            'operator' => '!=',
            'value'    => 'none',
        ),
    ),
    'section'  => 'cover-page',
    'default'  => '#fff',
    'priority'    => 7
) );