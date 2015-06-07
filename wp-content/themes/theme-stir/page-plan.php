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
        <p>You can <input type="submit" class="link" value="save" rel="button" data-page="plan" data-option="save"> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <a href="<?php echo get_option('siteurl'); ?>/basics"><img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/details"><img src="<?php bloginfo('template_url'); ?>/img/ico-details-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/visuals"><img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/team"><img src="<?php bloginfo('template_url'); ?>/img/ico-team-2.png" alt=""></a>
        <img src="<?php bloginfo('template_url'); ?>/img/ico-plan-2.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-1.png" alt="">
    </div>
    <div class="clearfix"></div>
    <div class="title-section general-title box fleft">
        <h1>Explain why people should support you</h1>
    </div>
    <div class="clearfix"></div>    
    <div class="txt col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
        <?php the_field('plan_intro', '23'); ?>
        <br><br>


        <div class="title-section box fleft">
            <h3>Why is this important?</h3>
        </div>
        <?php the_field('plan_important', '23'); ?>
        
        <div class="title-section box fleft">
            <h3>Here are some Tools to help you with thE TEAM:</h3>
        </div>
        <div class="toolshed-box box fwidth fleft">
			<?php 
            $posts = get_field('plan_choose_tools','23');
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
        
        <?php the_field('plan_final_words', '23'); ?>
        
        
        
    </div>
    <div class="form-create col-lg-5 col-md-5 col-sm-5 col-xs-12 text-left">
    	<form name="plan">
        	<?php $project = get_project();?>
            <p class="title-create">How will you use the Stir Money?*</p>
            <?php the_field('plan_money', '23'); ?>
            <br>
            <div class="contenedor-textarea box fwidth fleft">	
                <textarea class="details tinymce" name="plan_project_stir_money" rows="10" rel="requerido" ><?php echo $project['plan_project_stir_money'];?></textarea><br>
            </div>
            <div class="clearfix"></div><br><br>


            <p class="title-create">Why should people support this project?*</p>
            <?php the_field('plan_support', '23'); ?>
            <br>
            <div class="contenedor-textarea box fwidth fleft">
            <textarea class="details tinymce" name="plan_project_support" rows="10"  rel="requerido" ><?php echo $project['plan_project_support'];?></textarea><br>
            </div>
            <div class="clearfix"></div><br><br>


            <p class="title-create">Where do you see the project in the future?*</p>
            <?php the_field('plan_future', '23'); ?>
            <br>
            <div class="contenedor-textarea box fwidth fleft">
            <textarea class="details tinymce" name="plan_project_future" rows="10"  rel="requerido" ><?php echo $project['plan_project_future'];?></textarea><br>
            </div>
            <div class="clearfix"></div><br><br>


            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left no-column">
                <a href="<?php echo get_option('siteurl'); ?>/team" class="back-link">Back</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
                <input type="submit" class="save-button" value="Save" data-option="save" data-page="plan" rel="button">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
            	<input type="submit" class="save-and-continue-button" value="Save &amp; Preview" data-option="continue" data-page="plan" rel="button" style="background-color:#ff592a;">
            </div>
            
            
        </form>    
    </div>
  </section>
  

<?php get_footer(); ?>