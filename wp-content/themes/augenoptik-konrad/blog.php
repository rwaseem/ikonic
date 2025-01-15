<?php
/*
 * Template Name: Blog
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<section class="hblog-sec">
    <div class="container">
        <div class="main-content">
            <?php the_content(); ?>
        </div>
        <div class="hblog-content">
            <div class="row">
                <?php $args	=	array( 'post_type'=> 'post', 'posts_per_page' => -1 );
                 query_posts( $args );
                 while( have_posts() ) : the_post(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
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
                                    <a class="all-buttons" href="<?php the_permalink(); ?>">Read more <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>

<section class="hcollections-sec">
    <div class="container">
        <div class="hcollections-content desktopvs">
            <div class="row m-0">
                <?php $hncollections_list = get_field('hncollections_list',11);
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
                <?php $hncollections_list = get_field('hncollections_list',11);
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

<?php endwhile; endif; ?>
<?php get_footer(); ?>