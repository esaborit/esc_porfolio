<?php
//solo se aplica si la plantilla usada en la pagina es pagehome.php
function my_custom_fields_metabox_sobremi() {
	
	global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-home.php' )
        {
            add_meta_box( 'custom-fields-metabox', 'Información sobre mí', 'my_custom_fields_sobremi', 'page', 'normal', 'high' );
        }
    }
	
  
}
/*function my_custom_fields_metabox() {
  add_meta_box( 'custom-fields-metabox', 'Información relacionada Entradas', 'my_custom_fields', 'post', 'normal', 'high' );
}*/
add_action( 'add_meta_boxes', 'my_custom_fields_metabox_sobremi' );
 
function my_custom_fields_sobremi($post) {
  //si existen se recuperan los valores de los metadatos	
	$imagen_sobre_mi = get_post_meta($post->ID, 'imagen_sobre_mi', 'true');
	$titulo_seccion_sobre_mi = get_post_meta($post->ID, 'titulo_seccion_sobre_mi', 'true');
	$descripcion_sobre_mi = get_post_meta($post->ID, 'descripcion_sobre_mi', 'true');
 
  // Se añade un campo nonce para probarlo más adelante cuando validemos
  wp_nonce_field( 'sobremi_metabox', 'sobremi_metabox_nonce' );?>
 
  <table width="100%" cellpadding="1" cellspacing="1" border="0">
    <tr>
      <td width="20%"><strong>Imagen</strong></td>
      <td width="80%">
        <div class="custom_media_item">
			<?php
			  $display = "";
			  $media_item = get_post_meta( $post->ID, 'imagen_sobre_mi', true );
			  if (empty($media_item) || $media_item == "") { $display = 'display:none';}
			  $media_item_src = wp_get_attachment_url( $media_item );?> 
			  <a href="#" class="button button-primary custom_media_item_upload">Subir imagen</a>
			  <input type="hidden" id="imagen_sobre_mi" name="imagen_sobre_mi" value="<?php echo $media_item;?>" />
			  <img src="<?php echo $media_item_src;?>" style="max-width:150px;<?php echo $display;?>" />
			  <a href="#" class="button button-primary custom_media_item_delete" style="<?php echo $display;?>">Eliminar</a>
        </div>
      </td>
    </tr>
    <tr>
    	<td width="20%"><strong>Titulo</strong></td>
        <td width="80%"><input type="text" name="titulo_seccion_sobre_mi" value="<?php echo sanitize_text_field($titulo_seccion_sobre_mi);?>" class="large-text" placeholder="Titulo" /></td>    	
    </tr>
	<tr>
		<td width="20%"><label for="descripcion_sobre_mi" class="prfx-row-title"><strong>Descripción</strong></label></td>
		<td width="80%"><textarea name="descripcion_sobre_mi" id="descripcion_sobre_mi" style="width:99%" rows="4"><?php echo $descripcion_sobre_mi;?></textarea></td>
	</tr>
  </table>
<?php }
 
function my_custom_fields_save_data_sobremi($post_id) {
  // Comprobamos si se ha definido el nonce.
  if ( ! isset( $_POST['sobremi_metabox_nonce'] ) ) {
    return $post_id;
  }
  $nonce = $_POST['sobremi_metabox_nonce'];
  
  // Verificamos que el nonce es válido.
  if ( !wp_verify_nonce( $nonce, 'sobremi_metabox' ) ) {
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
	$old_imagen_sobre_mi = get_post_meta($post->ID, 'imagen_sobre_mi', 'true');
	$old_titulo_seccion_sobre_mi = get_post_meta($post->ID, 'titulo_seccion_sobre_mi', 'true');
	$old_descripcion_sobre_mi = get_post_meta($post->ID, 'descripcion_sobre_mi', 'true');
 
  // Saneamos lo introducido por el usuario.
 	$imagen_sobre_mi = sanitize_text_field( $_POST['imagen_sobre_mi'] );
	$titulo_seccion_sobre_mi = sanitize_text_field( $_POST['titulo_seccion_sobre_mi'] );
	$descripcion_sobre_mi = sanitize_text_field( $_POST['descripcion_sobre_mi'] );
 
  // Actualizamos el campo meta en la base de datos.
  update_post_meta( $post_id, 'imagen_sobre_mi', $imagen_sobre_mi, $old_imagen_sobre_mi );
  update_post_meta( $post_id, 'titulo_seccion_sobre_mi', $titulo_seccion_sobre_mi, $old_titulo_seccion_sobre_mi );
  update_post_meta( $post_id, 'descripcion_sobre_mi', $descripcion_sobre_mi, $old_descripcion_sobre_mi );
}
add_action( 'save_post', 'my_custom_fields_save_data_sobremi' );?>

