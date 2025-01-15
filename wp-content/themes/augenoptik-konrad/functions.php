<?php
define( 'DIRPATH', get_template_directory_uri() );
define( 'HOME', esc_url( home_url( '/' ) ) );
define( 'HTITLE', esc_html( get_bloginfo( 'name' ) ) );

require( trailingslashit( get_template_directory() ) . 'assets/breadcrum.php' );
require( trailingslashit( get_template_directory() ) . 'assets/pagination.php' );
require( trailingslashit( get_template_directory() ) . 'assets/clients.php' );


/* For ikonic Test */


function ikonic_Project_Post_Type() {
	register_post_type('projects',
		array(
			'labels'      => array(
				'name'          => __( 'Projects', 'textdomain' ),
				'singular_name' => __( 'Projects', 'textdomain' ),
			),
			'public'      => true,
            'show_in_rest' => true, // To Show in Rest API -> Task Number 5
			'has_archive' => true,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt',),
			'rewrite'     => array( 'slug' => 'projects' ), 
		)
	);
}
add_action('init', 'ikonic_Project_Post_Type');


function Ikonic_Custom_Menu() {


register_nav_menus(array( 'New-ikonic-Nested-Menu' => __( 'New-ikonic-Nested-Menu', 'kts_theme' )));

}
add_action( 'init', 'Ikonic_Custom_Menu' );

function register_projects_api() {
    register_rest_route('custom-project-api/v1', '/projects', [
        'methods' => WP_REST_Server::READABLE, 
        'callback' => 'get_projects',
    ]);

    register_rest_route('custom-project-api', '/projects/(?P<id>\d+)', [
        'methods' => WP_REST_Server::READABLE, //
        'callback' => 'get_project',
        'args' => [
            'id' => [
                'required' => true,
                'validate_callback' => function($param) {
                    return is_numeric($param);
                },
            ],
        ],
    ]);
}
add_action('rest_api_init', 'register_projects_api');

function get_projects($data) {
    $args = [
        'post_type' => 'projects',
        'posts_per_page' => -1, 
    ];
    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return new WP_Error('no_projects', 'No projects found', ['status' => 404]);
    }

    $projects = [];
    while ($query->have_posts()) {
        $query->the_post();
        $projects[] = [
            'title' => get_the_title(),
            'project_url' => get_field("project_url"),
            'start_date' => get_field("start_date"),
            'end_date' => get_field("end_date"),
        ];
    }
    wp_reset_postdata();

    return $projects;
}




/* For Ikonic End */ 



function kts_theme_setup()
{
    load_theme_textdomain( 'kts_theme', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
        register_nav_menus(array( 'main-menu' => __( 'Main Menu', 'kts_theme' ) ));
        register_nav_menus(array( 'footer-menu' => __( 'Footer Menu', 'kts_theme' ) ));
}
add_action( 'after_setup_theme', 'kts_theme_setup' );

function kts_theme_load_scripts()
{
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', DIRPATH.'/css/bootstrap.min.css' );
    wp_enqueue_style( 'fancybox-css', DIRPATH.'/css/jquery.fancybox.min.css' );
    wp_enqueue_style( 'slick', DIRPATH.'/css/slick-theme.css' );
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'popper-js', DIRPATH.'/js/popper.min.js' );
    wp_enqueue_script( 'fancybox-js', DIRPATH.'/js/jquery.fancybox.min.js' );
    wp_enqueue_script( 'bootstrap-js', DIRPATH.'/js/bootstrap.min.js' );
    wp_enqueue_script( 'slick-js', DIRPATH.'/js/slick.min.js' );
    wp_enqueue_script( 'kts_theme-js', DIRPATH.'/js/script.js' );
}
add_action( 'wp_enqueue_scripts', 'kts_theme_load_scripts' );







function kts_theme_enqueue_comment_reply_script()
{
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'comment_form_before', 'kts_theme_enqueue_comment_reply_script' );

function kts_theme_title( $title )
{
    if ( $title == '' ) {
        return '&rarr;';
    } else {
        return $title;
    }
}
add_filter( 'the_title', 'kts_theme_title' );

