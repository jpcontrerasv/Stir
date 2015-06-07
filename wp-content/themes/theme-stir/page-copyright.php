<?php get_header(); ?>
  <section id="toolshed" class="container">
    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h1>Copyright</h1>
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div id="terms" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            
            
			<?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>            
            
            
			<div class="clearfix"></div>
            <div id="termsandcond" class="item-term box fwidth fleft">
            	<div class="txt col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php the_content(''); ?>
                </div>
            </div>
            <!--item term-->

            
            <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
            
            
            
            
            
        </div>
    </div>
    <!--/desc box-->
    



    
    
    
  </section>
  

<?php get_footer(); ?>