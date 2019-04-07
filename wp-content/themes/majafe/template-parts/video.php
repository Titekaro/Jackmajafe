<?php
/**
 * Template Name: Video
 *
 * The template for displaying about page.
 *
 * This is the template that displays the biography page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage majafe
 * @since majafe 1.0
 */

if ( $page->have_posts() ) : $page->the_post();

    $section_title = get_field('section_title');
    $section_subtitle = get_field('section_subtitle');
    $section_lead = get_field('section_main_paragraph');
    $section_btn = get_field('section_button');
    $section_btn_text = get_field('section_button_text');
    $section_btn_link = get_field('section_button_link');

    $iframe = get_field('oembed');
    // use preg_match to find iframe src
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];
    // add extra params to iframe src
    $params = array(
        'controls'    => 0,
        'hd'        => 1,
        'autohide'    => 1
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);
    // add extra attributes to iframe html
    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


    echo '<div class="section-content-container video-content-container">';
    echo '<div class="section-content video-content">';
    echo '<div class="video-content__intro">';

    if ($section_title):
        echo '<h2 class="section-title">'.$section_title;
        if ($section_subtitle):
            echo '<br><span class="section-subtitle">'.$section_subtitle.'</span>';
        endif;
        echo '</h2>';
    endif;

    if ($section_lead):
        echo '<p class="section-lead lead">'.$section_lead.'</p>';
    endif;

    if ($section_btn):
        echo '<a href="'.$section_btn_link.'" target="_blank" class="btn btn-secondary" title="'.$section_btn_text.'">'.$section_btn_text.'</a>';
    endif;

    echo '</div>';

    if ($iframe):

        echo '<div class="video-content__item">';

        echo '<div class="embed-container">'.$iframe.'</div>';

        echo '</div>';

    endif;

    echo '</div>';
    echo '</div>';

endif;
?>