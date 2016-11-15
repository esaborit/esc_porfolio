<!-- =========================================
   HABILIDADES PROFESIONALES
==========================================-->
<div class="section-wrapper z-depth-1">                           

    <div class="skill-line col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.1s"> 
        <?php $loop = new WP_Query(array('post_type' => 'habilidades', 'orderby' => 'post_id', 'order' => 'ASC')); ?>
        <?php while($loop->have_posts()) : $loop->the_post();  ?>                                                       
            <span><?php the_title(); ?></span>                                    
            <div class="progress">
                <!--<div class="determinate" style="width: <?php //the_field('grado_habilidad'); ?>%; "><li class="fa fa-circle"></li></div>-->
                <div class="determinate" style="width: <?php echo get_post_meta($post->ID, 'grado_habilidad', 'true'); ?>%; "><li class="fa fa-circle"></li></div>
            </div>                                            
        <?php endwhile; wp_reset_query();?> 
    </div>                          
</div> 