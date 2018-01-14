<?php
/**
 * Social Panel
 *
 * @uses    object    $wp_customize     WP_Customize_Manager
 * @uses    object    $this             Zoo_Customizer
 *
 * @package    Zoo_Theme\Core\Backend\Customizer
 */

/* ----------------------------------------------------------
					Section - Social
---------------------------------------------------------- */
$zoo_customize->add_section( 'social', array(
	'title' => esc_html__( 'Social', 'zoo-kodo' ),
	'priority' => 87
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_facebook',
	'label'    		=> esc_html__( 'Facebook', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your facebook page/profile url', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '#',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_twitter',
	'label'    		=> esc_html__( 'Twitter', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Twitter username (no @).', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '#',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_instagram',
	'label'    		=> esc_html__( 'Instagram', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Instagram username', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_dribbble',
	'label'    		=> esc_html__( 'Dribbble', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Dribbble username', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_vimeo',
	'label'    		=> esc_html__( 'Vimeo', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Vimeo username', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_tumblr',
	'label'    		=> esc_html__( 'Tumblr', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Tumblr username', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_skype',
	'label'    		=> esc_html__( 'Skype', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Skype username', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '#',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_linkedin',
	'label'    		=> esc_html__( 'LinkedIn', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your LinkedIn page/profile url', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_googleplus',
	'label'    		=> esc_html__( 'Google+', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Google+ page/profile URL', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '#',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_flickr',
	'label'    		=> esc_html__( 'Flickr', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Flickr page url', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_youtube',
	'label'    		=> esc_html__( 'YouTube', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your YouTube URL', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '#',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_pinterest',
	'label'    		=> esc_html__( 'Pinterest', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Pinterest username', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_foursquare',
	'label'    		=> esc_html__( 'Foursquare', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Foursqaure URL', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_github',
	'label'    		=> esc_html__( 'GitHub', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your GitHub URL', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );

$zoo_customize->add_field( 'zoo_customizer', array(
	'type'     		=> 'text',
	'settings' 		=> 'zoo_social_xing',
	'label'    		=> esc_html__( 'Xing', 'zoo-kodo' ),
	'description' 	=> esc_html__( 'Your Xing URL', 'zoo-kodo' ),
	'section'  		=> 'social',
	'default'  		=> '',
) );
