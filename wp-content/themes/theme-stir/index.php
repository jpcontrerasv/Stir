<?php get_header(); ?>
	<?php if ( is_user_logged_in() ) { ?>
    
    <section id="welcome-logged" class="box fwidth fleft text-center" >
    	
        <?php /* <div class="bloq-cta col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
        	<div class="table">
            	<div class="table-cell">
			<?php   $current_user = wp_get_current_user();?>
            <?php if(have_draft()){?>
            <i class="fa fa-pencil-square-o fa-5x"></i>
            <div class="clearfix"></div>
            <p>Your project is awaiting.</p>
            <div class="clearfix"></div>
            <a href="<?php bloginfo('url');?>/basics/" class="cta-button">Complete project</a>   
            <?php } else if(user_publishproject()){ ?>
            <i class="fa fa-pencil-square-o fa-5x"></i>
            <div class="clearfix"></div>
            <p>Your project is awaiting.</p>
            <div class="clearfix"></div>
            <a href="<?php bloginfo('url');?>/basics/?draft" class="cta-button">Edit my project</a>   
            <?php  } else{?>
            <i class="fa fa-rocket fa-5x"></i>
            <div class="clearfix"></div>
            <p>Get you started.</p>
            <div class="clearfix"></div>
            <a href="<?php bloginfo('url');?>/eligibility/" class="cta-button">Create a project</a> 
            <?php } ?>
                </div>
            </div>
        </div> */ ?>
        
    	<div class="bloq-cta col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        	<div class="table">
            	<div class="table-cell">
                    <i class="fa fa-thumbs-o-up fa-5x"></i>
                    <div class="clearfix"></div>
                    <!--<p>Or you can always help a friend.</p>-->
                    <div class="clearfix"></div>
                	<a href="<?php echo get_option('siteurl'); ?>/support" class="cta-button">Support a project</a>
                </div>
            </div>
        </div>
        <div class="covervid-wrapper">
            <video class="covervid-video" autoplay muted="muted" loop poster="img/video-fallback.png" preload="auto">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.webm" type="video/webm">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.mp4" type="video/mp4">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.ogv" type="video/ogv">
            </video>
        </div>
    </section>
    
    
    <?php ; } else{?>

	<section id="welcome-home" class="box fwidth fleft">
    	<p class="message-video">Check out our <a href="#" target="_blank">cool video</a> in Vimeo</p>
        <div id="welcome-message" class="box fwidth text-center">
        	<div class="table">
            
            
            	<div class="table-cell">
                    <div id="slider-home-text" class="flexslider">
                        <ul class="slides">
                            <li><h1>If you are 15-30, live in the ACT, and have a passion you'd like to pursue, Stir is for you</h1></li>
                            <li><h1>Develop your project following a simple, step by step process. We'll help you with tools.</h1></li>
                            <li><h1>Promote your project far and wide to capture people's support. Anyone can support your idea.</h1></li>
                            
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <a href="<?php echo get_option('siteurl'); ?>/register" class="cta-button">Apply now</a>
                </div>
            </div>
        </div>
        
        <div class="covervid-wrapper">
            <video class="covervid-video" autoplay muted="muted" loop poster="img/video-fallback.png" preload="auto">
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
            <p>If you are not eligible for creating a project in Stir, you can still support your friends.</p>
            <div class="clearfix"></div>
            <?php if ( is_user_logged_in() ) { ?>
            <a href="<?php echo get_option('siteurl'); ?>/support" class="cta-button">Check the projects</a>
            <?php ; } else{?>
            <a href="<?php echo get_option('siteurl'); ?>/register" class="cta-button">Register here and support</a>
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
            <a href="<?php echo get_option('siteurl'); ?>/register" class="cta-button">Cool, I'm in</a>
        </div>
        <span class="linea fwidth">&nbsp;</span>
    </section>
  <div class="clearfix"></div>


    <? } ?>
    
    
    
<?php get_footer(); ?>