<?php
//solo se aplica si el post personalizado es proyecto
function my_custom_fields_metabox_trabajos() {
        
	add_meta_box( 'custom-fields-metabox', 'Información sobre mis proyectos', 'my_custom_fields_trabajos', 'proyecto', 'normal', 'high' );
        
}
/*function my_custom_fields_metabox() {
  add_meta_box( 'custom-fields-metabox', 'Información relacionada Entradas', 'my_custom_fields', 'post', 'normal', 'high' );
}*/
add_action( 'add_meta_boxes', 'my_custom_fields_metabox_trabajos' );
 
function my_custom_fields_trabajos($post) {
  //si existen se recuperan los valores de los metadatos	
	$imagen_proyecto = get_post_meta($post->ID, 'imagen_proyecto', 'true');	
	$descripcion_del_proyecto = get_post_meta($post->ID, 'descripcion_del_proyecto', 'true');
 
  // Se añade un campo nonce para probarlo más adelante cuando validemos
  wp_nonce_field( 'trabajos_metabox', 'trabajos_metabox_nonce' );?>
 
  <table width="100%" cellpadding="1" cellspacing="1" border="0">
    <tr>
      <td width="20%"><strong>Imagen</strong></td>
      <td width="80%">
        <div class="custom_media_item">
			<?php
			  $display = "";
			  $media_item = get_post_meta( $post->ID, 'imagen_proyecto', true );
			  if (empty($media_item) || $media_item == "") { $display = 'display:none';}
			  $media_item_src = wp_get_attachment_url( $media_item );?> 
			  <a href="#" class="button button-primary custom_media_item_upload_trabajos">Subir imagen</a>
			  <input type="hidden" id="imagen_proyecto" name="imagen_proyecto" value="<?php echo $media_item;?>" />
			  <img src="<?php echo $media_item_src;?>" style="max-width:150px;<?php echo $display;?>" />
			  <a href="#" class="button button-primary custom_media_item_delete_trabajos" style="<?php echo $display;?>">Eliminar</a>
        </div>
      </td>
    </tr>
	<tr>
		<td width="20%"><label for="descripcion_del_proyecto" class="prfx-row-title"><strong>Descripción</strong></label></td>
		<td width="80%"><textarea name="descripcion_del_proyecto" id="descripcion_del_proyecto" style="width:99%" rows="4"><?php echo sanitize_text_field($descripcion_del_proyecto);?></textarea></td>
	</tr>
  </table>
<?php }
 
function my_custom_fields_save_data_trabajos($post_id) {
  // Comprobamos si se ha definido el nonce.
  if ( ! isset( $_POST['trabajos_metabox_nonce'] ) ) {
    return $post_id;
  }
  $nonce = $_POST['trabajos_metabox_nonce'];
  
  // Verificamos que el nonce es válido.
  if ( !wp_verify_nonce( $nonce, 'trabajos_metabox' ) ) {
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
	$old_imagen_proyecto = get_post_meta($post->ID, 'imagen_proyecto', 'true');	
	$old_descripcion_del_proyecto = get_post_meta($post->ID, 'descripcion_del_proyecto', 'true');
 
  // Saneamos lo introducido por el usuario.
 	$imagen_proyecto = sanitize_text_field( $_POST['imagen_proyecto'] );	
	$descripcion_del_proyecto = sanitize_text_field( $_POST['descripcion_del_proyecto'] );
 
  // Actualizamos el campo meta en la base de datos.
  update_post_meta( $post_id, 'imagen_proyecto', $imagen_proyecto, $old_imagen_proyecto );  
  update_post_meta( $post_id, 'descripcion_del_proyecto', $descripcion_del_proyecto, $old_descripcion_del_proyecto );
}
add_action( 'save_post', 'my_custom_fields_save_data_trabajos' );?>

