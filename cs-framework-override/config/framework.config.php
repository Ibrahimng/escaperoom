<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Theme Settings',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'theme-setting',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'menu_position'   => 58,
  'menu_icon'       => 'dashicons-hammer',
  'framework_title' => '<img src="'. get_template_directory_uri() .'/img/logo.png" alt="" />',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ------------------------------
// a option section with tabs   -
// ------------------------------
$options[]   = array(
  'name'     => 'General',
  'title'    => 'General Settings',
  'icon'     => 'fa fa-plus-circle',
  'sections' => array(

    // -----------------------------
    // Header Option      
    // -----------------------------
    array(
      'name'  => 'header_options',
      'title' => 'Header',
      'icon'  => 'fa fa-header',

      // begin: fields
      'fields'    => array(

        // begin: Favicon
        array(
          'id'            => 'favicon',
          'type'          => 'upload',
          'title'         => 'Upload Favicon',
          'settings'      => array(
           'upload_type'  => 'image',
           'button_title' => 'Upload',
           'frame_title'  => 'Select an image',
           'insert_title' => 'Use this image',
          ),
        ),

        // begin: Uplpad Logo
        array(
          'id'            => 'logo_main',
          'type'          => 'upload',
          'title'         => 'Header Logo',
          'settings'      => array(
           'upload_type'  => 'image',
           'button_title' => 'Upload',
           'frame_title'  => 'Select an image',
           'insert_title' => 'Use this image',
          ),
        ),
      )
    ), // end: Header Option 


    // -----------------------------
    // begin: Footer Options        -
    // -----------------------------
    array(
      'name'      => 'footer_options',
      'title'     => 'Footer',
      'icon'      => 'fa fa-copyright',

      // begin: fields
      'fields'    => array(

        // begin: footer Widgets show & hide
        array(
          'id'           => 'footer_widgets',
          'type'         => 'switcher',
          'title'        => 'Footer Widgets',
        ),
        // begin: Scroll to Top
        array(
          'id'           => 'scrolltotop',
          'type'         => 'switcher',
          'title'        => 'Scroll to Top',
        ),
        // begin: footer Text
        array(
          'id'    => 'footer_text',
          'type'  => 'textarea',
          'title' => 'Footer Text',
        ),
        // begin: footer Copyright
        array(
          'id'    => 'footer_copyright',
          'type'  => 'textarea',
          'title' => 'Footer Copyright Text',
        ),

      ), // begin: fields end

    ), // end: Footer Options
  ) // end: General section
); // end: General Setting



