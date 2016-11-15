<?php

//Variables cumstonfields banner
//$titulo_banner = get_field('titulo_banner');
//$descripcion_banner = get_field('descripcion-banner');
//$linkedin_banner = get_field('linkedin_banner');
//$contacto_banner = get_field('contacto_banner');
//$github_banner = get_field('github_banner');
$titulo_banner = get_post_meta( $post->ID, 'titulo_banner', true );
$descripcion_banner = get_post_meta( $post->ID, 'descripcion_banner', true );
$linkedin_banner = get_post_meta( $post->ID, 'linkedin_banner', true );
$contacto_banner = get_post_meta( $post->ID, 'contacto_banner', true );
$github_banner = get_post_meta( $post->ID, 'github_banner', true );
?>


<!-- BANNER
================================================== -->
<section id="banner">
    <div class="inner">
        <h2><?php echo $titulo_banner; ?></h2>
        <h3><?php echo $descripcion_banner; ?></h3>
        <!--<p>site template freebie<br />
        crafted by <a href="http://html5up.net">Enrique Saborit</a>.</p>
        <!--<ul class="actions">
            <li><a href="#" class="button special">Activate</a></li>
        </ul>-->
    </div>
    <div class="container">
       <div class="row">
           <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
              <!--<h2>HOLA</h2>-->
               <a href="<?php echo $linkedin_banner ?>" class="badge social linkedin media animated slideInLeft"><i class="fa fa-linkedin" aria-hidden="true"></i></a>                   
                <a href="<?php echo $contacto_banner; ?>" class="badge social email media animated slideInUp" target="_blank"><i class="fa fa-envelope-o"></i></a>
                <a href="<?php echo $github_banner; ?>" class="badge social github media animated slideInRight" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
           </div>
       </div>
       <div class="row">
           <a href="#sobreMis" class="btn btn-circle page-scroll"><i class="fa fa-angle-double-down animated"></i></a>
       </div>            
    </div>
    <!--<a href="#one" class="more scrolly">Learn More</a>-->

</section>