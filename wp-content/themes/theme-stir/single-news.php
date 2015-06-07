<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>  
   
 
  <section id="single-project" class="container">
	<div class="project col-lg-9 col-md-9 col-sm-9 col-xs-12">
    	<div class="title-project col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1><?php the_title();?></h1>
        </div>
        
        <div class="clearfix"></div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <div id="slider-featured" class="flexslider" style="margin-bottom:30px; margin-top:20px;">
                <ul class="slides">
					<?php if( have_rows('slide_gallery') ): while ( have_rows('slide_gallery') ) : the_row(); ?>
                    <li><img src="<?php the_sub_field('image'); ?>"></li>
                    <?php endwhile; else : endif; ?>                
                </ul>
            </div>
           
        
        </div>
        <div class="clearfix"></div>
        
        
        <div class="clearfix"></div>
        
        <div class="descripcion col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        	<?php the_content(); ?>
        </div>
        
    </div>
    <!--/project-->
    
	
    
	
    <!--related projects-->
    
    
    
  </section>
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?> 
<?php get_footer(); ?>