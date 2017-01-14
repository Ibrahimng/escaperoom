<?php 
/*
Template name: Become-vendor
*/
get_header(); ?>
    <!-- Header -->
    <?php  $vendor_banner = cs_get_option( 'vendor_banner' ); ?>
    <div class="vendor_section" class="padding_bottom_50" style="background: url(<?php if($vendor_banner): echo $vendor_banner; else: echo get_template_directory_uri(); ?>/img/banner-bg.jpg <?php endif; ?>);">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="vendor_banner">
                        <div class="become_vendor_btn vedor_banner_btn align-center">
                            <?php  

                            $v_banner_btn_text = cs_get_option( 'v_banner_btn_text' );
                            $v_banner_btn_link = cs_get_option( 'v_banner_btn_link' );
                            if($v_banner_btn_text || $v_banner_btn_link):
                            echo '<a href="'.$v_banner_btn_link.'">'.$v_banner_btn_text.'</a>';
                            ?>
                            <?php else: ?>
                             <a href="#">Become A Vendor</a>       
                            <?php  endif; ?>
                            
                        </div>
	                </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->

    <section id="advantage_section" class="padding_bottom_50 padding_top_50">
        <div class="container">
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
	                <div class="section_header">
                        <?php  $advantage_title = cs_get_option( 'advantage_title' );
                        if($advantage_title):
                        echo '<h1>'.$advantage_title.'</h1>';
                        ?>
                        <?php else: ?>
                        <h1>Anvantage</h1>       
                        <?php  endif; ?>

                        <?php  $advantage_subtitle = cs_get_option( 'advantage_subtitle' );
                        if($advantage_subtitle):
                        echo '<h4>'.$advantage_subtitle.'</h4>';
                        ?>
                        <?php else: ?>
                        
                        <h4>Find studios in your city, or explore unique ones around the world.ind studios in <br>your city, or explore unique ones around the world.</h4>      
                        <?php  endif; ?>
	                    
	                </div>
	            </div>    
            </div>

            <div class="row">
                <div class="advantage_items padding_bottom_50 padding_top_50">
                    	
                    <?php  
                    $advantage_items = cs_get_option( 'advantage_items' );
                    
                    if(is_array($advantage_items)){
                        foreach($advantage_items as $advantage_item) {  
                    ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="advantage align-center">
                                <div class="advantage_icon">
                                   <span class="<?php echo $advantage_item['advantage_icon']; ?>"></span>
                                </div>
                                <div class="advantage_content">
                                    <h3><a href="<?php echo  $advantage_item['advantage_link']; ?>"><?php echo $advantage_item['advantage_title']; ?></a></h3>
                                    <p><?php echo $advantage_item['advantage_content'];
                        ?> </p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    }
                  ?>
                   
                </div>
            </div>    
     
            <div class="row">
                <div class="more_explore">
                    <?php  
                    $advantage_more_text = cs_get_option( 'advantage_more_text' );
                    $advantage_more_link = cs_get_option( 'advantage_more_link' );
                    if($advantage_more_text || $advantage_more_link):
                    echo ' <a href="'.$advantage_more_link.'">'.$advantage_more_text.'</a>';
                    ?>
                    <?php else: ?>
                    <a href="#">Explore more escaeroom around the world</a>
                    <?php  endif; ?>
                    
                </div>
            </div>

        </div>    
    </section>
    <!-- end section -->

    <section id="pricing-table" class="padding_bottom_50">
        <div class="container">
            <div class="row">
                <div class="pricing">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="pricing-table">
                            <div class="pricing-header">
                                <p class="pricing-title">Free Plan</p>
                                <p class="pricing-rate"><sup>$</sup> 0 <span>/Mo.</span></p>
                                <a href="#" class="btn btn-custom">And Get Free Month</a>
                            </div>

                            <div class="pricing-list">
                                <ul>
                                    <li><i class="fa fa-envelope"></i>1,000 messages</li>
                                    <li><i class="fa fa-signal"></i><span>limited</span> data</li>
                                    <li><i class="fa fa-signal"></i><span>limited</span> data</li>
                                    <li><i class="fa fa-user"></i><span>limited</span> users</li>
                                    <li><i class="fa fa-user"></i><span>limited</span> users</li>
                                    <li><i class="fa fa-smile-o"></i>first 10 day free</li>
                                    <li><i class="fa fa-smile-o"></i>first 10 day free</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="pricing-table">
                            <div class="pricing-header">
                                <p class="pricing-title">Business Plan</p>
                                <p class="pricing-rate"><sup>$</sup> 20 <span>/Mo.</span></p>
                                <a href="#" class="btn btn-custom active">And Get Free Month</a>
                            </div>

                            <div class="pricing-list">
                                <ul>
                                    <li><i class="fa fa-envelope"></i>1,000 messages</li>
                                    <li><i class="fa fa-signal"></i><span>limited</span> data</li>
                                    <li><i class="fa fa-signal"></i><span>limited</span> data</li>
                                    <li><i class="fa fa-user"></i><span>limited</span> users</li>
                                    <li><i class="fa fa-user"></i><span>limited</span> users</li>
                                    <li><i class="fa fa-smile-o"></i>first 10 day free</li>
                                    <li><i class="fa fa-smile-o"></i>first 10 day free</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="pricing-table">
                            <div class="pricing-header">
                                <p class="pricing-title">Extended Plan</p>
                                <p class="pricing-rate"><sup>$</sup> 80 <span>/Mo.</span></p>
                                <a href="#" class="btn btn-custom">And Get Free Month</a>
                            </div>

                            <div class="pricing-list">
                                <ul>
                                    <li><i class="fa fa-envelope"></i>1,000 messages</li>
                                    <li><i class="fa fa-signal"></i><span>limited</span> data</li>
                                    <li><i class="fa fa-signal"></i><span>limited</span> data</li>
                                    <li><i class="fa fa-user"></i><span>limited</span> users</li>
                                    <li><i class="fa fa-user"></i><span>limited</span> users</li>
                                    <li><i class="fa fa-smile-o"></i>first 10 day free</li>
                                    <li><i class="fa fa-smile-o"></i>first 10 day free</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servies_info_section" class="padding_bottom_50 padding_top_50">
    	<div class="container">
    		 <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
	                <div class="section_header">
                        <?php  $s_info_s_title = cs_get_option( 'service_info_section_title' );
                        if($s_info_s_title):
                        echo '<h1>'.$s_info_s_title.'</h1>';
                        ?>
                        <?php else: ?>
                        <h1>Escaperoom Services Info</h1>    
                        <?php  endif; ?>

                        <?php  $s_info_s_subtitle = cs_get_option( 'service_info_section_subtitle' );
                        if($s_info_s_subtitle):
                        echo '<h4>'.$s_info_s_subtitle.'</h4>';
                        ?>
                        <?php else: ?>
                        <h4>Find studios in your city, or explore unique ones around the world.ind studios in <br>your city, or explore unique ones around the world.</h4>       
                        <?php  endif; ?>
	                </div>
	            </div>    
            </div>
    		<div class="row">
    			
                    <?php  
                    $service_info_items = cs_get_option( 'service_info_items' );
                    
                    if(is_array($service_info_items)){
                        foreach($service_info_items as $service_info_item) {  
                    ?>
                        
                        
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="servies_info_item">         
                                <span class="servies_info_icon">
                                    <i class="<?php echo $service_info_item['servie_info_icon']; ?>"></i>
                                </span>
                                <div class="servies_info_conent">
                                    <h4><?php echo $service_info_item['servie_info_title']; ?></h4>
                                    <p><?php echo $service_info_item['servie_info_content']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    }
                ?>
    			
    			
    		</div>
    	</div>
    </section>
  	
  	<?php  
  		$vendor_video_bg = cs_get_option( 'vendor_video_bg' );
  		$vendor_video_id =  cs_get_option( 'v_feature_secton_video_id' ); 
  		if($vendor_video_bg ||  $vendor_video_id) :

  	?>
    <section id="advantage_3d_section" style="background-image:url('<?php echo $vendor_video_bg; ?>')">
    	<div class="container">
			<div class="row">
				<div class="video_content text-center">
					<a href="#" class="popup_video" data-type="vimeo" data-autoplay="true" href="http://vimeo.com/<?php echo $vendor_video_id; ?>"><span class="ion-ios-play-outline"></span></a>
					<h2 class="title"><?php echo cs_get_option( 'feature_video_title' ); ?></h2>
					<span class="sub-title"><?php echo cs_get_option( 'feature_video_subtitle' ); ?></span>
				</div>
			</div>
		</div>	
    </section>

	<?php endif; ?>

<?php get_footer(); ?>