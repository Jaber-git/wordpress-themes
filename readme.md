# Adding custom theme features in custom admin page <br>
 ## Summary index

1.[Post format](#Selectively-enqueue-a-custom-stylesheet-in-the-admin)
   - [Enqueue stylesheet in rubium general page](#Enqueue-stylesheet-in-rubium-general-page)
     - Second nested list item <br>

2.[retrieve data variable](#retrieve-data-variable)
   - [Create a custom menu](#Create-a-custom-menu)
     - Second nested list item <br>
# Post Formats
Post Formats are a [WordPress Theme feature](https://codex.wordpress.org/Theme_Features) introduced with WordPress version 3.1, implemented as a taxonomy that includes a standard list of Post Format types: Aside, Audio, Chat, Gallery, Image, Link, Quote, Status, and Video. Themes that support the feature can customize the layout and styling of Posts according to Post Format type, generally by altering the Loop output for Posts with a given Post Format type, or by targeting specific CSS classes applied to such Posts.

In order to ensure feature compatibility among Themes and to facilitate integration with external blogging tools, the list of Post Format types is not extensible. Unlike other core taxonomies such as Categories and Post Tags, Themes must register support for the Post Formats feature in order to use it, and can add support for any or all Post Format types.

Note: Post Formats should not be confused with Custom Post Types. Post Formats are a [taxonomy](https://codex.wordpress.org/Taxonomies) , not a [post-type](https://codex.wordpress.org/Post_Types) . [ for further details click me](https://wordpress.stackexchange.com/questions/133482/wordpress-add-post-format-support-not-working) 