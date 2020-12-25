
<h1>Rubium theme option </h1>
<?php settings_errors() ;?>
<?php 
//media
   $picture= esc_attr(get_option('profile_picture'));
   
   $firstName = esc_attr(get_option('first_name'));
    $lasttName = esc_attr(get_option('last_name'));
    $fullname= $firstName .' '. $lasttName;
    $UserDesc = esc_attr(get_option('user_desc'));

?>
  <div class="rubium-sidebar-preview">
     <div class="rubium-sidebar">
     
       <div class="image-container">
         <div id="profile-picture-preview" class="profile-picture" style=" background-image:url(<?php echo $picture; ?>); ">
    
          
         </div>
       </div>
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