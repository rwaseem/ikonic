<?php
/*
 * Template Name: Contact Us
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<section class="contactpg-sec">
    <div class="container">
        <div class="contactpg-content">
            <div class="main-content sm contactpg-ct">
                <?php the_content(); ?>
            </div>
			<div class="hshipping-ct">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="hshipping-box">
							<img src="<?php echo DIRPATH; ?>/images/location.png"/>
							<strong>Standort</strong>
							<p><?php the_field('ftaddress', 'options'); ?></p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="hshipping-box">
							<img src="<?php echo DIRPATH; ?>/images/phone.png"/>
							<strong>Telefonnummer</strong>
							<a href="tel:<?php the_field('phone_number', 'options'); ?>"><?php the_field('phone_number', 'options'); ?></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="hshipping-box">
							<img src="<?php echo DIRPATH; ?>/images/location.png"/>
							<strong>E-Mail-Adresse</strong>
							<a href="mailto:<?php the_field('ftemail', 'options'); ?>"><?php the_field('ftemail', 'options'); ?></a>
						</div>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="hcontact-form">
                        <?php echo do_shortcode('[contact-form-7 id="166" title="Get In Touch"]'); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="hcontact-map">
                        <?php the_field('google_map', 'options'); ?>
                    </div>
                </div>
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