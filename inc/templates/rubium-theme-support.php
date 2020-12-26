
<h1>Rubium theme Support </h1>
<?php settings_errors() ;?>
<?php 
//media
   //$picture= esc_attr(get_option('profile_picture'));
   

?>
  
   


<form method="post" action="options.php" class="rubium-genral-form">
 <?php settings_fields('rubium-theme-support'); ?>
 <?php do_settings_sections('abcd_rubium_theme'); ?>
 <?php submit_button(); ?>
</form>