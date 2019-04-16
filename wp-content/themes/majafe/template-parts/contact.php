<?php
/**
 * Template Name: Contact
 *
 * The template for displaying contact page.
 *
 * This is the template that displays the contact page by default.
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

    $phone = get_field('phone');
    $email = get_field('email');

echo '<div class="section-content-container contact-content-container">';
    echo '<div class="section-content contact-content">';
        echo '<div class="contact-content__intro">';

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

        echo '<div class="contact-content__infos">';

            if($phone):
            echo '<div class="contact-info info-phone btn btn-link btn--shout">';
                echo '<div class="icon-wrapper">';
                echo '<img class="icon icon-phone" src="'.get_bloginfo('template_directory').'/images/icons/icon-phone.svg" alt="Phone"/>';
                echo '</div>';
                echo '<a class="btn btn-link btn--shout" href="tel:+32'.$phone.'">+32&nbsp;'.$phone.'</a>';
            echo '</div>';
            endif;

            if($email):
            echo '<div class="contact-info info-email btn btn-link btn--shout">';
                echo '<div class="icon-wrapper">';
                echo '<img class="icon icon-mail" src="'.get_bloginfo('template_directory').'/images/icons/icon-mail.svg" alt="Email"/>';
                echo '</div>';
                echo '<a class="btn btn-link btn--shout" href="mailto:'.$email.'">'.$email.'</a>';
            echo '</div>';
            endif;

        echo '</div>';

    echo '</div>';
echo '</div>';

endif;
?>