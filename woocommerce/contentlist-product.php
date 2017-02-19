<?php 
			
							global $product, $woocommerce, $store_info; 
							$author = get_user_by('id', $post->post_author);
							$store_info = dokan_get_store_info( $author->ID );
						?>
							<div class="col-md-12">

							 	<div class="list_escaperoom">

							 		<div class="col-md-3">
							 		<?php the_post_thumbnail('pro_thum_shop',array ('class' => 'list_esc_img')) ?>
							 		</div>

							 		<div class="col-md-7">
										<a href="<?php the_permalink(); ?>">
										<h2 class="list_pro_tile">
										<?php the_title(); ?>
										</h2>
										</a>
										<div class="list_author">
											<a href="<?php echo dokan_get_store_url( $author->ID );?>">
											<?php echo get_avatar( $author->ID, 50 ); ?>
											<h5><?php echo esc_html( $store_info['store_name'] ); ?></h5>
											</a>
										</div>
										<a class="list_pro_btn" href="<?php the_permalink(); ?>">Book Now!</a>
										<div class="list_price_section hidden-md listmobile">
											<span class="list_price">
											<?php echo get_woocommerce_currency_symbol(); 
											echo $product->get_price(); ?>
											</span>
											<br>
											<span class="list_duction">
												<?php echo $product->get_duration_unit();?>
											</span>
										</div>
									</div>

									<div class="col-md-2 hidden-xs hidden-sm">	
										<div class="list_price_section pull-right">
											<span class="list_price">
											<?php echo get_woocommerce_currency_symbol(); 
											echo $product->get_price(); ?>
											</span>
											<br>
											<span class="list_duction">
												<?php echo $product->get_duration_unit();?>
											</span>
										</div>
									</div>	

							 	</div>
							</div> 
			