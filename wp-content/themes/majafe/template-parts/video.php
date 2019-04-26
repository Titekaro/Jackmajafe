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
    $section_lead = get_field('section_lead_paragraph');
    $section_paragraph = get_field('section_main_paragraph');
    $section_btn = get_field('section_button');
    $section_btn_text = get_field('section_button_text');
    $section_btn_link = get_field('section_button_link');

    $colNum = get_field('col_num');
    $video = get_field('video_item');
    $video_btn = get_field('youtube_button');
    $video_btn_text = get_field('youtube_button_text');
    $video_btn_link = get_field('youtube_button_link');

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

    if ($section_paragraph):
        echo '<div class="section-text">'.$section_paragraph.'</div>';
    endif;

    if ($section_btn):
        echo '<a href="'.$section_btn_link.'" target="_blank" class="btn btn-secondary" title="'.$section_btn_text.'">'.$section_btn_text.'</a>';
    endif;

    echo '</div>';

    if ($video):

        echo '<div class="video-content__gallery">';

        foreach ($video as $videoEl):

            $colNum = $colNum == '' ? 3 : $colNum;
            $videoWidth = 100/$colNum . '%';
            $title = $videoEl['video_title'];
            $subtitle = $videoEl['video_subtitle'];
            $subtitle = $subtitle ? $subtitle : '&nbsp;';
            $thumb = $videoEl['video_thumb'];
            $gif = $videoEl['video_gif'];
            $gifUrl = $gif ? $gif : $thumb;
            $url = $videoEl['video_url'];

            echo '<div class="video-block-item" style="flex-basis: '.$videoWidth.'; -ms-flex-preferred-size:'.$videoWidth.';">';
            echo '<a class="video-link visible mfp-iframe" href="'.$url.'">';
                echo '<div class="thumb-hover" style="background-image: url('.$gifUrl.')"></div>';
                echo '<div class="thumb" style="background-image: url('.$thumb.')"></div>';
                echo '<div class="video-backdrop"></div>';
                if ($title || $subtitle):
                echo '<div class="video-info">';
                    if($title):
                    echo '<p class="h5 video-info__title">'.$title.'</p>';
                    endif;
                    echo '<p class="h5 video-info__subtitle">'.$subtitle.'</p>';
              echo '</div>';
              endif;
            echo '</a>';
            echo '</div>';

        endforeach;

        echo '</div>';

        if ($video_btn):
            echo '<a href="'.$video_btn_link.'" target="_blank" class="btn btn-link btn-icon btn-icon--youtube btn--shout" title="'.$video_btn_text.'">';
                echo '<img class="icon icon-youtube" src="'.get_bloginfo('template_directory').'/images/icons/icon-youtube.svg" alt=""/>';
                echo $video_btn_text;
            echo '</a>';
        endif;

    endif;

    echo '</div>';
    echo '</div>';

endif;
?>