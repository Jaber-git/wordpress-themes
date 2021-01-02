<?php

/*
#################
  theme support option
#################
*/
$options=  get_option('post_formats') ;
$formats=array('aside', 'gallery','link','image','quote','status','video','audio','chat');
$output=array();
 foreach($formats as $format){
    $output[]=(@$potions[$format]==1? $format : '');
   
             }
if(!empty($options)){
    add_theme_support('post_formats');
}

$header = get_option( 'custom_header' );
if( @$header == 1 ){
	add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );
if( @$background == 1 ){
	add_theme_support( 'custom-background' );
}

/* Activate Nav Menu Option */
function rubium_register_nav_menu() {
	register_nav_menu( 'primary', 'Header Navigation Menu' );
}
add_action( 'after_setup_theme', 'rubium_register_nav_menu' );

add_theme_support('post-thumbnails');

//Blog loop custom function

function rubium_posted_meta() {
  $posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );
	
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($categories) ):
		foreach( $categories as $category ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'View all posts in%s', $category->name ) .'">' . esc_html( $category->name ) .'</a>';
			$i++; 
		endforeach;
	endif;
	
	return '<span class="posted-on">Posted <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> ago</span> / <span class="posted-in">' . $output . '</span>';

}

function rubium_posted_footer(){
	$comments_num = get_comments_number();
	if( comments_open() ){
		if( $comments_num == 0 ){
			$comments = __('No Comments');
		} elseif ( $comments_num > 1 ){
			$comments= $comments_num . __(' Comments');
		} else {
			$comments = __('1 Comment');
		}
		$comments = '<a href="' . get_comments_link() . '">'. $comments .' <span class="sunset-icon sunset-comment"></span></a>';
	} else {
		$comments = __('Comments are closed');
	}
	
	return '<div class="post-footer-container"><div class="row"><div class="col-xs-12 col-sm-6">'. get_the_tag_list('<div class="tags-list"><span class="sunset-icon sunset-tag"></span>', ' ', '</div>') .'</div><div class="col-xs-12 col-sm-6 text-right">'. $comments .'</div></div></div>';

  }
  //atachment

  function rubium_get_attachment(){
   $output='';
	if(has_post_thumbnail()):
		$featured_image =wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	   
     else:
	 
	$attachments=get_posts(array(
		'post_type'=>'attachment',
		'posts_perpage'=>1,
		'post_parent'=>get_the_ID()
	)); 
if($attachments): 
	foreach($attachments as $attachment): 
		$output=wp_get_attachment_url( $attachment->ID );
	endforeach;
endif;
    endif;
	   

return $output;
  }