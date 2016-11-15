<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Enrique_Saborit_Crespo_|_Porfolio
 */

get_header(); ?>
    
<section class="feature-image feature-image-default" data-type="background" data-speed="2">
    <h1 class="page-title">¡Lo sentimos, no encontramos la página! </h1>
</section>

<div class="container">
    <div id="primary" class="row">
        <main id="content" class="col-sm-8">
            <div class="error-404 not-found">
                <div class="page-content">
                    <h2>No se preocupe trataremos de ayudarle</h2>
                    <!-- FEATURE IMAGE
                    ================================================== -->
                    <h3>Apuntes</h3>
                    <p>¿Quizás esté buscando una entrada reciente?</p>
                    <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; //end of the loop ?>

                    <?php $loop = new WP_Query(array('post_type' => 'post' , 'orderby' => 'post_id', 'order' => 'ASC')); ?>

                    <hr>

                    <div class="resource-row clearfix">
                       <?php while( $loop->have_posts()) : $loop->the_post(); ?>
                            <div class="resource">                           

                                <?php if(has_post_thumbnail()) { // check for feature image ?>
                                <div class="post-image">
                                    <?php the_post_thumbnail(); ?>
                                </div><!-- post-image -->
                                <?php } ?>

                                <h3><a href="<?php esc_url( get_permalink() ) ?>"><?php the_title(); ?></a></h3>

                                <?php the_excerpt(); ?>
                                
                            </div>
                        <?php endwhile; wp_reset_query(); ?>         
                    </div> <!-- resource-row --> 
                    
                    <!-- CATEGORIAS
                    ================================================== -->
                    <h3>Categorias</h3>
                    <p>...o quizas alguna categoría?</p>
                    
                    <div class="widget widget_categories">
                        <h4 class="widget-title">Categorías mas populares</h4>
                        <ul>
                            <?php wp_list_categories( array(
                                    
                                    'orderby'   => 'count',
                                    'order'     => 'DESC',
                                    'show_count'=> '1',
                                    'title_li'  => '',
                                    'number'    => 10
                                    )); 
                            ?>
                        </ul>
                    </div><!-- .widget -->
                    <!-- ARCHIVOS
                    ================================================== -->
                    <h3>Archivos</h3>
                    <p>..o entre nuestros archivos</p>
                    <?php the_widget('WP_Widget_Archives', 'title=Nuestros Archivos', 'before_title=<h4 class="widget_title">&after_title=</h4>'); ?>
                    
                    <p>...o, simplemente quiera volver a la <a href="<?php echo esc_url(home_url('/')); ?>">página de inicio</a>.</p>
                    
                </div><!-- .page-content -->
            </div><!-- .error-404 -->
        </main><!-- #content -->
        <!-- SIDEBAR
        ================================================== -->
        <aside class="col-sm-4">
            <?php get_sidebar(); ?>
        </aside>
    </div><!-- #primary -->
</div><!-- .container -->

	

<?php
get_footer();
