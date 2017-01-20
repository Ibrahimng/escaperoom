<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package escaperoom
 */

get_header(); ?>
	<div class="whitespace"></div>
	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">

		<?php //get_product_locations_ajax_func(); ?>

			<?php $sidebar = is_shop(); 
				if($sidebar) {
					$colum = 'col-md-9 col-sm-9 col-xs-12';
				}
				 else {
					 $colum = 'col-md-12 col-sm-12 col-xs-12';
				} 
			?>
			
			<?php if($sidebar) : ?>
				<div class="col-md-3">
					<div class="sidebar_wrapper">
						<?php dynamic_sidebar('vendor-sidebar'); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="<?php echo $colum; ?> padding_bottom_50">
				<div class="col-md-12">
					<div class="grid-button btn-group pull-right">
					  <a class="btn btn-primary btn_grid" id="grid">
					  	<span class="ion-android-apps"></span>
					  	Grid
					  </a>
					  <a class="btn btn-primary btn_list" id="">
					  	<span class="ion-navicon"></span>
					  	List
					  </a>
					  <a class="btn btn-primary btn_maps" id="maps">
					  	<span class="ion-ios-location-outline"></span>
					  	Maps
					  </a>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php woocommerce_content(); ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); 
