<?php
/*
 * Template Name: Haut & Haar Wissen
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<section class="hcollections-sec hautcollections-sec">
    <div class="container">
        <div class="main-content sm">
            <?php the_content(); ?>
        </div>
        <div class="hcollections-content desktopvs">
            <div class="row m-0">
                <?php $wissen_list= get_field('wissen_list');
                $count = 0;
                foreach($wissen_list as $value){ ?>
                <?php if($count%2 == 0){ ?>
                    <div class="col-6 p-0">
                        <div class="hcollections-img left">
                            <img src="<?php echo $value['wissenlist_image']; ?>"/>
                        </div>
                    </div>
                    <div class="col-6 p-0 alignself">
                        <div class="hcollections-ctbox left">
                            <?php echo $value['wissenlist_content']; ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="col-6 p-0 alignself">
                        <div class="hcollections-ctbox right">
                            <?php echo $value['wissenlist_content']; ?>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="hcollections-img right">
                            <img src="<?php echo $value['wissenlist_image']; ?>"/>
                        </div>
                    </div>
                <?php } ?>
                <?php $count++;  } ?>
            </div>
        </div>
        
        <div class="hcollections-content mobilevs">
            <div class="row m-0">
                <?php $wissen_list= get_field('wissen_list');
                foreach($wissen_list as $value){ ?>
                    <div class="col-6 p-0">
                        <div class="hcollections-img left">
                            <img src="<?php echo $value['wissenlist_image']; ?>"/>
                        </div>
                    </div>
                    <div class="col-6 p-0 alignself">
                        <div class="hcollections-ctbox left">
                            <?php echo $value['wissenlist_content']; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>