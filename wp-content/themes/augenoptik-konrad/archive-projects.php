<?php get_header(); ?>
    
<?php if(is_front_page() || is_home()){}else{ 
        if(has_post_thumbnail()){ ?>
<header class="content-header cover" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>)">
<?php }else{ ?>
<header class="content-header cover" style="background-image:url(<?php echo DIRPATH; ?>/images/headerbg.jpg)">
<?php } ?>	
		<div class="container">
            <div class="conthead-content">
			     <h1><?php 
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'kts_theme' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'kts_theme' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'kts_theme' ), get_the_time( 'Y' ) ); }
else { _e( 'Our Projects', 'kts_theme' ); }
?></h1>
            </div>
		</div>
	</header>
<?php } ?>

<section class="all-pages-content">
    <div class="container">
        <div class="row">
            <div class="project-detail col-lg-12 col-md-12 col-sm-12">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="project-detail-item">
                    <div class="project_thumbnail">
                        <?php the_post_thumbnail('blog_thumb'); ?>
                    </div>
                    <div class="project_content">
                        <h2><?php the_title(); ?></h2>
                        <div class="start_and_end_date"> 
                        <div class="start_date">Start Date :<span> <?php echo get_field("start_date"); ?> </span>  </div>
                        <div class="end_date"> End Date <span><?php echo get_field("end_date"); ?> </span> </div>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="read_more_project"> Read More </a> /
                        <a href="<?php echo get_field("project_url"); ?>" class="read_more_project"> Open Project
                        <svg class="swm-svg--arrow mk-post-button-arrow" enable-background="new 0 0 32 32" height="512" viewBox="0 0 32 32" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m3 17.5h22.379l-10.44 10.439c-.586.585-.586 1.536 0 2.121.293.294.677.44 1.061.44s.768-.146 1.061-.439l13-13c.586-.585.586-1.536 0-2.121l-13-13c-.586-.586-1.535-.586-2.121 0-.586.585-.586 1.536 0 2.121l10.439 10.439h-22.379c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5z"></path></svg>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            
        </div>
    </div>
</section>
<?php get_footer(); ?>