<!-- TRABAJOS
================================================== -->
<section id="trabajos">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Últimos proyectos</h2>
            </div>
        </div>
        <div class="row">
           <?php $loop = new WP_Query(array('post_type' => 'proyecto', 'orderby' => 'post_id', 'order' => 'ASC')); ?>
            <?php while($loop->have_posts()) : $loop->the_post();  ?>
               <div class="col-md-4 text-justify">
                  <?php //$imagen = get_field('imagen_proyecto'); ?>
                  <!--<img class="responsive-img" src="<?php //echo $imagen['url'] ;?>" alt="<?php //echo $imagen['alt']; ?>">-->
                  
                  
					<?php $imagen_proyecto = get_post_meta($post->ID, 'imagen_proyecto', 'true');
					  if(!empty($imagen_proyecto)): 
						$media_item_src = wp_get_attachment_url( $imagen_proyecto );
						echo wp_get_attachment_image( $imagen_sobre_mi, 'thumbnail' );
					?>
						<img class="responsive-img" src="<?php echo $media_item_src ; ?>" >
					<?php endif; ?>   
                  
                  
                  <p><?php //the_field('descripcion_del_proyecto');
					  echo get_post_meta($post->ID, 'descripcion_del_proyecto', 'true');
					  ?></p> 
                </div>
            <?php endwhile; wp_reset_query();?> 
        </div><!-- row -->
    </div>
</section>