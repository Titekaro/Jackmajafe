<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the body and all content after
 *
 * @package WordPress
 * @subpackage majafe
 * @since majafe 1.0
 */
?>

<footer class="footer">
    <div class="footer-content">

        <p class="text-small">
        <?php
            echo date('Y').' © Jack Majafe. All Rights Reserved.';
        ?>
        </p>

        <ul class="p text-small footer-nav">
            <li class="footer-nav__item">
                <a class="btn btn-link btn--shout" href="<?php echo get_bloginfo('url'); ?>/privacy-policy" target="_self">Privacy Policy</a>
            </li>
            <li class="footer-nav__item">
                <a class="btn btn-link btn--shout" href="<?php echo get_bloginfo('url'); ?>/cookies-policy" target="_self">Cookies Policy</a>
            </li>
        </ul>

    </div>
</footer>

	</body>
</html>