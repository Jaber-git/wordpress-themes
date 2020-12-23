<?php

/*
#################
  admin page
#################
*/



  add_action('admin_menu', 'rubium_add_admin_page');
  


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
      register_setting('rubium-settings-group','last_name');
      register_setting('rubium-settings-group','user_desc');
      register_setting('rubium-settings-group','twitter_handler','sanitize_twitter_handler');
      register_setting('rubium-settings-group','fb_handler');
      register_setting('rubium-settings-group','gg_handler');
    //section creation 2nd step
      add_settings_section('rubium-sidebar-options','sidebar options','rubium_sidebar_options','abcd_rubium' );
      add_settings_field('sidebar-name','Full Name','rubium_sidebar_name','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-description','User description','rubium_sidebar_description','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-twitter','Twitter handler','rubium_sidebar_twitter','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-google','Google handler','rubium_sidebar_google','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-facebook','Facebook handler','rubium_sidebar_facebook','abcd_rubium','rubium-sidebar-options');
    }

  function rubium_sidebar_options(){
    echo 'customize your theme';
    }
    function rubium_sidebar_name(){
      $firstName = esc_attr(get_option('first_name'));
      $lasttName = esc_attr(get_option('last_name'));
      echo '<input value="'.$firstName.'" name="first_name" placeholder="First name">';
      echo '<input value="'.$lasttName.'" name="last_name" placeholder="Last name">';
    }
    function rubium_sidebar_description(){
      $UserDesc = esc_attr(get_option('user_desc'));
      echo '<input value="'.$UserDesc.'" name="user_desc"  placeholder="User Description">'; 
      
    }
    function rubium_sidebar_twitter(){
      $twitter = esc_attr(get_option('twitter_handler'));
      echo '<input value="'.$twitter.'" name="twitter_handler"  placeholder="twitter"> 
      <p class="description"> Input without @ charater.</p>';
    }
    function rubium_sidebar_google(){
      $google = esc_attr(get_option('gg_handler'));
      echo '<input value="'.$google.'" name="gg"  placeholder="gplus"> 
      <p class="description"> Input without @ charater.</p>';
    }
    function rubium_sidebar_facebook(){
      $facebook = esc_attr(get_option('fb_handler'));
      echo '<input value="'.$facebook.'" name="fbtwitter_handler"  placeholder="facebook"> 
      <p class="description"> Input without @ charater.</p>';
    }
    //sanitize
    function sanitize_twitter_handler($input){
                         $output=  sanitize_text_field($input);
                         $output=   str_replace('@','',$output);
                         return  $output;
    }

    