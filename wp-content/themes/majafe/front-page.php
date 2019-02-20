<?php get_header(); ?>
<main>
<?php
// Create each sections of the one page template, based on nav menu 'main menu' content.
$menu_items = wp_get_nav_menu_items('main menu');
if($menu_items) {
    foreach ($menu_items as $menu_item) {
        $args = array('p' => $menu_item->object_id,'post_type' => 'any');

        global $wp_query;
        $wp_query = new WP_Query($args);
        // Get the attr name given to the page to target each section. We target the attr so that we can rename each page without generating any template issue.
        $menu_item_attr_title = sanitize_title($menu_item->attr_title);
        //TODO: Add a basic common template for sections that would be created without specific template from below.
?>
<?php echo '<section id="'.$menu_item_attr_title.'" class="section section-'.$menu_item_attr_title.'">' ?>
<?php
if ( have_posts() ){
    include(locate_template('section-'.$menu_item_attr_title.'.php'));
}
echo '</section>';
?>
<?php }}; ?>

</main>
<?php get_footer(); ?>