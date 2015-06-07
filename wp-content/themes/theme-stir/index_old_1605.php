<?php get_header(); ?>
	<section id="welcome-home" class="box fwidth fleft">
    	<p class="message-video">Check out our <a href="#" target="_blank">cool video</a> in Vimeo</p>
        <div id="welcome-message" class="box fwidth text-center">
        	<div class="table">
            
            
            <?php if ( is_user_logged_in() ) { ?>
            	<div class="table-cell">
                	<h1>Congratulations, you are now ready to create a project.</h1>
                    <div class="clearfix"></div>
                    <a href="<?php echo get_option('siteurl'); ?>/eligibility" class="cta-button">Go for it</a>
                </div>
            <?php ; } else{?>
            	<div class="table-cell">
                    <div id="slider-home-text" class="flexslider">
                        <ul class="slides">
                            <li><h1>If you are 15-30, live in the ACT, and have a passion you'd like to pursue, Stir is for you</h1></li>
                            <li><h1>Develop your project following a simple, step by step process. We'll help you with tools.</h1></li>
                            <li><h1>Promote your project far and wide to capture people's support. Anyone can vote for your idea.</h1></li>
                            <li><h1>On the first of June, the projects with the most supporters will receive a $1000 grant!</h1></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <a href="<?php echo get_option('siteurl'); ?>/register" class="cta-button">Apply now</a>
                </div>
            <? } ?>
            </div>
        </div>
        
        <div class="covervid-wrapper">
            <video class="covervid-video" autoplay muted="muted" loop poster="img/video-fallback.png">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.webm" type="video/webm">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.mp4" type="video/mp4">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.ogv" type="video/ogv">
            </video>
        </div>        
    </section>
    <section id="slide-new-pj" class="box fwidth">
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        	&nbsp;
        </div>
        <div class="fresh col-lg-8 col-md-8 col-sm-8 col-xs-12">
        	<p>Fresh new projects every day</p>
        </div>
        <div class="clearfix"></div>
    	<div class="title col-lg-4 col-md-4 col-sm-4 col-xs-12">
        	<h2>Create. Local. Support.</h2>
            <a href="<?php echo get_option('siteurl'); ?>/eligibility" class="cta-button fright">Get Started</a>
        </div>
    	<div class="slide-news col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <ul class="bxslider">
				<?php 
                 $arg = array('post_type'=>'project','post_status'=>'publish','posts_per_page'=>100,'orderby'=>'rand','paged'=>$paged);
                $arg['meta_query']['relation'] ='OR';
                $arg['meta_query'][] = array(
                'key'     => '_count_support',
                'value'   => array(''),
                'compare' => 'NOT IN'
                );
                $arg['meta_query'][] =   array(
                    'key'     => '_count_support',
                    'compare' => 'NOT EXISTS',
                );
                add_filter('posts_orderby', 'support_orderby_desc');
                 $project = new WP_Query($arg);
                
                if($project->have_posts()) while($project->have_posts()): $project->the_post();            
                 $color = @strtolower(get('choose_a_colour'));
                
                ?>
                <li>
                 <div class="item-proj" style="background-image:url(<?php echo get('visuals_project_display');?>);">
                 	<a href="<?php echo get_permalink();?>" class="box fwidth fleft" style="height:100%;">&nbsp;</a>
                    <?php /*?><div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                        <span>Project <?php the_ID();?></span>
                        <h4><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h4>
                
                        <aside class="txt">
                           <?php echo get('describe_project');?>
                            <span><?php echo support_count(get_the_ID());?> Supporters</span>
                            <a href="<?php echo get_permalink();?>" class="boton-gris">view</a>
                        </aside>
                    </div><?php */?>
                </div>
                </li>
                <?php endwhile; remove_filter('posts_orderby', 'support_orderby_desc'); ?>
            </ul>
        </div>
        
        
    </section>
    <!--/slide news-->
    
	<section id="steps-home" class="box fwidth fleft text-center">
    	<div class="title col-lg-8 col-md-8 col-sm-8 col-xs-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
        	<h3>If you’ve always wanted to start a creative project, a micro-business, a social initiative, community, or something else entirely, <span>Stir is for you!</span></h3>
            <div class="clearfix"></div>
            <p>Creating a project is as easy as following these simple steps</p>
        </div>
        <div class="img col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
            <img src="<?php bloginfo('template_url'); ?>/img/steps-home.png" alt="" />
            <div class="clearfix"></div>
            <?php if ( is_user_logged_in() ) { ?>
            <a href="<?php echo get_option('siteurl'); ?>/eligibility" class="cta-button">Create a project now</a>
            <?php ; } else{?>
            <a href="<?php echo get_option('siteurl'); ?>/register" class="cta-button">Tell me how</a>
            <? } ?>
        </div>
        
    </section>
    <!--steps home-->
    <section id="exp-home" class="box fwidth fleft">
    	<div class="vote col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
        	<h4>Even if you are not <a href="http://causeastir.com.au/terms-and-conditions#termsandcond" target="_blank">eligible</a>, you still can support projects.</h4>
            <div class="clearfix"></div>
            <img src="<?php bloginfo('template_url'); ?>/img/register-vote-promote.png" alt="" />
            <div class="clearfix"></div>
            <p>If you are not eligible for creating a project in Stir, you can still vote for your friends.</p>
            <div class="clearfix"></div>
            <?php if ( is_user_logged_in() ) { ?>
            <a href="<?php echo get_option('siteurl'); ?>/support" class="cta-button">Check the projects</a>
            <?php ; } else{?>
            <a href="<?php echo get_option('siteurl'); ?>/register" class="cta-button">Register here and vote</a>
            <? } ?>
        </div>
        <div class="tools col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
        	<h4>Stir provides tools aimed at developing an entrepreneur’s mindset.</h4>
            <div class="clearfix"></div>
            <img src="<?php bloginfo('template_url'); ?>/img/tools.jpg" alt="" />
            <div class="clearfix"></div>
            <p>These tools are simple to use, including easy to follow steps and checklists.</p>
            <div class="clearfix"></div>
            <a href="<?php echo get_option('siteurl'); ?>/toolshed" class="cta-button">Visit the toolshed</a>
            
        </div>
        
    </section>
	
    <section id="foot-message" class="box fwidth fleft text-center">
    	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
        	<h3>If you have an idea for a project, are between the ages of 15 and 30, and are based in the ACT, this opportunity will provide tools and support to get you started.</h3>
            <a href="<?php echo get_option('siteurl'); ?>/eligibility" class="cta-button">Cool, I'm in</a>
        </div>
        <span class="linea fwidth">&nbsp;</span>
    </section>
  <div class="clearfix"></div>

<?php get_footer(); ?>