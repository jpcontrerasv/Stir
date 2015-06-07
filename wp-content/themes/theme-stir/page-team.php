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
        <p>You can <input type="submit" class="link" value="save" rel="button" data-page="team" data-option="save"> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <a href="<?php echo get_option('siteurl'); ?>/basics"><img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/details"><img src="<?php bloginfo('template_url'); ?>/img/ico-details-2.png" alt=""></a>
        <a href="<?php echo get_option('siteurl'); ?>/visuals"><img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-2.png" alt=""></a>
        <img src="<?php bloginfo('template_url'); ?>/img/ico-team-2.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-plan-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-1.png" alt="">
    </div>
    <div class="clearfix"></div>
    <div class="title-section general-title box fleft">
        <h1>Introduce yourself</h1>
    </div>
    <div class="clearfix"></div>    
    <div class="txt col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
        <?php the_field('people_intro', '21'); ?>

        <div class="title-section box fleft">
            <h3>Why is this important?</h3>
        </div>
        <?php the_field('people_important', '21'); ?>
        
        <?php /*?><div class="logo-specs box fwidth fleft">
        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-column">
                <div class="title-section box fleft">
                    <h3>Choosing your profile pic</h3>
                </div>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
            </div>
        	<div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 no-column">
            	<img src="<?php bloginfo('template_url'); ?>/img/logo-specs-img.jpg" alt="">
            </div>
        </div><?php */?>
        
        
        <div class="title-section box fleft">
            <h3>Here are some Tools to help you with the team:</h3>
        </div>
        <div class="toolshed-box box fwidth fleft">
			<?php 
            $posts = get_field('people_choose_tool','21');
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
        
        <?php the_field('people_final_words', '21'); ?>
        
        
        
    </div>
    <div class="form-create col-lg-5 col-md-5 col-sm-5 col-xs-12 text-left">
    	<form name="team">
        	<?php $project = get_project();?>
            <p class="title-create">How old are you? *</p><br>
            <input type="number" placeholder="##" maxlength="2" min="15" max="30" name="team_project_old" rel="requerido" value="<?php echo $project['team_project_old'];?>"> <br><br>
			<p>Are you female or male?</p>
            
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label><input type="radio" name="team_project_sex" value="Female" id="female-team" <?php if($project['team_project_sex']=="Female") echo "checked";?>>&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Female</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                 <label><input type="radio" name="team_project_sex" value="Male" id="male-team" <?php if($project['team_project_sex']=="Male") echo "checked";?>>&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Male</p>
            </div>            



            
            <div class="clearfix"></div><br><br>

            <p class="title-create">What is your role in this project? *</p>
            <?php the_field('people_role', '21'); ?>
            <br>
            <input type="text" placeholder="max. 20 characters" maxlength="20" name="team_project_role" value="<?php echo $project['team_project_role'];?>" rel="requerido"><br><br><br>


            <p class="title-create">Which skills do you bring to the project?*</p>
            <?php the_field('people_skills', '21'); ?>
            <br>
            <textarea type="text" placeholder="max. 100 characters" maxlength="100" name="team_project_skills"  rel="requerido"><?php echo $project['team_project_skills'];?></textarea><br><br><br>



            <p class="title-create">Add your profile picture*</p>
            <?php the_field('people_profile_picture', '21'); ?>
            <br>
            <input type="file" name="team_project_profile_picture" name="team_project_profile_picture" <?php if(empty($project['team_project_profile_picture'])):?> rel="requerido" <?php endif;?>><br>
            <div class="cache" rel="team_project_profile_picture">
                <?php if(!empty($project['team_project_profile_picture'])){?>
                <img src="<?php echo $project['team_project_profile_picture'];?>" width="200">
                 <br/><br>
                <?php } ?>
             </div>
            
            <br><br>

            <p class="title-create">Where can people find out more about you?</p>
            <?php the_field('people_about_you', '21'); ?>
            <br>
            <input type="text" placeholder="http://" name="team_project_find_people" value="<?php echo get('team_project_find_people');?>"><br>
            <br><br><br>


			<!--nuevo: es un input-file para subir una foto del carnet, no se manifiesta en el single-->
            <p class="title-create">Please provide an image of your Proof of I.D.*</p>
            <?php the_field('people_proof_id', '21'); ?>
            <br>
            <input type="file" name="team_project_proof_id" <?php if(empty($project['team_project_proof_id'])) { ?> rel="requerido"<?php }?>><br>
            <div class="cache" rel="team_project_proof_id">
                <?php if(!empty($project['team_project_proof_id'])){?>
                <img src="<?php echo $project['team_project_proof_id'];?>" width="200">
                 <br/><br>
                <?php } ?>
             </div>
            <br><br>
            
            
            <?php /*?><p>Create a password for your project*</p><br>
            <input type="password" placeholder="*****" name="member_project_project_password" maxlength="25" <?php if(empty($project['member_project_project_password'])){ ?>rel="requerido"<?php } ?> ><br>
            <p>Type the password again to confirm*</p>
            <input type="password" placeholder="*****" maxlength="25" <?php if(empty($project['member_project_project_password'])){?>rel="requerido"<?php }?>><br>
            <p>This is the general password, the other team members will use the same for access.</p>
			<br><br><br><?php */?>
            
            

			<p class="title-create">Are you working with other people?</p>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                 <label><input type="radio" name="member_project_other_people" value="No" id="no-team" checked="checked" <?php if($project['member_project_other_people']=="No") echo "checked";?>>&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">No</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label><input type="radio" name="member_project_other_people" value="Yes" id="yes-team"   <?php if($project['member_project_other_people']=="Yes") echo "checked";?>>&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Yes</p>
            </div>
            
            <!--nuevo: aquí hay que modificar el tema de los team members. Podrías hacer que los botones  de agregar un nuevo miebro funcionen?-->
            <div class="team-members box fleft fwidth <?php if($project['member_project_other_people']=="Yes") echo " visible";?>" >
               
            <table style="width:100%" id="grouptable">            
                <tbody>
                 <?php 
                 if(is_array($project['members'])){
                    $contador =0;
                    foreach($project['members'] as $key =>$member){
                       
                    ?>
                    <tr <?php if($contador==0) echo "class='nueva'";?>>
                        <td class="nueva-td">
                         <table style="width:100%;" >    
                            <tbody>
                                <tr>
                                    <td>
                                        <tr>
                                            <td><p>Role</p></td>
                                            <td><input type="text" width="20" name="other_member_project_role[]" placeholder="Role title of the team member." maxlength="20"  value="<?php echo $member['other_member_project_role'];?>"/></td>
                                        </tr>
                                        <tr>
                                            <td><p>Age</p></td>
                                            <td><input type="number" maxlength="2" min="15" max="30" placeholder="##" name="other_member_project_age[]" value="<?php echo $member['other_member_project_age'];?>"></td>
                                        </tr>
                                        <tr>
                                            <td><p>Gender</p></td>
                                            <td>
                                                <select class="fa-select" style="width:100px;" name="other_member_project_gender[]">
                                                    <option value="Female" <?php if ($member['other_member_project_gender']=='Female')echo "selected";?>>&#xf182; Female</option>
                                                    <option value="Male"  <?php if ($member['other_member_project_gender']=='Male')echo "selected";?>>&#xf183; Male</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p>Skills</p></td>
                                            <td>
                                                <input type="text" placeholder="Separated by commas" style="margin-top:13px;"  name="other_member_project_skills[]" value="<?php echo $member['other_member_project_skills'];?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:top;" valign="top"><p>Profile picture</p></td>
                                            <td>
                                                <input type="file" style="margin-bottom:40px;" name="other_member_project_picture[]" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:top;" valign="top"><p>proof of ID</p></td>
                                            <td>
                                                <input type="file" style="margin-bottom:40px;" name="other_member_project_proof_id[]" />
                                            </td>
                                        </tr>
                                    </td>
                                    
                                </tr>
                            </tbody>
                             </table>
                        </td>
                    </tr>
                    <?php $contador++; 
                    } 
                } else{?>
                    <tr>
                        <td class="nueva-td">
                         <table style="width:100%;" >    
                            <tbody>
                                <tr>
                                    <td>
                                        <tr>
                                            <td><p>Role</p></td>
                                            <td><input type="text" maxlength="20" width="20" name="other_member_project_role[]" placeholder="Role title of the team member" /></td>
                                        </tr>
                                        <tr>
                                            <td><p>Age</p></td>
                                            <td><input type="number" placeholder="##" min="15" max="30" maxlength="2" name="other_member_project_age[]"></td>
                                        </tr>
                                        <tr>
                                            <td><p>Gender</p></td>
                                            <td>
                                                <select class="fa-select" style="width:100px;" name="other_member_project_gender[]">
                                                    <option value="Female">&#xf182; Female</option>
                                                    <option value="Male">&#xf183; Male</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><p>Skills</p></td>
                                            <td>
                                                <input type="text" placeholder="Separated by commas" style="margin-top:13px;"  name="other_member_project_skills[]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:top;" valign="top"><p>Profile picture</p></td>
                                            <td>
                                                <input type="file" style="margin-bottom:40px;" name="other_member_project_picture[]" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:top;" valign="top"><p>proof of ID</p></td>
                                            <td>
                                                <input type="file" style="margin-bottom:40px;" name="other_member_project_proof_id[]" />
                                            </td>
                                        </tr>
                                    </td>
                                    
                                </tr>
                            </tbody>
                             </table>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
               
            </table><br><br>
                
                <div class="col-lg-6">
                    <button type="button" id="insert-more" class="button tiny radius agrega">Add another</button>
                </div>
                <div class="col-lg-6">
                    <button type="button" id="remove-more" class="button tiny radius quita">Remove last</button>
                </div>
                
                <div class="clearfix"></div><br><br>
            </div>

            
            
            
            
            
			<?php /*?><p>What is your team member’s email?*</p>            
            <table style="width:100%;" id="mytable">
                <tbody>
                <?php 
                if(is_array($project['member_project_member_email'])){
                    $contador = 0;
                foreach($project['member_project_member_email'] as $key => $value){?>
                    <tr <?php if($contador!=0) echo 'class="nueva"';?>> 
                        <td><input type="email" placeholder="mail@mail.com" name="member_project_member_email[]" value="<?php echo $value;?>"></td>
                    </tr>
                <?php 
                        $contador++;
                    }
                } else {
            ?>
                <tr>
                    <td><input type="email" placeholder="mail@mail.com" name="member_project_member_email[]" value="" rel="requerido"></td>
                </tr>
            <?php 
                }?>
                </tbody>
            </table>
            <div class="clearfix"></div><br>
            <p>Make sure you have their consent. We will send them a link to create a profile for the project.</p><br>
            <div class="col-lg-6">
            	<button type="button" id="insert-more" class="button tiny radius agrega">Add another</button>
            </div>
            <div class="col-lg-6">
            	<button type="button" id="remove-more" class="button tiny radius quita">Remove last</button>
            </div><?php */?>
            
            
            <br><br><br>
            
            
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-3 text-left no-column">
                <a href="<?php echo get_option('siteurl'); ?>/visuals" class="back-link">Back</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
                <input type="submit" class="save-button" value="Save" rel="button" data-page="team" data-option="save">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column"  >
            	<input type="submit" class="save-and-continue-button" value="Save &amp; Continue" data-page="team" rel="button" data-option="continue" style="background-color:#ef4136;">
            </div>
            
            
		
                    
            
        </form>    
    </div>
  </section>
  

<?php get_footer(); ?>