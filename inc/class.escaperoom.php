<?php 

class EscapeRoom {

	function getAttachmentImageLink($id, $size = 'thumbnail') {
		$attachment_id = get_post_thumbnail_id($id);
		$img_atts = wp_get_attachment_image_src($attachment_id, $size);
		return $img_atts[0];
	}
	public function getLocationIDs() {
		$esr_args = array(
			'taxonomy' => 'esr_locations',
			'hide_empty' => false,
			'number'	=> 5,
			'fields'	=> 'ids',
        );
        return get_terms($esr_args);
	}

	public function get_location_name($id) {
		$location = get_term_by('id', $id, 'esr_locations');
		return $location->name;
	}

	public function getLocationImageURL($id) {
		if($this->getRandomProductImage($id)) {
			return $this->getRandomProductImage($id);
		} else if(function_exists('z_taxonomy_image_url')) {
			return z_taxonomy_image_url($id);
		}
	}

	public function getRandomProductImage($id, $size='medium') {
		$args = array(
		    'posts_per_page'   => -1,
		    'orderby'          => 'rand',
		    'post_type'        => 'product',
		    'tax_query' => array(
		        array(
		            'taxonomy' => 'esr_locations',
		            'field' => 'term_id',
		            'terms' => $id,
		        )
		    )
	    ); 

     	$locations = get_posts( $args );
     	$location_ids = wp_list_pluck($locations, 'ID');
     	return $this->getAttachmentImageLink($location_ids[0], $size);
	}

	public function featuredEscapeRoomsArgs() {
		$meta_query   = WC()->query->get_meta_query();
		$meta_query[] = array(
		    'key'   => '_featured',
		    'value' => 'yes'
		);
		$args = array(
		    'post_type'   =>  'product',
		    // 'stock'       =>  1,
		    'showposts'   =>  6,
		    'orderby'     =>  'date',
		    'order'       =>  'DESC',
		    'meta_query'  =>  $meta_query
		);
		return $args;
	}


	public function productLocations() {

		$args = array(
			'posts_per_page'   => -1,
			'offset'           => 0,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'product',
			'author'	   => '',
			'author_name'	   => '',
			'post_status'      => 'publish',
			);

		$q = get_posts($args);

		$product_ids = wp_list_pluck($q, 'ID');
		$locations = array();

		foreach($product_ids as $id) {
			$lat = get_post_meta($id, 'location_lat', true);
			$lng = get_post_meta($id, 'location_long', true);
			$author_id = get_post_field( 'post_author', $id );
			$auth_img = get_avatar( $author_id, 50 );
			$auth_name = get_the_author_meta('display_name', $author_id);
			$price =  get_post_meta( $id, '_price', true);
			$book_duration =  get_post_meta( $id, '_wc_booking_duration_unit', true);

			$title = get_the_title($id);
			$img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ),'maps_pro_img');
			$lat = floatval($lat);
			$lng = floatval($lng);
			if($lat && $lng) {
				$locations[] = array(
					'lat' => $lat, 
					'lng' => $lng, 
					'title' => $title, 
					'img' => $img[0], 
					'auth_img' => $auth_img, 
					'auth_name' => $auth_name, 
					'price' => $price,  
					'book_duration' => $book_duration,  
				);
			}
			
		}

		 echo json_encode($locations);
		die();
	}
}


$GLOBALS['esr'] = new EscapeRoom;
