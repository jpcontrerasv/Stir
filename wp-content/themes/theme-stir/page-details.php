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
        <p>You can <input type="submit" class="link" value="save" rel="button" data-page="details" data-option="save"> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <a href="<?php echo get_option('siteurl'); ?>/basics"><img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt=""></a>
        <img src="<?php bloginfo('template_url'); ?>/img/ico-details-2.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-team-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-plan-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-1.png" alt="">
    </div>
    <div class="clearfix"></div>
    <div class="title-section general-title box fleft">
        <h1>Fill in the details</h1>
    </div>
    <div class="clearfix"></div>    
    <div class="txt col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
        <?php the_field('details_intro', '17'); ?><br><br>


        <div class="title-section box fleft">
            <h3>Why is this important?</h3>
        </div>
        <?php the_field('details_important', '17'); ?>
        
        <div class="title-section box fleft">
            <h3>Here are some tools to help you with the basics</h3>
        </div>
        <div class="toolshed-box box fwidth fleft">
			<?php 
            $posts = get_field('choose_tools_details','17');
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
            
        <?php the_field('details_final_words', '17'); ?>

        
        
    </div>
    <div class="form-create col-lg-5 col-md-5 col-sm-5 col-xs-12 text-left">
    	<form name="details">
        	<?php $project = get_project();?>
            <p class="title-create">Provide a detailed explanation of the project*</p>
            <?php the_field('details_explanation', '17'); ?>
            <br>
            <div class="contenedor-textarea box fwidth fleft">
            <textarea class="details tinymce" name="detail_of_project_detailed" id="detail_of_project_detailed" rows="10" rel="requerido" ><?php echo $project['detail_of_project_detailed'];?></textarea><br><br>
            </div><br><br><br>
            
            
            
            <?php /*?><p>Add Tags to your project to make it easier to find. *</p><br />
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
            	<input type="text" />
            </div>
            <p>Review the detailed explanation you have written and find the key words. Add those here, separating each with a comma.</p>
            <div class="clearfix"></div><br><br><br><?php */?>
            
            
            <p class="title-create">Who is the project for?</p>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="radio" name="detail_of_project_for" id="checkboxes-1" value="MALE" <?php if($project['detail_of_project_for']=="MALE") echo "checked";?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Male</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2  check-caja text-center">
                <input type="radio" name="detail_of_project_for" id="checkboxes-2" value="FEMALE"  <?php if($project['detail_of_project_for']=="FEMALE") echo "checked";?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Female</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="radio" name="detail_of_project_for" id="checkboxes-3" value="BOTH" <?php if($project['detail_of_project_for']=="BOTH") echo "checked";?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Both</p>
            </div>            
            <div class="clearfix"></div><br><br>


            <p class="title-create">How old are the people who it’s for?*</p>
            <?php the_field('details_age', '17'); ?><br>
            
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-1" value="0-5 (TODDLERS)"  <?php if(is_array($project['detail_of_project_old_people'])) { if(in_array("0-5 (TODDLERS)",$project['detail_of_project_old_people'])) echo "checked";}?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">0-5 (TODDLERS)</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-2" value="6-12 (CHILDREN)"  <?php if(is_array($project['detail_of_project_old_people'])) {if(in_array("6-12 (CHILDREN)",$project['detail_of_project_old_people'])) echo "checked";}?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">6-12 (CHILDREN)</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-3" value="13-17 (TEENAGERS)" <?php if(is_array($project['detail_of_project_old_people'])) {if(in_array("13-17 (TEENAGERS)",$project['detail_of_project_old_people'])) echo "checked";}?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">13-17 (TEENAGERS)</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-3" value="18-25 (YOUNG ADULTS)" <?php if(is_array($project['detail_of_project_old_people'])) {if(in_array("18-25 (YOUNG ADULTS)",$project['detail_of_project_old_people'])) echo "checked";}?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">18-25 (YOUNG ADULTS)</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-3" value="26-35 (ADULTS)"  <?php if(is_array($project['detail_of_project_old_people'])) {if(in_array("26-35 (ADULTS)",$project['detail_of_project_old_people'])) echo "checked";}?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">26-35 (ADULTS)</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-3" value="36-50 (MIDDLE-AGED)"   <?php if(is_array($project['detail_of_project_old_people'])) {if(in_array("36-50 (MIDDLE-AGED)",$project['detail_of_project_old_people'])) echo "checked";}?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">36-50 (MIDDLE-AGED)</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2  check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-3" value="50-65 (MATURE)"  <?php if(is_array($project['detail_of_project_old_people'])) {if(in_array("50-65 (MATURE)",$project['detail_of_project_old_people'])) echo "checked";}?>>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">50-65 (MATURE)</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="checkbox" name="detail_of_project_old_people[]" id="checkboxes-3" value="66+ (SENIOR)" <?php if(is_array($project['detail_of_project_old_people'])) {if(in_array("66+ (SENIOR)",$project['detail_of_project_old_people'])) echo "checked";}?> >
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">66+ (SENIOR)</p>
            </div>            
            <div class="clearfix"></div><br>
            <br><br>
            
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-3 text-left no-column" rel="back">
                <a href="<?php  echo get_option('siteurl');  ?>/basics" class="back-link" rel="back">Back</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
                <input type="submit" class="save-button" value="Save" rel="button" data-page="details" data-option="save">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
            	<input type="submit" class="save-and-continue-button" rel="button" value="Save &amp; Continue"  data-page="details" data-option="continue" style="background-color:#823088;">
            </div>
        
            
		
                    
            
        </form>    
    </div>
  </section>
  

<?php get_footer(); ?>