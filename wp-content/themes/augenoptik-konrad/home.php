<?php
/*
 * Template Name: Home
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="home-banner">
    <div id="home_slider">
        <?php $home_slider = get_field('home_slider');
        foreach($home_slider as $value){ ?>
            <div class="item">
                <div class="hslider-bg cover" style="background: url(<?php echo $value['hslide_background']; ?>">
                    <div class="container">
                        <div class="hslide-content">
                            <?php echo $value['hslide_content']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</section>

<section class="hcollections-sec haboutt-sec">
    <div class="container">
        <div class="hcollections-content">
            <div class="row">
                <div class="col-6">
                    <div class="hcollections-img left">
                        <img src="<?php the_field('haboutt_img'); ?>"/>
                    </div>
                </div>
                <div class="col-6 alignself">
                    <div class="hcollections-ctbox left">
                        <?php the_field('haboutt_ct'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hmakehappy-sec">
    <div class="container">
        <div class="main-content">
            <strong></strong>
            <h3>Unsere <strong>Leistungen</strong></h3>
        </div>
        <div class="row">
            <?php $makehappy_list = get_field('makehappy_list');
            foreach($makehappy_list as $value){ ?>
                <div class="col-lg-3 col-md-4 col-sm-12">
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

<section class="hskincare-sec">
    <div class="container">
			
        <div class="main-content">
            <?php the_field('fourbox_ct'); ?>
			<?php //echo do_shortcode('[trustindex no-registration=google]'); ?>
        </div>
        <div class="row m-0">
            <?php $hskincare_list = get_field('hskincare_list');
            foreach($hskincare_list as $value){ ?>
                <div class="col-6 p-0">
                    <div class="hskincare-box cover" style="background: url(<?php echo $value['hskincare_listbg']; ?>">
                        <div class="hskincare-innerct">
                            <?php echo $value['hskincare_lcontent']; ?>
                        </div>
                    </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</section>

<section class="hshipping-sec">
    <div class="container">
        <div class="main-content">
            <?php the_field('ourser_mct'); ?>
        </div>
        <div class="hshipping-ct">
            <div class="row">
                <?php $hshipping_list = get_field('hshipping_list');
                foreach($hshipping_list as $value){ ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="hshipping-box">
                            <img src="<?php echo $value['hshipping_licon']; ?>"/>
                            <strong><?php echo $value['hshipping_ltitle']; ?></strong>
                            <p><?php echo $value['hshipping_ldesc']; ?></p>
                            <a class="all-buttons" href="<?php echo $value['hshipping_llink']; ?>">Weiterlesen</a>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</section>

<section class="hcollections-sec">
    <div class="container">
        <div class="hcollections-content desktopvs">
            <div class="row m-0">
                <?php $hncollections_list = get_field('hncollections_list');
                $count = 0;
                foreach($hncollections_list as $value){ ?>
                <?php if($count%2 == 0){ ?>
                    <div class="col-6 p-0">
                        <div class="hcollections-img left">
                            <img src="<?php echo $value['hncollections_limg']; ?>"/>
                        </div>
                    </div>
                    <div class="col-6 p-0 alignself">
                        <div class="hcollections-ctbox left">
                            <?php echo $value['hncollections_lct']; ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="col-6 p-0 alignself">
                        <div class="hcollections-ctbox right">
                            <?php echo $value['hncollections_lct']; ?>
                        </div>
                    </div>
                    <div class="col-6 p-0">
                        <div class="hcollections-img right">
                            <img src="<?php echo $value['hncollections_limg']; ?>"/>
                        </div>
                    </div>
                <?php } ?>
                <?php $count++;  } ?>
            </div>
        </div>
        
        <div class="hcollections-content mobilevs">
            <div class="row m-0">
                <?php $hncollections_list = get_field('hncollections_list');
                foreach($hncollections_list as $value){ ?>
                    <div class="col-6 p-0">
                        <div class="hcollections-img left">
                            <img src="<?php echo $value['hncollections_limg']; ?>"/>
                        </div>
                    </div>
                    <div class="col-6 p-0 alignself">
                        <div class="hcollections-ctbox left">
                            <?php echo $value['hncollections_lct']; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section id="blog_sec" class="hblog-sec">
    <div class="container">
        <div class="main-content">
            <?php the_field('hblogmain_content', 11); ?>
        </div>
        <div class="hblog-content">
            <div class="row">
                <?php $args	=	array( 'post_type'=> 'post', 'posts_per_page' => '3' );
                 query_posts( $args );
                 while( have_posts() ) : the_post(); ?>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="hblog-box">
                            <div class="hblog-thumb">
                                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('blog_thumb'); ?></a>
                            </div>
                            <div class="hblog-date">
                                <p><?php echo get_the_date('d'); ?></p>
                                <p><?php echo get_the_date('M'); ?></p>
                            </div>
                            <div class="hblog-boxinner">
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                <p><?php echo get_the_excerpt(); ?></p>
                                <div class="readbtn">
                                    <a class="all-buttons" href="<?php the_permalink(); ?>">Mehr lesen <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>