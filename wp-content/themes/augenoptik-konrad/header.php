<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php wp_head(); ?>
<link rel="icon" href="" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Marcellus&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script src="https://use.fontawesome.com/eb1e3e1e35.js"></script>
<script src="https://kit.fontawesome.com/bc6b379fc5.js" crossorigin="anonymous"></script>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
    
<header class="site-header" role="banner">
    <div class="container">
        <div class="header-content">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 alignself">
                    <div class="site-logo">
                        <a href="<?php echo HOME; ?>">
                            <img src="<?php the_field('site_logo', 'options'); ?>"/>
                        </a>
                        <div id="menuToggle" class="menuToggle">
                            <input type="checkbox" />
                            <span></span>
                            <span></span>
                            <span></span>
                            <ul id="menu"></ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 alignself">
                    <div id="navbar" class="nav-bar">
                        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div>
        </div>
    </div><!--.container-->
</header>

<div id="container">