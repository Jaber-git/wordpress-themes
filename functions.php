<?php 
require get_template_directory().'/inc/cleanup.php';
require get_template_directory().'/inc/function-admin.php';

require get_template_directory().'/inc/enqueue.php';
require get_template_directory().'/inc/theme-support.php';
require get_template_directory().'/inc/custom-post-type.php';
require get_template_directory() . '/bootstrap-navwalker.php';

add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );


register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'theme-textdomain' ),
) );

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

//https://developer.wordpress.org/reference/functions/do_action/
// The action callback function.
// function example_callback( $arg1 ) {
//     // (maybe) do something with the args.
//     echo $arg1;
// }
// add_action( 'example_action', 'example_callback', 10, 2 );

/*
 * Trigger the actions by calling the 'example_callback()' function
 * that's hooked onto `example_action` above.
 *
 * - 'example_action' is the action hook.
 * - $arg1 and $arg2 are the additional arguments passed to the callback.
*/
//  $value = do_action( 'example_action', 'Heloooooo' );