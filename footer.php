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
                        <span class="call_action_text pull-left">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing</h3>
                        </span>
                        <div class="become_vendor_btn vendor_banner_btn pull-right">
                            <a href="#">Become A Vendor</a>
                        </div>
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
                        <ul class="social_media list-inline">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
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