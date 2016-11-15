<?php
/**
 * Enrique Saborit Crespo | Porfolio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Enrique_Saborit_Crespo_|_Porfolio
 */

if ( ! function_exists( 'esc_porfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function esc_porfolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Enrique Saborit Crespo | Porfolio, use a find and replace
	 * to change 'esc_porfolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'esc_porfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'esc_porfolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'esc_porfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'esc_porfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function esc_porfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'esc_porfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'esc_porfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function esc_porfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'esc_porfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'esc_porfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'esc_porfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function esc_porfolio_scripts() {
	wp_enqueue_style( 'esc_porfolio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'esc_porfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'esc_porfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'esc_porfolio_scripts' );


/**

*Enqueue admin scripts and styles
*/
function wptuts53021_load_admin_script( $hook ){   
    
   
	/*global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'proyecto' === $post->post_type ) {     
            //wp_enqueue_script(  'myscript', get_stylesheet_directory_uri().'/js/myscript.js' );
			wp_enqueue_script('wptuts53021_script',get_template_directory_uri().'/js/custom-fields.js', array('jquery') );
        }
    }*/
	
	//  if( 'edit.php' != $hook )
    //    return;
	
	
	// Para evitar el error wp.media is undefined al añadir imagenes en entradas personalizadas en el panel de administracion
    wp_enqueue_media();
    //Agregamos la librería datepicker    
    wp_enqueue_script( 'jquery-ui-datepicker' );
    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );

    //Agregamos la librería colorpicker y estilos
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script('wptuts53021_script',get_template_directory_uri().'/js/custom-fields.js', array('jquery') );
}
add_action('admin_enqueue_scripts','wptuts53021_load_admin_script');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom  post entradas personalizadas.
 */
require get_template_directory() . '/inc/entradas.php';

/**
 * Custom  post campos personalizados banner page-home.
 */
require get_template_directory() . '/inc/campos-page-home-banner.php';

/**
 * Custom  post campos personalizados sobremi page-home.
 */
require get_template_directory() . '/inc/campos-page-home-sobremi.php';

/**
 * Custom  post campos personalizados trabajos page-home.
 */
require get_template_directory() . '/inc/campos-page-home-trabajos.php';

/**
 * Custom  post campos personalizados cv page-curriculum.
 */
require get_template_directory() . '/inc/campos-page-curriculum-cv.php';

/**
 * Custom  post campos personalizados habilidades page-curriculum.
 */
require get_template_directory() . '/inc/campos-page-curriculum-habilidades.php';

/**
 * Custom  post campos personalizados experiencia page-curriculum.
 */
require get_template_directory() . '/inc/campos-page-curriculum-experiencia.php';

/**
 * Custom  post campos personalizados formación page-curriculum.
 */
require get_template_directory() . '/inc/campos-page-curriculum-formacion.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load paginacion bootstrap.
 */
require get_template_directory() . '/inc/wp_bootstrap_pagination.php';

/**
 * Replaces the excerpt "more" text by a link.
 */
function new_excerpt_more($more) {
    global $post;
	return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> continue leyendo &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');




 function quita_cajas_editor() {
if( current_user_can('manage_options') ) {
remove_meta_box( 'authordiv','page','normal' ); // Autor
remove_meta_box( 'commentstatusdiv','page','normal' ); // Estado de comentarios
remove_meta_box( 'commentsdiv','page','normal' ); // Comentarios
remove_meta_box( 'post custom','page','normal' ); // Campos personalizados
remove_meta_box( 'postexcerpt','page','normal' ); // Extracto
remove_meta_box( 'revisionsdiv','page','normal' ); // Revisiones
remove_meta_box( 'slugdiv','page','normal' ); // Slug
remove_meta_box( 'trackbacksdiv','page','normal' ); // Trackback
}}
add_action('admin_menu', 'quita_cajas_editor' );


















