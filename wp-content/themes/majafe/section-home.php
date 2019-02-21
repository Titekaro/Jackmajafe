<?php include 'single-slider.php' ?>

<div class="section-content-container">

<?php

wp_reset_query();

if($post) :

?>

    <h2 class="section-title">
        <?php echo $post->post_title; ?>
    </h2>

    <p>
        <?php echo $post->post_content; ?>
    </p>

<?php endif; ?>

</div>
