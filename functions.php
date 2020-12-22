<?php 

require get_template_directory().'/inc/function-admin.php';




// remove specific dashboard menus for non-admin users
// add_action( 'admin_menu', 'hide_admin_menus' );
// function hide_admin_menus() {
    
//     remove_menu_page( 'plugins.php' ); 
//     remove_menu_page( 'themes.php' ); 
//     remove_menu_page( 'tools.php' ); 
//     remove_menu_page( 'users.php' ); 
//     remove_menu_page( 'edit.php?post_type=page' ); 
//     remove_menu_page( 'options-general.php' );
// }

// function custom_callback_function(){
//     // add your custom code here to do something
//     echo 'I will be fired on WordPress initialization';
// }
// add_action( 'init', 'custom_callback_function' );