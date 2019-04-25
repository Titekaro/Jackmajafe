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

            echo '<div class="music-content__items">';
            echo '<ol class="music-item-list">';

            foreach ($music_item as $music):
                $music_cover = $music['music_cover'];
                $music_teaser = $music['teaser_text'];
                $music_title = $music['music_title'];
                $music_btns = $music['music_btns'];

                echo '<li class="music__item">';

                    echo '<div class="music-cover" style="background-image: url('.$music_cover.')"></div>';
                    echo '<p class="music-teaser">';
                        if($music_teaser): echo $music_teaser; else: echo '&nbsp;'; endif;
                    echo '</p>';
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

                echo '</li>';
            endforeach;

            echo '</ol>';

            ?>

            <span class="slide-control slide-control-next">
              <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="32" viewBox="0 0 17.5 32">
                  <path fill="#fff" d="M1.9.3l15.3 15.3c.4.4.4 1.1 0 1.5L1.9 31.6l-.1.1c-.4.4-1.1.3-1.5-.1s-.3-1.1.1-1.5l14.5-13.8L.3 1.9c-.2-.2-.3-.4-.3-.7C0 .6.4.1 1 0c.3 0 .7.1.9.3z"/>
              </svg>
            </span>

            <span class="slide-control slide-control-prev">
              <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="32" viewBox="0 0 17.5 32">
                <path fill="#fff" d="M16.5 0c.6.1 1 .6 1 1.2 0 .3-.1.5-.3.7L2.6 16.3l14.5 13.8c.4.4.5 1.1.1 1.5s-1.1.5-1.5.1l-.1-.1L.3 17.1c-.4-.4-.4-1.1 0-1.5L15.6.3c.2-.2.6-.3.9-.3z"/>
              </svg>
            </span>

            <?php

            echo '</div>';
        endif;

        echo '</div>';
echo '</div>';

endif;
?>