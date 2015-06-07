<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>            
  <section id="toolshed" class="container">
    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h1>Welcome to the Toolshed</h1>
            </div>
        </div>
        <div class="ico-colores col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <img src="<?php bloginfo('template_url'); ?>/img/ico-terms-1.png" alt="">
            <img src="<?php bloginfo('template_url'); ?>/img/ico-basics-2.png" alt="">
            <img src="<?php bloginfo('template_url'); ?>/img/ico-details-2.png" alt="">
            <img src="<?php bloginfo('template_url'); ?>/img/ico-visuals-2.png" alt="">
            <img src="<?php bloginfo('template_url'); ?>/img/ico-team-2.png" alt="">
            <img src="<?php bloginfo('template_url'); ?>/img/ico-plan-2.png" alt="">
            <img src="<?php bloginfo('template_url'); ?>/img/ico-promote-2.png" alt="">
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php the_field('toolshed_intro'); ?><br><br><br><br><br>
            
            <div class="title-section box fleft text-left">
                <h3>How to use these tools</h3>
            </div>
            <?php the_field('toolshed_howto'); ?>
            
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	&nbsp;
        	<?php /*?><img src="<?php bloginfo('template_url'); ?>/img/tools-diagram.jpg" alt=""><?php */?>
        </div>
    </div>
    <!--/desc box-->
    

    <?php /*?><div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the basic</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>These tools will help you to define your project’s identity, and improve your ability to describe it in one quick sentence.</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php 
                $tool = new WP_Query(array('post_type'=>'toolshed','order'=>'ASC','tax_query'=>array(
                                    array(
                                        'taxonomy' => 'category_tools',
                                        'field'    => 'slug',
                                        'terms'    => 'the-basic')
                    )));
                $count = 1;

                while($tool->have_posts()): $tool->the_post();
            ?>
        	<div class="toolbox bg-morado<?php if($count!=1){ echo '-'.$count; }?>">
            	<a href="<?php echo get('archivo');?>"><?php the_title();?></a>
            </div>
            <?php $count++;endwhile;?>
        	
            
            
        </div>
    </div>
    <!--/desc box-->



    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the details</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>These tools are here to help you to explain your project in a clear and logical manner, while keeping it concise and covering all the necessary components.</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	<?php 
                $tool = new WP_Query(array('post_type'=>'toolshed','order'=>'ASC','tax_query'=>array(
                                    array(
                                        'taxonomy' => 'category_tools',
                                        'field'    => 'slug',
                                        'terms'    => 'the-details')
                    )));
                $count = 1;

                while($tool->have_posts()): $tool->the_post();
            ?>
            <div class="toolbox bg-lila<?php if($count!=1){ echo '-'.$count; }?>">
                <a href="<?php echo get('archivo');?>"><?php the_title();?></a>
            </div>
            <?php $count++;endwhile;?>
            
           
            
        </div>
    </div>
    <!--/desc box-->




    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the visuals</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>These tools provide practical tips on how to select and craft the imagery that will best represent your project.</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            
            <?php 
                $tool = new WP_Query(array('post_type'=>'toolshed','order'=>'ASC','tax_query'=>array(
                                    array(
                                        'taxonomy' => 'category_tools',
                                        'field'    => 'slug',
                                        'terms'    => 'the-visuals')
                    )));
                $count = 1;

                while($tool->have_posts()): $tool->the_post();
            ?>
            <div class="toolbox bg-rosado<?php if($count!=1){ echo '-'.$count; }?>">
                <a href="<?php echo get('archivo');?>"><?php the_title();?></a>
            </div>
            <?php $count++;endwhile;?>
            
        	
            
        </div>
    </div>
    <!--/desc box-->




    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the team</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>These tools will help you to demonstrate that the people behind the project are capable and committed.</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	 <?php 
                $tool = new WP_Query(array('post_type'=>'toolshed','order'=>'ASC','tax_query'=>array(
                                    array(
                                        'taxonomy' => 'category_tools',
                                        'field'    => 'slug',
                                        'terms'    => 'the-team')
                    )));
                $count = 1;

                while($tool->have_posts()): $tool->the_post();
            ?>
            <div class="toolbox bg-rojo<?php if($count!=1){ echo '-'.$count; }?>">
                <a href="<?php echo get('archivo');?>"><?php the_title();?></a>
            </div>
            <?php $count++;endwhile;?>
            
            
            
        </div>
    </div>
    <!--/desc box-->


    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the plan</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>Here you will find tools to show that the team will use the grant responsibly, and provide a vision of where you will take the project beyond the grant.</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	 <?php 
                $tool = new WP_Query(array('post_type'=>'toolshed','order'=>'ASC','tax_query'=>array(
                                    array(
                                        'taxonomy' => 'category_tools',
                                        'field'    => 'slug',
                                        'terms'    => 'the-plan')
                    )));
                $count = 1;

                while($tool->have_posts()): $tool->the_post();
            ?>
            <div class="toolbox bg-naranjo<?php if($count!=1){ echo '-'.$count; }?>">
                <a href="<?php echo get('archivo');?>"><?php the_title();?></a>
            </div>
            <?php $count++;endwhile;?>
            

            
        </div>
    </div>
    <!--/desc box-->


    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for promotion</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>To start stirring up support for your project, we’ve provided some guidelines on different ways to promote your project.</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php 
                $tool = new WP_Query(array('post_type'=>'toolshed','order'=>'ASC','tax_query'=>array(
                                    array(
                                        'taxonomy' => 'category_tools',
                                        'field'    => 'slug',
                                        'terms'    => 'promotion')
                    )));
                $count = 1;

                while($tool->have_posts()): $tool->the_post();
            ?>
            <div class="toolbox bg-amarillo<?php if($count!=1){ echo '-'.$count; }?>">
                <a href="<?php echo get('archivo');?>"><?php the_title();?></a>
            </div>
            <?php $count++;endwhile;?>
        	
        </div>
    </div>
    <!--/desc box--><?php */?>



    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the basic</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php the_field('tools_for_the_basic'); ?>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">

			<?php 
            $posts = get_field('tools_basic');
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
    </div>
    <!--/desc box-->



    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the details</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php the_field('tools_for_the_details'); ?>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
			<?php 
            $posts = get_field('tools_details');
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
    </div>
    <!--/desc box-->




    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the visuals</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php the_field('tools_for_the_visuals'); ?>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
			<?php 
            $posts = get_field('tools_visuals');
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
    </div>
    <!--/desc box-->




    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the people</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php the_field('tools_for_the_people'); ?>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
			<?php 
            $posts = get_field('tools_people');
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
    </div>
    <!--/desc box-->


    <div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for the plan</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <?php the_field('tools_for_the_plan'); ?>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
			<?php 
            $posts = get_field('tools_plan');
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
    </div>
    <!--/desc box-->


    <?php /*?><div class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Tools for promotion</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
        </div>
        <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-12 no-column">
        	<div class="toolbox bg-amarillo">
            	<a href="#">project budget tool</a>
            </div>
        	<div class="toolbox bg-amarillo-2">
            	<a href="">needs &amp; benefits tool</a>
            </div>
        </div>
    </div><?php */?>




    <div id="other-websites" class="desc-box col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-column">
            <div class="title-section box fleft text-left">
                <h3>Other websites</h3>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-column text-right">
        	<a href="#toolshed" class="link">Back to top</a>
        </div>
        <div class="clearfix"></div>
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-column">
            <?php the_field('other_websites_text'); ?>
        </div>
        <div class="img col-lg-8 col-md-8 col-sm-8 col-xs-12 no-column">
			<?php if( have_rows('other_websites_logos') ): while ( have_rows('other_websites_logos') ) : the_row(); ?>
            <a href="<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>"></a>
            <?php endwhile; else : endif; ?>                
        </div>
    </div>
    <!--/desc box-->

    
    
    
  </section>
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>  

<?php get_footer(); ?>