<?php
  // echo "The collation of your database has been successfully changed!";
/**
 * escaperoom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package escaperoom
 */

if ( ! function_exists( 'escaperoom_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function escaperoom_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on escaperoom, use a find and replace
	 * to change 'escaperoom' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'escaperoom', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails', array('product','post'));
	add_image_size('location_img', 260, 240, true);
	add_image_size('location_img_large', 748, 333, true);
	add_image_size('maps_pro_img', 200, 75, true);
	add_image_size('pro_thum_shop', 240, 160, true);
	add_image_size('single_product_page', 575, 450, true);
	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary menu', 'escaperoom' ),
		'footer_menu' => esc_html__( 'Footer menu', 'escaperoom' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'escaperoom_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'escaperoom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function escaperoom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'escaperoom_content_width', 640 );
}
add_action( 'after_setup_theme', 'escaperoom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function escaperoom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Vendor Sidebar', 'escaperoom' ),
		'id'            => 'vendor-sidebar',
		'description'   => esc_html__( 'Add widgets For Vendor page.', 'escaperoom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget_title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'escaperoom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function escaperoom_scripts() {

	$api =  dokan_get_option( 'gmap_api_key', 'dokan_general', false );

	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic', array(), false, 'all');
	wp_enqueue_style('fonts_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), false, 'all');
	wp_enqueue_style('ionic_fonts', 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), false, 'all');
	wp_enqueue_style('bootstrap_min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
	wp_enqueue_style('slick_theme', get_template_directory_uri() . '/css/slick-theme.css', array(), false, 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array(), false, 'all');
	wp_enqueue_style('venobox', get_template_directory_uri() . '/css/venobox.css', array(), false, 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), false, 'all');
	//wp_enqueue_style('landing_page', get_template_directory_uri() . '/css/landing-page.css', array(), false, 'all');
	wp_enqueue_style('escaperoom_style', get_template_directory_uri() . '/css/escaperoom_style.css', array(), false, 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), false, 'all');
	wp_enqueue_style( 'escaperoom-style', get_stylesheet_uri() );

	/*JS Enqueue*/
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap_min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);

	wp_enqueue_script('google_maps', 'https://maps.googleapis.com/maps/api/js?key='.$api.'', array(),  false, true);

	wp_enqueue_script('markerclusterer', get_template_directory_uri() . '/assets/maps/markerclusterer.js', array('google_maps'), false, true);

	wp_enqueue_script('slick_slider', get_template_directory_uri() . '/js/slick.min.js', array(), false, true);


	wp_enqueue_script('venobox', get_template_directory_uri() . '/js/venobox.min.js', array(), false, true);
	wp_enqueue_script('settings', get_template_directory_uri() . '/js/settings.js', array('slick_slider'), false, true);
	wp_localize_script('settings', 'localized', array('themepath' => get_stylesheet_directory_uri() ));
	wp_enqueue_script( 'escaperoom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'escaperoom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'escaperoom_scripts' );

// redirect after login 
function sellers_redirect_to_dashboard( $redirect_to, $request, $user ) {
	 if ( ! is_wp_error( $user ) ) {
	    if( is_array($user->roles) && in_array('seller', $user->roles) ) {
			$page_id = dokan_get_option( 'dashboard', 'dokan_pages' );
			return get_permalink($page_id);
	    } else {
	        return $redirect_to;
	    }
	}
}
// add_filter( 'login_redirect', 'sellers_redirect_to_dashboard', 10, 3 );


/* login & register page css */
function login_register_css() {
	echo "<style>body.woocommerce-account {
    color: #FFF;
    background-image: url('" . get_stylesheet_directory_uri() ."/img/intro-bg.jpg');
    background-size: cover;
}

.dps-pack {
    background: #fc913b !important;
}
.dps-pack ul {
    list-style: none;
}</style>";
}
if(!is_user_logged_in()) {
	add_action('wp_footer', 'login_register_css');
}

/* woocommerce support */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/required_plugins.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/inc/custom-taxonomy.php';
require get_template_directory() . '/inc/dokan-hooks.php';
require get_template_directory() . '/inc/shortcodes.php';
require_once('wp-advanced-search/wpas.php');

if(function_exists('dokan_get_template_part')) {
	require get_template_directory() . '/inc/woocommerce-hooks.php';
}
require get_template_directory() . '/inc/search.php';
require get_template_directory() . '/inc/class.escaperoom.php';
require get_template_directory() . '/inc/ajax.php';



