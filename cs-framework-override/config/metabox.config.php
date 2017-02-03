<?php 
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * CSFramework Metabox Config
 *
 * @since 1.0
 * @version 1.0
 *
 */
$options        = array();



/*******************************************
/***  About us metabox Options 
/*******************************************/


$options[]    = array(
  'id'        => '_aboutus_options',
  'title'     => 'About Us Setup',
  'post_type' => array( 'page' ),
  'context'   => 'normal',
  'priority'  => 'high',
  'sections'  => array(

    // begin section
    array(
      'name'      => 'aboutus',
      'title'     => 'About Us',
      'icon'      => 'fa fa-user',
      'fields'    => array(
        
         array(
            'id'              => 'about_us',
            'type'            => 'group',
            'title'           => 'About Us Content',
            'button_title'    => 'Add New About Item',
            'accordion_title' => 'Add New About Item',
            'fields'          => array(

            
              // a field about title
              array(
                'id'    => 'about_title',
                'type'  => 'text',
                'title' => 'Title',
                'attributes' => array(
                  'placeholder' => 'About Us',
                )
              ),

              // a field about content
              array(
                'id'    => 'about_content',
                'type'  => 'wysiwyg',
                'title' => 'Content',
                'attributes' => array(
                  'placeholder' => 'Content area',

                )
              ),

              ),
            ),

        ),
      ),

    // begin section
    array(
      'name'      => '',
      'title'     => '',
      'icon'      => '',
      
    ),

  ),
);


CSFramework_Metabox::instance( $options );