// ------------------------------
// Homepage setting                      -
// ------------------------------
$options[]   = array(
  'name'     => 'homepage_setting',
  'title'    => 'Homepage Setup',
  'icon'     => 'fa fa-home',
  'fields'   => array(
  /*--------------- Slider -----------------------------*/
    array(
      'type'    => 'heading',
      'content' => 'Banner Section',
    ),
    array(
      'id'              => 'home_slider',
      'type'            => 'upload',
      'title'           => 'Banner Image',
      'button_title'    => 'Add Slider',
      'accordion_title' => 'Add New Slider',
    ),
    array(
      'id'      => 'slider_title',
      'type'    => 'text',
      'help'    => 'Book Escapper Anywhere',
      'title'   => 'Slider Title',
      'attributes' => array(
        'placeholder' => 'Book Escapper Anywhere'
      )
    ),
     array(
    'id'         => 'slider_subtitle',
    'type'       => 'textarea',
    'title'      => 'Slider Subtitle',
  ),




  /*--------------- Explore City Section -----------------------*/
  array(
    'type'    => 'heading',
    'content' => 'Explore City Section',
  ),
  array(
    'id'      => 'explore_city_title',
    'type'    => 'text',
    'help'    => 'Explore Escaperoom',
    'title'   => 'Section Title',
    'attributes' => array(
      'placeholder' => 'Explore Escaperoom'
    )
  ),
   array(
  'id'         => 'explore_city_subtitle',
  'type'       => 'textarea',
  'title'      => 'Section Subtitle',
  ),
 
  /*--------------- Features Escaperoom -----------------------*/
   array(
    'type'    => 'heading',
    'content' => 'Features Escaperoom Section',
  ),
    array(
    'id'      => 'fature_escaperoom',
    'type'    => 'text',
    'help'    => 'Features Escaperoom',
    'title'   => 'Section Title',
    'attributes' => array(
      'placeholder' => 'Features Escaperoom'
    )
  ),
 
  /*--------------- How it work -----------------------*/
  array(
    'type'    => 'heading',
    'content' => 'How it Work Section',
  ),
    array(
    'id'      => 'howitwork',
    'type'    => 'text',
    'help'    => 'How It Work',
    'title'   => 'Section Title',
    'attributes' => array(
      'placeholder' => 'How It Work'
    )
  ),
    array(
      'id'              => 'service_item',
      'type'            => 'group',
      'title'           => 'Service Items',
      'button_title'    => 'Add Servie Item',
      'accordion_title' => 'Add New Servie Item',
      'fields'          => array(
         array(
        'id'      => 'servie_icon',
        'type'    => 'text',
        'help'    => 'Add Service Font Awesome Icon',
        'title'   => 'Service Icon',
        'attributes' => array(
          'placeholder' => 'fa-toggle-on'
          )
         ),
         array(
        'id'      => 'servie_title',
        'type'    => 'text',
        'help'    => 'Add Service Title is here',
        'title'   => 'Service Title',
        'attributes' => array(
          'placeholder' => 'Servie Title'
          )
         ),
       array(
        'id'         => 'servie_subtitle',
        'type'       => 'textarea',
        'title'      => 'Service Subtitle',
        'help'    => 'Add Service Subtitle is here',
        'attributes' => array(
          'placeholder' => 'Servie SubTitle'
        )
        ),
     ),
    ),// End 

  /*--------------- Feature Video Section -----------------------*/
  array(
    'type'    => 'heading',
    'content' => 'Feature Video Section',
  ),
  array(
    'id'      => 'feature_video_title',
    'type'    => 'text',
    'help'    => 'Feature Video Section Title',
    'title'   => 'Section Title',
    'attributes' => array(
      'placeholder' => 'Feature Video Escaperoom'
    )
  ),
   array(
  'id'         => 'feature_video_subtitle',
  'type'       => 'textarea',
  'title'      => 'Section Subtitle',
  ),
  array(
  'id'              => 'feature_video_item',
  'type'            => 'group',
  'title'           => 'Feature Video Items',
  'button_title'    => 'Add Feature Video Item',
  'accordion_title' => 'Add New Feature Video Item',
  'fields'          => array(
     array(
    'id'      => 'video_id',
    'type'    => 'text',
    'help'    => 'Add  Vimeo Video Id',
    'title'   => 'Vimeo Video Id',
    'attributes' => array(
      'placeholder' => '51589652'
      )
     ),
 ),
),// End 
  /*--------------- Testimonial Section -----------------------*/
  array(
    'type'    => 'heading',
    'content' => 'Testimonial Section',
  ),
      array(
      'id'              => 'testimoials',
      'type'            => 'group',
      'title'           => 'Testimonial Items',
      'button_title'    => 'Add Testimonial Item',
      'accordion_title' => 'Add New Testimonial Item',
      'fields'          => array(
         array(
        'id'      => 'clinet_name',
        'type'    => 'text',
        'help'    => 'Add Testimonial Client Name',
        'title'   => 'Testimonial Client Name',
        'attributes' => array(
          'placeholder' => 'MR. CLAY'
          )
         ),
         array(
        'id'      => 'client_location',
        'type'    => 'text',
        'help'    => 'Add Testimonial Location',
        'title'   => 'Testimonial Location',
        'attributes' => array(
          'placeholder' => 'UNITED STATES'
          )
         ),
       array(
        'id'         => 'client_text',
        'type'       => 'textarea',
        'title'      => 'Testimonial Content',
        'help'    => 'Add Testimonial Content is here',
        'attributes' => array(
          'placeholder' => 'Testimonial Content'
        )
        ),
     ),
    ),// End 
));


