<?php 
/*
Template name: FrontPage
*/
get_header(); ?>
  <?php  $slider_banner = cs_get_option( 'home_slider' ); ?>
    <div class="intro-header" style="background-image: url('<?php if($slider_banner): echo $slider_banner; else: echo get_template_directory_uri(); ?>/img/intro-bg.jpg <?php endif; ?>');">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <?php  $slider_title = cs_get_option( 'slider_title' );
                        if($slider_title):
                        echo '<h1>'.$slider_title.'</h1>';
                        ?>
                        <?php else: ?>
                         <h1>Book Escaperoom Anywhere</h1>       
                        <?php  endif; ?>
                        
                        <?php  $slider_subtitle = cs_get_option( 'slider_subtitle' );
                        if($slider_subtitle):
                        echo '<h2>'.$slider_subtitle.'<h2>';
                        ?>
                        <?php else: ?>
                          <h2>Listify helps you find out whats happening in your city, Let's explore.</h2>      
                        <?php  endif; ?>
                       
                        <form action="">
                            <div class="b_location_form">
                                <div class="input_location">
                                    <input type="text" name="q" placeholder="Where would you like to make music?">
                                </div>
                                <div class="select_location">
                                    <select>
                                      <option>Los Angeles </option>
                                      <option>option 2 </option>
                                      <option>option 3 </option>
                                  </select>
                                </div>
                                <div class="submit_location">
                                    <input type="submit" class="floatright button-1" value="Find Studios">
                                </div>    
                            </div>
                        </form>



                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <section id="explore_location">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div class="section_header">
                        <?php  $explore_city_title = cs_get_option( 'explore_city_title' );
                        if($explore_city_title):
                        echo '<h1>'.$explore_city_title.'</h1>';
                        ?>
                        <?php else: ?>
                        <h1>Explore Escaperoom</h1>       
                        <?php  endif; ?>

                        <?php  $explore_city_subtitle = cs_get_option( 'explore_city_subtitle' );
                        if($explore_city_subtitle):
                        echo '<h4>'.$explore_city_subtitle.'</h4>';
                        ?>
                        <?php else: ?>
                          <h4>Find studios in your city, or explore unique ones around the world.</h4>      
                        <?php  endif; ?>    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="explore_location_list">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <a href="#" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/1.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2>Los Angeles</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="#" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/2.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2>Los Angeles</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="explore_location_list">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="#" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/2.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2>Los Angeles</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="#" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/2.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2>Los Angeles</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="#" class="explore_item">
                            <div class="explore_img">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/2.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="explore_title">
                                <h2>Los Angeles</h2>
                            </div>
                        </a>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="more_explore">
                    <a href="#">Explore more studios around the world</a>
                </div>
            </div>

        </div>    
    </section>
    <!-- end section -->

    <section id="features_section" class="padding_bottom_50">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="section_header">
                        <?php  $fature_escaperoom = cs_get_option( 'fature_escaperoom' );
                            if($fature_escaperoom):
                            echo '<h1>'.$fature_escaperoom.'</h1>';
                            ?>
                            <?php else: ?>
                            <h1>Featured Escaperoom</h1>       
                        <?php  endif; ?>    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="feature_item" style="background: url('<?php echo get_template_directory_uri(); ?>/img/5.jpg');">
                        <span class="label-bottom">
                            JENGA Productions – LA Studio          
                            <span class="hourly-rate">
                                Hourly Rate: $60/hour
                            </span>                                     
                        </span>
                    </a>    
                </div>
                <div class="col-md-4">
                    <a href="#" class="feature_item" style="background: url('<?php echo get_template_directory_uri(); ?>/img/5.jpg');">
                        <span class="label-bottom">
                            JENGA Productions – LA Studio          
                            <span class="hourly-rate">
                                Hourly Rate: $60/hour
                            </span>                                     
                        </span>
                    </a>    
                </div>
                <div class="col-md-4">
                    <a href="#" class="feature_item" style="background: url('<?php echo get_template_directory_uri(); ?>/img/5.jpg');">
                        <span class="label-bottom">
                            JENGA Productions – LA Studio          
                            <span class="hourly-rate">
                                Hourly Rate: $60/hour
                            </span>                                     
                        </span>
                    </a>    
                </div>
                
            </div>

        </div>
    </section>
    <!--End featuers section -->

    <section id="service_section" class="padding_bottom_50">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                     <div class="section_header">  
                        <?php  $howitwork = cs_get_option( 'howitwork' );
                            if($howitwork):
                            echo '<h1>'.$howitwork.'</h1>';
                            ?>
                            <?php else: ?>
                            <h1>How It's Work</h1>       
                        <?php  endif; ?>                   
                    </div>
                </div>
            </div>

            <div class="row">

            <?php  
                $service_items = cs_get_option( 'service_item' );
                    
                    if(is_array($service_items)){
                        foreach($service_items as $service_item) { 
                            ?>
                            <div class="col-md-3">
                                <div class="service_item">
                                    <div class="service_icon"> 
                                        <i class="fa <?php echo $service_item['servie_icon']; ?>"></i>
                                    </div>
                                    <div class="service_icon_content">
                                        <h4><?php echo $service_item['servie_title']; ?></h4>
                                        <p><?php echo $service_item['servie_subtitle']; ?></p>
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
                    <div class="section_header">
                        <?php  $feature_video_title = cs_get_option( 'feature_video_title' );
                            if($feature_video_title):
                            echo '<h1>'.$feature_video_title.'</h1>';
                            ?>
                            <?php else: ?>
                            <h1>Feature Video</h1>       
                        <?php  endif; ?>    

                        <?php  $feature_video_subtitle = cs_get_option( 'feature_video_subtitle' );
                            if($feature_video_subtitle):
                            echo '<h4>'.$feature_video_subtitle.'</h4>';
                            ?>
                            <?php else: ?>
                             <h4>Find studios in your city, or explore unique ones around the world.</h4>     
                        <?php  endif; ?>    
                    </div>
                </div>
            </div>
            <div class="row">
                <?php  
                $feature_video_items = cs_get_option( 'feature_video_item' );
                    
                    if(is_array($feature_video_items)){
                        foreach($feature_video_items as $feature_video_item) { 
                             $video_id = $feature_video_item['video_id'];
                            ?>
                             <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="feature_video_item">
                                    <iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>" width="500" height="281" frameborder="0" title="" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                                </div>  
                            </div>
                        <?php }
                    }
                  ?>
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
                $testimoials = cs_get_option( 'testimoials' );
                    
                    if(is_array($testimoials)){
                        foreach($testimoials as $testimoial) { 
                             $clinet_name = $testimoial['clinet_name'];
                             $client_location = $testimoial['client_location'];
                             $client_text = $testimoial['client_text'];
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