function kts_theme_filter_wp_title( $title )
{
    return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_filter( 'wp_title', 'kts_theme_filter_wp_title' );

function kts_theme_widgets_init()
{
    register_sidebar( array (
        'name' => __( 'Sidebar Widget Area', 'kts_theme' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'kts_theme_widgets_init' );

function kts_theme_custom_pings( $comment )
{
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <?php echo comment_author_link(); ?>
    </li><?php
}

function kts_theme_comments_number( $count )
{
    if ( !is_admin() ) {
        global $id;
        $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}
add_filter( 'get_comments_number', 'kts_theme_comments_number' );

function custom_excerpt_length( $length )
{
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function ds_my_search_form( $form )
{
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
     <button type="submit"><i class="fa fa-search"></i></button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'ds_my_search_form' );

//add_image_size('blog_thumb', 270, 215, array('top', 'center'));
add_image_size('blog_thumb', 555, 386, array('top', 'center'));

function phone( $number )
{
    echo '<a href="tel:'.str_replace(array('-',' ','(',')' ), '', $number).'">'.$number.'</a>';
}

function recent_posts()
{
    ob_start(); global $post;
    $recentposts = array( 'post_type' => 'post', 'posts_per_page' => '3' );
    query_posts( $recentposts );
    echo '<div class="recent-posts">';
        while( have_posts() ) : the_post(); ?>
            <div class="recentpost">
                <div class="thumb">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </div>
                <h4><?php the_title(); ?></h4>
                <p> <i class="fa fa-calendar"></i> <?php echo get_the_date('F j, Y'); ?></p>
                <div class="clearfix"></div>
            </div>
            <?php
        endwhile;
        wp_reset_query();
    echo '</div>';
    return ob_get_clean();
}

add_shortcode('recent-post', 'recent_posts');

function get_ctxonmy_val($val){
    global $post;
    $terms = get_the_terms( $post->ID , $val );
    if($terms)
    {
        foreach ( $terms as $term )
        {
          $name[] =   $term->name;
        }
        return implode(',', $name);
    }
    
}


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}


function shopside_menu($attr=NULL){
    ob_start(); ?>

<div class="shopside-menucat">
    <ul>
        <?php $cate_list = get_terms( [
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'include' => [18, 19, 20, 21]
        ] );
        foreach( $cate_list as $data ){
        $sub_terms = get_terms( 'product_cat', array(
        'hide_empty' => false,
        'parent'         => $data->term_id,
        ) );
        echo '<li class="firstli" id="cate_'.$data->slug.'"><a href="'.get_term_link( $data->term_id ).'" id="px'.$data->term_id.'">'.$data->name.'</a>';
        if( count($sub_terms) > 0 ){ 
        echo '<div class="clearfix"></div><span id="submenu" class="cat_sub-menu"><i class="fa fa-caret-down" aria-hidden="true"></i> <i class="fa fa-caret-up" aria-hidden="true"></i></span><ul class="category-submenu" style="display: none; padding: 10px 10px 0;width: 100%;">';
        foreach( $sub_terms as $dlist ){
        $sub_terms_two = get_terms( 'product_cat', array(
        'hide_empty' => false,
        'parent'         => $dlist->term_id,
        ) );
        $cls = '';
        if( $dlist->slug == $current_slug ){
        $cls = ' class="active"';
        }
        echo '<li'.$cls.' id="cate_'.$dlist->slug.'"><a href="'.get_term_link($dlist->term_id).'">'.$dlist->name.' <span>('.$dlist->count.')</span></a>';

        if( count($sub_terms_two) > 0 ){ 
        echo '<div class="clearfix"></div><span id="submenu" class="cat_sub-menu"><i class="fa fa-caret-down" aria-hidden="true"></i> <i class="fa fa-caret-up" aria-hidden="true"></i></span><ul class="category-submenu" style="display: none; padding: 10px 10px 0;width: 100%;">';
        foreach( $sub_terms_two as $dtwo ){
        $sub_terms_three = get_terms( 'product_cat', array(
        'hide_empty' => false,
        'parent'         => $dtwo->term_id,
        ) );
        $cls = '';
        if( $dtwo->slug == $current_slug ){
        $cls = ' class="active"';
        }
        echo '<li><a'.$cls.' href="'.get_term_link($dtwo->term_id).'">'.$dtwo->name.' <span>('.$dtwo->count.')</span></a>';
        if( count($sub_terms_three) > 0 ){ 
        echo '<span id="submenu" class="cat_sub-menu"><i class="fa fa-caret-down" aria-hidden="true"></i> <i class="fa fa-caret-up" aria-hidden="true"></i></span><ul class="category-submenu" style="display: none; padding: 10px 10px 0;width: 100%;">';
        foreach( $sub_terms_three as $dthree ){
        $cls = '';
        if( $dthree->slug == $current_slug ){
        $cls = ' class="active"';
        }
        echo '<li'.$cls.'><a href="'.get_term_link($dthree->term_id).'">'.$dthree->name.' <span>('.$dthree->count.')</span></a></li>';
        }

        echo '</ul>';
        } echo '</li>';
        }

        echo '</li>';
        echo '</ul>';
        }
        echo '</li>';
        }

        echo $newstock.'</ul>';
        echo '</li>';
        }

        } 
        ?>
    </ul>
</div>

<?php    
    return ob_get_clean();   
}
add_shortcode('shopside-menu', 'shopside_menu');