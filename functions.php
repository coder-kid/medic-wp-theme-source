<?php


/**
 * This function is responsible for handling theme assets file. 
 * 
 * @return void
 */
function medic_scripts() {

    /* ---------------------- */
    /* CSS
    /* ---------------------- */
    wp_enqueue_style(
        'slick',
        get_template_directory_uri() . '/plugins/slick/slick.css',
        []
    );

    wp_enqueue_style(
        'slick-theme',
        get_template_directory_uri() . '/plugins/slick/slick-theme.css',
        []
    );


    wp_enqueue_style(
        'jquery.fancybox',
        get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.css',
        []
    );


    wp_enqueue_style(
        'medic-main-css',
        get_template_directory_uri() . '/css/style.css',
        []
    );


    /* ---------------------- */
    /* JS
    /* ---------------------- */
    wp_enqueue_script(
        'jquery'
    );

    wp_enqueue_script(
        'jquery-ui'
    );

    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/plugins/bootstrap.min.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'bootstrap-select',
        get_template_directory_uri() . '/plugins/bootstrap-select.min.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'slick',
        get_template_directory_uri() . '/plugins/slick/slick.min.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'jquery.fancybox',
        get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'maps.googleapis',
        '//maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'maps.googleapis',
        get_template_directory_uri() . '/plugins/google-map/gmap.js',
        ['maps.googleapis', 'jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'validate',
        get_template_directory_uri() . '/plugins/validate.js',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'wow',
        get_template_directory_uri() . '/plugins/wow.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'timePicker',
        get_template_directory_uri() . '/plugins/timePicker.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'script',
        get_template_directory_uri() . '/js/script.js',
        ['jquery'],
        null,
        true
    );

}
add_action( 'wp_enqueue_scripts', 'medic_scripts' );


/**
 * After setup themes options
 * 
 * @return void
 */
function medic_after_setup_options() {

    register_nav_menus([
        'header-menu' => __( 'Header Menu', 'medic-wp' )
    ]);

    add_theme_support('post-thumbnails');

}
add_action( 'after_setup_theme', 'medic_after_setup_options' );


/**
 * Medic Slider Custom Posts
 * 
 * @return void
 */
add_action( 'init', 'medic_slider_posts' );
function medic_slider_posts() {

    register_post_type(
        'slider',
        [
            'label'  => __( 'Slider', 'medic-wp' ),
            'labels' => [
                'name' => __( 'Slider', 'medic-wp' ),
                'add_new_item'  => __( 'Add New Slider', 'medic-wp' )
            ],
            'public'    => true,
            'supports'  => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ]
        ]
    );

}

/**
 * Include theme options core file
 * 
 * @return void
 */
require_once get_template_directory() .'/lib/codestar-framework/cs-framework.php';
require_once get_template_directory() . '/inc/medic-theme-options.php';
require_once get_template_directory() . '/inc/medic-metaboxes.php';

function get_medic_logo() {

    $logo_switcher = cs_get_option('logo_switcher');
    ?>
        <div class="logo">
            <?php
                if( ! $logo_switcher ) :
                    $logo = wp_get_attachment_image_src( cs_get_option( 'site_logo' ), 'thumbnail' );
                ?>
                <figure>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo[0]); ?>" alt="" width="130">
                    </a>
                </figure>
                <?php
                    else :
                        $logo_text = cs_get_option('logo_text');
                        if( ! empty($logo_text) ) :
                            $logo_text = str_split($logo_text, 7)[0];
                ?>
                <h4 class="site-logo"><?php echo esc_attr($logo_text); ?></h4>
            <?php
                    endif; // End Of if( ! empty($logo_text) ) :
                endif; // End Of if( ! $logo_switcher ) :
            ?>
        </div>
    <?php
}

add_action( 'widgets_init', 'medic_sidebars' );
function medic_sidebars() {
    register_sidebar([
        'name'          => __( 'Footer Sidebar', 'theme-slug' ),
        'id'            => 'medic_footer_sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'medic-wp' ),

        'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-6 col-xs-12 %2$s"><div class="medic-footer-widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',

    ]);
}

/**
 * Footer widget location shortcode
 * 
 * @return html
 */
add_shortcode( 'location_link', 'location_link_shortcode' );
function location_link_shortcode( $atts ) {
    extract(shortcode_atts([
        'icon'  => 'twitter',
        'text'  => 'Follow me on twitter.'
    ], $atts));

    ob_start();
    ?>
        <ul class="location-link">
            <li class="item">
                <i class="fa fa-<?= $icon; ?>"></i>
                <p><?= $text; ?></p>
            </li>
        </ul>
    <?php
    return ob_get_clean();
}

add_shortcode( 'footer_social_link', 'footer_social_link_shortcode' );
function footer_social_link_shortcode( $atts ) {

    $data = shortcode_atts([
        'icon'  => 'twitter',
        'link'  => '#'
    ], $atts);

    $icon         = explode(', ', $data['icon']);
    $links        = explode(', ', $data['link']);
    $i            = min(count($icon), count($links));
    $social_icons = [];

    for($j = 0; $j < $i; $j++) {
        $social_icons[$icon[$j]] = $links[$j];
    }
    
    ob_start();
    ?>
        <ul class="list-inline social-icons">
            <?php foreach($social_icons as $icon => $link) : ?>
                <li><a href="<?= esc_url($link); ?>"><i class="fa fa-<?= $icon; ?>"></i></a></li>
            <?php endforeach; ?>
        </ul>
    <?php
    return ob_get_clean();




}