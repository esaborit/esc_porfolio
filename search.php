<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Enrique_Saborit_Crespo_|_Porfolio
 */

get_header(); ?>

	<section class="feature-image feature-image-default" data-type="background" data-speed="2">
        <h1 class="page-title"><?php printf( esc_html__( 'Resultados de buscar: %s', 'esc_porfolio' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </section>		

	<div class="container">
	    <div class="row" id="primary">	    
		    <main id="content" class="col-sm-8" role="main"> 

		<?php
		if ( have_posts() ) : ?>			

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
        <!-- SIDEBAR
        ================================================== -->
        <aside class="col-sm-4">
            <?php get_sidebar(); ?>  
        </aside>
        </div><!-- primary -->
    </div><!-- container -->
		

<?php
get_footer();