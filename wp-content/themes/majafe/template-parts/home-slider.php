<?php
/**
 * Template Name: Home slider
 *
 * The template for displaying the homepage containing the slider.
 *
 * This is the template that displays the homepage by default.
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

    $home_slider = get_field('home_slider');

if ($home_slider):

    $slides = new WP_Query(array(
        'post_type' => 'slider',
        'post_status' => 'publish'
    ));

    $countSlides = $slides->found_posts;

    if ($slides->have_posts()) :?>

<div class="slider-container">

    <ol class="slider">
        <?php while ($slides->have_posts()) : $slides->the_post();
            $slide_bg = get_field('slide_background');
            $slide_video = get_field('slide_video');
            $slide_teaser = get_field('slide_teaser');
            $slide_intro = get_field('slide_intro');
            $slide_title = get_field('slide_title');
            $slide_subtitle = get_field('slide_subtitle');
            $slide_place = get_field('slide_place');
            $slide_btn = get_field('slide_button');
            $slide_btn_text = get_field('slide_button_text');
            $slide_btn_link = get_field('slide_button_link');
            ?>
            <li class="slide" style="background-image: url('<?php echo $slide_bg; ?>')">

            <?php if ($slide_video): ?>
                <video class="slide__video" muted>
                    <source src="<?php echo $slide_video; ?>" type="video/mp4">
                </video>
            <?php endif; ?>

                <div class="slide-content-container">
                <?php

                if ($slide_teaser) :
                    echo '<p class="h1 slide-content__teaser">' . $slide_teaser . '</p>';
                endif;

                if ($slide_intro) :
                    echo '<p class="h5 slide-content__intro">' . $slide_intro . '</p>';
                endif;

                if ($slide_title) :
                    echo '<p class="h1 slide-content__title">' . $slide_title . '</p>';
                endif;

                if ($slide_subtitle) :
                    echo '<p class="h5 slide-content__subtitle">' . $slide_subtitle . '</p>';
                endif;

                if ($slide_place) :
                    echo '<p class="slide-content__place">' . $slide_place . '</p>';
                endif;

                if ($slide_btn) :
                    echo '<a href="' . $slide_btn_link .'" target="_blank" class="btn btn-secondary" title="'. $slide_btn_text .'">' . $slide_btn_text . '</a>';
                endif;

                ?>
                </div>
            </li>
        <?php endwhile; ?>
    </ol>

    <?php if ($countSlides > 1): ?>

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

    <ol class="slide-nav bullet-nav">
        <?php while ($slides->have_posts()) : $slides->the_post();
            echo '<li class="slide-nav__bullet bullet-nav__item"><a class="bullet"></a></li>';
        endwhile; ?>
    </ol>

    <div class="scroll-down">
        <span class="sr-only">Scroll Down</span>
        <?php
        echo '<img class="icon icon-scroll" src="'.get_bloginfo('template_directory').'/images/icons/scroll-down.svg" alt="Scroll down">';
        ?>
        <div class="mouse-arrow"></div>
    </div>

    <?php endif; ?>
</div>

<?php
    endif;
endif;
?>

<?php
echo '<div class="section-content-container home-content-container">';
    echo '<div class="section-content home-content">';
        echo '<div class="home-content__intro">';

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