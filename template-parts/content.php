<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package numero
 */

?>


<article>
    <header class="entry-header">
        <div class="col-md-6">
             <?php
                if  ( get_the_post_thumbnail()!='')
                {
                    the_post_thumbnail('digitalnomad_blog_section'); 
                }
                else
                {   ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/05-screenshot.jpg">
                    <?php 
                }   ?>
        </div>
        <div class="home-article-content col-md-6"> <span class="tag-details"><a href="<?php the_permalink();?>">Fashion</a> . <span class="date-article"><?php digitalnomad_posted_on(); ?></span></span>
            <h2><?php the_title();?></h2>
            <span class="byline"> By <span class="author vcard"><a href="#">Allie Kingsley</a></span></span>
            <p><?php the_excerpt(); ?><a href="#">Read more</a> </p>
        </div>
    </header>
</article>