<?php

/**
 * The scss variables file
 *
 * This file contains all the scss variables to style the majafe theme.
 * SCSS variables are set in the majafe theme
 * by using the wp_scss_variables filter.
 *
 * @plugin wp-scss
 *
 * @link https://github.com/ConnectThink/WP-SCSS#setting-variables-via-php
 *
 * @package WordPress
 * @subpackage majafe
 * @since majafe 1.0
 */

function wp_scss_set_variables() {
    $variables = array(
        //Colors
        'text-color-base' => '#fff',

        'brand-color-base' => '#000',
        'brand-color-primary' => '#000',
        'brand-color-secondary' => '#fff',
        'brand-color-tertiary' => '#222425',
        'brand-color-tertiary-light' => '#b2b2b4',
        'brand-color-tertiary-dark' => '#161718',

        'body-bg-color' => '$brand-color-base',

        // Typos
        'font-family-base' => '\'Open Sans\', Arial, sans-serif',
        'font-family-headings' => '\'Lato\', Arial, sans-serif',

        'font-size-base-sm' => '16px',
        'font-size-base-lg' => '15px',
        'font-size-h1-sm' => '2.5em', //40px
        'font-size-h1-lg' => '4em', //60px

        'font-size-h2-sm' => '2.25em', //36px
        'font-size-h2-lg' => '3.2em', //48px

        'font-size-h3-sm' => '1.5em', //24px
        'font-size-h3-lg' => '2.4em', //36px

        'font-size-h4-sm' => '1.25em', //20px
        'font-size-h4-lg' => '1.6em', //24px

        'font-size-h5-sm' => '1.12em', //18px
        'font-size-h5-lg' => '1.2em', //18px

        'font-size-lead' => '1.2em', //18px

        // Screen sizes
        'screen-sm' => '768px',
        'screen-lg' => '1024px',
        'screen-xl' => '1440px',

        '$container' => '1024px',

        // Navbar
        'logo-width' => '40px',
        'navbar-height' => '55px'
    );
    return $variables;
}
add_filter('wp_scss_variables','wp_scss_set_variables');

?>