<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
        <?php bloginfo('name'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <nav class="navbar">
        <div class="navbar-content">
            <?php

            $defaults = array(
                'theme_location'  => 'main menu',
                'menu'            => 'main menu'
            );

            wp_nav_menu($defaults);

            ?>

            <button class="navbar-toggle">
                <svg class="navbar-toggle__icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 26 18" width="26" height="18">
                    <rect y="0" width="26" height="2" fill="currentColor"></rect>
                    <rect y="8" width="26" height="2" fill="currentColor"></rect>
                    <rect y="16" width="26" height="2" fill="currentColor"></rect>
                </svg>
            </button>
        </div>
    </nav>
</header>