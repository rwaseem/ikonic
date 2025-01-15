<div class="clearfix"></div>
</div>
<footer id="footer_sec" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-content">
            <?php /**
            <div class="footer-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
            </div>
            **/ ?>
            <div class="row">
                <div class="col-4">
                    <div class="ft-contactdt">
                        <strong class="ftmain-title">Kontaktdetails</strong>
                        <ul>
                            <li class="phone">
                                <a href="tel:<?php the_field('phone_number', 'options'); ?>"><?php the_field('phone_number', 'options'); ?></a>
                            </li>
                            <li class="email">
                                <a href="mailto:<?php the_field('ftemail', 'options'); ?>"><?php the_field('ftemail', 'options'); ?></a>
                            </li>
                            <li class="address">
                                <span><?php the_field('ftaddress', 'options'); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4 alignself">
                    <div class="ft-logo">
                        <a href="<?php echo HOME; ?>">
                            <img src="<?php the_field('footer_logo', 'options'); ?>"/>
                        </a>
                    </div>
                    <!--<div class="ft-socialink">
                        <ul>
                            <?php $social_links = get_field('social_links', 'options');
                            foreach($social_links as $value){ ?>
                                <li><a target="_blank" href="<?php echo $value['social_linkd']; ?>"><?php echo $value['social_icon']; ?></a></li>
                            <?php  } ?>
                        </ul>
                    </div>-->
                </div>
                <div class="col-4">
                    <div class="ft-desc">
                        <?php the_field('footer_description', 'options'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="copyright-text">
                <span>© <?php echo date('Y'); ?> Copyright by Augenoptik Konrad, Eltville</span>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>