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
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1560221257581148',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php /*?> <div id="preloader"></div><?php */?>  
<header class="container-fluid">
    <div id="logo-head" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
        <a href="<?php echo get_option('siteurl'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo-head-2.png" alt=""></a>
    </div>
    <!--logo-->
    
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
        <nav>
            <ul class="menu">
                <?php /* ?>
                <?php if ( is_user_logged_in() ) { ?>
                <li><a href="<?php echo get_option('siteurl'); ?>/eligibility">Create</a></li>
                <? } else { ?>
                <li><a href="<?php echo get_option('siteurl'); ?>/register">Create</a></li>
                <? }?>
                <?php */ ?>

                <li><a href="<?php echo get_option('siteurl'); ?>/support" <? if ( is_page(array('14','17','12','23','41','21','19')  ) ) { ?>target="_blank"<? } else { ?><? } ?>>Support</a></li>
                <li><a href="<?php echo get_option('siteurl'); ?>/toolshed" <? if ( is_page(array('14','17','12','23','41','21','19')  ) ) { ?>target="_blank"<? } else { ?><? } ?>>Toolshed</a></li>
                <li><a href="<?php echo get_option('siteurl'); ?>/About" <? if ( is_page(array('14','17','12','23','41','21','19')  ) ) { ?>target="_blank"<? } else { ?><? } ?>>About</a></li>
                <li><a href="<?php echo get_option('siteurl'); ?>/News" <? if ( is_page(array('14','17','12','23','41','21','19')  ) ) { ?>target="_blank"<? } else { ?><? } ?>>News</a></li>
            </ul>
        </nav>
    </div>
    <!--menu--->
    
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 login-search">
        <form method="get" action="<?php bloginfo('url');?>">
          <?php    
            extract($_GET,EXTR_SKIP);
            $s = strip_tags(htmlentities($s));
          ?>
            <input type="text" name="s" placeholder="type &amp; enter" <?php if(isset($s)){?>value="<?php echo $s;?>"<?php } ?>>
        </form>
     </div>
     <!--form-->
        
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 user-info">
        <?php if ( is_user_logged_in() ) { ?>
			<?php   $current_user = wp_get_current_user();?>
            <a href="#" class="welcome">Hello <?php echo $current_user->user_login;?></a>
            <div class="clearfix"></div>
            <?php if(have_draft()){?>
            <a href="<?php bloginfo('url');?>/basics/" class="link">Complete project</a>   
            <?php } else if(user_publishproject()){ ?>
            <a href="<?php bloginfo('url');?>/basics/?draft" class="link">Edit my project</a>   
            <?php  } else{?>
            <a href="<?php bloginfo('url');?>/eligibility/" class="link">Create project</a> 
            <?php } ?>
            <span style="color:#FFF;">|</span>&nbsp;<a href="<?php echo wp_logout_url();?>" class="link">Log Out</a>
        <?php ; } else{?>
            <a href="<?php echo get_option('siteurl'); ?>/register" class="login">Log in or register</a>
        <? } ?>
    
    </div>
    
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs sm-head text-center">
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
    </div>
    
  <div id="mensaje" style="display:none;">
    <p>Saving</p><div class="spinner"></div>
  </div>
</header>
