<?php


// standard post formate
?>
<article id="post- <?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header text-center">
     
		<?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
    <div class="entry-meta">
       <?php echo rubium_posted_meta();?>
    </div>
  </header >
    <div class="entry-content ">
       <?php if(has_post_thumbnail()):
          $featured_image =wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
         ?>
         <a href="<?php the_permalink(); ?>" class="standard-featured-link">
          <div class="standard-featured background-image" style="background-image:url(<?php echo $featured_image; ?>);">
              <?php// the_post_thumbnail();
           
             ?>
           </div>
         </a>
        <?php endif ; ?> 
           <div class="entry-excerpt">
			<?php the_excerpt(); ?>
		 </div>
		
		 <div class="button-container text-center ">
			<a href="<?php the_permalink(); ?>" class="btn btn-default btn-rubium "><?php _e( 'Read More' ); ?></a>
		  </div>
         </div>
    <footer class="entry-footer">
    <?php echo rubium_posted_footer();?>
    </footer>
</article>