<?php
//variables customfields curriculum
//$foto_curriculum = get_field('foto_curriculum'); //get_field() entrega un array con los parametros de la imagen
//$nombre_curriculum = get_field('nombre_curriculum');
//$descripcion_curriculum = get_field('descripcion_curriculum');
//$email_curriculum = get_field('email_curriculum');
$foto_curriculum = get_post_meta($post->ID, 'foto_curriculum', 'true');
$nombre_curriculum = get_post_meta($post->ID, 'nombre_curriculum', 'true');
$descripcion_curriculum = get_post_meta($post->ID, 'descripcion_curriculum', 'true');
$email_curriculum = get_post_meta($post->ID, 'email_curriculum', 'true');
?>


<!-- =========================================
           SIDEBAR   
==========================================-->
<!-- Start Sidebar -->
<aside class=" col-md-4 col-sm-12 sidebar z-depth-1" id="sidebar">
    <!--  Sidebar row -->
    <div class="row">                      
        <!--  top section   -->
        <div class="heading">                            
            <!-- ====================
                      IMAGE   
            ==========================-->
            <div class="feature-img1">
                <!--<a href="index.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Foto.jpg" class="responsive-img img-circle" alt=""></a> -->
                <!-- If user uploaded an image -->
                <?php  //if(!empty($foto_curriculum)): ?>
                    <!--<img src="<?php  //echo $foto_curriculum['url']; ?>" alt="<?php //echo $foto_curriculum['alt']  ?>" class="responsive-img img-circle"> -->
                <?php //endif; ?>                
                
				<?php  if(!empty($foto_curriculum)): 
					$media_item_src = wp_get_attachment_url( $foto_curriculum ); ?>
					<img src="<?php  echo $media_item_src; ?>" class="responsive-img img-circle">
				<?php endif; ?> 
            </div> 
        </div>
         <!-- sidebar info -->
        <div class="col-lg-12 col-md-12 col-sm-12 sort-info sidebar-item">
            <div class="row fade in">                               
                <!--<div class="col-md-3 col-sm-12 col-lg-3 icon">
                   <i class="fa fa-user"></i>
                </div> -->                               
                <div class="col-md-12 col-sm-12 col-lg-12 info wow fadeIn a1" data-wow-delay="0.1s" > <!-- text -->
                    <div class="section-item-details">
                       <h3><?php echo $nombre_curriculum; ?></h3> 
                        <p><?php echo $descripcion_curriculum; ?> </p>
                    </div>             
                </div>
            </div>         
        </div>

        <!--  EMAIL -->
        <div class="col-lg-12 col-md-12 col-sm-12  email sidebar-item ">
            <div class="row">                                
                <div class="col-md-3 col-sm-12 col-lg-3 icon">
                    <i class="fa fa-envelope"></i> <!-- icon -->
                </div>                                
                <div class="col-md-9 col-sm-12 col-lg-9 info-email wow fadeIn a3" data-wow-delay="0.3s">
                    <div>
                        <div class="personal">                                    
                            <h4><a href="mailto:someone@example.com"><?php echo $email_curriculum; ?></a></h4> <!-- Email -->
                            <span>contacto</span> 
                        </div>                                        
                    </div>
                </div> 
            </div>          
        </div>
    </div>   <!-- end row -->
</aside>