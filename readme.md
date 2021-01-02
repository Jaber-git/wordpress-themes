# Post formats<br>
 ## Summary index

1.[What is post formats](#What-is-post-formats)
   - [ index.php , header.php , footer.php](#needed-files)
     - [Enqueuing css and js](#needed-files) <br>

2.[Sass mixin,includes and placeoders](#Sass-mixin-includes-and-placeoders)
   
# What is post formats
The examples I’ve seen all follow this basic format (**pseudo-code**):
```
while ( the_loop() ):
    if ( has_post_format( 'gallery' ) ) :
        // big block of HTML to format a gallery post
    elseif ( has_post_format( 'video' ) ) :
        // big block of similar HTML to format a video post
    elseif ( has_post_format( 'image' ) ) :
        // big block of similar HTML to format an image post
    elseif ( has_post_format( 'aside' ) ) :
        // big block of similar HTML to format an aside
    else :
        // big block of similar HTML to format other posts
    endif;
endwhile;
```
You see, we also recently got this nifty new function in WordPress 3.0 called get_template_part(). The TwentyTen theme uses this function to import different loop code depending on whether the visitor is currently viewing the homepage, a post, a page, or an attachment. The get_template_part() function helps your theme conditionally pull in variant blocks of code pretty easily. Being able to break these pieces out makes the theme easier to maintain, because you don’t have multiple subtly-different chunks of code embedded into multiple larger template files, with conditional if/elseif blocks to manage them.

For example, in TwentyTen’s index.php, there is a call like this:
```
get_template_part( 'loop', 'index' ); 
```

Which means: Look for a file named ‘loop-index.php’ in the current theme; If you don’t find it, look for ‘loop.php’; If this is a child theme, and you don’t see either of those templates, look for them in the parent theme. Each of the major templates (‘archive.php’, ‘author.php’, ‘category.php’, etc) makes a call similar to this, looking for a loop template specific to the appropriate view.

And I thought that a marriage of get_template_part() and get_post_format() was pretty obvious. You break your formats out into separate template files, and use get_template_part() to decide which template to load. So when I wanted to quickly hack up a temporary theme for the WordPreh site (which you should tell all your friends about), I put my idea to the test. I tore the guts out of the loop files, and created a set of format template files. My loop simplifies from the huge if/elseif block above down to this:

while ( the_loop() ):
    get_template_part( 'format', get_post_format() );
endwhile;

get_template_part() plus get_post_format() equals teh awesome!

So, when I’m displaying my list of posts, if the current post has post format ‘Link’, then we look for a file named ‘format-link.php’. If the current post has format ‘Aside’, we look for ‘format-aside.php’, if it’s a Quote, ‘format-quote.php’, regular posts look for ‘format-standard.php’, and failing all else, we use plain old ‘format.php’.

In the case of WordPreh.com, most of our posts use the ‘Link’ format, which is formatted radically differently from normal, beause I want the headline to link directly to the site URL in question (mostly Twitter statuses, sometimes blog posts) instead of the local permalink. So my ‘format-link.php’ template is quite different from most of the other ‘format-*.php’ templates. [click here](https://dougal.gunters.org/blog/2010/12/10/smarter-post-formats/)

# 2. Sass mixin,includes and placeoders
*mixins* are like function .We can reuse it.
We can separate our scss file and import it on main file.
placehoders scss code
``` 
%text-shadow{text-shadow: 0 1px 2px rgba(0,0,0,0.4);}
```
we use this code like below after ```import```
```
.header-container{@extend %text-shadow; }
```