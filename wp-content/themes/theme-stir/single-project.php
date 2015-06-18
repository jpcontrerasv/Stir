<?php get_header(); ?>
<?php wp_reset_query();
        wp_reset_postdata();
?>



	<?php /*?><div id="survey" class="box fwidth desaparecido">
        <button class="cerrar">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-times fa-stack-1x fa-inverse"></i>
            </span>
        </button>
    	<div class="content">
        	<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="title-section box fleft">
                    <h1>Please fill out a brief survey</h1>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
            	<form name="support">
                	<p>How old are you?</p>
                    <input type="number" placeholder="##" name="age" rel="requerido">
                    <div class="clearfix"></div><br>
                	<p>Are you Male or Female?</p>
                    <?php global $post;?>
                    <input type="hidden" name="post_id" value="<?php echo $post->ID;?>" >
                    <label>
                        <input type="radio" name="sex" id="radios-1" value="1">
                        Female
                    </label>
                    <label>
                        <input type="radio" name="sex" id="radios-0" value="0">
                        Male
                    </label>
                    <div class="clearfix" ></div><br>
                	<p>Where are you from?</p>
                    <input type="text" name="city" rel="requerido">
                    <p>If you are in Canberra, provide your Suburb. If you are elsewhere, please provide your City.</p>
                    <div class="clearfix"></div><br>
                    
                    <p>How Cool is the idea?*</p>
                    <div class="radios box fwidth fleft">
                        <label>
                            <input type="radio" name="cool" id="radios-3" value="1">
                            <span>1</span>
                        </label>
                        <label>
                            <input type="radio" name="cool" id="radios-4" value="2">
                            <span>2</span>
                        </label>
                        <label>
                            <input type="radio" name="cool" id="radios-5" value="3">
                            <span>3</span>
                        </label>
                        <label>
                            <input type="radio" name="cool" id="radios-6" value="4">
                            <span>4</span>
                        </label>
                        <label>
                            <input type="radio" name="cool" id="radios-7" value="5">
                            <span>5</span>
                        </label>
                    </div>
                    <div class="clearfix"></div><br>


                    <p>How Clear is the project?*</p>
                    <div class="radios box fwidth fleft">
                        <label>
                            <input type="radio" name="clear" id="radios-8" value="1">
                            <span>1</span>
                        </label>
                        <label>
                            <input type="radio" name="clear" id="radios-9" value="2">
                            <span>2</span>
                        </label>
                        <label>
                            <input type="radio" name="clear" id="radios-10" value="3">
                            <span>3</span>
                        </label>
                        <label>
                            <input type="radio" name="clear" id="radios-11" value="4">
                            <span>4</span>
                        </label>
                        <label>
                            <input type="radio" name="clear" id="radios-12" value="5">
                            <span>5</span>
                        </label>
                    </div>
                    <div class="clearfix"></div><br>


                    <p>How capable is the team?*</p>
                    <div class="radios box fwidth fleft">
                        <label>
                            <input type="radio" name="capable" id="radios-13" value="1">
                            <span>1</span>
                        </label>
                        <label>
                            <input type="radio" name="capable" id="radios-14" value="2">
                            <span>2</span>
                        </label>
                        <label>
                            <input type="radio" name="capable" id="radios-15" value="3">
                            <span>3</span>
                        </label>
                        <label>
                            <input type="radio" name="capable" id="radios-16" value="4">
                            <span>4</span>
                        </label>
                        <label>
                            <input type="radio" name="capable" id="radios-17" value="5">
                            <span>5</span>
                        </label>
                    </div>
                    <div class="clearfix"></div><br>


                    <p>How much support would you give?*</p>
                    <div class="radios box fwidth fleft">
                        <label>
                            <input type="radio" name="support" id="radios-18" value="0-5">
                            <span>$0-5</span>
                        </label>
                        <label>
                            <input type="radio" name="support" id="radios-19" value="5-20">
                            <span>$5-20</span>
                        </label>
                        <label>
                            <input type="radio" name="support" id="radios-20" value="20-50">
                            <span>$20-50</span>
                        </label>
                        <label>
                            <input type="radio" name="support" id="radios-21" value="51-100">
                            <span>$51-100</span>
                        </label>
                        <label>
                            <input type="radio" name="support" id="radios-22" value="100+">
                            <span>$100 +</span>
                        </label>
                    </div>
                    <div class="clearfix"></div><br>
                    
                    <p>Your feedback will help the team know how much people would be willing to support them with.</p><br>
                    
                	<p>Would you like to leave a comment?</p>
                    <textarea placeholder="max 100 characters" name="comment"></textarea>
                    <div class="clearfix"></div>
                    <p>Share why you decided to support this project. Your enthusiasm may cause others to support it!</p><br>
                    <div class="clearfix"></div><br><br>
                    
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    	<p>Don't forget to share!</p><br>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-right">
                    	<input type="submit" class="boton-gris" value="Send" rel="button" data-page="support" data-action="">
                    </div>
                    <br/>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" rel="message" style="padding:10px;margin-top:20px;"> 
                    </div> 
                    <div class="clearfix"></div><br><br>
			                    
                    
                </form>
            </div>
        </div>
        
    </div><?php */?>
    
    <div id="fund" class="box desaparecido fwidth text-center">
    	
        <button class="cerrar">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-times fa-stack-1x fa-inverse"></i>
            </span>
        </button>
        <div id="contenedor-fund">            
            <div class="title-head box fwidth fleft">
                <div class="table">
                    <div class="table-cell">
                        <h1>Help Stir support <?php the_title();?></h1>
                        <p>By purchasing one of the following options you are both helping the Stir platform and providing additional resources to this project. <br>For each dollar you spend (excluding shipping charges), we will give 75c to the creator of this project.</p>
                    </div>
                </div>
            </div>
            <div class="donation-zone box fwidth fleft">
            
                <div class="donation_box donation_10 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="table">
                        <div class="table-cell">
                            <h2>$10</h2>
                            <p class="rewards-title">You will receive:</p>
                            <ul>
                                <li>-High quality vinyl <a href="#">Stir sticker</a></li>
                                <li>-Your name as Project Supporter</li>
                            </ul>
                            <a class="donation-button" data-donate="10aud" data-item="<?php the_title();?>" data-id="<?php echo get_the_ID();?>" href="#">Purchase with pickup <br><i class="fa fa-bicycle fa-lg"></i></a>
                            <a class="donation-button" data-donate="10auds" data-item="<?php the_title();?>" data-id="<?php echo get_the_ID();?>"  href="#">Purchase with shipping <br><i class="fa fa-truck fa-lg"></i></a>
                            <p class="notice">Pickup from CBRIN, Level 5, 1 Moore St, Canberra. Shipping to a nominated Australian address adds $12 in P&amp;P.</p>
                        </div>
                    </div>
                </div>
                <div class="donation_box donation_20 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="table">
                        <div class="table-cell">
                            <h2>$20</h2>
                            <p class="rewards-title">You will receive</p>
                            <ul>
                                <li>-High quality vinyl <a href="#">Stir sticker</a></li>
                                <li>-A wonderful <a href="#">Stir mug</a></li>
                                <li>-Your name as Project Supporter</li>
                            </ul>
                            <a class="donation-button" data-donate="20aud" data-item="<?php the_title();?>" data-id="<?php echo get_the_ID();?>" href="#">Purchase with pickup <br><i class="fa fa-bicycle fa-lg"></i> </a>                            
                            <a class="donation-button" data-donate="20auds" data-item="<?php the_title();?>" data-id="<?php echo get_the_ID();?>" href="#">Purchase with shipping <br><i class="fa fa-truck fa-lg"></i> </a>
                            <p class="notice">Pickup from CBRIN, Level 5, 1 Moore St, Canberra. Shipping to a nominated Australian address adds $12 in P&amp;P.</p>
                        </div>
                    </div>
                </div>
                <div class="donation_box donation_50 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="table">
                        <div class="table-cell">
                            <h2>$50</h2>
                            <p class="rewards-title">You will receive:</p>
                            <ul>
                                <li>-High quality vinyl <a href="#">Stir sticker</a></li>
                                <li>-A limited edition <a href="#">Stir mug</a></li>
                                <li>-Your name as Project Supporter</li>
                                <li>-Your name as Stir Supporter</li>
                            </ul>
                            <a class="donation-button" data-donate="50aud" data-item="<?php the_title();?>" data-id="<?php echo get_the_ID();?>" href="#">Purchase with pickup <br><i class="fa fa-bicycle fa-lg"></i></a>                            
                            <a class="donation-button" data-donate="50auds" data-item="<?php the_title();?>" data-id="<?php echo get_the_ID();?>" href="#">Purchase with shipping <br><i class="fa fa-truck fa-lg"></i></a>
                            <p class="notice">Pickup from CBRIN, Level 5, 1 Moore St, Canberra. Shipping to a nominated Australian address adds $12 in P&amp;P.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-fund box fwidth fleft">
                <div class="table">
                    <div class="table-cell">
                        <p>When you help Stir support a project you are accepting our <a href="<?php echo get_option('siteurl'); ?>/terms-and-conditions" target="_blank">Terms &amp; Conditions</a>.</p>    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--/fund-->
   
