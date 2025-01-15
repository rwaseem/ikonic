<?php
/*
 * Template Name: Leistungen
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<section class="hmakehappy-sec">
    <div class="container">
        <div class="main-content">
            <strong></strong>
            <h3>Unsere <strong>Leistungen</strong></h3>
        </div>
        <div class="row">
            <?php $makehappy_list = get_field('makehappy_list',11);
            foreach($makehappy_list as $value){ ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="makehappy-box">
                        <div class="thumb">
                            <img src="<?php echo $value['happylist_bg']; ?>"/>
                        </div>
                        <div class="makehappyslid-content">
                            <?php echo $value['happylist_content']; ?>
                        </div>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>