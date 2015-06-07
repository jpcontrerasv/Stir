<?php if(!is_role('project') && !is_role('administrator')) wp_redirect(get_permalink(4));?>
<?php if(!have_draft()) wp_redirect(get_permalink(12)); ?>
<?php get_header(); ?>
 <?php /*?><div id="mensaje">
    <p>This is only a preview of your project</p> &nbsp;&nbsp;<a href="<?php echo get_permalink(23);?>" class="boton-gris">Back</a>
  </div><?php */?>
	
    
   <?php $project = get_project();?> 
   
<?php $project = new WP_Query(array('post_type'=>'project','p'=>(int) $project['id']));?>
<?php if($project->have_posts()): $project->the_post();

       $color = @strtolower(get('choose_a_colour'));  
?> 
 
  <section id="single-project" class="container">
  
  <section id="create" class="container" style="margin-bottom:50px;">
  	<div class="create-a-stir col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="title-section box fleft">
            <h3>Creating a Stir</h3>
        </div>
        <p>Use this	bar to track your progress</p>
        <p>You can <a href="#" class="link">Save</a> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <a href="<?php echo get_option('siteurl'); ?>/basics"><img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/details"><img src="<?php bloginfo('template_url'); ?>/img/ico-details-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/visuals"><img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/team"><img src="<?php bloginfo('template_url'); ?>/img/ico-team-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/plan"><img src="<?php bloginfo('template_url'); ?>/img/ico-plan-2.png" alt=""></a>
        <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-2.png" alt="">
    </div>
  </section>
  
