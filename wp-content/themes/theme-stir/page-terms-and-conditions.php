<?php get_header(); ?>
  <section id="toolshed" class="container">
    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h1>Terms &amp; Conditions</h1>
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div id="terms" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            
            
			<?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>            
            
            <div class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('introduction_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div id="slider-toolshed" class="flexslider">
                        <ul class="slides">
                        	<?php if( have_rows('slider_introduction') ): while ( have_rows('slider_introduction') ) : the_row(); ?>
                            <li><img src="<?php the_sub_field('slider_introduction_image'); ?>" alt=""></li>
                            <?php endwhile; else : endif; ?>  
                        </ul>
                    </div>
                </div>
            </div>
            <!--item term-->
            
			<div class="clearfix"></div>
            <div id="termsandcond" class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('accounts_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('accounts_key_points_text'); ?>
                </div>
            </div>
            <!--item term-->



			<div class="clearfix"></div>
            <div class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('projects_and_eligibility_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('projects_and_eligibility_key_points'); ?>
                </div>
            </div>
            <!--item term-->


			<div class="clearfix"></div>
            <div class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('voting_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('voting_key_points'); ?>
                </div>
            </div>
            <!--item term-->

			<div class="clearfix"></div>
            <div class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('receiving_a_grant_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('receiving_a_grant_key_points'); ?>
                </div>
            </div>
            <!--item term-->

			
            <div class="clearfix"></div>
            <div class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('the_spirit_of_stir_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('the_spirit_of_stir_key_points'); ?>
                </div>
            </div>
            <!--item term-->


            <div class="clearfix"></div>
            <div class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('intellectual_property_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('intellectual_property_key_points'); ?>
                </div>
            </div>
            <!--item term-->

            <div class="clearfix"></div>
            <div class="item-term box fwidth fleft">
            	<div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('additional_terms_text'); ?>
                </div>
                <div class="extra col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('additional_terms_key_points'); ?>
                </div>
            </div>
            <!--item term-->

            
            
            
            <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
            
            
            
            
			<?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>            
            <?php the_content(); ?>
            <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
            
        </div>
    </div>
    <!--/desc box-->
    



    
    
    
  </section>
  

<?php get_footer(); ?>