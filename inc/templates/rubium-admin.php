
<h1>Rubium theme option </h1>
<?php settings_errors() ;?>
<form method="post" action="options.php">
 <?php settings_fields('rubium-settings-group'); ?>
 <?php do_settings_sections('abcd_rubium'); ?>
 <?php submit_button(); ?>
</form>