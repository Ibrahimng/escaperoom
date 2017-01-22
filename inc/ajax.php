<?php 


function get_product_locations_ajax_func() {
	global $esr;
	$esr->productLocations();
}

add_action('wp_ajax_nopriv_get_product_locations_ajax', 'get_product_locations_ajax_func');
add_action('wp_ajax_get_product_locations_ajax', 'get_product_locations_ajax_func');