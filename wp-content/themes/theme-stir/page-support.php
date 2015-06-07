<?php get_header(); ?>
<?php
     wp_reset_postdata();
    wp_reset_query();
    extract($_GET,EXTR_SKIP);
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $arg = array('post_type'=>'project','post_status'=>'publish','posts_per_page'=>60,'paged'=>$paged);
    //$arg['meta_query']['relation'] ='OR';
    if($sorter=='supported'){
        $arg[ 'meta_query'] = array(
            'relation' => 'OR', 
            array(
                'key' => '_count_support', 
                'value' => '',
                'compare' => 'NOT EXISTS'
            ), array( //check to see if date has been filled out
                'key' => '_count_support',
                'compare' => '>',
                'value' => '0'
            )
        );
      
    add_filter('posts_orderby', 'support_orderby_desc');

    }else if($sorter =='recent'){
        $arg['orderby'] = 'date';
        $arg['order'] = 'DESC';
    }
    if($service=="1"){
         $arg['meta_query'][] =array('key'=>'type_project_product_or_service','value'=>'1','compare'=>'=');
    }
    if($event =="1"){
        $arg['meta_query'][] = array('key'=>'type_project_event_or_expo','value'=>'1','compare'=>'=');
    }
    if($profit =="1"){
        $arg['meta_query'][] = array('key'=>'type_project_non_profit','value'=>'1','compare'=>'=');
    }

    $project = new WP_Query($arg);
    echo '<!---';
    print_r($project);
    echo '--!>';
    
?>
  <section id="browse" class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-column">
        <div class="title-section box fleft text-left">
            <h1>There are currently <?php echo $project->found_posts;?> Projects on Stir</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 no-column">
        <?php
           
            if($project->have_posts()) while($project->have_posts()): $project->the_post();
            $color = @strtolower(get('choose_a_colour'));

        ?>
        <div class="item-proj" style="background-image:url(<?php echo get('visuals_project_display');?>);">
            <div class="info bg-<?php echo $color;?>"  <?php if(empty($color)){?> style="background-color:#ef4136;"<?php } ?>>
                <span>Project <?php the_ID();?></span>
                <h4><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h4>

                <aside class="txt">
                   <?php echo get('describe_project');?>
                    <span><?php echo support_count(get_the_ID());?> Supporters</span>
                    <a href="<?php echo get_permalink();?>" class="boton-gris">view</a>
                </aside>
            </div>
        </div>
        <?php endwhile;?>
         <?php
        // pager
        if($project->max_num_pages>1){?>
            <p class="pager">
            <?php
            for($i=1;$i<=$project->max_num_pages;$i++){?>
                <a href="<?php echo get_pagenum_link($i);?>" <?php echo ($paged==$i)? 'class="active"':'';?>><?php echo $i;?></a>
                <?php
            }
            if($paged!=$project->max_num_pages){?>
                <a href="<?php get_pagenum_link($i);?>">Siguiente</a>
            <?php } ?>
            </p>
        <?php }
        remove_filter('posts_orderby', 'support_orderby_desc');


         ?>
         
    	
    </div>
    <!--proyectos-->
    
    <div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-left">
    	<p>Sort by:</p>
        
        <form method="get">
        
            <label>
                <input type="radio" name="sorter" id="radios-0" value="recent" <?php if($sorter =='recent') echo "checked";?> >
                Most recent
            </label>
            <label>
                <input type="radio" name="sorter" id="radios-0" value="supported" <?php if($sorter =='supported') echo "checked";?> >
                Most supported
            </label>
            <br><br><br><br><br>
            <label for="checkboxes-1">
                <input type="checkbox" name="service" id="checkboxes-1" value="1" <?php if(isset($service)) echo "checked";?>>
                <span>Product or Service</span>
            </label>
            <label for="checkboxes-2">
                <input type="checkbox" name="event" id="checkboxes-2" value="1" <?php if(isset($event)) echo "checked";?>>
                <span>Event or Expo</span>
            </label>
            <label for="checkboxes-3">
                <input type="checkbox" name="profit" id="checkboxes-3" value="1" <?php if(isset($profit)) echo "checked";?>>
                <span>Non-profit or Social</span>
            </label>
            
            <br><br><br><br><br>
            
            <button id="singlebutton" type="submit" class="btn btn-primary" style="background:#c2bfb8; border-radius:0; color:#000; border:none;">FILTER</button>            
                
        </form>
        
        
    </div>
    
    
    
  </section>
  

<?php get_footer(); ?>