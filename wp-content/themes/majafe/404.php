<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage majafe
 * @since majafe 1.0
 * @version 1.0
 */

get_header(); ?>

<main class="single-page">
    <section class="section section-not-found">
        <div class="section-content-container not-found-content-container">
            <div class="section-content not-found-content">

                <div class="not-found-image">
                <?php
                    echo '<div class="not-found-image__item">';
                    echo '<span>4</span>';
                    echo '<img src="'.get_bloginfo('template_directory').'/images/404/404-jack.jpg" alt="">';
                    echo '</div>';

                    echo '<div class="not-found-image__item">';
                    echo '<span>0</span>';
                    echo '<img src="'.get_bloginfo('template_directory').'/images/404/404-mascarenhas.jpg" alt="">';
                    echo '</div>';

                    echo '<div class="not-found-image__item">';
                    echo '<span>4</span>';
                    echo '<img src="'.get_bloginfo('template_directory').'/images/404/404-fernando.jpg" alt="">';
                    echo '</div>';
                ?>
                </div>

                <h1 class="h2">Oops!</h1>

                <p class="lead">It seems like the page you’re looking for does not exist.</p>

                <a class="btn btn--shout" href="<?php echo home_url()?>">Back to home</a>

            </div>
        </div>
    </section>
</main>

<?php get_footer();