<div class="clearfix"></div>  
  
  
    <div class="project col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="title-project col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <span class="small">Project <?php echo get_the_ID();?></span>
            <h1><?php the_title();?></h1>
            <?php /*?><?php echo get('describe');?><?php */?>
            <?php echo get('describe_project');?>
            <?php /*?><?php echo get('detail_of_project_detailed');?><?php */?>
        </div>
        
        <div class="project-logo  col-lg-3 col-md-2 col-sm-3 col-xs-3">
            <?php 
            $logo = get('logo_project');
            if(!empty($logo)) {?>
            <img src="<?php echo get('logo_project');?>" alt="" width="400">
            <?php } else { ?>
            <img src="<?php bloginfo('template_url');?>/img/project-logo.jpg" alt="">
            <?php } ?>
        </div>
        <div class="video col-lg-9 col-md-9 col-sm-9 col-xs-9">
               <?php echo getFrameVideo(get('visuals_project_url_video'));?>      
        </div>
        <div class="clearfix"></div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <?php 
             $aditional = get_order_field('visuals_project_aditional_photos');
             $imagen = get('visuals_project_display');
            ?>
            <div id="slider-featured" class="flexslider" style="margin-bottom:30px; margin-top:20px;">
                <ul class="slides">
                <?php if(!empty($imagen)){ ?>
                    <li><img src="<?php echo $imagen;?>" width="450"></li>
                <?php } ?>
                <?php
                    foreach($aditional as $key){ ?>
                    <li><img src="<?php echo get('visuals_project_aditional_photos',1,$key);?>" width="450"></li>
                <?php   } ?>
                </ul>
            </div>
           
        
        </div>
        <div class="clearfix"></div>
        
        <div class="descripcion col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            <div class="txt col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php echo get('detail_of_project_detailed');?><br>
            <div class="title-section box fleft">
                <h3>why you should support this project?</h3>
            </div>
                <?php echo get('plan_project_support');?>
            <div class="title-section box fleft">
                <h3>how will money be used?</h3>
            </div>
                 <?php echo get('plan_project_stir_money');?>
            <div class="title-section box fleft">
                <h3>where will the project go in the future?</h3>
            </div>
                 <?php echo get('plan_project_future');?>
            </div>
            <div class="info-sideabr col-lg-3 col-md-3 col-sm-12 col-xs-12 no-column">
                <span class="small">What people are saying?</span>
                <blockquote  class="bg-<?php echo $color;?>"  style="padding:10px; color:#121c26; font-style:italic;">This column will display comments and feedback from your supporters.</blockquote>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            
            <div class="profiles col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title-section box fleft">
                    <h3>who is behind this project?</h3>
                </div>
                
                <?php
                
                    $teams = get_order_group('team_project_old');
                   
                    foreach($teams as $team){
                    
                ?>
                <div class="item-proj" style="background-image:url(<?php echo get('team_project_profile_picture',$team);?>);">
                    <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                        <aside class="txt">
                            <p>Team member role <?php echo get('team_project_role',$team);?></p>
                            <span>Age: <?php echo  get('team_project_old',$team);?>, Gender: <?php echo  get('team_project_sex',$team);?></span>
                            <span><?php echo get('team_project_skills',$team);?>; </span>
                        </aside>
                    </div>
                </div>
               <?php } ?>
                <?php
                
                    $teams = get_order_group('other_member_project_role');
                 
                   
                    foreach($teams as $team){
                      $role = get('other_member_project_role',$team);
                      $age  = get('other_member_project_age',$team);
                      if(!empty($role) && !empty($age)){
                ?>
                <div class="item-proj" style="background-image:url(<?php echo get('other_member_project_picture',$team);?>);">
                    <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                        <aside class="txt">
                            <p>Team member role <?php echo get('other_member_project_role',$team);?></p>
                            <span>Age: <?php echo  get('other_member_project_age',$team);?>, Gender: <?php echo  get('other_member_project_gender',$team);?></span>
                            <span><?php echo get('other_member_project_skills',$team);?>; </span>
                        </aside>
                    </div>
                </div>
                   <?php 
                       } 
                    } ?>
                <!--div class="item-proj" style="background-image:url(<?php bloginfo('template_url'); ?>/img/profile.png);">
                    <div class="info" style="background-color:#ef4136;">
                        <aside class="txt">
                            <p>Team member role</p>
                            <span>Age, Gender</span>
                            <span>#skills; #experience; #interests; #community</span>
                        </aside>
                    </div>
                </div-->
            </div>
            <div class="clearfix"></div>
            <div class="social-network col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <ul>
                    <li><p>Find out more:</p></li>
                    <?php 
                    $find = get_order_field('visuals_project_find_project');
                    foreach($find as $key ){ 
                            $icons = array('facebook','linkedin','twitter','google'
                                ,'youtube','pinterest','soundcloud','instagram','behance');
                            $uri = get('visuals_project_find_project',1,$key);
                            $url = parse_url($uri);
                            $domain = preg_replace('/(www(\.)|\.(\w|\d)*)/','',$url["host"]);
                            if($domain=='google') $domain="google-plus";
                      if(!empty($domain)){
                        ?> 
                    <li>
                        <a href="<?php echo  get('visuals_project_find_project',1,$key);?>">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-square fa-stack-2x"></i>
                              <i class="fa fa-<?php echo $domain;?> fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>                    
                    </li>
                    <?php   } ?>
                    <?php } ?>
                    
                    
                </ul>
            </div>
        </div>
        <?php $supportcount = support_count(get_the_ID());?>
        <div id="support" class="box fwidth fleft hidden-lg hidden-md hidden-sm">
            <!--button class="support">Support this project</button-->
            <ul>
                <li>Supporters: <?php echo $supportcount;?></li>
                <li>Share:</li>
            </ul>
        </div>
        
    </div>
    <!--/project-->
    
    <div id="sidebar-project" class="col-lg-3 col-md-2 col-sm-3 col-xs-12">

            <div class="title-section box fleft">
                <h3>Finishing touches</h3>
            </div>
            <p style="font-size:13px;">Your project is now ready. All that remains is for you to add some colour by choosing a highlight from the list below. Choose the colour that best suits your project. Once you’re done. Press the submit button, and the project will go into a brief review process before going live!</p>
            <form class="form-preview">
                <input type="submit" class="save-and-continue-button bg-<?php echo $color;?>" value="SEND TO REVIEW!" data-option="publish" data-page="preview" rel="button" style="color:#FFF;">
            </form><br>
            <p style="font-size:13px;">or, if you are not satisfied, you can always go <a href="<?php echo get_option('siteurl'); ?>/plan" class="link">Back</a>. You can edit your project anytime.</p>

            
            
    </div>
    <!--sidebar-->
    
    <?php /*?><div id="related-projects" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="title-section box fleft">
            <h3>Similar projects</h3>
        </div>
        <?php
            wp_reset_postdata();
            wp_reset_query();
            $project = new WP_Query(array('post_type'=>'project','post_status'=>'publish','posts_per_page'=>4,'orderby'=>'rand'));
            if($project->have_posts()) while($project->have_posts()): $project->the_post();
            $color = @strtolower(get('choose_a_colour'));
        ?>
        <div class="item-proj" style="background-image:url(<?php echo get('visuals_project_display');?>);">
            <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                <span>Project <?php the_ID();?></span>
                <h4><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h4>

                <aside class="txt">
                   <?php echo get('describe_project');?>
                    <span><?php echo support_count(get_the_ID());?> Suporters</span>
                    <a href="<?php echo get_permalink();?>" class="boton-gris">view</a>
                </aside>
            </div>
        </div>
      <?php endwhile;?>
        
    </div>
    <!--related projects--><?php */?>
    
    
    
  </section>
<?php endif;?>
<?php get_footer(); ?>