<?php
/**
 * This file is responsible for medic theme options.
 * 
 * @source function.php
 */
if( ! defined('ABSPATH') ) exit;

/**
 * 
 * Medic theme options framework settings.
 */
add_filter('cs_framework_settings', 'medic_framework_settings' );
function medic_framework_settings( $settings ) {
    return [
        'menu_title'      => 'Options',
        'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
        'menu_slug'       => 'medic-options',
        'ajax_save'       => false,
        'show_reset_all'  => false,
        'framework_title' => 'Medic Options <small>by CIT</small>',
    ];
}

/**
 * 
 * Medic theme options
 */
add_filter('cs_framework_options', 'medic_theme_options');
function medic_theme_options( $options ) {
    $options = [];

    $options[] = [
        'name'      => 'section_header',
        'title'     => __( 'Header Section', 'medic-wp' ),
        'icon'      => 'fa fa-heart',
        'fields'    => [
            [
                'id'      => 'header_text',
                'type'    => 'text',
                'title'   => __( 'Header Text', 'medic-wp' ),
                'default' => 'Opening Hours : Saturday to Tuesday - 7am to 3pm'
            ],
            [
                'id'              => 'header_social_icons',
                'type'            => 'group',
                'title'           => __( 'Header Social Icons', 'medic-wp' ),
                'button_title'    => 'Add New Icon',
                'accordion_title' => 'Social Icon',
                'fields'            => [
                    [
                        'id'    => 'social_icon',
                        'type'  => 'icon',
                        'title' => __( 'Social Icon', 'medic-wp' )
                    ],
                    [
                        'id'    => 'social_link',
                        'type'  => 'text',
                        'title' => __( 'Social Link', 'medic-wp' )
                    ]
                ]
            ]
        ]

    ];

    $options[] = [
        'name'      => 'section_subheader',
        'title'     => __( 'Header Section', 'medic-wp' ),
        'icon'      => 'fa fa-leaf',
        'fields'    => [
            [
                'id'      => 'logo_switcher',
                'type'    => 'switcher',
                'title'   => __( 'Logo Switcher', 'medic-wp' ),
                'label'   => 'Do you want text logo?',
            ],
            [
                'id'         => 'site_logo',
                'type'       => 'image',
                'title'      => __( 'Site Logo', 'medic-wp' ),
                'desc'       => __( 'Upload site logo.', 'medic-wp' ),
                'dependency' => [ 'logo_switcher', '==', 'false' ]
            ],
            [
                'id'         => 'logo_text',
                'type'       => 'text',
                'title'      => __( 'Logo', 'medic-wp' ),
                'dependency' => [ 'logo_switcher', '==', 'true' ]
            ]
            
        ]
    ];

    return $options;
}