<?php
//solo se aplica si el post personalizado es formacion
function my_custom_fields_metabox_formacion() {
        
	add_meta_box( 'custom-fields-metabox', 'Información sobre formación profesional', 'my_custom_fields_formacion', 'formacion', 'normal', 'high' );
        
}

add_action( 'add_meta_boxes', 'my_custom_fields_metabox_formacion' );
 
function my_custom_fields_formacion($post) {
  //si existen se recuperan los valores de los metadatos
	$organizacion_formacion = get_post_meta($post->ID, 'organizacion_formacion', 'true');
	$fecha_formacion_ini = get_post_meta($post->ID, 'fecha_formacion_ini', 'true');
	$fecha_formacion_fin = get_post_meta($post->ID, 'fecha_formacion_fin', 'true');
	$descripcion_formacion = get_post_meta($post->ID, 'descripcion_formacion', 'true');
 
  // Se añade un campo nonce para probarlo más adelante cuando validemos
  wp_nonce_field( 'formacion_metabox', 'formacion_metabox_nonce' );?>
 
  <table width="100%" cellpadding="1" cellspacing="1" border="0">
	<tr>
    	<td width="10%"><strong>Organización</strong></td>
        <td width="40%"><input type="text" name="organizacion_formacion" value="<?php echo sanitize_text_field($organizacion_formacion);?>" class="large-text" placeholder="Nombre de la organización" /></td>
        <td></td>
        <td></td>    	
    </tr>
	<tr>
    	<td width="10%"><strong>Fecha inicio</strong></td>
        <td width="40%"><input type="text" name="fecha_formacion_ini" value="<?php echo sanitize_text_field($fecha_formacion_ini);?>" class="large-text date_picker" placeholder="Fecha de inicio" /></td>
        <td width="10%"><strong>Fecha fin</strong></td>
        <td width="40%"><input type="text" name="fecha_formacion_fin" value="<?php echo sanitize_text_field($fecha_formacion_fin);?>" class="large-text date_picker" placeholder="Fecha final" /></td>  	
    </tr>
	<tr>
		<td width="10%"><label for="descripcion_formacion" class="prfx-row-title"><strong>Descripción</strong></label></td>
		<td width="40%"><textarea name="descripcion_formacion" id="descripcion_formacion" style="width:99%" rows="4" placeholder="Describe los contenidos pricipales de la formacion recibida"><?php echo sanitize_text_field($descripcion_formacion);?></textarea></td>
		<d></d>
		<d></d>
	</tr>
  </table>
<?php }
 
function my_custom_fields_save_data_formacion($post_id) {
  // Comprobamos si se ha definido el nonce.
  if ( ! isset( $_POST['formacion_metabox_nonce'] ) ) {
    return $post_id;
  }
  $nonce = $_POST['formacion_metabox_nonce'];
  
  // Verificamos que el nonce es válido.
  if ( !wp_verify_nonce( $nonce, 'formacion_metabox' ) ) {
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
	$old_organizacion_formacion = get_post_meta($post->ID, 'organizacion_formacion', 'true');
	$old_fecha_formacion_ini = get_post_meta($post->ID, 'fecha_formacion_ini', 'true');
	$old_fecha_formacion_fin = get_post_meta($post->ID, 'fecha_formacion_fin', 'true');
	$old_descripcion_formacion = get_post_meta($post->ID, 'descripcion_formacion', 'true');
 
  // Saneamos lo introducido por el usuario. 	
	$organizacion_formacion = sanitize_text_field($_POST['organizacion_formacion']);
	$fecha_formacion_ini = sanitize_text_field($_POST['fecha_formacion_ini']);
	$fecha_formacion_fin = sanitize_text_field($_POST['fecha_formacion_fin']);
	$descripcion_formacion = sanitize_text_field($_POST['descripcion_formacion']);
 
  // Actualizamos el campo meta en la base de datos. 
	update_post_meta( $post_id, 'organizacion_formacion', $organizacion_formacion, $old_organizacion_formacion );
	update_post_meta( $post_id, 'fecha_formacion_ini', $fecha_formacion_ini, $old_fecha_formacion_ini );
	update_post_meta( $post_id, 'fecha_formacion_fin', $fecha_formacion_fin, $old_fecha_formacion_fin );
	update_post_meta( $post_id, 'descripcion_formacion', $descripcion_formacion, $ols_descripcion_formacion );
}
add_action( 'save_post', 'my_custom_fields_save_data_formacion' );?>

