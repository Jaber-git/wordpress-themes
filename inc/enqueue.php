<?php
/*


@rubium 1.0.0
#################
  admin enqueue functions
#################
*/

function rubium_load_admin_scripts($hook){
    if('toplevel_page_abcd_rubium' != $hook){
  
           return ;
    }
    wp_register_style('rubium_admin', get_template_directory_uri().'/css/rubium.admin.css',array(), '1.0.0','all');
    wp_enqueue_style('rubium_admin');
    
   // loading js
   wp_register_script( 'ru-some-js', get_template_directory_uri().'/js/rubium.js', array('jquery'), '1.0.0', true );
   wp_enqueue_script( 'ru-some-js' );
   wp_enqueue_media();
}

 add_action('admin_enqueue_scripts','rubium_load_admin_scripts') ;


