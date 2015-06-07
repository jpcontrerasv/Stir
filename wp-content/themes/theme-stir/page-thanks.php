<?php get_header(); ?>
    
    <section id="thanks-page" class="box fwidth fleft text-center" >
    	<h1 id="thank-you-title" class="animated tada">Thank you!</h1>
    	<p>You have successfully helped Stir to fund a project</p>
        <div class="clearfix"></div><br><br>
        <div id="sub-message-thanks-page" class="container animated fadeIn">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                <div class="container-fluid">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                <p>Your order is awaiting at CBRIN, Level 5, 1 Moore Street, Canberra, ACT 2601.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                    <i id="truck-thanks-page" class="fa fa-bicycle fa-5x animated slideInLeft"></i>
                    </div>
                </div>
                <div class="clearfix"></div>
                <a href="<?php bloginfo('url');?>/support/" class="cta-button">Explore more projects</a>
            </div>
        </div>
        
        
        <div class="covervid-wrapper">
            <video class="covervid-video" autoplay muted="muted" loop poster="img/video-fallback.png">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.webm" type="video/webm">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.mp4" type="video/mp4">
                <source src="<?php bloginfo('template_url'); ?>/img/videos/StirWebsiteSml.ogv" type="video/ogv">
            </video>
        </div>
    </section>
    
    
    
    
    
    
<?php get_footer(); ?>