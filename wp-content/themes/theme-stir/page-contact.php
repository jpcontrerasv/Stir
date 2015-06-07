<?php get_header(); ?>
  <section id="register" class="container">
  	<div class="col-lg-12">

		<ul class="tabs">
		    <li class="tab-link current" data-tab="tab-1">Contact us</li>
		</ul>

		<div id="tab-1" class="tab-content current">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>  
            <?php the_content(); ?>
			<?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            	<h1>Follow us</h1><br>
                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs sm-head text-center">
                    <a href="https://www.facebook.com/causeastirCBR" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    
                    <a href="https://twitter.com/StirCBR" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                </div>
            
            </div>
                      
		</div>
	</div>
</section>
  

<?php get_footer(); ?>