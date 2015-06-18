<div class="box fwidth fleft">
<footer class="container">
	<span class="logo-out"><a href="http://www.cbrin.com.au" target="_blank">&nbsp;</a></span>
	<div class="txt col-lg-4 col-md-4 col-sm-4 col-xs-12 text-left">
    	<p>Stir is an initiative of the CBR Innovation Network, designed by <a href="http://www.implementimagination.com.au/" target="_blank">IMPIMG</a>, in collaboration with the SHIFT ONE crew.</p>
    </div>
    <div class="list col-lg-7 col-md-7 col-sm-7 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 text-left">
    	<ul>
        	<li><a href="<?php echo get_option('siteurl'); ?>/contact">Contact</a></li>
            <li><a href="<?php echo get_option('siteurl'); ?>/copyright">Copyright</a></li>
            <li><a href="<?php echo get_option('siteurl'); ?>/privacy">Privacy</a></li>
            <li><a href="<?php echo get_option('siteurl'); ?>/terms-and-conditions">Terms &amp; Conditions</a></li>
        </ul>
    </div>
    
</footer>
</div>


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
    <script src="<?php bloginfo('template_url'); ?>/js/scripts.js?v=<?php echo rand(0,1000);?>"></script>
    <script>var $base_url  = "<?php bloginfo('url');?>";</script>
    <script src="<?php bloginfo('template_url'); ?>/js/app.js"></script>    
 
    <script type="text/javascript" charset="utf-8">
        $(window).load(function(){
	$('#preloader').fadeOut('slow',function(){$(this).remove();});
});
	$(document).ready(function(){
		$('ul.tabs li').click(function(){
			var tab_id = $(this).attr('data-tab');
			$('ul.tabs li').removeClass('current');
			$('.tab-content').removeClass('current');
			$(this).addClass('current');
			$("#"+tab_id).addClass('current');
		});
		

	});
	
	$('.bxslider').bxSlider({
		  tickerHover:true,
		  ticker: true,
		  minSlides: 4,
		  maxSlides: 4,
		  slideWidth: 805,
		  slideMargin: 0,
		  speed: 70000,
		  responsive:true,
		});
	$('.covervid-video').coverVid(1920, 1080);	
	
		

	var ww = document.body.clientWidth;
	
	$(document).ready(function() {
	  $(".nav li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
			};
		})
		
		$(".toggleMenu").click(function(e) {
			e.preventDefault();
			$(this).toggleClass("active");
			$(".nav").toggle();
		});
		adjustMenu();
	})
	
	$(window).bind('resize orientationchange', function() {
		ww = document.body.clientWidth;
		adjustMenu();
	});
	
	var adjustMenu = function() {
		if (ww < 991) {
		// if "more" link not in DOM, add it
		if (!$(".more")[0]) {
		$('<div class="more">&nbsp;</div>').insertBefore($('.parent')); 
		}
			$(".toggleMenu").css("display", "inline-block");
			if (!$(".toggleMenu").hasClass("active")) {
				$(".nav").hide();
			} else {
				$(".nav").show();
			}
			$(".nav li").unbind('mouseenter mouseleave');
			$(".nav li a.parent").unbind('click');
		$(".nav li .more").unbind('click').bind('click', function() {
				
				$(this).parent("li").toggleClass("hover");
			});
		} 
		else if (ww >= 991) {
		// remove .more link in desktop view
		$('.more').remove(); 
			$(".toggleMenu").css("display", "none");
			$(".nav").show();
			$(".nav li").removeClass("hover");
			$(".nav li a").unbind('click');
			$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
				// must be attached to li so that mouseleave is not triggered when hover over submenu
				$(this).toggleClass('hover');
			});
		}
	}		
		
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