<?php get_header(); ?>
  <section id="create" class="container">
  	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="title-section box fleft">
            <h3>Create a Stir</h3>
        </div>
        <p>Use this	bar to track your progress</p>
        <p>You can <a href="#" class="link">Save</a> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-details-2.png" alt="">
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
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec<br><br></p>
        <img src="<?php bloginfo('template_url'); ?>/img/diagram-details.jpg" alt=""><br><br>

        <div class="title-section box fleft">
            <h3>Why is this important?</h3>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec</p>
        
        <div class="title-section box fleft">
            <h3>Here are some tools to help you with the basics</h3>
        </div>
        <div class="toolbox bg-rosado">
            <a href="#">Project Visuals Tools</a>
        </div>
        <div class="toolbox bg-rosado-2">
            <a href="#">Video Storytelling tool</a>
        </div>
        <p><br>While you use the tools, please <a href="#" class="link">Save</a> your project. You can come back at any time to continue.<br><br><br><br></p>
        
        
        <p><br>Don’t forget to visit the <a href="#" class="link">Toolshed</a>, where you’ll find more tools and guidelines for your project.</p>

        <p><br><br>Also, check our <a href="#" class="link">News</a> section for upcoming events where you 
        can meet people to share and discuss your project.<br><br><br><br></p>
        
        
        
    </div>
    <div class="form-create col-lg-5 col-md-5 col-sm-5 col-xs-12 text-left">
    	<form>
        	
            <p>Upload a display photo for your project*</p><br>
            <input type="file" value="examinar"> <br>   
            
            <p>This will be the first photo people see on your project's page. It will also be displayed as the project's thumbnail. </p><br> 
            <p>Make sure to use the <a href="#" class="link">Project Visuals Tool</a> to help you make the best impression.<br><br><br><br></p>
            
			<p>Upload additional photos of your project:</p>            
            <table style="width:100%;" id="mytable">
                <tbody>
                    <tr>
                        <td><input type="file" value="Browse"></td>
                    </tr>
                </tbody>
            </table>
            <div class="clearfix"></div><br>
            <div class="col-lg-6">
            	<button type="button" id="insert-more" class="button tiny radius agrega">Add another</button>
            </div>
            <div class="col-lg-6">
            	<button type="button" id="remove-more" class="button tiny radius quita">Remove last</button>
            </div><br><br><br>
            
            
			<p>Would you like to add a video?</p>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                 <label><input type="radio" name="video" value="videono" id="video_0">&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">No</p>
            </div>            
            <div class="clearfix"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <label><input type="radio" name="video" value="videoyes" id="video_1">&nbsp;</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <p style="text-transform:uppercase;">Yes</p>
            </div>            
            <div class="clearfix"></div><br>
            <p></p>
            
            <div id="video-si" class="box fwidth fleft">
                <input type="text" placeholder="http://">
                <p>Upload your video to a streaming service such as Youtube and paste the URL here. The video will take the place of your display photo.</p><br>
                <p>Use the <a href="#" class="link">Video Storytelling Tool</a> to help you get people really excited about your project.</p><br><br><br>
            </div>
            
            <p>Can people find more info on the project?</p>
            <table style="width:100%;" id="mytable-links">
                <tbody>
                    <tr>
                        <td><input type="text" placeholder="http://"></td>
                        <td>
                        <select class="fa-select">
                            <option>&#xf05e; Blocker</option>
                            <option>&#xf102; Critical</option>
                            <option>&#xf106; Major</option>
                            <option>&#xf107; Minor</option>
                            <option>&#xf103; Trivial</option>
                        </select>
						</td>
                    </tr>
                </tbody>
            </table>
            <div class="clearfix"></div><br>
            <div class="col-lg-6">
            	<button type="button" id="insert-more-links" class="button tiny radius agrega">Add another</button>
            </div>
            <div class="col-lg-6">
            	<button type="button" id="remove-more-links" class="button tiny radius quita">Remove last</button>
            </div><br><br><br>
            
            <p>Add links to your project's website or social media pages. For the best results, choose the corresponding icon drop down menu.</p>
            
            <br><br>
          <div class="clearfix"></div>
            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-3 text-left no-column">
                <a href="#" class="back-link">Back</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
                <input type="submit" class="save-button" value="Save">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-column">
            	<input type="submit" class="save-and-continue-button" value="Save &amp; Continue">
            </div>
            
            
            
		
                    
            
        </form>    
    </div>
  </section>
  

<?php get_footer(); ?>