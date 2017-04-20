<?php 
/**
 * Theme setup.
 *
 */
 
/*
 * ACf Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'empl-theme-options',
        'capability' => 'manage_options',
        'redirect' => true
    ));
    acf_add_options_sub_page(array(
       'title' => 'Header Options',
       'parent' => 'empl-theme-options',
      'capability' => 'manage_options'
   ));
   acf_add_options_sub_page(array(
       'title' => 'Footer Options',
       'parent' => 'empl-theme-options',
       'capability' => 'manage_options'
   ));
   acf_add_options_sub_page(array(
      'title' => 'User Guide',
      'parent' => 'empl-theme-options',
      'capability' => 'manage_options'
   ));
}