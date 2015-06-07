<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>            

  <section id="toolshed" class="container">
    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h1>What is Stir?</h1>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
			<?php the_field('about_intro'); ?>            
            <div class="title-section box fleft text-left">
                <h3>Why is Stir Important?</h3>
            </div>
            <?php the_field('about_why_important'); ?> 
            
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div id="slider-toolshed" class="flexslider" style="margin-bottom:30px; margin-top:20px;">
                <ul class="slides">
					<?php if( have_rows('slide_abut') ): while ( have_rows('slide_abut') ) : the_row(); ?>
                    <li><img src="<?php the_sub_field('add_image_slide_about'); ?>"></li>
                    <?php endwhile; else : endif; ?>                
                
                </ul>
            </div>
        </div>
    </div>
    <!--/desc box-->
    

    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <div class="title-section box fleft text-left" style="width:100%; margin-left:0;">
                <h3>WHO IS BEHIND STIR?</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        <?php the_field('about_behind'); ?>
            
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div id="slider-featured" class="flexslider" style="margin-bottom:30px; margin-top:20px;">
                <ul class="slides">
					<?php if( have_rows('slide_behind') ): while ( have_rows('slide_behind') ) : the_row(); ?>
                    <li><img src="<?php the_sub_field('add_image_slide_behind'); ?>"></li>
                    <?php endwhile; else : endif; ?>                
                </ul>
            </div>
        </div>
    </div>
    <!--/desc box-->



    <div id="acknowledgments" class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <div class="title-section box fleft text-left" style="width:100%; margin-left:0;">
                <h3>INDIVIDUAL ACKNOWLEDGMENTS:</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-column">
        	<ul>
            	<li><h3>SHIFT ONE Crew</h3></li>
				<?php if( have_rows('first_column') ): while ( have_rows('first_column') ) : the_row(); ?>
                <li><?php the_sub_field('name'); ?></li>
                <?php endwhile; else : endif; ?>  
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-column">
        	<ul>
				<?php if( have_rows('sec_col') ): while ( have_rows('sec_col') ) : the_row(); ?>
                <li><?php the_sub_field('name'); ?></li>
                <?php endwhile; else : endif; ?>  
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 no-column">
        	<ul>
            	<li><h3>Special Shout Outs</h3></li>
				<?php if( have_rows('special_shout_outs') ): while ( have_rows('special_shout_outs') ) : the_row(); ?>
                
                <li><a href="<?php the_sub_field('link'); ?>" <?php if( get_sub_field('yes_link') ) { ?>target="_blank"<? } else { ?> class="no-link" <? } ?>><?php the_sub_field('name'); ?></a></li>
                <?php endwhile; else : endif; ?>  
            </ul>
        </div>
        
    </div>
    <!--/desc box-->


    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <div class="title-section box fleft text-left" style="width:100%; margin-left:0;">
                <h3>INSTITUTIONAL SUPPORT</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php the_field('about_institutional_support'); ?>
        </div>
    </div>
    <!--/desc box-->



    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
        
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 no-column" style="padding-left:0;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
                <div class="title-section box fleft text-left" style="width:100%; margin-left:0;">
                    <h3>STIR IS AN INITIATIVE OF:</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="logo-cbrin col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
                <img src="<?php the_field('stir_initiative'); ?>" alt="">
            </div>
        </div>


        <?php /*?><div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 no-column" style="width:75%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
                <div class="title-section box fleft text-left">
                    <h3>MAJOR SPONSORS:</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="img-sponsors col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
                <img src="<?php bloginfo('template_url'); ?>/img/sponsors.jpg" alt="">
                <img src="<?php bloginfo('template_url'); ?>/img/sponsors.jpg" alt="">
                <img src="<?php bloginfo('template_url'); ?>/img/sponsors.jpg" alt="">
            </div>
            
            
        </div><?php */?>
    </div>
    <!--/desc box-->



    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <div class="title-section box fleft text-left" style="width:100%; margin-left:0;">
                <h3>community PARTNERS:</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
			<?php if( have_rows('community_partners') ): while ( have_rows('community_partners') ) : the_row(); ?>
            <a href="<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php the_sub_field('logo'); ?>" alt=<?php the_sub_field('name'); ?>""></a>
            <?php endwhile; else : endif; ?>  
        </div>
    </div>
    <!--/desc box-->

    
    
    
  </section>
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>  

<?php get_footer(); ?>