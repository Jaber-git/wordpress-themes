<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rubium
 * theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
  <title><?php bloginfo( 'name' ); wp_title(); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
<div class="container">
   <div class="row">
       <div class="col-xl-12">
           <div class="header-container background-image text-center" style="background-image:url(<?php header_image()?>)">
             <div class="header-content table">
               <div class="table-cell">
                 <h1 class = "site-title">
                    <span class="sunset-logo"></span>
								    <span class="hide"><?php bloginfo( 'name' ); ?></span>
                  </h1>
                  <h2 class="site-description"><?php bloginfo('description');?></h2>
                </div>
             </div> <!-- .header-content -->
             <div class="rubium-nav">
             <nav class="navbar navbar-expand-lg navbar-light ">
                      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
                        <span class="navbar-toggler-icon"></span>
                      </button> -->

                <div class="collapse navbar-collapse rubium-nav-inner " id="navbar-content">
                  <?php
                  wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'depth'          => 2,
                    'menu_class'     => 'navbar-nav ml-auto',
                    'walker'         => new Bootstrap_NavWalker(),
                    'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
                  ) );
                  ?>
                </div>
                </nav>
             </div>
          
            </div>
           <!-- .container-header -->
       </div> 
       <!-- col-xl-12 -->
    </div>
     <!-- .row -->
</div>
<!-- .container-fluid -->  