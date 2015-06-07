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
        <p>You can <input type="submit" class="link" value="save" rel="button" data-page="basics" data-option="save"> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-details-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-team-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-plan-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-1.png" alt="">
    </div>
    <div class="clearfix"></div>
    <div class="title-section general-title box fleft">
        <h1>Start with the basics</h1>
    </div>
    <div class="clearfix"></div>    
    <div class="txt col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    <?php the_field('basics_intro', '14'); ?>


        <div class="title-section box fleft">
            <h3>Why is this important?</h3>
        </div>
        <?php the_field('basics-why-important','14'); ?>
        
        
        <?php /*?><div class="logo-specs box fwidth fleft">
        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-column">
                <div class="title-section box fleft">
                    <h3>Uploading your logo</h3>
                </div>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
            </div>
        	<div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 no-column text-center">
            	<img src="<?php bloginfo('template_url'); ?>/img/logo-specs-img.jpg" alt="">
            </div>
        </div><?php */?>

        <div class="title-section box fleft">
            <h3>Here are some tools to help you with the basics</h3>
        </div>
        <div class="toolshed-box box fwidth fleft">
			<?php 
            $posts = get_field('choose_tools_basics','14');
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
        
        
        <?php the_field('basics_final_words', '14'); ?>
        
        
    </div>
    
    
    <div class="form-create col-lg-5 col-md-5 col-sm-5 col-xs-12 text-left">
    	<form name="basics" enctype="multipart/form-data">
        <?php $project= get_project();?>
            <p class="title-create">What is the name of your project?*</p>
            <?php the_field('basics_name_project', '14'); ?><br>
            <input type="text" placeholder="max. 20 characters" maxlength="20" value="<?php echo $project['post_title'];?>" name="post_title" rel="requerido"><br><br>
            
            
            
            <p class="title-create">What type of project is it? *</p>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="radio" name="checkboxes" id="checkboxes-1" <?php if($project['checkboxes']==1) echo 'checked';?> value="1">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Product or service</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="radio" name="checkboxes" id="checkboxes-2" <?php if($project['checkboxes']==2) echo 'checked';?> value="2">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Event or expo</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 check-caja text-center">
                <input type="radio" name="checkboxes" id="checkboxes-3"  <?php if($project['checkboxes']==3) echo 'checked';?> value="3">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Non-profit or Social</p>
            </div>          
            <div class="clearfix"></div>
            <br><p>Choose the one that best represents the project.</p>
            <br>
                
            <br><p class="title-create">Describe your project in one sentence*.</p>
            <?php the_field('basics_describe', '14'); ?><br>
            <textarea placeholder="max 100 characters" name="describe" rel="requerido" maxlength="100"><?php echo strip_tags($project['describe']);?></textarea>
<br><br>
    
            <p class="title-create">Does your project have a logo?</p>
            <div class="clearfix"></div>
            <?php the_field('basics_logo', '14'); ?><br>
            <div class="col-lg-12 no-column">
            <input type="file" value="uplaod a logo" name="logo" <?php /*?><?php if(empty($project['logo'])) { ?> rel="requerido"<?php }?><?php */?> >
            <div id="logo-dinamico">
                <?php if(!empty($project['logo'])){?>
                <img src="<?php echo $project['logo'];?>" width="200">  
                <?php } ?>
            </div>
            </div>
            
            <div class="clearfix"></div><br><br>
            
            
            <p class="title-create">Choose a highlight colour for your project. *</p>
            <p>This colour will display on your project’s page once it is published</p>
            <br><br>
            
            <select id="color_me" name="choose_a_colour" rel="requerido">
                <option value=" ">Choose...</option>
                <option class="purple" value="Purple" <?php if($project['choose_a_colour']=='Purple') echo "selected";?>>Purple</option>
                <option class="lilac" value="Lilac"<?php if($project['choose_a_colour']=='Lilac') echo "selected";?>>Lilac</option>
                <option class="pink" value="Pink" <?php if($project['choose_a_colour']=='Pink') echo "selected";?>>Pink</option>
                <option class="red" value="Red" <?php if($project['choose_a_colour']=='Red') echo "selected";?>>Red</option>
                <option class="orange" value="Orange" <?php if($project['choose_a_colour']=='Orange') echo "selected";?>>Orange</option>
                <option class="yellow" value="Yellow" <?php if($project['choose_a_colour']=='Yellow') echo "selected";?>>Yellow</option>                
            </select>
            
            <div class="clearfix"></div><br><br>
            
            
            
            <!--div class="col-lg-6 col-md-3 col-sm-3 col-xs-3 text-left no-column">
                <a href="#" class="back-link">Back</a>
            </div-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column text-left">
            	<p>* Required</p>
            </div><br />
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
                <input type="submit" class="save-button" value="Save" rel="button" data-page="basics" data-option="save">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
            	<input type="submit" class="save-and-continue-button" rel="button" data-page="basics" data-option="continue" value="Save &amp; Continue">
            </div>
        
           
		
                    
            
        </form>    
    </div>
  </section>

<?php get_footer(); ?>