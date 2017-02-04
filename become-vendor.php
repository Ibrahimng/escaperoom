<?php 
/*
Template name: Become-vendor
*/
get_header(); 

    $vendor_banner_image = get_field('vendor_banner_image');
    $vendor_button_text = get_field('vendor_button_text');
    $vendor_button_link = get_field('vendor_button_link');
?>



    <div class="vendor_section" class="padding_bottom_50" style="background: url(<?php if($vendor_banner_image): echo $vendor_banner_image; else: echo get_template_directory_uri(); ?>/img/banner-bg.jpg <?php endif; ?>);">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="vendor_banner">
                        <div class="become_vendor_btn vedor_banner_btn align-center">
                            <?php  

                            if($vendor_button_text || $vendor_button_link):
                            echo '<a href="'.$vendor_button_link.'">'.$vendor_button_text.'</a>';
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


     <?php 
        $advantage_section_title = get_field('advantage_section_title');
        $advantage_section_content = get_field('advantage_section_content');
        $advantage_items = get_field('advantage_items');
        $more_advantage_link_text = get_field('more_advantage_link_text');
        $more_advantage_link = get_field('more_advantage_link');
    ?>

    <section id="advantage_section" class="padding_bottom_50 padding_top_50">
        <div class="container">
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
	                <div class="section_header">
                        <?php  
                        if($advantage_section_title):
                        echo '<h1>'.$advantage_section_title.'</h1>';
                        ?>
                        <?php else: ?>
                        <h1>Anvantage</h1>       
                        <?php  endif; ?>

                        <?php 
                        if($advantage_section_content):
                        echo '<h4>'.$advantage_section_content.'</h4>';
                        ?>      
                        <?php  endif; ?>
	                    
	                </div>
	            </div>    
            </div>

            <div class="row">
                <div class="advantage_items padding_bottom_50 padding_top_50">
                    	
                    <?php  
                    
                    if(is_array($advantage_items)){
                        foreach($advantage_items as $advantage_item) {  
                    ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="advantage align-center">
                                <div class="advantage_icon">
                                   <span class="<?php echo $advantage_item['advantage_item_icon']; ?>"></span>
                                </div>
                                <div class="advantage_content">
                                    <h3><a href="<?php echo  $advantage_item['advantage_item_link']; ?>"><?php echo $advantage_item['advantage_item_title']; ?></a></h3>
                                    <p><?php echo $advantage_item['advantage_item_content'];
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
                    if($more_advantage_link || $more_advantage_link_text):
                    echo ' <a href="'.$more_advantage_link.'">'.$more_advantage_link_text.'</a>';
                    ?>
                    <?php else: ?>
                    <a href="#">Explore more Advantage</a>
                    <?php  endif; ?>
                    
                </div>
            </div>

        </div>    
    </section>
    <!-- end section -->

    <section id="pricing-table" class="padding_bottom_50" style="background: url(<?php echo get_template_directory_uri(); ?>/img/pricingbg.jpg);">
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
                                <a href="#" class="btn btn-custom active_custom">And Get Free Month</a>
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

     <?php 
        $services_info_section_title = get_field('services_info_section_title');
        $escaperoom_services_info_items = get_field('escaperoom_services_info_items');
        $escaperoom_services_info_content = get_field('escaperoom_services_info_content');
    ?>

    <section id="servies_info_section" class="padding_bottom_50 padding_top_50">
    	<div class="container">
    		 <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
	                <div class="section_header">
                        <?php 
                        if($services_info_section_title):
                        echo '<h1>'.$services_info_section_title.'</h1>';
                        ?>
                        <?php else: ?>
                        <h1>Escaperoom Services Info</h1>    
                        <?php  endif; ?>

                        <?php  
                        if($escaperoom_services_info_content):
                        echo '<h4>'.$escaperoom_services_info_content.'</h4>';
                        ?>     
                        <?php  endif; ?>
	                </div>
	            </div>    
            </div>
    		<div class="row">
    			
                <?php  
                   
                    if(is_array($escaperoom_services_info_items)){
                        foreach($services_info_items as $service_info_item) {  
                    ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="servies_info_item">         
                                <span class="servies_info_icon">
                                    <i class="<?php echo $service_info_item['services_info_item_icon']; ?>"></i>
                                </span>
                                <div class="servies_info_conent">
                                    <h4><?php echo $service_info_item['services_info_item_title']; ?></h4>
                                    <p><?php echo $service_info_item['services_info_item_content']; ?></p>
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
        $escaperoom_video_background_image = get_field('escaperoom_video_background_image');
        $escaperoom_viemo_video_id = get_field('escaperoom_viemo_video_id');
        $escaperoom_video_title = get_field('escaperoom_video_title');
  		$escaperoom_video_sub_title = get_field('escaperoom_video_sub_title');

  		if($escaperoom_video_background_image &&  $escaperoom_viemo_video_id) :

  	?>
    <section id="advantage_3d_section" style="background-image:url('<?php echo $escaperoom_video_background_image; ?>')">
    	<div class="container">
			<div class="row">
				<div class="video_content text-center">
					<a class="popup_video" data-type="vimeo" data-autoplay="true" href="http://vimeo.com/<?php echo $escaperoom_viemo_video_id; ?>"><span class="ion-ios-play-outline"></span></a>
					<h2 class="title"><?php echo $escaperoom_video_title; ?></h2>
					<span class="sub-title"><?php echo $escaperoom_video_sub_title; ?></span>
				</div>
			</div>
		</div>	
    </section>

	<?php endif; ?>

<?php get_footer(); ?>