// ==================================
// Become A Vendor page
// ==================================
$options[]   = array(
  'name'     => 'become_vendor_setting',
  'title'    => 'Become A Vendor Setup',
  'icon'     => 'fa fa-home',
  'fields'   => array(
  /*--------------- Slider -----------------------------*/
    array(
      'type'    => 'heading',
      'content' => 'Banner Section',
    ),
    array(
      'id'              => 'vendor_banner',
      'type'            => 'upload',
      'title'           => 'Vendor Banner Image',
      'button_title'    => 'Add Bannder',
      'accordion_title' => 'Add New Vendor Banner',
    ),
    array(
      'id'      => 'v_banner_btn_text',
      'type'    => 'text',
      'help'    => 'Become A Vendor Button Text',
      'title'   => 'Become A Vendor Button Text',
      'attributes' => array(
        'placeholder' => 'Become A Vendor'
      )
    ),
     array(
    'id'         => 'v_banner_btn_link',
    'type'       => 'textarea',
    'title'      => 'Become A Vendor Button Link',
    'attributes' => array(
        'placeholder' => 'http://google.com'
      )
  ),




  /*---------------  Advantage Section -----------------------*/
  array(
    'type'    => 'heading',
    'content' => 'Advantage Section',
  ),
  array(
    'id'      => 'advantage_title',
    'type'    => 'text',
    'help'    => 'Avantage Title',
    'title'   => 'Section Title',
    'attributes' => array(
      'placeholder' => 'Advantage'
    )
  ),
   array(
  'id'         => 'advantage_subtitle',
  'type'       => 'textarea',
  'title'      => 'Section Subtitle',
),

  array(
    'id'              => 'advantage_items',
    'type'            => 'group',
    'title'           => 'Advantage Items',
    'button_title'    => 'Add Advantage Item',
    'accordion_title' => 'Add New Advantage Item',
    'fields'          => array(
       array(
      'id'      => 'advantage_icon',
      'type'    => 'text',
      'help'    => 'Add Ionicicon',
      'title'   => 'Advantage Icon',
      'attributes' => array(
        'placeholder' => 'ion-ios-cart-outline'
        )
       ),
       array(
      'id'      => 'advantage_title',
      'type'    => 'text',
      'help'    => 'Add Advantage Title is here',
      'title'   => 'Advantage Title',
      'attributes' => array(
        'placeholder' => 'Advantage Title'
        )
       ),
       array(
      'id'      => 'advantage_link',
      'type'    => 'text',
      'help'    => 'Add Advantage link is here',
      'title'   => 'Advantage link',
      'attributes' => array(
        'placeholder' => 'https://google.com'
        )
       ),
      array(
      'id'         => 'advantage_content',
      'type'       => 'textarea',
      'title'      => 'Advantage Content',
      'help'    => 'Add Advantage Content is here',
      'attributes' => array(
        'placeholder' => 'Advantage Content'
      )
      ),
   ),
  ),

  array(
    'id'      => 'advantage_more_link',
    'type'    => 'text',
    'help'    => 'Avantage More Link',
    'title'   => 'Avantage More Link',
    'attributes' => array(
      'placeholder' => 'http://google.com'
    )
  ),

  array(
    'id'      => 'advantage_more_text',
    'type'    => 'text',
    'help'    => 'Avantage More Text',
    'title'   => 'Avantage More Text',
    'attributes' => array(
      'placeholder' => 'Explore more escaperoom around the world'
    )
  ),// End

  /*--------------- Escaperoom Services Info -----------------------*/
   array(
    'type'    => 'heading',
    'content' => 'Escaperoom Services Info',
  ),
   array(
    'id'      => 'service_info_section_title',
    'type'    => 'text',
    'help'    => 'Services Info Section Title',
    'title'   => 'Section Title',
    'attributes' => array(
      'placeholder' => 'Escaperoom Services Info'
    )
  ),
   array(
  'id'         => 'service_info_section_subtitle',
  'type'       => 'textarea',
  'title'      => 'Section Subtitle',
),
    array(
      'id'              => 'service_info_items',
      'type'            => 'group',
      'title'           => 'Service Info Items',
      'button_title'    => 'Add Servie Info Item',
      'accordion_title' => 'Add New Servie Info Item',
      'fields'          => array(
         array(
        'id'      => 'servie_info_icon',
        'type'    => 'text',
        'help'    => 'Add Info Service Ionicicon Icon',
        'title'   => 'Service Info Icon',
        'attributes' => array(
          'placeholder' => 'ion-android-calendar'
          )
         ),
         array(
        'id'      => 'servie_info_title',
        'type'    => 'text',
        'help'    => 'Add Service Info Title is here',
        'title'   => 'Service Info Title',
        'attributes' => array(
          'placeholder' => 'Servie Info Title'
          )
         ),
       array(
        'id'         => 'servie_info_content',
        'type'       => 'textarea',
        'title'      => 'Service Info Content',
        'help'    => 'Add Service Info Content is here',
        'attributes' => array(
          'placeholder' => 'Servie Info Content'
        )
        ),
     ),
    ),// End 



  /*--------------- Vendor Feature Video Section -----------------------*/
  array(
    'type'    => 'heading',
    'content' => 'Vendor Feature Video Section',
  ),
  array(
    'id'      => 'vendor_title',
    'type'    => 'text',
    'help'    => 'Vendor Feature Video Section Title',
    'title'   => 'Add Video Section Title',
    'attributes' => array(
      'placeholder' => 'Launching Music Careers'
    )
  ),
   array(
  'id'         => 'vendor_video_subtitle',
  'type'       => 'textarea',
  'title'      => 'Section Subtitle',
  ),
  array(
      'id'              => 'vendor_video_bg',
      'type'            => 'upload',
      'title'           => 'Vendor Video Banner',
      'button_title'    => 'Add Vendor Video Banner',
      'accordion_title' => 'Add New Vendor Video Banner',
    ),
    array(
      'id'      => 'vendor_video_id',
      'type'    => 'text',
      'help'    => 'Vendor Video Id',
      'title'   => 'Vendor title',
      'attributes' => array(
        'placeholder' => '195592912'
      )
    ),
 
));




