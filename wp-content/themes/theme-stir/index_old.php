<?php get_header(); ?>
  <section id="home" class="container">
  	<div class="caja news col-lg-6 col-md-6 col-sm-12 col-xs-12 no-column">
    	<div class="title-section box fleft">
        	<h3>News</h3>
        </div>
        <div id="slider-featured" class="flexslider">
          <ul class="slides">
            <?php $slide = new WP_Query(array('post_type'=>'news','posts_per_page'=>4));
                if($slide->have_posts()) while($slide->have_posts()): $slide->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            ?>
            <li style="background-image:url(<?php echo $url;?>);"><?php /*?><a href="<?php echo get_permalink(); ?>" style="display:block; width:100%; height:100%; float:left; text-decoration:none;">&nbsp;</a><?php */?></li>
            <?php endwhile;?>
            
          </ul>
        </div>
    </div>
    
  	<div class="caja featured-projects col-lg-6 col-md-6 col-sm-12 col-xs-12 no-column no-column">
    	<div class="title-section box fleft">
        	<h3>Featured projects</h3>
        </div>
        <?php
            $featured = new WP_Query(array('post_type'=>'project','meta_key'=>'featured_project','meta_value'=>"1",'posts_per_page'=>1));
            if($featured->have_posts()): $featured->the_post();
              $color = @strtolower(get('choose_a_colour'));
        ?>
        <div class="feat box fwidth fleft">
        	<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6 img no-column" style="background-image:url(<?php echo get('visuals_project_display');?>);">
                <a href="<?php echo get_permalink();?>" style="display:block; width:100%; height:100%; float:left; text-decoration:none;">
                	&nbsp;
                </a>
            </div>
            <div class="side-info col-lg-6 col-md-6 col-xs-6 col-sm-6 no-column">
            	<div class="txt bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                    <p>PROJECT <?php the_ID();?></p>
                    <h4><?php the_title();?></h4>
                    <aside class="info">
                       <?php echo get('describe_project');?>
                        <span><?php echo support_count(get_the_ID());?> Supporters</span>
                        <a href="<?php echo get_permalink();?>" class="boton-gris">view</a>
                    </aside>
                </div>
            </div>
            
            
        </div>
        <?php endif;?>
        <div class="clearfix"></div>
    	
        <div class="title-section box fleft">
        	<h3>Trending projects</h3>
        </div>
        <div class="clearfix"></div>
    	 <?php 
             $arg = array('post_type'=>'project','post_status'=>'publish','posts_per_page'=>2,'paged'=>$paged);
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
         <div class="item-proj" style="background-image:url(<?php echo get('visuals_project_display');?>);">
            <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                <span>Project <?php the_ID();?></span>
                <h4><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h4>

                <aside class="txt">
                   <?php echo get('describe_project');?>
                    <span><?php echo support_count(get_the_ID());?> Supporters</span>
                    <a href="<?php echo get_permalink();?>" class="boton-gris">view</a>
                </aside>
            </div>
        </div>
        <?php endwhile;
          remove_filter('posts_orderby', 'support_orderby_desc');
  
        ?>

        
    </div>
    
    <div class="clearfix"></div>
    
    <div id="new-projects" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column text-left">
    	<div class="title-section box fleft text-left">
        	<h3>New projects</h3>
        </div>
        <?php /*?><ul>
        	<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/img-feat-proy.jpg" alt=""></a></li>
        </ul><?php */?>
    	<?php
         $project = new WP_Query(array('post_type'=>'project','posts_per_page'=>6,'order'=>'DESC','orderby'=>'date'));    
         if($project->have_posts()) while($project->have_posts()): $project->the_post(); 
            $color = @strtolower(get('choose_a_colour'));
        ?>
        <div class="item-proj" style="background-image:url(<?php echo get('visuals_project_display');?>);">
            <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                <span>Project <?php the_ID();?></span>
                <h4><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h4>

                <aside class="txt">
                   <?php echo get('describe_project');?>
                    <span><?php echo support_count(get_the_ID());?> Supporters</span>
                    <a href="<?php echo get_permalink();?>" class="boton-gris">view</a>
                </aside>
            </div>
        </div>
         <?php endwhile;?>
    	
        
        
        <p class="browse">Browse more projects on the <a class="link" href="<?php echo bloginfo('url');?>/support">Support</a> page...</p>
    </div>
    <div class="clearfix"></div>
    
    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>What is STIR</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	&nbsp;
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>Stir is a path for youth in the ACT to experience entrepreneurship through their personal projects. If you’ve always wanted to start a creative project, a micro-business, a social initiative, community, or something else entirely, Stir is for you! </p>
            <p>To find out more, visit our <a href="<?php echo get_option('siteurl'); ?>/about" class="link">About</a> (ABOUT) page.</p>
            
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	<img src="<?php bloginfo('template_url'); ?>/img/diagram.jpg" alt="">
        </div>
    </div>
    <!--/desc home-->

    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Visit the toolshed</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	&nbsp;
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>In order to help you with your projects, Stir provides practical tools aimed at developing an entrepreneur’s mindset. These tools are simple to use, including easy to follow steps and checklists. </p>
            
            <p>If you would like a headstart on how to develop and present your project, visit the <a href="<?php echo get_option('siteurl'); ?>/toolshed" class="link">Toolshed</a> (TOOLSHED).</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	<div class="toolbox bg-morado">
            	<a href="http://index.ninja/stir/wp/wp-content/uploads/2015/03/stirtools_basics_lvl1.pdf" target="_blank">LVL 1 PROJECT NAMING TOOL</a>
            </div>
        	<div class="toolbox bg-lila">
            	<a href="<?php echo get_option('siteurl'); ?>/wp-content/uploads/2015/03/stirtools_details_lvl1.pdf" target="_blank">LVL 1 DETAILED EXPLANATION TOOL</a>
            </div>
        	<div class="toolbox bg-naranjo">
            	<a href="<?php echo get_option('siteurl'); ?>/wp-content/uploads/2015/03/stirtools_plan_lvl1.pdf" target="_blank">LVL 1 PROJECT RESOURCES TOOL</a>
            </div>
            
            
        </div>
    </div>
    <!--/desc home-->



    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Create a Stir</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	&nbsp;
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>If you have an idea for a project, are between the ages of 16 and 30, and are based in the ACT, this opportunity will provide tools and support to get you started. </p>
            
            <p>Begin the process of transforming your passions into an ongoing activity by 
            <?php if ( is_user_logged_in() ) { ?>
            <a href="<?php echo get_option('siteurl'); ?>/create" class="link">Creating a Stir</a> (CREATE).
            <?php ; } else{?>
            <a href="<?php echo get_option('siteurl'); ?>/register" class="link">Register</a> (REGISTER).
            <? } ?>
            
            </p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	&nbsp;
        </div>
    </div>
    <!--/desc home-->
    
    
    
  </section>
  

<?php get_footer(); ?>