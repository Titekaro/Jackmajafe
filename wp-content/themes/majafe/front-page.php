<?php get_header(); ?>

<main>

<?php
$menu_items = wp_get_nav_menu_items('main menu');

if($menu_items) :
    foreach ($menu_items as $menu_item) :
        // Get the name given to the page to target each section. We target the attr so that we can rename each page without generating any template issue.
        $menu_item_title = sanitize_title($menu_item->title);
        $template_page = get_post_meta( $menu_item->object_id, '_wp_page_template', true );

        // Create each sections of the one page template, based on nav menu 'main menu' links.
        echo '<section id="'.$menu_item_title.'" class="section section-'.$menu_item_title.'">';

        $page = new WP_Query(array(
            'p' => $menu_item->object_id,
            'post_type' => 'any'
        ));

        if ($page->have_posts()) :
            // If a custom template exists, include this template.
            if ($template_page && $template_page != 'default'):
                include(locate_template($template_page));
            endif;

            // Re-define the basic template
            if(!$template_page || $template_page == 'default') :
                include(locate_template('template-parts/section.php'));
            endif;

        endif;

        echo '</section>';

     endforeach;
endif;
?>

</main>

<?php get_footer(); ?>