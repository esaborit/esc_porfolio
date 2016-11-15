<?php
//solo se aplica si el post personalizado es experiencia
function my_custom_fields_metabox_experiencia() {
        
	add_meta_box( 'custom-fields-metabox', 'Información sobre experiencia profesional', 'my_custom_fields_experiencia', 'experiencia', 'normal', 'high' );
        
}

add_action( 'add_meta_boxes', 'my_custom_fields_metabox_experiencia' );
 
function my_custom_fields_experiencia($post) {
  //si existen se recuperan los valores de los metadatos
	$organizacion_profesional = get_post_meta($post->ID, 'organizacion_profesional', 'true');
	$fecha_profesional_ini = get_post_meta($post->ID, 'fecha_profesional_ini', 'true');
	$fecha_profesional_fin = get_post_meta($post->ID, 'fecha_profesional_fin', 'true');
	$descripcion_profesional = get_post_meta($post->ID, 'descripcion_profesional', 'true');
 
  // Se añade un campo nonce para probarlo más adelante cuando validemos
  wp_nonce_field( 'experiencia_metabox', 'experiencia_metabox_nonce' );?>
 
  <table width="100%" cellpadding="1" cellspacing="1" border="0">
	<tr>
    	<td width="10%"><strong>Organización</strong></td>
        <td width="40%"><input type="text" name="organizacion_profesional" value="<?php echo sanitize_text_field($organizacion_profesional);?>" class="large-text" placeholder="Nombre de la organización" /></td>
        <td></td>
        <td></td>    	
    </tr>
	<tr>
    	<td width="10%"><strong>Fecha inicio</strong></td>
        <td width="40%"><input type="text" name="fecha_profesional_ini" value="<?php echo sanitize_text_field($fecha_profesional_ini);?>" class="large-text date_picker" placeholder="Fecha de inicio" /></td>
        <td width="10%"><strong>Fecha fin</strong></td>
        <td width="40%"><input type="text" name="fecha_profesional_fin" value="<?php echo sanitize_text_field($fecha_profesional_fin);?>" class="large-text date_picker" placeholder="Fecha final" /></td>  	
    </tr>
	<tr>
		<td width="10%"><label for="descripcion_del_proyecto" class="prfx-row-title"><strong>Descripción</strong></label></td>
		<td width="40%"><textarea name="descripcion_profesional" id="descripcion_profesional" style="width:99%" rows="4" placeholder="Describe las funciones y responsabilidades desempeñadas en el puesto de trabajo"><?php echo sanitize_text_field($descripcion_profesional);?></textarea></td>
		<d></d>
		<d></d>
	</tr>
  </table>
<?php }
 
function my_custom_fields_save_data_experiencia($post_id) {
  // Comprobamos si se ha definido el nonce.
  if ( ! isset( $_POST['experiencia_metabox_nonce'] ) ) {
    return $post_id;
  }
  $nonce = $_POST['experiencia_metabox_nonce'];
  
  // Verificamos que el nonce es válido.
  if ( !wp_verify_nonce( $nonce, 'experiencia_metabox' ) ) {
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
	$old_organizacion_profesional = get_post_meta($post->ID, 'organizacion_profesional', 'true');
	$old_fecha_profesional_ini = get_post_meta($post->ID, 'fecha_profesional_ini', 'true');
	$old_fecha_profesional_fin = get_post_meta($post->ID, 'fecha_profesional_fin', 'true');
	$old_descripcion_profesional = get_post_meta($post->ID, 'descripcion_profesional', 'true');
 
  // Saneamos lo introducido por el usuario. 	
	$organizacion_profesional = sanitize_text_field($_POST['organizacion_profesional']);
	$fecha_profesional_ini = sanitize_text_field($_POST['fecha_profesional_ini']);
	$fecha_profesional_fin = sanitize_text_field($_POST['fecha_profesional_fin']);
	$descripcion_profesional = sanitize_text_field($_POST['descripcion_profesional']);
 
  // Actualizamos el campo meta en la base de datos. 
	update_post_meta( $post_id, 'organizacion_profesional', $organizacion_profesional, $old_organizacion_profesional );
	update_post_meta( $post_id, 'fecha_profesional_ini', $fecha_profesional_ini, $old_fecha_profesional_ini );
	update_post_meta( $post_id, 'fecha_profesional_fin', $fecha_profesional_fin, $old_fecha_profesional_fin );
	update_post_meta( $post_id, 'descripcion_profesional', $descripcion_profesional, $ols_descripcion_profesional );
}
add_action( 'save_post', 'my_custom_fields_save_data_experiencia' );?>

