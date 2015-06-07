<?php get_header(); ?>
  <section id="register" class="container">
  	<div class="col-lg-12">

		<ul class="tabs">
		    <li class="tab-link current" data-tab="tab-1">Recover Password</li>
		</ul>

		<div id="tab-1" class="tab-content current">
				<?php echo do_shortcode("[pie_register_forgot_password]"); ?>
		</div>
	</div>
</section>
  

<?php get_footer(); ?>