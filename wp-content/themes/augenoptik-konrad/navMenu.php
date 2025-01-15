<?php
/*
 * Template Name: Nav Menu Nested
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<div class="Nav_menu_nested container">
<?php
 wp_nav_menu([
    'theme_location' => 'New-ikonic-Nested-Menu',
    'container' => 'nav',
    'container_class' => 'New-ikonic-Nested-Menu',
    'menu_class' => 'menu',
    'fallback_cb' => false, 
    'depth' => 0,           // Show All Nested
]);
?>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>