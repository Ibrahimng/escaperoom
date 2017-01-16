<?php 

function my_search_form() {
    $args = array();
    
	$args['wp_query'] = array( 'post_type' => array('product'), 
	                           'orderby' => 'title', 
	                           'order' => 'ASC' );

	$args['form'] = array( 'action' => get_bloginfo('url') . '/search-page/');

    $args['fields'][] = array('type' => 'search',
                              'title' => 'Search',
                              'placeholder' => 'Enter search terms...');
    $args['fields'][] = array('type' => 'taxonomy',
                              'taxonomy' => 'esr_locations',
                              'format' => 'select');

    $args['fields'][] = array( 'type' => 'submit',
	                           'class' => 'button',
	                           'value' => 'Search' );

    register_wpas_form('newpage', $args);    
}
add_action('init', 'my_search_form');
