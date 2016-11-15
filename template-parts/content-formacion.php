<!-- =========================================  
   FORMACION ACADEMICA
==========================================-->
<div class="section-wrapper z-depth-1">                  
    <div class="custom-content col-sm-12 col-md-12 col-lg-12 wow fadeIn a1" data-wow-delay="0.1s" >
       <?php $loop = new WP_Query(array('post_type' => 'formacion', 'orderby' => 'post_id', 'order' => 'ASC')); ?>
        <?php while($loop->have_posts()) : $loop->the_post();  ?> 
            <div class="custom-content-wrapper wow fadeIn a3" data-wow-delay="0.3s" >
                <h3><?php the_title(); ?></h3>
                <h3><span>@ <?php echo get_post_meta($post->ID, 'organizacion_formacion', 'true'); ?></span></h3>
                <span><?php echo get_post_meta($post->ID, 'fecha_formacion_ini', 'true'); ?> - <?php echo get_post_meta($post->ID, 'fecha_formacion_fin', 'true'); ?></span>
                <p><?php echo get_post_meta($post->ID, 'descripcion_formacion', 'true'); ?></p>
            </div>
        <?php endwhile; wp_reset_query();?>
    </div>
</div> 