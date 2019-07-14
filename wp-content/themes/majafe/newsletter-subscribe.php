<?php

$newsletter_bg = get_field('newsletter_bg');
$newsletter_form = get_field('newsletter_form');

echo '<div class="section-content newsletter-content" style="background-image: url('.$newsletter_bg.')">';

if($newsletter_form):
?>
<h2 class="h3 section-title">
    Want <strong>some news&nbsp;?</strong>
</h2>
<p class="h4 newsletter-baseline">
    Subscribe to our newsletter
</p>
<?php
    echo do_shortcode( '[mc4wp_form id="475"]' );
endif;
?>

</div>