// ------------------------------
// Google analytics                      -
// ------------------------------
$options[]   = array(
  'name'     => 'google_analytics',
  'title'    => 'Google Analytics',
  'icon'     => 'fa fa-code',
  'fields'   => array(

    array(
      'id'      => 'ganalytics',
      'type'    => 'text',
      'help'    => 'Example : UA-71326319-1',
      'title'   => 'Google Analytics Tracking ID',
      'attributes' => array(
        'placeholder' => 'UA-12345678-0'
      )
    ),
    

  )
);

// ------------------------------
// donate                       -
// ------------------------------
$options[]   = array(
  'name'     => 'donate_section',
  'title'    => 'Donate',
  'icon'     => 'fa fa-heart',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => 'You Guys!'
    ),

    array(
      'type'    => 'content',
      'content' => 'If you want to see more functions and features for this framework, you can buy me a coffee. I need a lot of it when I am creating new stuff for you. Thank you in advance.',
    ),

    array(
      'type'    => 'content',
      'content' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=56MAQNCNELP8J" target="_blank"><img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" alt="Donate" /></a>',
    ),

  )
);

// ------------------------------
// license                      -
// ------------------------------
$options[]   = array(
  'name'     => 'license_section',
  'title'    => 'License',
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => '100% GPL License, Yes it is free!'
    ),
    array(
      'type'    => 'content',
      'content' => 'Codestar Framework is <strong>free</strong> to use both personal and commercial. If you used commercial, <strong>please credit</strong>. Read more about <a href="http://www.gnu.org/licenses/gpl-2.0.txt" target="_blank">GNU License</a>',
    ),

  )
);

CSFramework::instance( $settings, $options );
