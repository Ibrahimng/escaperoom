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
	
	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">

			<div class="row">
				<?php	
				if ( is_active_sidebar( 'vendor-sidebar' ) ) {
				$column = 'col-md-9';
				} else {
					$column = 'col-md-12';
				}
				if ( is_active_sidebar( 'vendor-sidebar' ) ) : ?>		

				<div class="col-md-3">
					<div class="sidebar">
						<?php dynamic_sidebar('vendor-sidebar'); ?>
					</div>
				</div>
				<?php endif; ?>
			
		 		<div class="<?php echo $column; ?>">
		 			<div class="row">
						<ul class="escaperoom_pro_tab pull-right">
						  <li class="active">
						 	 <a class="btn btn-primary" data-toggle="tab" href="#grid">
						 	 <span class="ion-android-apps"></span>Grid
						 	 </a>
						  </li>
						  <li>
						  	<a class="btn btn-primary" data-toggle="tab" href="#list">
						  	<span class="ion-navicon"></span>List
						  	</a>
						  </li>
						  <li>
						  	<a class="btn btn-primary" data-toggle="tab" href="#map">
						  	<span class="ion-ios-location-outline"></span>Map
						  	</a>
						  </li>
						</ul>
					</div>
					<div class="row">
						<div class="tab-content">

							<div id="grid" class="tab-pane fade in active">
							<?php 
								while ( have_posts() ) : the_post();
									wc_get_template_part( 'content', 'product' );
								endwhile;  
								do_action( 'woocommerce_after_shop_loop' );
							?>
							
							</div>

							<div id="list" class="tab-pane fade">
							<?php 
								while ( have_posts() ) : the_post(); 
									wc_get_template_part( 'contentlist', 'product' );
								endwhile; 
								do_action( 'woocommerce_after_shop_loop' );
							 ?>
							</div>

							<div id="map" class="tab-pane fade">
							    <div id="product_map"></div>
							</div>

						</div>
					</div>	
				</div><!--#col-->
			</div><!--#row-->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
