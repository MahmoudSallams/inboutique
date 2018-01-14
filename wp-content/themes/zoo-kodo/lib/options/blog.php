<?php
/**
 * Blog Panel
 *
 * @uses    object    $this          CleverTheme
 * @uses    object    $this    Clever_Customizer
 *
 * @package    Clever_Theme\Core\Backend\Customizer
 */
$zoo_customize->add_panel( 'blog', array(
    'title'       => esc_html__( 'Blog', 'zoo-kodo' ),
    'description' => esc_html__( 'Blog theme options.', 'zoo-kodo' ),
    'priority' => 84
) );
/* ----------------------------------------------------------
					Section - Blog Archive
---------------------------------------------------------- */
$zoo_customize->add_section( 'blog-archive', array(
    'title'       => esc_html__( 'Blog Archive', 'zoo-kodo' ),
    'panel'       => 'blog',
    'description' => esc_html__( 'Set a default layout for your archive page.', 'zoo-kodo' )
) );
$zoo_customize->add_field('zoo_customizer', array(
    'type' => 'custom',
    'settings' => 'zoo_blog_layout_heading',
    'label' => esc_html__('', 'zoo-kodo'),
    'section' => 'blog-archive',
    'default' => '<div class="zoo-options-heading">' . esc_html__('Blog Layout', 'zoo-kodo') . '</div>',
));
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_blog_layout',
    'label'    => esc_html__( 'Posts layout', 'zoo-kodo' ),
    'section'  => 'blog-archive',
    'default'  => 'grid',
    'choices'  => array(
        'grid'  => esc_html__('Grid','zoo-kodo'),
        'list'  => esc_html__('List','zoo-kodo'),
        'minimal'  => esc_html__('Minimal','zoo-kodo'),
    ),
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_blog_col',
    'label'    => esc_html__( 'Columns', 'zoo-kodo' ),
    'section'  => 'blog-archive',
    'default'  => '1',
    'description' => esc_html__( 'Columns per row of grid layout.', 'zoo-kodo' ),
    'choices'  => array(
        '1'  => esc_html__('1','zoo-kodo'),
        '2'  => esc_html__('2','zoo-kodo'),
        '3'  => esc_html__('3','zoo-kodo'),
        '4'  => esc_html__('4','zoo-kodo'),
        '5'  => esc_html__('5','zoo-kodo'),
        '6'  => esc_html__('6','zoo-kodo'),
    ),
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_blog_show_excerpt',
    'label'     => esc_html__( 'Show Excerpt', 'zoo-kodo' ),
    'section'   => 'blog-archive',
    'default'   => '1',
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'slider',
    'settings'  => 'zoo_blog_excerpt_length',
    'label'     => esc_html__( 'Number character display the post excerpt.', 'zoo-kodo' ),
    'section'   => 'blog-archive',
    'default'   => '60',
    'choices'     => array(
        'min'  => '0',
        'max'  => '200',
        'step' => '1',
    ),
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_blog_pagination',
    'label'    => esc_html__( 'Posts Pagination type', 'zoo-kodo' ),
    'section'  => 'blog-archive',
    'default'  => 'numeric',
    'choices'  => array(
        'numeric'  => esc_html__('Numeric','zoo-kodo'),
        'simple'  => esc_html__('Simple','zoo-kodo'),
        'ajaxload'  => esc_html__('Ajax load more','zoo-kodo'),
        'infinity'  => esc_html__('Infinity scroll','zoo-kodo'),
    ),
) );
/* ----------------------------------------------------------
					Section - Blog Single Post
---------------------------------------------------------- */
$zoo_customize->add_section( 'blog-single', array(
    'title'       => esc_html__( 'Blog Single Post', 'zoo-kodo' ),
    'panel'       => 'blog',
    'description' => esc_html__( 'Set a default layout for your single post page.', 'zoo-kodo' )
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_blog_single_tags',
    'label'     => esc_html__( 'Show Tags', 'zoo-kodo' ),
    'section'   => 'blog-single',
    'default'   => '1',
) );
/* Options heading - Blog Related Posts */
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'custom',
    'settings'  => 'zoo_blog_single_related_heading',
    'label'     => esc_html__( '', 'zoo-kodo' ),
    'section'   => 'blog-single',
    'default'   => '<div class="zoo-options-heading">' . esc_html__( 'Blog Related Posts', 'zoo-kodo' ) . '</div>',
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'checkbox',
    'settings'  => 'zoo_blog_single_related',
    'label'     => esc_html__( 'Show Related posts', 'zoo-kodo' ),
    'section'   => 'blog-single',
    'default'   => '1',
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'      => 'slider',
    'settings'  => 'zoo_blog_single_related_number_items',
    'label'     => esc_html__( 'Number items', 'zoo-kodo' ),
    'section'   => 'blog-single',
    'default'   => '3',
    'choices'     => array(
        'min'  => '1',
        'max'  => '6',
        'step' => '1',
    ),
) );
/* ----------------------------------------------------------
					Section - Blog Archive
---------------------------------------------------------- */
$zoo_customize->add_section( 'blog-sidebar', array(
    'title'       => esc_html__( 'Blog sidebar', 'zoo-kodo' ),
    'panel'       => 'blog',
    'description' => esc_html__( 'Set a default sidebar for your archive page.', 'zoo-kodo' )
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_blog_sidebar_left',
    'label'    => esc_html__( 'Blog Sidebar Left', 'zoo-kodo' ),
    'section'  => 'blog-sidebar',
    'description' => esc_html__( 'If select none, left sidebar will hide.', 'zoo-kodo' ),
    'choices'  => zoo_get_sidebar_options(),
    'default'  => 'none',
) );
$zoo_customize->add_field( 'zoo_customizer', array(
    'type'     => 'select',
    'settings' => 'zoo_blog_sidebar_right',
    'label'    => esc_html__( 'Blog Sidebar Right', 'zoo-kodo' ),
    'description' => esc_html__( 'If select none, right sidebar will hide.', 'zoo-kodo' ),
    'section'  => 'blog-sidebar',
    'choices'  => zoo_get_sidebar_options(),
    'default'  => 'sidebar-1',
) );
