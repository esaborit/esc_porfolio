<?php
//variables customfields quien soy
//$imagen_sobre_mi = get_field('imagen_sobre_mi');
//$titulo_seccion_sobre_mi = get_field('titulo_seccion_sobre_mi');
//$descripcion_sobre_mi = get_field('descripcion_sobre_mi');
$imagen_sobre_mi = get_post_meta($post->ID, 'imagen_sobre_mi', 'true');
$titulo_seccion_sobre_mi = get_post_meta($post->ID, 'titulo_seccion_sobre_mi', 'true');
$descripcion_sobre_mi = get_post_meta($post->ID, 'descripcion_sobre_mi', 'true');
?>


<!-- SOBRE MI
================================================== -->
<section id="sobreMi" class="emerald">
    <div class="container">
      <div class="row">
            <div class="col-md-8">
                <a name="sobreMis"></a>
                <h2><?php echo $titulo_seccion_sobre_mi; ?></h2>
            </div>
        </div>
        <div class="row">
           <div class="col-md-4">
            <!-- If user uploaded an image -->              
               <?php  if(!empty($imagen_sobre_mi)): 
			   		$media_item_src = wp_get_attachment_url( $imagen_sobre_mi );
			   		echo wp_get_attachment_image( $imagen_sobre_mi, 'thumbnail' );//esto es solo una prueba
			   ?>
                    <img src="<?php  echo $media_item_src ; ?>" >
                <?php endif; ?>                
            </div>
            <div class="col-md-8 text-justify">
               <?php echo $descripcion_sobre_mi; echo $imagen_sobre_mi;?>              
            </div>                
        </div>                       
    </div>
</section><!--/#SOBRE MI-->