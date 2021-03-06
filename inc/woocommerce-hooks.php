<?php 


add_action('woocommerce_before_main_content', 'escaperoom_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'escaperoom_wrapper_end', 10);

function escaperoom_wrapper_start() {
  echo '<div id="primary" class="container">
		<main id="main" class="site-main" role="main">';
}

function escaperoom_wrapper_end() {
  echo '</div></main></div>';
}

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
	global $post; 
	$output = '<h2> Product videos list </h2>';
	$product_videos = get_post_meta( $post->ID, 'product_video', true );
	if(is_array($product_videos)) {
		$output .= '<div class="row"><div class="single_product_video_list">';
		foreach ($product_videos as $vid) {
			$output .= '<div class="col-md-4 col-xs-12 single_reated_video"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'.$vid.'"></iframe></div></div>';
		}
		$output .= '</div></div>';
	} else {
		$output = '<p> No video added with this room</p>';
	}
	echo $output;
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

//add maps longitude and latitude

function product_location_long_lat_custom() {

  global $woocommerce, $post;
  
  echo '<div class="options_group">';
  
		woocommerce_wp_text_input( 
			array( 
				'id'          => 'location_lat', 
				'label'       => __( 'Escape Room Latitude :', 'escaperoom' ), 
				'placeholder' => 'i.e. 24.0221628',
				'desc_tip'    => 'true',
			)
		); 
  
		woocommerce_wp_text_input( 
			array( 
				'id'          => 'location_long', 
				'label'       => __( 'Escape Room Longitude :', 'escaperoom' ), 
				'placeholder' => 'i.e. 89.2295773',
				'desc_tip'    => 'true',
			)
		); 		

		woocommerce_wp_text_input( 
			array( 
				'id'          => 'number_of_person', 
				'label'       => __( 'Number of Person:', 'escaperoom' ), 
				'desc_tip'    => 'true',
			)
		); 

  echo '</div>';
	
}
add_action( 'woocommerce_product_options_general_product_data', 'product_location_long_lat_custom');

//product location longitude and latitude
function product_location_long_lat_save( $post_id ){
	$longitude = $_POST['location_lat'];
	$latitude = $_POST['location_long'];
	$number_of_person = $_POST['number_of_person'];

	update_post_meta( $post_id, 'location_lat', esc_attr( $longitude ) );
	update_post_meta( $post_id, 'location_long', esc_attr( $latitude ) );
	update_post_meta( $post_id, 'number_of_person', esc_attr( $number_of_person ) );

}
add_action( 'woocommerce_process_product_meta', 'product_location_long_lat_save' );


remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );


add_action( 'woocommerce_before_single_product_summary', 'escaperoom_curosel_single_product_fun');

function escaperoom_curosel_single_product_fun(){	?>
	<div class="single_product_thmub_slider">
	  	<?php 
		    global $post, $product, $woocommerce;
		    $product_thumb = get_post_thumbnail_id($post->ID);
			$attachment_ids = $product->get_gallery_attachment_ids();
			$attachment_ids[] = $product_thumb;

			foreach ($attachment_ids as $attachment_id) :
			$img_atts = wp_get_attachment_image_src( $attachment_id, 'single_product_page' );
		?>
			<div class="single_pro_thumb_item">
			  <img src="<?php echo $img_atts[0]; ?>">
			</div>

		<?php endforeach; ?>
	</div>
<?php } 

// single escaperoom social share

function social_share($id) {

	$html = '<div id="share_buttons">
			    <ul class="list-inline">
			    	<li>
			    		<!-- Facebook -->
					    <a href="http://www.facebook.com/sharer.php?u='. get_the_permalink($id).'&amp;text='. get_the_title($id).'" target="_blank">
					        <span class="fa fa-facebook-official"></span>Share
					    </a>
			    	</li>
			    	<li>
			    		<!-- Twitter -->
					    <a href="https://twitter.com/share?url='. get_the_permalink($id).'&amp;text='. get_the_title($id).'" target="_blank">
					        <span class="fa fa-twitter"></span>Share
					    </a>
			    	</li>
			    	<li>
			    		<!-- Email -->
						<a href="mailto:?Subject='. get_the_title($id).'&amp;Body='. get_the_title($id).'&amp; '. get_the_permalink($id).'">
					        <span class="fa fa-envelope-o"></span>Email
					    </a>
			    	</li>
			    </ul>
			</div>';

	return $html;
} 









