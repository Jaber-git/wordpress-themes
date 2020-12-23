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
}

 add_action('admin_enqueue_scripts','rubium_load_admin_scripts') ;