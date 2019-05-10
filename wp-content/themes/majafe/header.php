<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
        <?php bloginfo('name'); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Primary Meta Tags -->
    <meta name="title" content="Jack Majafe">
    <meta name="description" content="Music band focused on Reggaeton music. Get the latest news about Jack Majafe, including tour dates agenda and new singles.">
    <meta name="language" content="English">
    <meta name="author" content="Jack Majafe">
    <meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.jackmajafe.com/">
    <meta property="og:title" content="Jack Majafe">
    <meta property="og:description" content="Get the latest news about the Jack Majafe music band, including tour dates agenda and new singles.">
    <meta property="og:image" content="<?php echo get_bloginfo('template_directory').'/images/sharing-image.jpg'?>">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.jackmajafe.com/">
    <meta property="twitter:title" content="Jack Majafe">
    <meta property="twitter:description" content="Get the latest news about the Jack Majafe music band, including tour dates agenda and new singles.">
    <meta property="twitter:image" content="<?php echo get_bloginfo('template_directory').'/images/sharing-image.jpg'?>">

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