<?php get_header(); ?>

<main class="single-page">
    <div class="section-content-container member-content-container">
        <div class="section-content member-content">

<?php
$post = get_post();

$member = new WP_Query(array(
    'p' => $post->ID,
    'post_type' => 'members',
    'post_status' => 'any'
));

if ($member->have_posts()): $member->the_post();

    $member_bio = get_field('member_bio');
    $member_image = get_field('member_image');
    $follow_text = get_field('follow_text');
    $social_btns = get_field('social_networks');

    echo '<div class="section-content-row member-content-row">';

        echo '<div class="section-content-col member-content-col member__text">';
            echo '<h1 class="h2 member-title">';
                the_title();
            echo '</h1>';

            echo $member_bio;

            if ($follow_text):
                echo '<p class="member__social-text">'.$follow_text.'</p>';
            endif;

            if ($social_btns):
            echo '<ul class="member__social-list social-list">';
                foreach ($social_btns as $btn):
                    $social_name = $btn['social_name'];
                    $social_link = $btn['social_url'];
                    $iconName = sanitize_title($social_name);

                    echo '<li class="member__social-item social__item">';
                    echo '<a href="'.$social_link.'" target="_blank" title="'.$social_name.'"><img class="icon icon-'.$iconName.'" src="'.get_bloginfo('template_directory').'/images/icons/icon-'.$iconName.'.svg" alt="'.$social_name.'"/></a>';
                    echo '</li>';

                endforeach;
            echo '</ul>';
            endif;
        echo '</div>';

        echo '<div class="section-content-col member__image">';
            echo '<img src="'.$member_image.'">';
        echo '</div>';

    echo '</div>';

endif;
wp_reset_postdata();
?>
        </div>
    </div>
</main>

<?php get_footer(); ?>