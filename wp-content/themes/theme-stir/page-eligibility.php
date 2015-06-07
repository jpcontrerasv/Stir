<?php 
    if(!is_role('project') && !is_role('administrator')) wp_redirect(get_permalink(4));
    if(is_acondition()) wp_redirect(get_permalink(14));
    if(user_publishproject()) wp_redirect(get_permalink(user_current_project()->ID));
?>
<?php get_header(); ?>

  <section id="create" class="container">
  	<div class="create-a-stir col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="title-section box fleft">
            <h3>Create a Stir</h3>
        </div>
        <p>Use this	bar to track your progress</p>
        <p>You can <a href="#" class="link">save</a> at any time</p>
    </div>
  	<div id="progress-colors" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 no-column">
    	<img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-basics-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-details-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-team-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-plan-1.png" alt="">
        <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-1.png" alt="">
    </div>
    <div class="clearfix"></div><br>
    
    
    <div class="box fwidth fleft">
        <div class="title-section box fleft">
            <h1>Are you eligible?</h1>
        </div>
    </div>
    <div class="txt col-lg-6 col-md-6 col-sm-6 col-xs-6">
    	<p>Most kinds of projects are eligible, but some are not (e.g. illegal activities). On the other hand, creative projects, micro-businesses, social initiatives, community groups, and many other projects are encouraged. Check out the terms and conditions [T&amp;Cs] for more information. </p> <br>
        <div class="title-section box fleft">
            <h3>Why these criteria?</h3>
        </div>
        <p>Stir is designed and funded to help ACT youth professionalise, grow, and succeed. If you don’t meet the criteria, you can still use the Toolshed <a href="<?php echo get_option('siteurl'); ?>/toolshed" class="link" target="_blank">[TOOLSHED]</a>. They will help you develop your project and point you in the direction of other local initiatives <a href="<?php echo get_option('siteurl'); ?>/toolshed#other-websites" class="link" target="_blank">[TOOLSHED/ OTHER WEBSITES]</a> that can offer their support. If you’d like to get in touch with us, send us an email <a href="mailto:stir@cbrin.com.au" class="text">[MAILTO:stir@cbrin.com.au]</a>; we’d love to help if we can.</p>
        
        <p>Check out the <a href="#" class="link" target="_blank">Terms & Conditions</a> now to see if Stir is right for you. They will open in a new window.</p> <br>
   
    </div>
    <div class="img-diagram-elegibility col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
            <div id="slider-toolshed" class="flexslider" style="margin-bottom:30px; margin-top:20px;">
                <ul class="slides">
                    <li><img src="<?php bloginfo('template_url'); ?>/img/about-slide-1.png"></li>
                    <li><img src="<?php bloginfo('template_url'); ?>/img/about-slide-2.png"></li>
                    <li><img src="<?php bloginfo('template_url'); ?>/img/about-slide-3.png"></li>
                    <li><img src="<?php bloginfo('template_url'); ?>/img/about-slide-4.png"></li>
                </ul>
            </div>
    
    </div>
    
    <div class="clearfix"></div><br><br><br>
    
    <form class="acceptance container-fluid" >
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 text-left check-inicio">
        <label for="checkboxes-1">
            <span>I have accepted the T&amp;Cs and am eligible to Create a Stir:</span>
            <input type="checkbox" name="checkboxes" id="checkboxes-1" value="1">
        </label>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-right">
    	<button class="boton-gris" rel="button" data-page="elegibility" data-action="save">Begin Project</button>
    </div>
    
    </form>
    
  </section>
  

<?php get_footer(); ?>