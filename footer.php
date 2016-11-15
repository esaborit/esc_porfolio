<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enrique_Saborit_Crespo_|_Porfolio
 */

?>

<?php wp_footer(); ?>

    <!-- FOOTER
    ================================================== -->
    <footer>
        <div class="container text-center ">			
            <p>Copyright &copy; Enrique Saborit Crespo 2016.</p>			
        </div><!-- container -->
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory');  ?>/assets/js/jquery-2.1.3.min.js"></script>
        <script src="<?php bloginfo('template_directory');  ?>/assets/js/bootstrap.min.js"></script>

        <scrip src="<?php bloginfo('template_directory');  ?>/assets/js/jquery.easing.min.js"></scrip>
        <!-- Bootstrap TabCollapse-->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap-tabcollapse.js" type="text/javascript"></script>
        
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="<?php bloginfo('template_directory');  ?>/assets/js/main.js"></script>
        <script src="<?php bloginfo('template_directory');  ?>/assets/js/menu.js"></script>
        <script src="<?php bloginfo('template_directory');  ?>/assets/js/mapa.js"></script>
        
        <script type="text/javascript">
        $('button').on('click', function(){
            alert('preserve attached java script data!');
        });
        $('#myTab').tabCollapse();
    </script>
    
  </div>

</body>
</html>
