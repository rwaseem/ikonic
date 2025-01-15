<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php if(is_front_page() || is_home()){}else{ 
        if(has_post_thumbnail()){ ?>
<header class="content-header cover" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>)">
<?php }else{ ?>
<header class="content-header cover" style="background-image:url(<?php echo DIRPATH; ?>/images/headerbg.jpg)">
<?php } ?>	
		<div class="container">
            <div class="conthead-content">
			     <h1><?php the_title(); ?></h1>
                <?php ds_breadcrumbs(); ?>
            </div>
		</div>
	</header>
<?php } ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
<div class="shop-prodsidebar">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 shopmain-col">
            <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
                <?php wc_get_template_part( 'content', 'single-product' ); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</div>
    
    <?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
