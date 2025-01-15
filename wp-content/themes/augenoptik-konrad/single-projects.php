<?php
/*
 * Single Post detail template
*/
get_header(); ?>
<section id="content" class="entry-content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
        if(has_post_thumbnail()){ ?>
<header class="content-header cover" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>)">
<?php }else{ ?>
<header class="content-header cover" style="background-image:url(<?php echo DIRPATH; ?>/images/headerbg.jpg)">
<?php } ?>	
		<div class="container">
			<div class="conthead-content">
			     <h1><?php the_title(); ?></h1>
                <?php ds_breadcrumbs(); ?>
            </div>
		</div>
	</header>

<section class="all-pages-content">
    <div class="container">
	<div class="start_and_end_date"> 
                        <div class="start_date">Start Date :<span> <?php echo get_field("start_date"); ?> </span>  </div>
                        <div class="end_date"> End Date <span><?php echo get_field("end_date"); ?> </span> </div>
                        
                        </div>
        <?php the_content(); ?>
    </div>
</section>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>