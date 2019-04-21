<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
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

get_header();
?>

<main class="single-page">
    <section class="section section-page">
        <div class="section-content-container page-content-container">
            <div class="section-content page-content">

                <?php

                $page = new WP_Query(array(
                    'post_type' => 'page'
                ));

                if ( $page->have_posts() ): the_post();

                    echo '<h1 class="h2 title">';
                        the_title();
                    echo '</h1>';

                    echo '<div class="section-text">';
                        the_content();
                    echo '</div>';

                endif;
                ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>