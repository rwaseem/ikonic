<?php if(is_front_page() || is_home()){}else{ 
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
<?php } ?>
    
<section class="woopages-sec">
    <div class="container">
        <div class="woopages-content">
            <?php the_content(); ?>
        </div>
    </div>
</section>