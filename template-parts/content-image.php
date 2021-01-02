<?php

/*
	
@package sunsettheme
-- Image Post Format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rubium-format-image' ); ?>>

	<header id="rubium-image" class="entry-header text-center background-image" style=" height: 600px !important;background-image: url(<?php echo  rubium_get_attachment(); ?>);">
 
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
		
		<div class="entry-meta">
			<?php echo rubium_posted_meta(); ?>
		</div>
		
		<div class="entry-excerpt image-caption">
			<?php the_excerpt(); ?>
		</div>
		
	</header>
    <?php //endif ; ?> 

	<footer class="entry-footer">
		<?php echo rubium_posted_footer(); ?>
	</footer>
	
</article>