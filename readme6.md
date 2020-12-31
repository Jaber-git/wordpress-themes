# Adding custom Css option<br>
 ## Summary index

1.[pre-talk](#pre-talk)
   - [Making subpage](#Making-subpage)
     - [3 steps to make submenu](3-steps-to-make-submenu)
     - [Three steps to make submenu :1. Hook callback , 2. Hook , 3 . Hook Callback derived template function or 2nd callback](#Three-steps-to-make-submenu)<br>

2.[Adding Section and Field on sub page](#Adding-Section-and-Field-on-sub-page)
   - [#3rd party ace js editor](#3rd-party-ace-js-editor)
   - - [Enqueue 1 css and two js file ](#Enqueue-1-css-and-two-js-file )
     <br>

 1.pre-talk

 ## Making subpage 
 please see other branch for how to make subpage.
 ## Adding Section and Field on sub page
 We will discuss here section and field callback functions here.<br><br>
 Here is section callback
 ```
function rubium_custom_css_section_callback() {
	echo 'Customize rubium Theme with your own CSS';
}
 ```
 
 <br><br>
 To save all css in wp we have to create an input field named textarea in fieldcallback and sould be hidden-
 ```
function rubium_custom_css_callback() {
	$css = get_option( 'rubium_css' );
	$css = ( empty($css) ? '/* rubium Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="sunset_css" name="rubium_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}
 ```

 ## 3rd party ace js editor
 To add ace js [download this](https://github.com/ajaxorg/ace-builds/) from github.
 Now add in `js` folder add two js file one for ace library and the other for custom css these are ```js/ace/ace.js``` and ```js/rubium.custom_css.js``` for custom code . In ```js/rubium.custom_css.js``` there are two block of code
 ```
 //for fixing button behavior in control
jQuery(document).ready( function($){
	
	var updateCSS = function(){ $("#sunset_css").val( editor.getSession().getValue() ); }
	$("#save-custom-css-form").submit( updateCSS );
	
});
//for editor inclusion 
var editor = ace.edit("customCss");//customCss id is used in field callbacks <div id=''customCss> </div> tag
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");
 ``` 
## Enqueue 1 css and two js file 
we have to conditonally include all css and js ```file ininc/enqueue.php```

```

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



```
# Thank you for giving your time

 