<?php
/**
 * Template Name: Gallery
 *
 * The template for displaying medias page.
 *
 * This is the template that displays the media page by default.
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
    $media_btn = get_field('gallery_button');
    $media_btn_text = get_field('gallery_button_text');
    $media_btn_link = get_field('gallery_button_link');
?>
<div class="section-content-container gallery-content-container">
    <div class="section-content gallery-content">

    <div class="gallery-content__intro">

        <h2 class="section-title">
            <svg class="icon icon-gallery" xmlns="http://www.w3.org/2000/svg" width="40.7" height="33.9" viewBox="0 0 40.7 33.9">
                <path fill="#000" d="M37.1 6.5h-5.7L29 1.9C28.4.7 27.2 0 25.8 0h-11c-1.3 0-2.5.7-3.2 1.9L9.3 6.5H3.6c-2 0-3.6 1.6-3.6 3.6v20.2c0 2 1.6 3.6 3.6 3.6h33.5c2 0 3.6-1.6 3.6-3.6V10.1c0-2-1.6-3.6-3.6-3.6zm1.5 23.8c0 .8-.7 1.5-1.6 1.5H3.6c-.8 0-1.6-.7-1.6-1.5V10.1c0-.8.7-1.6 1.6-1.6h6.3c.4 0 .7-.2.9-.5l2.7-5.1c.3-.6.8-.9 1.4-.9h11c.6 0 1.1.3 1.4.8L29.9 8c.2.3.5.5.9.5h6.3c.8 0 1.6.7 1.6 1.6l-.1 20.2z"/>
                <path fill="#000" d="M20.3 10c-5.2 0-9.5 4.2-9.5 9.5S15 29 20.3 29s9.5-4.2 9.5-9.5-4.2-9.5-9.5-9.5zm0 16.9c-4.1 0-7.4-3.3-7.4-7.4s3.3-7.4 7.4-7.4 7.4 3.3 7.4 7.4-3.3 7.4-7.4 7.4zM16.9 7.2h6.7c.6 0 1-.5 1-1s-.5-1-1-1h-6.7c-.6 0-1 .5-1 1s.5 1 1 1z"/>
            </svg>
        </h2>

    </div>

    <div class="gallery-content__pics">

    </div>

    </div>
</div>

<?php endif; ?>