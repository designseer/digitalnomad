<?php
/** 

 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Digital_Nomad
 */

get_header(); ?>
<!--body content-->
<div id="Blog-post"> 
	<?php
		if(have_posts()):		  
			while ( have_posts() ) : the_post();
	?> 
	<header class="entry-header-bottom" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);">
		<div class="content  wow fadeInUp">
			<div class="container "> 
				<div class="head-tag"><?php digitalnomad_entry_category(); ?></div>
				<h1><?php the_title(); ?> </h1>
				<a href="#"> </a><span class="date-article"><?php  digitalnomad_posted_on();?></span>  
			</div>
		</div>
	</header>
	<?php endwhile;endif;?>
		<div class="container">
        <div class="row wow fadeInUp"> 
            <!--blog posts container-->
            <div class="col-md-8 col-md-offset-0 col-sm-12 single-post">
                <?php
		          if(have_posts()):		  
		              while ( have_posts() ) : the_post();
 
                ?>
                <article class="post">
                <p><?php the_content();?></p>
                </article>
                
                <?php endwhile;endif;?>  
            </div>
             <?php 
               $class= get_theme_mod( 'digitalnomad_sidebar_setting','right-sidebar');
               ?>
             <aside class="<?php if($class !== 'col-md-8 pull-right'): ?>col-md-4 col-sm-4 pull-right<?php else :?>col-md-4 col-sm-4 pull-left<?php endif; ?>" > 
                 <?php get_sidebar(); ?>
            </aside>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php
get_footer();
