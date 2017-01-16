<?php 

if( function_exists('register_wpas_form')) {
function my_search_form() {
    $args = array();
    
	$args['wp_query'] = array( 'post_type' => array('product'), 
	                           'orderby' => 'title', 
	                           'order' => 'ASC' );

	$args['form'] = array( 'action' => get_bloginfo('url') . '/search-page/');

    $args['fields'][] = array('type' => 'search',
                              'title' => 'Search',
                              'placeholder' => 'Search desired esaperooms',
                              'pre_html' => '<div class="b_location_form"><div class="input_location">',
                              'post_html' => '</div>',
                              );
    $args['fields'][] = array('type' => 'taxonomy',
                              'taxonomy' => 'product_cat',
                              'format' => 'select',
                              'pre_html' => '<div class="select_category">',
                              'post_html' => '</div>',
                              );    
    $args['fields'][] = array('type' => 'taxonomy',
                              'taxonomy' => 'esr_locations',
                              'format' => 'select',
                              'pre_html' => '<div class="select_location">',
                              'post_html' => '</div>',
                              );

    $args['fields'][] = array( 'type' => 'submit',
	                           'class' => 'button',
	                           'value' => 'Search',
                             'pre_html' => '<div class="submit_location">',
                             'post_html' => '</div></div>',
                              );

    register_wpas_form('escaperoom_search', $args);    
}
add_action('init', 'my_search_form');

}
