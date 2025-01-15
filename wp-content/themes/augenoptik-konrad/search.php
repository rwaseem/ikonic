<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    
<?php if(is_front_page() || is_home()){}else{ 
        if(has_post_thumbnail()){ ?>
<header class="content-header cover" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>)">
<?php }else{ ?>
<header class="content-header cover" style="background-image:url(<?php echo DIRPATH; ?>/images/headerbg.jpg)">
<?php } ?>	
		<div class="container">
            <div class="conthead-content">
			     <h1><?php printf( __( 'Search Results for: %s', 'kts_theme' ), get_search_query() ); ?></h1>
            </div>
		</div>
	</header>
<?php } ?>
    
<section class="all-pages-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part('template/blog'); ?>
                <?php endwhile; ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="sidebar">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
    
<?php else : ?>
<article id="post-0" class="post no-results not-found">
    
<?php if(is_front_page() || is_home()){}else{ 
        if(has_post_thumbnail()){ ?>
<header class="content-header cover" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>)">
<?php }else{ ?>
<header class="content-header cover" style="background-image:url(<?php echo DIRPATH; ?>/images/headerbg.jpg)">
<?php } ?>	
		<div class="container">
            <div class="conthead-content">
			     <h1><?php _e( 'Nothing Found', 'kts_theme' ); ?></h1>
            </div>
		</div>
	</header>
<?php } ?>
<section class="all-pages-content">
    <div class="container">
        <div class="entry-content">
            <p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'kts_theme' ); ?></p>
            <?php get_search_form(); ?>
        </div>
    </div>
</section>
</article>
<?php endif; ?>
<?php get_footer(); ?>