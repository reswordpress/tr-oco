<?php
// header('Cache-Control: no-cache, no-store, must-revalidate');
// header('Pragma: no-cache');
// header('Expires: 0');

// Define Theme Directory - This points to the /wordpress/assets folder
define('THEME_DIR', get_template_directory_uri());

// Admin Assets
function admin_assets()
{
    wp_enqueue_style('admin-style', THEME_DIR . '/css/admin.css');
    wp_enqueue_script('admin-script', THEME_DIR . '/js/admin.js', array('jquery'));
}

add_action('admin_enqueue_scripts', 'admin_assets');

// Theme Assets
function theme_assets()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }

    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js');
    wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'));
    wp_enqueue_script('bootstrap-script', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('popper'));

    wp_enqueue_style('main-style', THEME_DIR . '/css/theme.css');
    wp_enqueue_script('main-script', THEME_DIR . '/js/theme.js', array('jquery', 'bootstrap-script'));

    wp_enqueue_style('owl-carousel', THEME_DIR . '/css/owl.carousel.css');
}

add_action('wp_enqueue_scripts', 'theme_assets');

// tr_frontend();
