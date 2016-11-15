<?php
/**
 * Template Name: Plantilla Curriculum
 *
 * @package Enrique_Saborit_Crespo_|_Porfolio
 */

get_header(); 
?>


    <!-- FEATURE IMAGE
    ================================================== -->
    <section id="" class="feature-image feature-image-default" data-type="background" data-speed="2">
        <h1>Curriculum</h1>
    </section>

    <!-- Start Container-->
    <div class="container margenes">
      <div class="row">
            <!-- SIDEBAR
            ================================================== -->
            <?php get_template_part('template-parts/content','curriculum'); ?> 
                       
            <section class="col-sm-12 col-md-8 section1">                
                <ul id="myTab" class="nav nav-tabs">
                   <li class="active"><a href="#habilidades" data-toggle="tab"><i class="fa fa-certificate" aria-hidden="true"></i>Habilidades</a></li>
                    <li><a href="#experiencia" data-toggle="tab"><i class="fa fa-code" aria-hidden="true"></i>Experiencia laboral</a></li>
                    <li><a href="#formacion" data-toggle="tab"><i class="fa fa-graduation-cap"></i>Formación</a></li>

                </ul>
                <div id="myTabContent" class="tab-content" >
                   <div class="tab-pane fade in active" id="habilidades">
                        <div class="row">
                            <!-- =========================================
                               HABILIDADES
                            ==========================================-->
                             <?php get_template_part('template-parts/content','habilidades'); ?> 
                        </div>
                    </div>
                    <div class="tab-pane fade" id="experiencia">
                        <div class="row">
                           <!-- =========================================
                               EXPERIENCIA LABORAL
                            ==========================================-->
                            <?php get_template_part('template-parts/content','experiencia'); ?> 
                        </div>
                    </div>
                    <div class="tab-pan fade" id="formacion">
                        <div class="row">
                            <!-- =========================================
                               FORMACION ACADEMICA
                            ==========================================-->
                            <?php get_template_part('template-parts/content','formacion'); ?> 
                        </div>
                    </div>
                </div>                
            </section>
       </div><!-- fin row principal --> 
    </div><!-- fin container principal -->



<?php
get_footer();