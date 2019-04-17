<?php
/**
 *
 * The template for displaying section page without any specific template.
 *
 * This is the template that displays the section page by default.
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
    $section_lead = get_field('section_lead_paragraph');
    $section_paragraph = get_field('section_main_paragraph');
    $section_btn = get_field('section_button');
    $section_btn_text = get_field('section_button_text');
    $section_btn_link = get_field('section_button_link');

echo '<div class="section-content-container">';
    echo '<div class="section-content">';
        echo '<div class="content__intro">';

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

        if ($section_paragraph):
            echo '<div class="section-text">'.$section_paragraph.'</div>';
        endif;

        if ($section_btn):
            echo '<a href="'.$section_btn_link.'" target="_blank" class="btn btn-secondary" title="'.$section_btn_text.'">'.$section_btn_text.'</a>';
        endif;

        echo '</div>';

    echo '</div>';
echo '</div>';

endif;
?>