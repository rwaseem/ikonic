<?php
/*
 * Template Name: Herkunft
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<section class="aboutpg-sec">
    <div class="container">
        <div class="hcollections-content aboutpg-collectct">
            <div class="row m-0">
                <div class="col-6 p-0">
                    <div class="hcollections-img left">
                        <img src="<?php the_field('herkunft_image'); ?>"/>
                    </div>
                </div>
                <div class="col-6 p-0 alignself">
                    <div class="hcollections-ctbox left">
                        <?php the_field('herkunft_ct'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function(){
   jQuery('.faqs_list a.card-link').on('click', function(){
        jQuery(this).parent().addClass('active');
    }); 
    jQuery(".collapse").on('hidden.bs.collapse', function(){
        jQuery(this).parent().removeClass('active');
    });
});
</script>
<?php endwhile; endif; ?>
<?php get_footer(); ?>