<?php

// Load plugins for 'majafe' theme
include_once('plugins/acf-repeater/acf-repeater.php');

if (!function_exists('majafe_setup')) :

    function remove_admin_login_header() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }
    add_action('get_header', 'remove_admin_login_header');

    function menu_majafe() {
        register_nav_menus(array(
            'theme_location' => 'main menu'
        ));
    }
    add_action('init', 'menu_majafe');

    // Set up custom menu 'main-menu' and display configured custom fields.
    function custom_menu_majafe() {
        // get whole content of menu (for logo & social content)
        $menu = wp_get_nav_menu_object('main menu');
        $logo = get_field('logo', $menu);
        $logoAlt = get_field('logo-alt', $menu);
        $email = get_field('contact_email', $menu);
        // get menu items
        $menu_items = wp_get_nav_menu_items('main menu');

        echo '<div class="navbar-brand"><img class="brand-logo" src="' . $logo . '" alt="' . $logoAlt . '"></div>';

        echo '<div class="navbar-menu">';

            if($menu_items) {

                echo '<ul class="menu-list">';

                foreach ($menu_items as $menu_item) {

                    $menu_item_title = sanitize_title($menu_item->title);

                    echo '<li class="menu__item"><a href="#' . $menu_item_title . '">' . $menu_item->title . '</a></li>';
                }

                echo '</ul>';
            }

            echo '<ul class="menu-social-list">';

            if(have_rows('social_networks', $menu)) {
                $rows = get_field('social_networks', $menu);

                foreach ($rows as $row) :
                    $name = $row['social_name'];
                    $url = $row['social_url'];
                    $icon = '<img class="icon icon-social icon-' . $name . '" src="' . $row['social_icon'] . '" alt="' . $name . '">';

                    echo '<li class="social__item"><a href="' . $url . '" target="_blank" title="'.$name.'">' . $icon . '</a></li>';

                endforeach;
            }

            if ($email) {
                $iconUrl = $email['contact_email_icon'];
                $url = $email['contact_email_address'];
                $icon = '<img class="icon icon-social icon-email" src="'.$iconUrl.'" alt="email">';

                if($url):
                    echo '<li class="social__item"><a href="mailto:' . $url . '" title="Email">' . $icon . '</a></li>';
                endif;
            }

            echo '</ul>';

        echo '</div>';

    }
    add_filter('wp_nav_menu_items', 'custom_menu_majafe', 10, 2);

    //Allow SVG uploads
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

endif;
add_action( 'after_setup_theme', 'majafe_setup' );

// Load js scripts
function majafe_scripts() {
    if(!is_admin()){
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"), array(),'3.3.1', true);

        wp_enqueue_script('slider', get_template_directory_uri().'/js/slider.js', array('jquery'), false, false);
        wp_enqueue_script('nav', get_template_directory_uri().'/js/nav.js', array('jquery'), false, false);
        wp_enqueue_script('dates-slides', get_template_directory_uri().'/js/dates-slides.js', array('jquery'), false, false);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'majafe_scripts');

// Load scss variables for 'wp-scss' plugin
include_once 'scss/wp-scss-variables.php';

// Les thumbnails
function thumbnails_setup() {
    add_theme_support('post-thumbnails');
    add_image_size('icon', 20, 20, true);
}
add_action('after_setup_theme', 'thumbnails_setup' );

?>