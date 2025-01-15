<?php
/*
 * Single Post detail template
*/
get_header(); ?>
<section id="content" class="entry-content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part('template/content-default'); ?>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>