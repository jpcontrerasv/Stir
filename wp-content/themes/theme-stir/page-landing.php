<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?>&nbsp;<?php if ( is_home() ) { ?><? } else { ?> / <?php
echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
?><? } ?></title>

    <!-- Bootstrap -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css?v=<?php echo rand(0,1000);?>" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/normalize.css?v=<?php echo rand(0,1000);?>" rel="stylesheet">
	<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.css?v=<?php echo rand(0,1000);?>" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/animate.css?v=<?php echo rand(0,1000);?>" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/flexslider.css?v=<?php echo rand(0,1000);?>" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/jquery.bxslider.css?v=<?php echo rand(0,1000);?>" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/light/skin.min.css" rel="stylesheet">
    <link href="<?php bloginfo('stylesheet_url'); ?>?v=<?php echo rand(0,1000);?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php bloginfo('template_url'); ?>/js/modernizr.js" type="text/javascript"></script>    
	<script src="//use.typekit.net/une8rqn.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <?php wp_head(); ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
  </head>
  <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=342690685862200";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  
<header id="maintenance-header" class="container-fluid">
    <div id="logo-head" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <a href="<?php echo get_option('siteurl'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo-head-2.png" alt=""></a>
    </div>
    <!--logo-->
    
    
    <?php /*?><div class="col-lg-2 col-md-2 col-sm-2 hidden-xs sm-head text-center">
        <a href="https://www.facebook.com/causeastirCBR" target="_blank">
        <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
        </span>
        </a>
        
        <a href="https://twitter.com/StirCBR" target="_blank">
        <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
        </span>
        </a>
    </div><?php */?>
    
</header>
    
    <section id="maintenance" class="box fwidth fleft text-center">
    	<div class="container-fluid">
        	<div class="head-message col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<h1 id="thank-you-title" class="animated tada">Thank you!</h1>
            	<p>Voting has now closed</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
            	<div class="box fwidth fleft">
            		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-left">
                    <h2>Want to know who won?</h2>
					<p>Join us at the Stir Awards for a cozy celebration of what has been an amazing two months, and find out what's next for Stir.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                    	<a class="button-event" href="https://www.facebook.com/events/442282092607078/" target="_blank">Join us at<br> The Stir Awards</a>
                    </div>
                    <div class="surprise-text box fwidth fleft text-center">
                    	<h2>There's more to come from Stir; come back on June 5 to see. Meanwhile, please follow us for updates</h2>
                    </div>
                </div>
                <!--box-->
            </div>
            <!--contenedor central-->
            <div class="clearfix"></div>
            <div class="sm col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
            		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
                        <div class="fb-like" data-href="https://www.facebook.com/causeastirCBR" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-left">
                        <a href="https://twitter.com/StirCBR" class="twitter-follow-button" data-show-count="false">Follow @StirCBR</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    				</div>
                
            </div>
            
            <div class="clearfix"></div>
            <div class="footer-cierre box fwidth fleft text-center">
            	<img src="<?php bloginfo('template_url'); ?>/img/footer-cierre.png" alt="">
            </div>
        </div>
    </section>
    <div class="linsep box fwidth fleft">&nbsp;</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/doubletaptogo.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap-select.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/covervid.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.js"></script>
    <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
    <script>var $base_url  = "<?php bloginfo('url');?>";</script>
    <script src="<?php bloginfo('template_url'); ?>/js/app.js"></script>    
 
    <script type="text/javascript" charset="utf-8">
    </script>    
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-61388758-1', 'auto');
      ga('send', 'pageview');
    
    </script>    
    <?php wp_footer(); ?>
  </body>
</html>