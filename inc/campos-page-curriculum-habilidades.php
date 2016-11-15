<?php
//Solo se aplica si el post personalizado es habilidades
function my_custom_fields_metabox_habilidades() {        
	add_meta_box( 'custom-fields-metabox', 'Información sobre mis habilidades', 'my_custom_fields_habilidades', 'habilidades', 'normal', 'high' );        
}

add_action( 'add_meta_boxes', 'my_custom_fields_metabox_habilidades' );
 
function my_custom_fields_habilidades($post) {
	//Defino en un array los valores posibles del grado de habilidad
	$array_habilidades = array("--", "10", "15", "20", "25", "30", "35", "40", "45", "50", "55", "60", "65", "70", "75", "80", "85", "90", "95", "100");
  //si existen se recuperan los valores de los metadatos	
	$grado_habilidad = get_post_meta($post->ID, 'grado_habilidad', 'true'); 
	// Se añade un campo nonce para probarlo más adelante cuando validemos
	wp_nonce_field( 'habilidades_metabox', 'habilidades_metabox_nonce' );	
?>
 
  <table width="100%" cellpadding="1" cellspacing="1" border="0">
	<tr>
		<td width="20%"><strong>Grado de conocimiento (%)</strong></td>
		<td width="80%">
			<select name="grado_habilidad" class="postform">
			<?php foreach ($array_habilidades as $key => $habilidad) {?>
			  <!--<option value="<?php //echo ($key);?>" <?php //if ($grado_habilidad == $key){?>selected="selected"<?php //}?>><?php //echo $habilidad;?></option>-->
			  <option value="<?php echo ($habilidad);?>" <?php if ($grado_habilidad == $habilidad){?>selected="selected"<?php }?>><?php echo $habilidad;?></option>
			<?php }?>
			</select>
		</td>
	</tr>
  </table>
<?php }
 
function my_custom_fields_save_data_habilidades($post_id) {
  // Comprobamos si se ha definido el nonce.
  if ( ! isset( $_POST['habilidades_metabox_nonce'] ) ) {
    return $post_id;
  }
  $nonce = $_POST['habilidades_metabox_nonce'];
  
  // Verificamos que el nonce es válido.
  if ( !wp_verify_nonce( $nonce, 'habilidades_metabox' ) ) {
    return $post_id;
  }
 
  // Si es un autoguardado nuestro formulario no se enviará, ya que aún no queremos hacer nada.
  if ( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return $post_id;
  }
 
  // Comprobamos los permisos de usuario.
  if ( $_POST['post_type'] == 'page' ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
  
  // Vale, ya es seguro que guardemos los datos.
  
  // Si existen entradas antiguas las recuperamos		
 	$old_grado_habilidad = get_post_meta($post->ID, 'grado_habilidad', 'true');

  // Saneamos lo introducido por el usuario. 		
	$grado_habilidad = sanitize_text_field( $_POST['grado_habilidad'] );
 
  // Actualizamos el campo meta en la base de datos.   
  update_post_meta( $post_id, 'grado_habilidad', $grado_habilidad, $old_grado_habilidad );
}
add_action( 'save_post', 'my_custom_fields_save_data_habilidades' );?>

