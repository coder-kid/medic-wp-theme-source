<?php
/**
 * This file is responsible for medic metaboxes.
 * 
 * @source function.php
 */
if( ! defined('ABSPATH') ) exit;


add_filter( 'cs_metabox_options', 'medic_metaboxes' );
function medic_metaboxes( $options ) {
    $options = [];

    $options[] = [
        'id'        => '_slider_metaboxes',
        'title'     => __( 'Slider Options', 'medic-wp' ),
        'post_type' => 'slider',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => [
            [
                'name'   => 'slider_section',
                'title'  => __ ('Button', 'medic-wp' ),
                'icon'   => 'fa fa-cog',
                'fields' => [
                    [
                        'id'    => 'button_text',
                        'type'  => 'text',
                        'title' => __('Button Text', 'medic-wp' ),
                        'attributes' => [
                            'placeholder'   => 'placeholder text'
                        ]
                    ],
                    [
                        'id'    => 'button_link',
                        'type'  => 'text',
                        'title' => __('Button Link', 'medic-wp' )
                    ]
                ]
            ]
        ]
    ];

    return $options;
}