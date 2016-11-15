<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enrique_Saborit_Crespo_|_Porfolio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Bootstrap core CSS -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

<!-- animate CSS -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/animate.css" rel="stylesheet">

<!-- Font Awesome Icons -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'esc_porfolio' ); ?></a>

<!-- HEADER
================================================== -->
	<header id="header" class="alt">
    <!-- NAVBAR
	================================================== -->
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
				<div class="navbar-header" >
					  <a class="navbar-brand" href="#">
						<span id="abrir">MENU <i class="fa fa-bars" aria-hidden="true"></i></span>						
					  </a>
				</div>
				<span class="nombre">Enrique Saborit Crespo</span>
				<?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'			=> 'div',
                        'container_id'		=> 'mySidenav',
                        'container_class'	=> 'sidenav',
                        'items_wrap'     => '<a href="javascript:void(0)" class="closebtn" ><i class="fa fa-times-circle" aria-hidden="true"></i></a><ul><li id="item-id"></li>%3$s</ul>'
                    ));
                ?>

		  </div>
		</nav><!-- /navbar -->
	</header>
	<div id="opaco">

