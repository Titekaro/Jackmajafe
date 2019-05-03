<?php
/**
 * Template Name: Bio
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

    $members = get_field('bio_member');

echo '<div class="section-content-container bio-content-container">';
    echo '<div class="section-content bio-content">';
        echo '<div class="bio-content__intro">';

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

        echo '<div class="bio-content__members">';

        if ($members):
            foreach ($members as $member):
                $member_name = $member['member_name'];
                $member_function = $member['member_function'];
                $member_image = $member['member_image'];
                $member_page_link = $member['member_page_link'];
                $text_link = $member['member_text_link'];

                if ($member_page_link):
                    echo '<a class="member" href="'.$member_page_link.'">';
                else:
                    echo '<div class="member">';
                endif;

                    echo '<div class="member__picture" style="background-image: url('.$member_image.')">';
                        echo '<p class="member__picture-text">';
                        echo $text_link;
                        echo '</p>';
                    echo '</div>';
                    echo '<div class="member__info-wrapper">';
                        echo '<div class="member__info">';
                            echo '<p class="member__name">'.$member_name.'</p>';
                            echo '<p class="member__function">'.$member_function.'</p>';
                        echo '</div>';
                        echo '<img class="icon icon-arrow-right" src="'.get_bloginfo('template_directory').'/images/icons/icon-arrow-right.svg" alt=""/>';
                    echo '</div>';

                if ($member_page_link):
                    echo '</a>';
                else:
                    echo '</div>';
                endif;

            endforeach;
        endif;

        echo '</div>';

    echo '</div>';
echo '</div>';

endif;
?>