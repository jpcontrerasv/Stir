<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>            

  <section id="register" class="container">
  	<div class="col-lg-12">

		
		<div id="tab-1" class="tab-content current">
			<?php the_content(''); ?>
		</div>
	</div>
</section>
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
  

<?php get_footer(); ?>