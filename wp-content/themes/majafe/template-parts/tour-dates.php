<?php
/**
 * Template Name: Tour dates
 *
 * The template for displaying tour dates page.
 *
 * This is the template that displays tour dates page by default.
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

    $tour_bg = get_field('tour_bg');
    $tour_dates = get_field('tour_dates');
    $stroke_dates = get_field('stroke_dates');
    $no_date_feedback = get_field('no_date_feedback');
    $nDates = get_field('n_dates_by_slide');
    $today = date('Ymd');

echo '<div class="section-content-container tour-content-container" style="background-image: url('.$tour_bg.')">';
    echo '<div class="section-content tour-content">';
        echo '<div class="tour-content__intro">';

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

        echo '<div class="tour-content__events">';

            if (have_rows('tour_dates')):

                foreach ($tour_dates as $key => $part) {
                    $sort[$key] = strtotime($part['event_date']);
                }
                array_multisort($sort, SORT_ASC, $tour_dates);

                $splitDates = array_chunk($tour_dates, $nDates == '' ? 10 : $nDates );

                echo '<ol class="events-group-list">';

                foreach ($splitDates as $datesGroup):

                    echo '<li class="events-group__item">';
                        echo '<ol class="events-list">';

                        foreach ($datesGroup as $dateEl):

                            $date = new DateTime($dateEl['event_date']);
                            $place = $dateEl['event_place'];
                            $hour = $dateEl['event_hour'];
                            $city = $dateEl['event_city'];
                            $country = $dateEl['event_country'];

                            echo '<li class="event__item';
                            if ($stroke_dates):
                            if ($dateEl['event_date'] < $today): echo ' event__item--past'; endif;
                            endif;
                            echo '">';

                                echo '<div class="event__item-date-content">';

                                echo '<p class="date">';

                                echo '<span class="h5 date__day date__day--block">'.$date->format('D').'</span>';
                                echo '<span class="h5 date__day">'.$date->format('d').'</span>';
                                echo '<span class="date__month">'.$date->format('m').'</span>';

                                echo '</p>';

                                echo '</div>';

                                echo '<div class="event__item-location-content">';

                                if($city || $country):
                                    echo '<p class="h5 location__map">';

                                    if($city):
                                    echo '<span class="city">'.$city.'</span>';
                                    endif;

                                    if($city && $country):
                                    echo ', ';
                                    endif;

                                    if($country):
                                    echo '<span class="country">'.$country.'</span>';
                                    endif;

                                    echo '</p>';
                                endif;

                                if($place || $hour):
                                    echo '<p class="location__spot">';

                                    if($place):
                                    echo '<span class="place">'.$place.'</span>';
                                    endif;

                                    if($place && $hour):
                                    echo ' - ';
                                    endif;

                                    if($hour):
                                    echo '<span class="hour">'.$hour.'</span>';
                                    endif;

                                    echo '</p>';
                                endif;

                                echo '</div>';

                            echo '</li>';

                        endforeach;

                        echo '</ol>';
                    echo '</li>';

                endforeach;

                echo '</ol>';

                // Create a list of bullets. The number of bullets correspond to the number of dateGroup arrays
                if (sizeof($splitDates) > 1):
                    echo '<ol class="event-nav bullet-nav">';

                    foreach ($splitDates as $datesGroup):
                        echo '<li class="event-nav__bullet bullet-nav__item"><a class="bullet"></a></li>';
                    endforeach;

                    echo '</ol>';
                endif;

            else:
                if($no_date_feedback):
                    echo '<p class="events-feedback lead">'.$no_date_feedback.'</p>';
                endif;
            endif;

        echo '</div>';

    echo '</div>';
echo '</div>';

endif;
?>
