<?php
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => __( 'Proyectos', 'wp_pruebas' ),
		"singular_name" => __( 'proyecto', 'wp_pruebas' ),
		"menu_name" => __( 'Mis Proyectos', 'wp_pruebas' ),
		"all_items" => __( 'Todos los proyectos', 'wp_pruebas' ),
		"add_new" => __( 'Añade un proyecto', 'wp_pruebas' ),
		"edit_item" => __( 'Editar proyecto', 'wp_pruebas' ),
		"search_items" => __( 'Buscar proyectos', 'wp_pruebas' ),
		);

	$args = array(
		"label" => __( 'Proyectos', 'wp_pruebas' ),
		"labels" => $labels,
		"description" => "Espacio reservado para la publicación de proyectos desarrollados.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "proyecto", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title" ),					);
	register_post_type( "proyecto", $args );

	$labels = array(
		"name" => __( 'Habilidades', 'wp_pruebas' ),
		"singular_name" => __( 'Habilidad', 'wp_pruebas' ),
		"menu_name" => __( 'Habilidades', 'wp_pruebas' ),
		"all_items" => __( 'Todas las habilidades', 'wp_pruebas' ),
		"add_new" => __( 'Añade una habilidad', 'wp_pruebas' ),
		"add_new_item" => __( 'Añade una habilidad', 'wp_pruebas' ),
		"edit_item" => __( 'editar habilidad', 'wp_pruebas' ),
		"new_item" => __( 'Nueva habilidad', 'wp_pruebas' ),
		"view_item" => __( 'Ver habilidad', 'wp_pruebas' ),
		"search_items" => __( 'Buscar habilidad', 'wp_pruebas' ),
		"not_found" => __( 'No se encuentra la habilidad', 'wp_pruebas' ),
		);

	$args = array(
		"label" => __( 'Habilidades', 'wp_pruebas' ),
		"labels" => $labels,
		"description" => "Habilidades profesionales que se poseen y se quieren destacar.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "habilidades", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title" ),					);
	register_post_type( "habilidades", $args );

	$labels = array(
		"name" => __( 'Experiencias', 'wp_pruebas' ),
		"singular_name" => __( 'experiencia', 'wp_pruebas' ),
		"menu_name" => __( 'Experiencia', 'wp_pruebas' ),
		"all_items" => __( 'Todas las experiencias', 'wp_pruebas' ),
		"add_new" => __( 'Añadir experiencia', 'wp_pruebas' ),
		"add_new_item" => __( 'Añadir experiencia', 'wp_pruebas' ),
		"edit_item" => __( 'Editar experiencia', 'wp_pruebas' ),
		"search_items" => __( 'Buscar experiencia', 'wp_pruebas' ),
		);

	$args = array(
		"label" => __( 'Experiencias', 'wp_pruebas' ),
		"labels" => $labels,
		"description" => "Experiencia profesional o laboral que quiera ser resaltada.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "experiencia", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title" ),					);
	register_post_type( "experiencia", $args );

	$labels = array(
		"name" => __( 'Formaciones', 'wp_pruebas' ),
		"singular_name" => __( 'Formación', 'wp_pruebas' ),
		"menu_name" => __( 'Formación', 'wp_pruebas' ),
		"all_items" => __( 'Toda la formación', 'wp_pruebas' ),
		"add_new" => __( 'Añadir formación', 'wp_pruebas' ),
		"add_new_item" => __( 'Añadir formación', 'wp_pruebas' ),
		"edit_item" => __( 'Eitar formación', 'wp_pruebas' ),
		"search_items" => __( 'Buscar formación', 'wp_pruebas' ),
		);

	$args = array(
		"label" => __( 'Formaciones', 'wp_pruebas' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "formacion", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title" ),					);
	register_post_type( "formacion", $args );

// End of cptui_register_my_cpts()
}
