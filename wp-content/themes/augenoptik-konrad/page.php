<?php
/*
 * default page template
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template/all-pages-banner'); ?>

<?php $first_sh = get_field('first_sh');
if($first_sh == true){ ?>

<section class="hcollections-sec haboutt-sec">
    <div class="container">
        <div class="hcollections-content">
            <div class="row m-0">
                <div class="col-6 p-0">
                    <div class="hcollections-img left">
                        <img src="<?php the_field('allpg_img'); ?>"/>
                    </div>
                </div>
                <div class="col-6 p-0 alignself">
                    <div class="hcollections-ctbox left">
                        <?php the_field('allpg_content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php $hapy_hservice = get_field('hapy_hservice');
if($hapy_hservice == true){ ?>
   <section class="hmakehappy-sec">
    <div class="container">
        <div class="main-content">
            <strong></strong>
            <h3>Unsere <strong>Leistungen</strong></h3>
        </div>
        <div class="row">
            <?php $makehappy_list = get_field('makehappy_list',11);
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
<?php } ?>

<?php $all_hsericonsec = get_field('all_hsericonsec');
if($all_hsericonsec == true){ ?>

<section class="hshipping-sec">
    <div class="container">
        <div class="main-content">
            <?php the_field('ourser_mct', 11); ?>
        </div>
        <div class="hshipping-ct">
            <div class="row">
                <?php $hshipping_list = get_field('hshipping_list', 11);
                foreach($hshipping_list as $value){ ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="hshipping-box">
                            <img src="<?php echo $value['hshipping_licon']; ?>"/>
                            <strong><?php echo $value['hshipping_ltitle']; ?></strong>
                            <p><?php echo $value['hshipping_ldesc']; ?></p>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php $galerien_sh = get_field('galerien_sh');
if($galerien_sh == true){ ?>

<section class="inspiration-gallery gallerypg-sec">
    <div class="container">
        <div class="main-content">
            <?php the_field('galerien_ct'); ?>
        </div>
        <div class="inspgallery-list">
            <div class="container">
                <div id="inspgallery_row" class="row">
                    <?php $hgallery_llist = get_field('hgallery_llist'); 
                    foreach ( $hgallery_llist as $value ){
                    $add_galleryimage = $value['hgallery_img'];
                    $image_attributes = wp_get_attachment_image_src( $add_galleryimage, ''); 
                    $image_attributesfull = wp_get_attachment_image_src( $add_galleryimage, 'full'); ?>
                        <div class="col-4">
                            <div class="inspgallery-gbox">
                                <a href="<?php echo $image_attributesfull['0']; ?>" data-fancybox="images">
                                    <img src="<?php echo $image_attributes['0']; ?>"/>
                                </a>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php $abteam_abutsec = get_field('abteam_abutsec');

if($abteam_abutsec == true){ ?>
 <section class="team">
  <div class="container">
     <div class="team-content">
        <div class="main-content">
           <h3><?php the_field('team_head'); ?></h3>  
        </div>
        <div class="row">
          <?php $team_list = get_field('team_list');
            foreach($team_list as $value){ ?>
               <div class="col-lg-4 col-md-6 col-sm-12">
                 <div class="member-main">
                    <div class="member-img cover" style="background-image:url(<?php echo $value['team_limg']; ?>)">
                        <div class="memb-innerct">
                            <p><?php echo $value['team_ldesi']; ?></p>
                            <p><?php echo $value['team_lspec']; ?></p>
                            <a href="tel:<?php echo $value['team_lpnol']; ?>"><i class="fa-solid fa-phone"></i> <?php echo $value['team_lpno']; ?></a><br>
                            <a href="mailto:<?php echo $value['team_lemail']; ?>"><i class="fa-solid fa-envelope"></i> <?php echo $value['team_lemail']; ?></a>
                        </div>
                    </div>
                    <div class="member-data">
                        <h3><?php echo $value['team_lname']; ?></h3>
                        <div class="d-flex member-cdt">
                            <a href="tel:<?php echo $value['team_lpnol']; ?>"><i class="fa-solid fa-phone"></i></a><br>
                            <a href="mailto:<?php echo $value['team_lemail']; ?>"><i class="fa-solid fa-envelope"></i></a>
                        </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
         </div>
      </div>
    </div>
</section>
<?php } ?>

<?php $hcol_hoptics = get_field('hcol_hoptics');
if($hcol_hoptics == true){ ?>
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
<?php } ?>


<?php $second_sh = get_field('second_sh');
if($second_sh == true){ 
    $allpg_parallaxcto = get_field('allpg_parallaxcto');
?>

<section class="hparallax">
    <div class="hslider-bg cover" style="background: url(<?php the_field('allpg_parallax'); ?>">
        <div class="container">
            <?php if($allpg_parallaxcto){ ?>
                <div class="hslide-content">
                    <?php echo $allpg_parallaxcto; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } ?>

<?php $third_sh = get_field('third_sh');
if($third_sh == true){ ?>

<section class="hcollections-sec haboutt-sec">
    <div class="container">
        <div class="hcollections-content">
            <div class="row m-0 right">
                <div class="col-6 p-0">
                    <div class="hcollections-img left">
                        <img src="<?php the_field('allpg_timg'); ?>"/>
                    </div>
                </div>
                <div class="col-6 p-0 alignself">
                    <div class="hcollections-ctbox left">
                        <?php the_field('allpg_tcontent'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>

<?php $fourth_sh = get_field('fourth_sh');
if($fourth_sh == true){ 
    $allpg_secparallaxcttwoo = get_field('allpg_secparallaxcttwoo');
?>

<section class="hparallax two">
    <div class="hslider-bg cover" style="background: url(<?php the_field('allpg_secparallax'); ?>">
        <div class="container">
            <?php if($allpg_parallaxcto){ ?>
                <div class="hslide-content">
                    <?php echo $allpg_secparallaxcttwoo; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } ?>

<?php $fiveth_sh = get_field('fiveth_sh');
if($fiveth_sh == true){ ?>

<section class="hmainct-sec">
    <div class="container">
        <div class="main-content">
            <?php the_field('allpgsec_fcontent'); ?>
        </div>
    </div>
</section>

<?php } ?>


    
<?php $six_sh = get_field('six_sh');
if($six_sh == true){ ?>

<section class="hcollections-sec defaultcollec-sec">
    <div class="container">
        <div class="hcollections-content">
            <?php $seo_clist = get_field('seo_clist');
            $count = 0;
            foreach($seo_clist as $value){
            $seo_climage = $value['seo_climage'];
            if($seo_clist){ ?>
                <div class="row <?php if($count%2 == 0){ echo 'left'; }else{echo 'right';} ?>">
                    <div class="col-6 p-0">
                        <?php if($seo_climage){ ?>
                            <div class="hcollections-img">
                                <img src="<?php echo $value['seo_climage']; ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-6 p-0 alignself">
                        <div class="hcollections-ctbox">
                            <?php echo $value['seo_clcontent']; ?>
                        </div>
                    </div>
                 </div>
            <?php $count++; } } ?>
        </div>
    </div>
</section>

<?php } ?>



<?php $all_boxlisec = get_field('all_boxlisec');
if($all_boxlisec == true){ ?>

<section class="hskincare-sec">
    <div class="row m-0">
        <?php $hskincare_list = get_field('hskincare_list', 11);
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
</section>

<?php } ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>