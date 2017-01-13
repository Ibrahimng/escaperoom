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
      'title'           => 'Slider Banner',
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
  array(
    'id'              => 'cat_section',
    'type'            => 'group',
    'title'           => 'Categories Section',
    'button_title'    => 'Add New',
    'accordion_title' => 'Add New Column',
    'fields'          => array(
      array(
        'id'    => 'categoriecolumn',
        'type'  => 'textarea',
        'title' => 'Content',
        'shortcode' => true,
      ),
    ),
  ),// End

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
    array(
      'id'              => 'ssss',
      'type'            => 'group',
      'title'           => 'Slider',
      'button_title'    => 'Add Slider',
      'accordion_title' => 'Add New Slider',
      'fields'          => array(
        // Slider Images
        array(
          'id'    => 'img',
          'type'  => 'upload',
          'title' => 'Upload Images',
        ),
        array(
          'id'    => 'url',
          'type'  => 'text',
          'title' => 'Url',
        ),
    ),
  ),// End 

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
