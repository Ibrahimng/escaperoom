<?php 


// single page product page-top seller overview
function show_seller_info_dokan() {
	if(is_singular('product')) {
		global $post;
		$author = get_user_by('id', $post->post_author);
		$store_info = dokan_get_store_info( $author->ID );

	    dokan_get_template_part('seller-overview', '', array(
	        'author' => $author,
	        'store_info' => $store_info,
	    ) );
	}
}

add_action('woocommerce_before_main_content', 'show_seller_info_dokan', 21, 0);


// remove Dokan default seller tab and edit update new ones 
function woo_remove_product_tabs( $tabs ) {
	$tabs['description']['title'] = __( 'Room Information' );
	$tabs['vidoes'] = array(
		'title' 	=> __( 'Room Videos', 'woocommerce' ),
		'callback' 	=> 'escape_room_videos'
	);
	unset($tabs['seller']);

	$tabs['description']['priority'] = 5;
	$tabs['vidoes']['priority'] = 10;
	$tabs['reviews']['priority'] = 15;	

    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function escape_room_videos() {
	echo '<h2> Product videos list </h2>';
}

// https://isabelcastillo.com/change-product-description-title-woocommerce
add_filter('woocommerce_product_description_heading',
'isa_product_description_heading');
 
function isa_product_description_heading() {
    return __('Room Information', 'woocommerce');
}



//redirect checkput page
/*
add_filter('add_to_cart_redirect', 'esr_add_to_cart_redirect');
	function smoothwriter_add_to_cart_redirect() {
	 global $woocommerce;
	 $checkout_url = $woocommerce->cart->get_checkout_url();
	 return $checkout_url;
	}
*/	



remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 20);

//remove sale flash
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);

//remove rating
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);


//remove button
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart', 10);

//remove ordering
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


//remove shop page title
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
	
	return false;
	
}
//breadcrumb remove
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

//remove count shop page
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

