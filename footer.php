<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package escaperoom
 */

?>
    <section id="calltoaction_secton">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="call_action">
                    <?php 
                        $call_to_action_content = cs_get_option('call_to_action_content'); 
                        $call_to_action_btn_text = cs_get_option('call_to_action_btn_text'); 
                        $call_to_action_btn_link = cs_get_option('call_to_action_btn_link'); 

                        if ($call_to_action_content) : 
                    ?>
                        <span class="call_action_text pull-left">
                            <h3><?php echo $call_to_action_content; ?></h3>
                        </span>
                        <div class="become_vendor_btn vendor_banner_btn pull-right">
                            <a href="<?php echo $call_to_action_btn_link; ?>"><?php echo $call_to_action_btn_text; ?></a>
                        </div>
                    <?php else : ?>
                        <span class="call_action_text pull-left">
                            <h3>Default Call to Action Text</h3>
                        </span>
                        <div class="become_vendor_btn vendor_banner_btn pull-right">
                            <a href="#">Become A Vendor</a>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer_section">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="footer_top">
                        <?php wp_nav_menu( array(
                            'menu'               => 'footer_menu',
                            'theme_location'     => 'footer_menu',
                            'depth'              => 0,
                            'container'          => 'false',
                            'menu_class'         => 'footer_nav list-inline',
                            'menu_id'            => ''
                            ) ); 
                        ?>
                       
                        <?php  
                            $social_medias = cs_get_option( 'ft_social_media' );
                            echo ' <ul class="social_media list-inline">';
                            if(is_array($social_medias)){
                                foreach($social_medias as $social_item) {  
                            ?>
                                 <li><a href="<?php echo $social_item['social_link']; ?>"><span class="fa <?php echo $social_item['social_icon']; ?>"></span></a></li>
                            <?php }
                            }
                            echo ' </ul>';
                        ?>


                        <?php $footer_text = cs_get_option('footer_text');
                            if ($footer_text): ?>
                            <div class="footer_text">
                                <?php echo $footer_text; ?>
                            </div>
                        <?php endif ?>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="copyright_text">
                    <?php 
                        $footer_copyright = cs_get_option('footer_copyright'); 

                        if ($footer_copyright) : 
                    ?>
                        <p><?php echo $footer_copyright; ?></p>
                    <?php else : ?>
                        <p><?php _e('© 2017 Escaperoom. All Rights Reserved.', 'escaperoom') ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- /.footer -->
    <?php wp_footer(); ?>
    <?php $ganalytics = cs_get_option('ganalytics'); ?>
        <?php if($ganalytics) : ?>
        <script>
           (function(i, s, o, g, r, a, m) {
              i['GoogleAnalyticsObject'] = r;
              i[r] = i[r] || function() {
                 (i[r].q = i[r].q || []).push(arguments)
              }, i[r].l = 1 * new Date();
              a = s.createElement(o),
                 m = s.getElementsByTagName(o)[0];
              a.async = 1;
              a.src = g;
              m.parentNode.insertBefore(a, m)
           })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

           ga('create', '<?php echo $ganalytics; ?>', 'auto');
           ga('send', 'pageview');
        </script>
    <?php endif; ?>
</body>
</html>