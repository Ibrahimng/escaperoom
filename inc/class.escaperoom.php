<?php 

class EscapeRoom {


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

	public function getRandomProductImage($id) {
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
     	$thumbnail_id = get_post_thumbnail_id($location_ids[0]);
     	return wp_get_attachment_url($thumbnail_id);
	}
}


$GLOBALS['esr'] = new EscapeRoom;