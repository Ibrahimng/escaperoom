<?php 
function esr_woocommerce_support() {

			add_theme_support( 'woocommerce' );
		}
add_action('after_setup_theme','esr_woocommerce_support');	

//redirect checkput page
/*
add_filter('add_to_cart_redirect', 'esr_add_to_cart_redirect');
	function smoothwriter_add_to_cart_redirect() {
	 global $woocommerce;
	 $checkout_url = $woocommerce->cart->get_checkout_url();
	 return $checkout_url;
	}
*/	

