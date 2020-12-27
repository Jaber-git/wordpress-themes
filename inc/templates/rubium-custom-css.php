
<h1>Rubium Custom Css</h1>
<?php settings_errors() ;?>
<?php 
//media
   //$picture= esc_attr(get_option('profile_picture'));
   

?>
<form method="post" action="options.php" class="rubium-genral-form">
 <?php settings_fields('rubium-custom-css-options'); ?>
 <?php do_settings_sections('abcd_rubium_css'); ?>
 <?php submit_button(); ?>
</form>