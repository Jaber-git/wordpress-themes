
<h1>Rubium contact form </h1>
<?php settings_errors() ;?>
<?php 
//media
   //$picture= esc_attr(get_option('profile_picture'));
   

?>
<form method="post" action="options.php" class="rubium-genral-form">
 <?php settings_fields('rubium-contact-options'); ?>
 <?php do_settings_sections('abcd_rubium_theme_contact'); ?>
 <?php submit_button(); ?>
</form>