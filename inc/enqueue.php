<?php
/*


@rubium 1.0.0
#################
  admin enqueue functions
#################
*/

function rubium_load_admin_scripts($hook){
  echo $hook;
    if('toplevel_page_abcd_rubium' == $hook){
      wp_register_style('rubium_admin', get_template_directory_uri().'/css/rubium.admin.css',array(), '1.0.0','all');
      wp_enqueue_style('rubium_admin');
      
     // loading js
     wp_register_script( 'ru-some-js', get_template_directory_uri().'/js/rubium.js', array('jquery'), '1.0.0', true );
     wp_enqueue_script( 'ru-some-js' );
     wp_enqueue_media();
    } else if ( 'rubium_page_abcd_rubium_css' == $hook ){
		
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/rubium.ace.css', array(), '1.0.0', 'all' );
		
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'rubium-custom-css-script', get_template_directory_uri() . '/js/rubium.custom_css.js', array('jquery'), '1.0.0', true );
	
	} else { return; }
} 

 add_action('admin_enqueue_scripts','rubium_load_admin_scripts') ;


