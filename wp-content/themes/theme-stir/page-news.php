<?php get_header(); ?>
  <section id="browse" class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="title-section box fleft text-left">
            <h1>News</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-column">

<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=20&post_type=news'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); $url = $thumb['0']; ?>


    	<div class="item-proj" style="background-image:url(<?=$url?>);">
        	<div class="info bg-purple">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                <aside class="txt">
                    <a href="<?php the_permalink(); ?>" class="boton-gris">view</a>
                </aside>
            </div>
        </div>

<?php endwhile; ?>

<nav>
   <?php wp_pagenavi(); ?>
</nav>

<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?> 
<?php wp_reset_query(); ?>
    

        
    </div>
    <!--proyectos-->
    
    <div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
    </div>
    
    
    
  </section>
  

<?php get_footer(); ?>