
# Adding css file and retrieve data variable to render <br>
 ## Summary index

1.[Selectively enqueue a custom stylesheet in the admin](#Selectively-enqueue-a-custom-stylesheet-in-the-admin)
   - [Enqueue stylesheet in rubium general page](#Enqueue-stylesheet-in-rubium-general-page)
     - Second nested list item <br>

2.[retrieve data variable](#retrieve-data-variable)
   - [Create a custom menu](#Create-a-custom-menu)
     - Second nested list item <br>

## Pretalk
Enqueue means ***'To add an item to a queue'*** . 
For css to add to admin page file .We have to register it by a hook called ```admin_enqueue_scripts``` action hook (``` do_action('admin_enqueue_scripts', $hook_suffix); ``` ) .  ```admin_enqueue_scripts``` is the proper hook to use when enqueuing **scripts and styles** that are meant to be used in the administration panel. Despite the name, it is used for enqueuing both **scripts and styles**. It has one additional argument, the $hook_suffix. This argument is exactly the same as the return value that you get from ``` add_submenu_page() ```  and the related (shorthand) functions. <br><br>
 We should carefully code our callback so that css is not be applied to all admin page.

## Selectively enqueue a custom stylesheet in the admin
[Click here for details ](https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/#used-by) 
What if you want to load CSS, JS to specific pages from your created menu and submenu? ( multiple pages )
``` 
function addPage()
{
global $customMenu, $customSubMenu;
        /**
         * Menu
         */
       $customMenu = add_menu_page( 'Custom Menu', 'Custom Menu', 'manage_options', 'custom-menu', 'customMenuPage', '', 10);
        /**
         * Sub Menu Pages
         */
        $customSubMenu = add_submenu_page( 'custom-menu', 'Settings', 'Settings', 'manage_options', 'settings', 'settings_page');
}
add_action( 'admin_menu', 'addPage');
   
/** Enqueue Stylesheets **/
function enqueueAdminStyles( $hook)
    {
        global $customMenu, $customSubMenu;
        $allowed = array( $customMenu, $customSubMenu);
        if( !in_array( $hook, $allowed)  )
        {
            return;
        }
        wp_enqueue_style( '-main-', 'assets/admin/css/ucsi.css', '', '1');
    }
add_action( 'admin_enqueue_scripts', 'enqueueAdminStyles'); 
```

## Enqueue stylesheet in rubium general page

```
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
 ```
## Retrieve data variable
Now we can access all data variable in 
admin page field data that we store earlier.
because we include template file in mother function like 
```
function robium_create_theme_page(){
      //generation of admin page
      require_once(get_template_directory().'/inc/templates/rubium-admin.php');
  }
  ```
  Look the codes at template file 
  ```
 
<h1>Rubium theme option </h1>
<?php settings_errors() ;?>
<?php 
    $firstName = esc_attr(get_option('first_name'));
    $lasttName = esc_attr(get_option('last_name'));
    $fullname= $firstName .' '. $lasttName;
    $UserDesc = esc_attr(get_option('user_desc'));

?>
  <div class="rubium-sidebar-preview">
     <div class="rubium-sidebar">
         <h1 class="user-name"> <?php print $fullname; ?></h1>
         <h2 class="rubium-description"><?php print $UserDesc ;?></h2>
         <div class="icon-wrapper"> 
         
         </div>
     </div>
  </div>
   


<form method="post" action="options.php" class="rubium-genral-form">
 <?php settings_fields('rubium-settings-group'); ?>
 <?php do_settings_sections('abcd_rubium'); ?>
 <?php submit_button(); ?>
</form>
  
   ```

   Notice that we use css class here. Stylesheet rules in ```css/rubium.admin.css``` file works only for general admin page .

## Details

<table>
<tr>
  <th> Inside admin-header.php, there's the following set of hooks: </th>
  <th></th>
</tr>
<tr>
 <td>

 ```
1.  do_action('admin_enqueue_scripts', $hook_suffix);
2.  do_action("admin_print_styles-$hook_suffix");
3.  do_action('admin_print_styles');
4.  do_action("admin_print_scripts-$hook_suffix");
5.  do_action('admin_print_scripts');
6.  do_action("admin_head-$hook_suffix");
7.  do_action('admin_head');
8.  do_action( 'in_admin_header' );
9.  do_action( 'network_admin_notices' );
10. do_action( 'user_admin_notices' );
11. do_action( 'admin_notices' );
12. do_action( 'all_admin_notices' );
   



    

	

```
</td>
<td>
 
```
Add Field/Section

    add_settings_field()
    add_settings_section()

Errors

    add_settings_error()
    get_settings_errors()
    settings_errors()
```
</td>
</tr>
</table>

