<?php if(isset($_GET['draft'])) publish_to_draft();?>
<?php if(!is_role('project') && !is_role('administrator')) wp_redirect(get_permalink(4));?>
<?php if(!have_draft()) wp_redirect(get_permalink(12)); ?>
<?php get_header(); ?>
  <section id="create" class="container">
  	<div class="create-a-stir col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="title-section box fleft">
            <h3>Create a Stir</h3>
        </div>
        <p>Use this	bar to track your progress</p>
        <p>You can <input type="submit" class="link" value="save" rel="button" data-page="visuals" data-option="save"> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <a href="<?php echo get_option('siteurl'); ?>/basics"><img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/details"><img src="<?php bloginfo('template_url'); ?>/img/ico-details-2.png" alt=""></a>
        <img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-2.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-team-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-plan-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-1.png" alt="">
    </div>
    <div class="clearfix"></div>
    <div class="title-section general-title box fleft">
        <h1>Add some visuals</h1>
    </div>
    <div class="clearfix"></div>    
    <div class="txt col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
        <?php the_field('visuals_intro', '19'); ?><br><br>

        <div class="title-section box fleft">
            <h3>Why is this important?</h3>
        </div>
        <?php the_field('visuals_important', '19'); ?>
        
        <div class="title-section box fleft">
            <h3>Here are some tools to help you with the basics</h3>
        </div>
        <div class="toolshed-box box fwidth fleft">
			<?php 
            $posts = get_field('visuals_choose_tool','19');
            if( $posts ): ?>
                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <div class="toolbox" style="background-color:<?php the_field('color_toolshed'); ?>;">
                        <a href="<?php the_field('pdf_link_toolshed'); ?>" target="_blank"><?php the_title(); ?></a>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
        </div>
        
        <?php the_field('visuals_finals_words', '19'); ?>
        
        
        
    </div>
    <div class="form-create col-lg-5 col-md-5 col-sm-5 col-xs-12 text-left">
    	<form name="visuals">
        	<?php $project = get_project();?>
            <p class="title-create">Upload the main image for your project*</p>
            <?php the_field('visuals_main_image', '19'); ?>
            <br />            
            <input type="file" value="examinar" <?php if(empty($project['visuals_project_display'])) { ?> rel="requerido"<?php }?>  name="visuals_project_display" > <br>  
            <div id="display-photo">
                <?php if(!empty($project['visuals_project_display'])){?>
                <div class="cache-display">
                    <img src="<?php echo $project['visuals_project_display'];?>" width="200">  
                    <input type="hidden" value="<?php echo basename($project['visuals_project_display']);?>"  name="file[visuals_project_display]"> 
                </div>
                <?php }else{
                ?>
                <div class="cache-display"></div>
                <?php                    
                } ?>
            </div><br /><br />
            
			<p class="title-create">Upload additional photos of your project:</p>            
            <table style="width:100%;" id="mytable">
                <tbody>
                    <?php 
                    if(is_array($project['visuals_project_aditional_photos'])){
                    foreach($project['visuals_project_aditional_photos'] as $key =>$value){?>
                    <tr <?php if($key!=0) echo "class='nueva'";?>>
                        <td>
                            <input type="file" value="Browse" name="visuals_project_aditional_photos[]">
                            <div class="cache-image">
                                <img src="<?php echo $project['visuals_project_aditional_photos'][$key];?>" width="200">
                                <input type="hidden" value="<?php  echo basename($project['visuals_project_aditional_photos'][$key]);?>" name="file[visuals_project_aditional_photos][]" >
                               
                            </div>

                        </td>
                    </tr>
                    <?php } 
                    } else{
                    ?>
                    <tr>
                        <td>
                            <input type="file" value="Browse" name="visuals_project_aditional_photos[]">
                            <div class="cache-image"></div>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>

                </tbody>
            </table>
            <div class="clearfix"></div><br>
            <div class="col-lg-6">
            	<button type="button" id="remove-more" class="button tiny radius quita">Remove last</button>
            </div>
            <div class="col-lg-6">
                <button type="button" id="insert-more" class="button tiny radius agrega">Add another</button>
            </div><br><br><br>
            
            
			<p class="title-create">Would you like to add a video?</p>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                 <label><input type="radio" name="video" value="videono" id="video_0" checked="checked">&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">No</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label><input type="radio" name="video" value="videoyes" id="video_1" <?php if(!empty($project['visuals_project_url_video'])) echo "checked";?>>&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Yes</p>
            </div>            
            <div class="clearfix"></div><br>
            <p></p>
            
            <div id="video-si" class="box fwidth fleft" <?php if(!empty($project['visuals_project_url_video'])) echo "style='display:block;'";?>>
                <p>Upload your video to a streaming service such as Youtube and paste the URL here. The video will take the place of your display photo.</p>
                <p>Use the <a href="#" class="link">Video Storytelling Tool</a> to help you get people really excited about your project.</p><br>

                <input type="text" placeholder="http://" name="visuals_project_url_video" value="<?php echo $project['visuals_project_url_video'];?>">
            </div><br /><br />
            
            <p class="title-create">Can people find more info on the project?</p>
            <?php the_field('visuals_project_info', '19'); ?><br>            
            <table style="width:100%;" id="mytable-links">
                <tbody>
                    <?php    if(is_array($project['visuals_project_find_project'])){
                                foreach($project['visuals_project_find_project'] as $key =>$value){
                                $uri =$project['visuals_project_find_project'][$key];
                                $url = parse_url($uri);
                                $domain = preg_replace('/(www(\.)|\.(\w|\d)*)/','',$url["host"]);
                                if($domain=='google') $domain="google-plus";
                        ?>
                    <tr <?php if($key!=0) echo "class='nueva-link'";?>>
                        <td><input type="text" placeholder="http://" name="visuals_project_find_project[]" value="<?php echo $project['visuals_project_find_project'][$key];?>"></td>
                        <td>
                         <select class="fa-select">
                                <option <?php if($domain=='facebook') echo 'selected';?>>&#xf230; Facebook</option>
                                <option <?php if($domain=='linkedin') echo 'selected';?>>&#xf0e1; Linked-In</option>
                                <option <?php if($domain=='twitter') echo 'selected';?>>&#xf099; Twitter</option>
                                <option <?php if($domain=='google') echo 'selected';?>>&#xf0d5; Google+</option>
                                <option <?php if($domain=='youtube') echo 'selected';?>>&#xf167; YouTube</option>
                                
                                <option <?php if($domain=='pinterest') echo 'selected';?>>&#xf231; Pinterest</option>
                                <option <?php if($domain=='souncloud') echo 'selected';?>>&#xf1be; Souncloud</option>
                                <option <?php if($domain=='instagram') echo 'selected';?>>&#xf16d; Instagram</option>
                                <option <?php if($domain=='behance') echo 'selected';?>>&#xf1b4; Behance</option>
                                <option <?php if($domain=='kickstarter') echo 'selected';?>>Kickstarter</option>
                                
                            </select>
						</td>
                    </tr>
                    <?php   } 
                        }else{
                    ?>
                        <tr>
                            <td><input type="text" placeholder="http://" name="visuals_project_find_project[]" ></td>
                            <td>
                            <select class="fa-select">
                                <option>&#xf230; Facebook</option>
                                <option>&#xf0e1; Linked-In</option>
                                <option>&#xf099; Twitter</option>
                                <option>&#xf0d5; Google+</option>
                                <option>&#xf167; YouTube</option>
                                
                                <option>&#xf231; Pinterest</option>
                                <option>&#xf1be; Souncloud</option>
                                <option>&#xf16d; Instagram</option>
                                <option>&#xf1b4; Behance</option>
                                <option>Kickstarter</option>
                                
                            </select>
                            </td>
                        </tr>
                    <?php       
                        }
                    ?>
                </tbody>
            </table>
            <div class="clearfix"></div><br>
            <div class="col-lg-6">
            	<button type="button" id="remove-more-links" class="button tiny radius quita">Remove last</button>
            </div>
            <div class="col-lg-6">
                <button type="button" id="insert-more-links" class="button tiny radius agrega">Add another</button>
            </div><br><br><br><br>
            
            
          <div class="clearfix"></div>
            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-3 text-left no-column" rel="back">
                <a href="<?php echo get_option('siteurl'); ?>/details" class="back-link" rel="back">Back</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
                <input type="submit" class="save-button" rel="button" value="Save"  data-page="visuals" data-option="save">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
            	<input type="submit" rel="button" class="save-and-continue-button" value="Save &amp; Continue" data-page="visuals" data-option="continue" style="background-color:#9e1d97;">
            </div>
            
            
            
		
                    
            
        </form>    
    </div>
  </section>
  

<?php get_footer(); ?>