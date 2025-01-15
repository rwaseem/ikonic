<?php
/*
 * Template Name: FAQ
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<section class="faqlist-sec">
    <div class="container">
        <div class="main-content sm">
            <?php the_content(); ?>
        </div>
        <div class="faqs_list">
            <div id="faqs_list">
                <?php $faqs_list = get_field('faqs_list');
                if($faqs_list){
                foreach($faqs_list as $key=>$val){ ?>
                    <div class="card">
                        <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $key; ?>">
                            <?php echo $val['faq_question']; ?>
                        </a>
                        <div id="collapse<?php echo $key; ?>" class="collapse" data-parent="#faqs_list">
                            <div class="card-body">
                                <?php echo $val['faq_ans']; ?>
                            </div>
                        </div>
                    </div>
                <?php }
                } ?>
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