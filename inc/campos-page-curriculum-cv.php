<?php
//Solo se aplica si la plantilla usada en la pagina es page-curriculum.php
function my_custom_fields_metabox_curriculum() {
	
	global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-curriculum.php' )
        {
            add_meta_box( 'custom-fields-metabox', 'Información sobre mí', 'my_custom_fields_curriculum', 'page', 'normal', 'high' );
        }
    }  
}

add_action( 'add_meta_boxes', 'my_custom_fields_metabox_curriculum' );
 
function my_custom_fields_curriculum($post) {
  //si existen se recuperan los valores de los metadatos
	$foto_curriculum = get_post_meta($post->ID, 'foto_curriculum', 'true');
	$nombre_curriculum = get_post_meta($post->ID, 'nombre_curriculum', 'true');
	$descripcion_curriculum = get_post_meta($post->ID, 'descripcion_curriculum', 'true');
	$email_curriculum = get_post_meta($post->ID, 'email_curriculum', 'true');
 
  // Se añade un campo nonce para probarlo más adelante cuando validemos
  wp_nonce_field( 'curriculum_metabox', 'curriculum_metabox_nonce' );?>
 
  <table width="100%" cellpadding="1" cellspacing="1" border="0">
    <tr>
      <td width="20%"><strong>Imagen curriculum</strong></td>
      <td width="80%">
        <div class="custom_media_item">
			<?php
			  $display = "";
			  $media_item = get_post_meta( $post->ID, 'foto_curriculum', true );
			  if (empty($media_item) || $media_item == "") { $display = 'display:none';}
			  $media_item_src = wp_get_attachment_url( $media_item );?> 
			  <a href="#" class="button button-primary custom_media_item_upload">Subir imagen</a>
			  <input type="hidden" id="foto_curriculum" name="foto_curriculum" value="<?php echo $media_item;?>" />
			  <img src="<?php echo $media_item_src;?>" style="max-width:150px;<?php echo $display;?>" />
			  <a href="#" class="button button-primary custom_media_item_delete" style="<?php echo $display;?>">Eliminar</a>
        </div>
      </td>
    </tr>
    <tr>
    	<td width="20%"><strong>Nombre</strong></td>
        <td width="80%"><input type="text" name="nombre_curriculum" value="<?php echo sanitize_text_field($nombre_curriculum);?>" class="large-text" placeholder="Nombre completo" /></td>    	
    </tr>
	<tr>
		<td width="20%"><label for="descripcion_curriculum" class="prfx-row-title"><strong>Descripción</strong></label></td>
		<td width="80%"><textarea name="descripcion_curriculum" id="descripcion_curriculum" style="width:99%" rows="4"><?php echo $descripcion_curriculum;?></textarea></td>
	</tr>
	    <tr>
    	<td width="20%"><strong>email</strong></td>
        <td width="80%"><input type="email" name="email_curriculum" value="<?php echo sanitize_email($email_curriculum);?>" class="large-text" placeholder="correo electronico" /></td>    	
    </tr>
  </table>
<?php }
 
function my_custom_fields_save_data_curriculum($post_id) {
  // Comprobamos si se ha definido el nonce.
  if ( ! isset( $_POST['curriculum_metabox_nonce'] ) ) {
    return $post_id;
  }
  $nonce = $_POST['curriculum_metabox_nonce'];
  
  // Verificamos que el nonce es válido.
  if ( !wp_verify_nonce( $nonce, 'curriculum_metabox' ) ) {
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
	$old_foto_curriculum = get_post_meta($post->ID, 'foto_curriculum', 'true');
	$old_nombre_curriculum = get_post_meta($post->ID, 'nombre_curriculum', 'true');
	$old_descripcion_curriculum = get_post_meta($post->ID, 'descripcion_curriculum', 'true');
	$old_email_curriculum = get_post_meta($post->ID, 'email_curriculum', 'true');
 
  // Saneamos lo introducido por el usuario.	
	$foto_curriculum = sanitize_text_field( $_POST['foto_curriculum'] );
	$nombre_curriculum = sanitize_text_field( $_POST['nombre_curriculum'] );
	$descripcion_curriculum = sanitize_text_field( $_POST['descripcion_curriculum'] );
	$email_curriculum = sanitize_email( $_POST['email_curriculum']);
 
  // Actualizamos el campo meta en la base de datos.
	update_post_meta( $post_id, 'foto_curriculum', $foto_curriculum, $old_foto_curriculum );
	update_post_meta( $post_id, 'nombre_curriculum', $nombre_curriculum, $old_nombre_curriculum );
	update_post_meta( $post_id, 'descripcion_curriculum', $descripcion_curriculum, $old_descripcion_curriculum );
	update_post_meta( $post_id, 'email_curriculum', $email_curriculum, $old_email_curriculum );
}
add_action( 'save_post', 'my_custom_fields_save_data_curriculum' );?>

