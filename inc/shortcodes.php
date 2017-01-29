<?php 
function logout_func() {
	wp_logout();
	ob_clean();
	$url = get_home_url();
	wp_redirect($url);
	exit();
}
add_shortcode('logout', 'logout_func');

