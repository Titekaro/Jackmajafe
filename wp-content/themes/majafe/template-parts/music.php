<?php
/**
 * Template Name: Music
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
    $section_lead = get_field('section_lead_paragraph');
    $section_paragraph = get_field('section_main_paragraph');
    $section_btn = get_field('section_button');
    $section_btn_text = get_field('section_button_text');
    $section_btn_link = get_field('section_button_link');

    $music_item = get_field('music_element');

echo '<div class="section-content-container music-content-container">';
    echo '<div class="section-content music-content">';
        echo '<div class="music-content__intro">';

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

        if (have_rows('music_element')):
            foreach ($music_item as $music):
                $music_cover = $music['music_cover'];
                $music_teaser = $music['teaser_text'];
                $music_title = $music['music_title'];
                $music_btns = $music['music_btns'];

                echo '<div class="music-content__items">';

                echo '<div class="music__item">';

                    echo '<div class="music-cover" style="background-image: url('.$music_cover.')"></div>';
                    echo '<p class="music-teaser">'.$music_teaser.'</p>';
                    echo '<p class="h3 music-title">'.$music_title.'</p>';

                    if ($music_btns):
                        echo '<ul class="music-btn-list">';

                        foreach ($music_btns as $btn):
                        $iconName = sanitize_title($btn['button_name']);

                        echo '<li class="music-btn__item">';
                            echo '<a href="'.$btn['button_url'].'" target="_blank" class="btn btn-icon-fixed btn--shout" title="'.$btn['button_name'].'"><img class="icon icon-'.$iconName.'" src="'.get_bloginfo('template_directory').'/images/icons/icon-'.$iconName.'.svg" alt="'.$btn['button_name'].'"/></a>';
                        echo '</li>';

                        endforeach;

                        echo '</ul>';
                    endif;

                echo '</div>';

                echo '</div>';

            endforeach;
        endif;

        echo '</div>';
echo '</div>';

endif;
?>