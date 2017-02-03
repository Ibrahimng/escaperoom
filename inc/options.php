<?php 

  /* ACF OPTIONS PAGE */
  if(function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
      'page_title'  => 'General Settings',
      'menu_title'  => 'Theme Settings',
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'    => true,
      'icon_url'    => 'dashicons-hammer'
    ));
    $option_page = acf_add_options_sub_page(array(
      'page_title'  => 'Header Settings',
      'menu_title'  => 'Header Settings',
      'parent_slug' => 'theme-general-settings',
    ));
    $option_page = acf_add_options_sub_page(array(
      'page_title'  => 'Footer Settings',
      'menu_title'  => 'Footer Settings',
      'parent_slug' => 'theme-general-settings',
    ));
  }