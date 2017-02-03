<?php 
/*
Template name: FrontPage
*/
get_header(); ?>
  <?php  $esr_banner_img = get_field( 'escaperoom_banner_background_image' ); ?>
    <div class="intro-header" style="background-image: url('<?php if($esr_banner_img): echo $esr_banner_img; else: echo get_template_directory_uri(); ?>/img/intro-bg.jpg <?php endif; ?>');">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">

                        <?php  $esr_banner_title = get_field( 'escaperoom_banner_title' );
                        if($esr_banner_title):
                        echo '<h1>'.$esr_banner_title.'</h1>';
                        ?>
                        <?php else: ?>
                         <h1>Book Escaperoom Anywhere</h1>       
                        <?php  endif; ?>
                        
                        <?php  $esr_banner_subtitle = get_field( 'escaperoom_banner_sub_title' );
                        if($esr_banner_subtitle):
                        echo '<h2>'.$esr_banner_subtitle.'</h2>';
                        ?>
                        <?php else: ?>
                          <h2>Listify helps you find out whats happening in your city, Let's explore.</h2>      
                        <?php  endif; ?>

                        <?php 
                        if( class_exists('WP_Advanced_Search') ) {
                            $search = new WP_Advanced_Search('escaperoom_search');
                            $search->the_form();
                        } else {
                            echo '<h3> WP Advanced Search PLugin is inactive </h3>';
                        }
                            ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->

    <section id="explore_location" class="padding_top_50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="section_header">
                        <?php  $explore_escaperoom_section_title = get_field( 'explore_escaperoom_section_title' );
                        if($explore_escaperoom_section_title):
                        echo '<h1>'.$explore_escaperoom_section_title.'</h1>';
                        ?>
                        <?php else: ?>
                        <h1>Explore Escaperoom</h1>       
                        <?php  endif; ?>

                        <?php  $explore_escaperoom_section_sub_title = get_field( 'explore_escaperoom_section_sub_title' );
                        if($explore_escaperoom_section_sub_title):
                        echo '<h4>'.$explore_escaperoom_section_sub_title.'</h4>';
                        ?>
                        <?php else: ?>
                          <h4>Find escape rooms in your city, or explore unique ones around the world.</h4>     
                        <?php  endif; ?>    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="explore_location_list">
                    <?php 
                    global $esr;
                    $locations = $esr->getLocationIDs();
                    foreach ($locations as $k => $v) : 
                        if($k == 0 ): 
                    ?>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <a href="<?php echo get_term_link($v); ?>" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo $esr->getLocationImageURL($v, 'location_img_large'); ?>" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2><?php echo $esr->get_location_name($v); ?></h2>
                            </div>
                        </a>
                    </div>
                <?php elseif ($k == 1 ):  ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="<?php echo get_term_link($v); ?>" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo $esr->getLocationImageURL($v, 'location_img'); ?>" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2><?php echo $esr->get_location_name($v); ?></h2>
                            </div>
                        </a>
                    </div>
              <?php endif; endforeach; ?>
              </div>
            </div>    

            <div class="row">
                <div class="explore_location_list">
                    <?php 
                    $locations = $esr->getLocationIDs();
                    foreach ($locations as $k => $v) : 
                        if($k >= 2 && $k <= 4 ) : 
                    ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="<?php echo get_term_link($v); ?>" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo $esr->getLocationImageURL($v, 'location_img'); ?>" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2><?php echo $esr->get_location_name($v); ?></h2>
                            </div>
                        </a>
                    </div>
                <?php endif; endforeach; ?>
                </div>    
            </div>

            <div class="row">
                <div class="more_explore">
                    <?php 
                        $explore_link_text = get_field('explore_more_escaperoom');
                        $explore_more_escaperoom_link = get_field('explore_more_escaperoom_link');
                        if($explore_link_text && $explore_more_escaperoom_link){
                     ?>
                    <a href="<?php echo $explore_more_escaperoom_link; ?>"><?php echo $explore_link_text;  ?></a>

                    <?php } 
                    else{
                        echo '<a href="#">Explore More Escaperoom</a>';
                    }
                        ?>
                </div>
            </div>

        </div>    
    </section>
    <!-- end section -->

    <?php  
    $q = new WP_Query($esr->featuredEscapeRoomsArgs()); 
    if( $q->have_posts()) : ?>
    <section id="features_section" class="padding_bottom_50" style="background:#ddd;">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="section_header">
                        <?php  $features_escaperoom_title = get_field( 'features_escaperoom_title' );
                            if($features_escaperoom_title):
                            echo '<h1>'.$features_escaperoom_title.'</h1>';
                            ?>
                            <?php else: ?>
                            <h1>Featured Escaperoom</h1>       
                        <?php  endif; ?>    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="feature_product_items">
                <?php while( $q->have_posts()) : $q->the_post(); ?>
                    <?php global $product;  ?>
                    <div class="col-md-4">
                        <a href="<?php the_permalink(); ?>" class="feature_item" style="background-image: url('<?php echo $esr->getAttachmentImageLink(get_the_ID(), 'medium'); ?>');">
                            <span class="label-bottom">
                                <?php the_title(); ?>         
                                <span class="hourly-rate">
                                    Rate: <?php echo get_woocommerce_currency_symbol(); echo $product->get_price(); ?>/ <?php echo $product->get_duration_unit();?>
                                </span>     
                            </span>
                        </a>    
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>


        </div>
    </section>
    <!--End featuers section -->
    <?php endif; ?>

    <section id="service_section" class="padding_bottom_50">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="section_header">  
                        <?php  $how_it_works_section_title = get_field( 'how_it_works_section_title' );
                            if($how_it_works_section_title):
                            echo '<h1>'.$how_it_works_section_title.'</h1>';
                            ?>
                            <?php else: ?>
                            <h1>How It's Work</h1>       
                        <?php  endif; ?>                   
                    </div>
                </div>
            </div>

            <div class="row">

            <?php  
                $escaperoom_service_items = get_field( 'escaperoom_service_items' );
                    
                    if(is_array($escaperoom_service_items)){
                        foreach($escaperoom_service_items as $escaperoom_service_item) { 
                            ?>
                            <div class="col-md-3">
                                <div class="service_item">
                                    <div class="service_icon"> 
                                        <i class="fa <?php echo $escaperoom_service_item['escaperoom_service_icon']; ?>"></i>
                                    </div>
                                    <div class="service_icon_content">
                                        <h4><?php echo $escaperoom_service_item['escaperoom_service_title']; ?></h4>
                                        <p><?php echo $escaperoom_service_item['escaperoom_service_content']; ?></p>
                                    </div>
                                </div>    
                            </div>
                        <?php }
                    }
            ?>

            </div>

        </div>
    </section> 

    <section id="feature_video_section" class="padding_bottom_50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="section_header padding_bottom_50">
                        <?php  $feature_video_title = get_field( 'features_escaperoom_video_title' );
                            if($feature_video_title):
                            echo '<h1>'.$feature_video_title.'</h1>';
                            ?>
                            <?php else: ?>
                            <h1>Feature Video</h1>       
                        <?php  endif; ?>    

                        <?php  $feature_video_subtitle = get_field( 'features_escaperoom_video_sub_title' );
                            if($feature_video_subtitle):
                            echo '<h4>'.$feature_video_subtitle.'</h4>';
                            ?>
                        <?php  endif; ?>    
                    </div>
                </div>
            </div>

           <div class="row">
               
                  <div class="feature_vidoes">
                    <?php  
                    $feature_video_items = get_field( 'features_escaperoom_video_items' );
                        
                        if(is_array($feature_video_items)){
                            foreach($feature_video_items as $feature_video_item) { 
                                 $feature_video_link = $feature_video_item['feature_video_link'];
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                
                                    <div class="feature_video_item">
                                        <iframe src="<?php echo $feature_video_link; ?>" width="500" height="320" frameborder="0" title="" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                                    </div>  
                                </div>
                               
                            <?php }
                        }
                      ?>
                 </div>
                
            </div>
        </div>    
    </section> 
    <!--/features video section -->


    <!-- Testimonial Section -->
    <section id="testimonial_section" class="testimonial padding_bottom_50">
        <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <!-- Testimonial Slider -->
                  <div class="testimonial_slider">

                <?php  
                $testimoials = get_field( 'escaperoom_testimonial' );
                    
                    if(is_array($testimoials)){
                        foreach($testimoials as $testimoial) { 
                             $clinet_name = $testimoial['escaperoom_client_name'];
                             $client_location = $testimoial['escaperoom_client_location'];
                             $client_text = $testimoial['escaperoom_client_content'];
                            ?>
                              <div class="testimonial_single text-center">
                                <p><?php echo $client_text; ?></p>
                                <h5 class="client_name"><?php echo $clinet_name; ?></h5>
                                <span class="client_location"><?php echo $client_location; ?></span>
                             </div>
                        <?php }
                    }
                  ?>
                  </div>
                  <!-- /Testimonial Slider -->
               </div>
            </div>
        </div>
    </section>
      <!-- /Testimonial Section -->
<?php get_footer(); ?>