<?php if(have_posts()): the_post();
      $color = @strtolower(get('choose_a_colour'));
?> 
 
  <section id="single-project" class="container">
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
        
        <div class="video col-lg-12 col-md-12 col-sm-12 col-xs-12">
		   <?php echo getFrameVideo(get('visuals_project_url_video'));?>      
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
            <?php
                $support = $wpdb->get_row('SELECT * FROM wp_project_support WHERE id_project='.(int) get_the_ID().' LIMIT 0,1',OBJECT);
                if(!empty($support)){
                $user = get_user_by('id',$support->id_user);
            ?>
            <div class="info-sideabr col-lg-3 col-md-3 col-sm-12 col-xs-12 no-column">
            	<div id="quotebox" class="box fwidth fleft ">
                    <?php/* ?><span class="small">What people are saying?</span>
                    <blockquote>“<?echo $support->comment;?>” <br><br><?echo $support->age;?>/<?php echo ($support->sex==0)?'M':'F';?>/<?php echo $user->user_nicename;?></blockquote>
                </div>
                <div class="clearfix"></div>
                
                <div id="graficos-sidebar" class="box fwidth fleft">
                    <div class="title-section box fleft">
                        <h3>what do people think?</h3>
                        <?php $stat_project = stat_project(get_the_ID(),get('detail_of_project_old_people')); ?>
                    </div>
                    <?php */?>
                    
                    <?php/* ?><div class="votos col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column text-left txt-<?php echo $color;?>">
                        <span class="total-market txt-<?php echo $color;?>"><?php echo round($stat_project["total_market_cool"]/$stat_project["count_project"]);?></span>/<span class="out-of txt-<?php echo $color;?>">5</span>
                        <div class="clearfix"></div>
                        <p class="txt-<?php echo $color;?>">cool</p><br>
                    </div>
                    <?php */?>
                    
                    <div class="clearfix"></div>
                    
                    <?php /*?><div class="votos col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column text-left txt-<?php echo $color;?>">
                        <span class="total-market txt-<?php echo $color;?>"><?php echo round($stat_project["total_market_clear"]/$stat_project["count_project"]);?></span>/<span class="out-of txt-<?php echo $color;?>">5</span>
                        <div class="clearfix"></div>
                        <p class="txt-<?php echo $color;?>">clear</p><br>
                        <span><?php echo round($stat_project["all_market_clear"]/$stat_project["count_all_project"]);?></span>/<span>5</span>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="votos col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column text-left txt-<?php echo $color;?>">
                        <span class="total-market txt-<?php echo $color;?>"><?php echo round($stat_project["total_market_capable"]/$stat_project["count_project"]);?></span>/<span class="out-of txt-<?php echo $color;?>">5</span>
                        <div class="clearfix"></div>
                        <p class="txt-<?php echo $color;?>">capable</p><br> 
                        <?php /*?><span><?php echo round($stat_project["all_market_capable"]/$stat_project["count_all_project"]);?></span>/<span>5</span>
                    </div>
                    <?php */?>
                    <!--img src="<?php bloginfo('template_url'); ?>/img/graficos.png" alt=""-->
				</div>

                <?php /* ?><div class="title-section box fleft">
                    <h3>how much would people pay?</h3>
                </div>
                <p>The average response from the target market is:</p>
                <?php $support = $wpdb->get_row("select count(*) as repetidos,support 
                    FROM wp_project_support where id_project=".(int) get_the_ID()." GROUP by id_project order by repetidos desc",OBJECT);
                ?>
                <h4 class="price txt-<?php echo $color;?>">$<?php echo $support->support;?></h4><br>
                <?php */ ?>
                
                <div class="clearfix"></div>
                <div class="title-section box fleft">
                <h3>Project Supporters</h3>
            </div>
            <div class="psupporters box fwidth fleft">
                <p><?php echo get_donate_project(get_the_ID());?></p> 
            </div>
                
                
            </div>
            <?php } ?>
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
                	<a href="#" class="link-perfil" target="_blank";>&nbsp;</a>
                    <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                        <aside class="txt">
                            <p><?php echo get('team_project_role',$team);?></p>
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
                            <p><?php echo get('other_member_project_role',$team);?></p>
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
    	<div id="sticker" class="box fwidth fleft">
        <?php /* ?>    
	  <?php if ( is_user_logged_in() ) {
            $user = wp_get_current_user();
            $project_id = (int) get_the_ID();
            $user_supported  = $wpdb->get_var( "SELECT COUNT(*) FROM wp_project_support 
            WHERE id_project=".$project_id." and id_user=".(int)$user->ID );
                  if($user_supported==0){
        ?>       <button class="support bg-<?php echo $color;?>">Help Stir Support This Project</button>
            <?php } else {?>
                <button class="link bg-<?php echo $color;?>">You have already shown your support for this project</button>
            <?php } ?>
      <?php ; } else{?>
            <button class="link bg-<?php echo $color;?>">Register to Stir to Support this project</button>
      <? } ?>
      <?php */ ?>
       <?php if ( is_user_logged_in() ) { ?>
            <button class="support bg-<?php echo $color;?>">Help Stir Support This Project</button>
      <? } else { ?>
            <button class="link bg-<?php echo $color;?>">Register to Stir to Support this project</button>
      <? } ?>
            
            <ul>
            	<li>Supporters: <?php echo $supportcount;?></li>
                <li><span style="display:inline-block; padding-bottom:5px;">Share:</span> <br><?php echo do_shortcode("[addtoany]"); ?></li>
                
            </ul>
        </div>
    </div>
    <!--sidebar-->
    
	<div id="related-projects" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="title-section box fleft">
            <h3>Similar projects</h3>
        </div>
        <?php
            wp_reset_postdata();
            wp_reset_query();
            $project = new WP_Query(array('post_type'=>'project','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'rand'));
            if($project->have_posts()) while($project->have_posts()): $project->the_post();
            $color = @strtolower(get('choose_a_colour'));

        ?>
    	<div class="item-proj" style="background-image:url(<?php echo get('visuals_project_display');?>);">
            <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
            	<span>Project <?php the_ID();?></span>
                <h4><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h4>

                <aside class="txt">
                   <?php /*?><?php echo get('describe_project');?><?php */?>
                    <span><?php echo support_count(get_the_ID());?> Supporters</span>
                    <a href="<?php echo get_permalink();?>" class="boton-gris">view</a>
                </aside>
            </div>
        </div>
      <?php endwhile;?>
    	
    </div>
    <!--related projects-->
    
    
    
  </section>
<?php endif;?>
<?php get_footer(); ?>