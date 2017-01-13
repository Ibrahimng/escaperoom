<?php
  // $con = mysql_connect('localhost', 'root', '');
  // if (!$con) {
  //     echo "Cannot connect to the database ";
  //     die();
  // }
  // mysql_select_db('escaperoom');
  // $result = mysql_query('show tables');
  // while ($tables = mysql_fetch_array($result)) {
  //     foreach ($tables as $key => $value) {
  //         mysql_query("ALTER TABLE $value CONVERT TO CHARACTER SET utf8 COLLATE utf8_bin");
  //     }
  // }
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
	add_theme_support( 'post-thumbnails' );

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
		'name'          => esc_html__( 'Sidebar', 'escaperoom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'escaperoom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'escaperoom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function escaperoom_scripts() {
	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic', array(), false, 'all');
	wp_enqueue_style('fonts_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), false, 'all');
	wp_enqueue_style('ionic_fonts', 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), false, 'all');
	wp_enqueue_style('bootstrap_min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
	wp_enqueue_style('slick_theme', get_template_directory_uri() . '/css/slick-theme.css', array(), false, 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array(), false, 'all');
	wp_enqueue_style('venobox', get_template_directory_uri() . '/css/venobox.css', array(), false, 'all');
	//wp_enqueue_style('landing_page', get_template_directory_uri() . '/css/landing-page.css', array(), false, 'all');
	wp_enqueue_style('escaperoom_style', get_template_directory_uri() . '/css/escaperoom_style.css', array(), false, 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), false, 'all');
	wp_enqueue_style( 'escaperoom-style', get_stylesheet_uri() );

	/*JS Enqueue*/
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap_min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
	wp_enqueue_script('slick_min', get_template_directory_uri() . '/js/slick.min.js', array(), false, true);
	wp_enqueue_script('venobox', get_template_directory_uri() . '/js/venobox.min.js', array(), false, true);
	wp_enqueue_script('settings', get_template_directory_uri() . '/js/settings.js', array(), false, true);
	wp_enqueue_script( 'escaperoom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'escaperoom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'escaperoom_scripts' );

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


// Product's Location Custom Post Type

if ( ! function_exists( 'escape_rooms_location_tax_func' ) ) {

// Register Custom Taxonomy
function escape_rooms_location_tax_func() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'esr' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'esr' ),
		'menu_name'                  => __( 'Location', 'esr' ),
		'all_items'                  => __( 'Locations', 'esr' ),
		'parent_item'                => __( 'Parent Location', 'esr' ),
		'parent_item_colon'          => __( 'Parent Location:', 'esr' ),
		'new_item_name'              => __( 'New Location Name', 'esr' ),
		'add_new_item'               => __( 'Add New Location', 'esr' ),
		'edit_item'                  => __( 'Edit Location', 'esr' ),
		'update_item'                => __( 'Update Location', 'esr' ),
		'view_item'                  => __( 'View Location', 'esr' ),
		'separate_items_with_commas' => __( 'Separate locations with commas', 'esr' ),
		'add_or_remove_items'        => __( 'Add or remove locations', 'esr' ),
		'choose_from_most_used'      => __( 'Choose from the most used locations', 'esr' ),
		'popular_items'              => __( 'Popular Locations', 'esr' ),
		'search_items'               => __( 'Search Locations', 'esr' ),
		'not_found'                  => __( 'Location Not Found', 'esr' ),
		'no_terms'                   => __( 'No locations', 'esr' ),
		'items_list'                 => __( 'Locations list', 'esr' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'esr' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'esr_locations', array( 'product' ), $args );

}
add_action( 'init', 'escape_rooms_location_tax_func', 0 );

}

// submit data to dokan process 
function save_booking_customized_data($post_id) {

    if( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ) {
        $esr_locations    = intval( $_POST['esr_locations'] );
        if ( $esr_locations < 0 ) {
            $errors[] = __( 'Please select a location', 'dokan' );
        }
    } else {
        if( !isset( $_POST['esr_locations'] ) && empty( $_POST['esr_locations'] ) ) {
            $errors[] = __( 'Please select AT LEAST ONE location', 'dokan' );
        }
    }

	if( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ) {
	    wp_set_object_terms( $post_id, (int) $_POST['esr_locations'], 'esr_locations' );
	} else {
	    if( isset( $_POST['esr_locations'] ) && !empty( $_POST['esr_locations'] ) ) {
	        $cat_ids = array_map( 'intval', (array)$_POST['esr_locations'] );
	        wp_set_object_terms( $post_id, $cat_ids, 'esr_locations' );
	    }
	}
}
add_action('dokan_new_product_added', 'save_booking_customized_data');
add_action('dokan_product_updated', 'save_booking_customized_data');

