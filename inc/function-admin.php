<?php

/*
#################
  admin page
#################
*/
class Robium_setup{

 public function __construct(){
  add_action('admin_menu', array($this,'rubium_add_admin_page') );
  
  }

  function rubium_add_admin_page(){
     //generate admin page    
    add_menu_page('rubium theme option','Rubium','manage_options',
    'abcd_rubium','robium_create_theme_page',
     get_template_directory_uri().'/img/diamond.png',
     110);
     //add submenu menu page
    add_submenu_page('abcd_rubium','Rubium theme option',
    'General','manage_options','abcd_rubium', 
    'robium_create_theme_page');
     //add submenu menu page  
    add_submenu_page('abcd_rubium','Rubium settings',
    'custom css','manage_options','abcd_rubium_css', 
    'rubium_theme_settings_page'
         );
    //activate custom settengs
    add_action('admin_init','rubium_custom_settings');

    }

 }
  function robium_create_theme_page(){
      //generation of admin page
      require_once(get_template_directory().'/inc/templates/rubium-admin.php');
  }
  function rubium_theme_settings_page(){
    //generation of admin page
  }

  function rubium_custom_settings(){
    //section creation 1st step
      register_setting('rubium-settings-group','first_name');
    //section creation 2nd step
      add_settings_section('rubium-sidebar-options','sidebar options','rubium_sidebar_options','abcd_rubium' );
      add_settings_field('sidebar-name','First Name','rubium_sidebar_name','abcd_rubium','rubium-sidebar-options');
    }

  function rubium_sidebar_options(){
    echo 'customize your theme';
    }
    function rubium_sidebar_name(){
      $firstName =esc_attr(get_option('first_name'));
      echo '<input value="'.$firstName.'" name="first_name" placeholder="First name">';
    }