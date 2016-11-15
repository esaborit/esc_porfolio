<?php
/**
 * Template Name: Home Page
 *
 * @package Enrique_Saborit_Crespo_|_Porfolio
 */

get_header(); 
?>

<!-- BANNER
================================================== -->
<?php get_template_part('template-parts/content','banner'); ?>  

<!-- TRABAJOS
================================================== -->
<?php get_template_part('template-parts/content','trabajos'); ?> 

<!-- SOBRE MI
================================================== -->
<?php get_template_part('template-parts/content','sobremi'); ?> 


<?php
get_footer();
?>