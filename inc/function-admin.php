<?php

/*
#################
  admin page
#################
*/



  add_action('admin_menu', 'rubium_add_admin_page');
  
 //activate custom settengs section
 add_action('admin_init','rubium_custom_settings');


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
 //theme support option page
 add_submenu_page('abcd_rubium', 'Rubium 
         Theme Option' , 'Theme Options','manage_options' ,'abcd_rubium_theme',
        'rubium_theme_support_page');
 //contact form
 add_submenu_page( 'abcd_rubium', 'rubium Contact Form', 'Contact Form', 'manage_options', 'abcd_rubium_theme_contact', 'rubium_contact_form_page' );
     //add submenu menu page  
    add_submenu_page('abcd_rubium','Rubium settings',
    'custom css','manage_options','abcd_rubium_css', 
    'rubium_theme_settings_page'
         );

         
    
    }

 
  function robium_create_theme_page(){
      //generation of admin page
      require_once(get_template_directory().'/inc/templates/rubium-admin.php');
  }
  function rubium_theme_settings_page(){
    //generation of admin page
    require_once(get_template_directory().'/inc/templates/rubium-custom-css.php');
  }
   
   //template submenu page
   function rubium_theme_support_page(){
    require_once(get_template_directory().'/inc/templates/rubium-theme-support.php');
     }

     //form 
     function rubium_contact_form_page(){
      require_once(get_template_directory().'/inc/templates/rubium-contact-form.php');
     }
  function rubium_custom_settings(){
    //Sidebar option
      register_setting('rubium-settings-group','profile_picture');
      register_setting('rubium-settings-group','first_name');
      register_setting('rubium-settings-group','last_name');
      register_setting('rubium-settings-group','user_desc');
      register_setting('rubium-settings-group','twitter_handler','sanitize_twitter_handler');
      register_setting('rubium-settings-group','fb_handler');
      register_setting('rubium-settings-group','gg_handler');
    //section creation 2nd step
      add_settings_section('rubium-sidebar-options','sidebar options','rubium_sidebar_options','abcd_rubium' );
     //media
      add_settings_field('sidebar-profile','Profile picture','rubium_sidebar_profile','abcd_rubium','rubium-sidebar-options');

      add_settings_field('sidebar-name','Full Name','rubium_sidebar_name','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-description','User description','rubium_sidebar_description','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-twitter','Twitter handler','rubium_sidebar_twitter','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-google','Google handler','rubium_sidebar_google','abcd_rubium','rubium-sidebar-options');
      add_settings_field('sidebar-facebook','Facebook handler','rubium_sidebar_facebook','abcd_rubium','rubium-sidebar-options');
    //theme support options
    register_setting( 'rubium-theme-support', 'post_formats');
    register_setting( 'rubium-theme-support', 'custom_header');
    register_setting( 'rubium-theme-support', 'custom_background');
   
    add_settings_section('rubium-theme-options', 'theme option', 'rubium_theme_options', 'abcd_rubium_theme');
    
    add_settings_field(  'post-formats', 'Post Formats', 'rubium_post_formats', 'abcd_rubium_theme', 'rubium-theme-options' );
    add_settings_field( 'custom-header', 'Custom Header', 'rubium_custom_header', 'abcd_rubium_theme', 'rubium-theme-options' );
    add_settings_field( 'custom-background', 'Custom Background', 'rubium_custom_background', 'abcd_rubium_theme', 'rubium-theme-options' );
  //contact form option
  register_setting( 'rubium-contact-options', 'activate_contact');
 
	
	add_settings_section( 'rubium-contact-section', 'Contact Form', 'rubium_contact_section', 'abcd_rubium_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'rubium_activate_contact', 'abcd_rubium_theme_contact', 'rubium-contact-section' );
  //Custom CSS Options
	register_setting( 'rubium-custom-css-options', 'rubium_css', 'rubium_sanitize_custom_css' );
	
	add_settings_section( 'rubium-custom-css-section', 'Custom CSS', 'rubium_custom_css_section_callback', 'abcd_rubium_css' );
	
	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'rubium_custom_css_callback', 'abcd_rubium_css', 'rubium-custom-css-section' );
  }
//css option
function rubium_custom_css_section_callback() {
	echo 'Customize rubium Theme with your own CSS';
}

function rubium_custom_css_callback() {
	$css = get_option( 'rubium_css' );
	$css = ( empty($css) ? '/* rubium Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="sunset_css" name="rubium_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}
function rubium_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

  //contact function 
  function rubium_contact_section() {
    echo 'Activate and Deactivate the Built-in Contact Form';
  }
  
  function rubium_activate_contact() {
    $options = get_option( 'activate_contact' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
  }
  //post format callback
  
  function rubium_theme_options(){
    echo "acitate and deactivate specific theme support options";
  }
 function rubium_post_formats(){
   $options=  get_option('post_formats') ;
   $formats=array('aside', 'gallery','link','image','quote','status','video','audio','chat');
      $output='';
   foreach($formats as $format){
     $checked=(@$potions[$format]==1? 'checked' : '');
   $output.= '<label> <input type="checkbox" id="'.$format.'"  name="post_formats['.$format.']" value="1" '.$checked.'> '.$format.'</label> <br>';
               }
  echo $output;
  }
  function rubium_custom_header() {
    $options = get_option( 'custom_header' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
  }
  
  function rubium_custom_background() {
    $options = get_option( 'custom_background' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
  }


  function rubium_sidebar_options(){
    echo 'customize your theme';
    }
    //media
    function rubium_sidebar_profile(){
      $picture= get_option('profile_picture');

      if( empty($picture) ){
        echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
      } else {
        echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
      }
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

    