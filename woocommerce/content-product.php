<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $post, $author, $store_info, $counter;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

	$author = get_user_by('id', $post->post_author);
	$store_info = dokan_get_store_info( $author->ID );
	

	++$counter;
	//var_dump($counter);
	if($counter == 3){
		$clearfix = '<div class="clearfix"></div>';
		$counter = 0;
	}
	else{
		$clearfix = '';
	}
	?>

<div id="product_map"></div>
<div class="layout col-md-4 col-sm-4 col-xs-12">

	<div class="custom_product">
		<?php the_post_thumbnail('pro_thum_shop',array ('class' => 'pro_thumb')) ?>
		<span class="pro_price"><?php echo get_woocommerce_currency_symbol(); echo $product->get_price(); ?>
			<span class="pro_day">
				<span class="hide_list">/</span> 
				<?php echo $product->get_duration_unit();?>
			</span>
		</span>

		<div class="product_info">
		<a href="<?php the_permalink(); ?>">
			<span class="pro_title"><?php echo $product->get_title(); ?></span>
		</a>
		
		<span class="author_info">
			
			<?php echo get_avatar( $author->ID, 50 ); ?>
			<h5><?php echo esc_html( $store_info['store_name'] ); ?></h5>
		</span>
		</div>
	</div>

</div>
 
<?php echo $clearfix; ?>