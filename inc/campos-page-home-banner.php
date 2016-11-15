
<?php
//solo se aplica si la plantilla usada en la pagina es pagehome.php
function my_custom_fields_metabox_banner() {
	
	global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-home.php' )
        {
            add_meta_box( 'provider-metabox', 'Información de presentación de la página', 'my_custom_fields_banner', 'page', 'normal', 'high' );
        }
    }
	
  
}
add_action( 'add_meta_boxes', 'my_custom_fields_metabox_banner' );

 
function my_custom_fields_banner($post) {
    //si existen se recuperan los valores de los metadatos
	$titulo_banner = get_post_meta( $post->ID, 'titulo_banner', true );
	$descripcion_banner = get_post_meta( $post->ID, 'descripcion_banner', true );
	$linkedin_banner = get_post_meta( $post->ID, 'linkedin_banner', true );
	$contacto_banner = get_post_meta( $post->ID, 'contacto_banner', true );
	$github_banner = get_post_meta( $post->ID, 'github_banner', true );
	
    //$provider_email = get_post_meta( $post->ID, 'provider_email', true );
    //$provider_phone = get_post_meta( $post->ID, 'provider_phone', true );
    //$provider_descripcion_sobre_mi  = get_post_meta( $post->ID, 'provider_descripcion_sobre_mi', true );
    //$provider_titulo = get_post_meta( $post->ID, 'provider_titulo', true );
 
  // Se añade un campo nonce para probarlo más adelante cuando validemos
  wp_nonce_field( 'banner_metabox', 'banner_metabox_nonce' );?>
 
  <table width="100%" cellpadding="1" cellspacing="1" border="0">
    <tr>
        <td width="20%"><strong>Titulo</strong></td>
        <td width="80%"><input type="text" name="titulo_banner" value="<?php echo sanitize_text_field($titulo_banner);?>" class="large-text" placeholder="Titulo" /></td>
    </tr>
	<tr>
		<td width="20%"><label for="descripcion_banner" class="prfx-row-title"><strong>Descripción</strong></label></td>
		<td width="80%"><textarea name="descripcion_banner" id="descripcion_banner" style="width:99%" rows="4"><?php echo $descripcion_banner;?></textarea></td>
	</tr>
   <tr>
        <td width="20%"><strong>URL Linkedin</strong></td>
        <td width="80%"><input type="text" name="linkedin_banner" value="<?php echo sanitize_text_field($linkedin_banner);?>" class="large-text" placeholder="Url Linkedin" /></td>
    </tr>
        <tr>
        <td width="20%"><strong>URL contacto</strong></td>
        <td width="80%"><input type="text" name="contacto_banner" value="<?php echo sanitize_text_field($contacto_banner);?>" class="large-text" placeholder="Url contacto" /></td>
    </tr>
	</tr>
        <tr>
        <td width="20%"><strong>URL Github</strong></td>
        <td width="80%"><input type="text" name="github_banner" value="<?php echo sanitize_text_field($github_banner);?>" class="large-text" placeholder="Url Github" /></td>
    </tr>
    <!--<tr>
      <td width="20%"><strong>E-mail</strong></td>
      <td width="80%"><input type="email" name="provider_email" value="<?php //echo sanitize_email($provider_email);?>" class="large-text" placeholder="E-mail" /></td>
    </tr>
    <tr>
      <td><strong>Teléfono</strong></td>
      <td><input type="text" name="provider_phone" value="<?php //echo sanitize_text_field($provider_phone);?>" class="large-text" placeholder="Teléfono" /></td>
    </tr>-->
  </table> 
<?php }
 
function my_custom_fields_save_data_banner($post_id) {
      // Comprobamos si se ha definido el nonce.
      if ( ! isset( $_POST['banner_metabox_nonce'] ) ) {
        return $post_id;
      }
      $nonce = $_POST['banner_metabox_nonce'];

      // Verificamos que el nonce es válido.
      if ( !wp_verify_nonce( $nonce, 'banner_metabox' ) ) {
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
		//$old_provider_email = get_post_meta( $post_id, 'provider_email', true );
		//$old_provider_phone = get_post_meta( $post_id, 'provider_phone', true );
		//$old_provider_descripcion_sobre_mi = get_post_meta( $post_id, 'provider_descripcion_sobre_mi', true );
		$old_titulo_banner = get_post_meta( $post_id, 'titulo_banner', true );
		$old_descripcion_banner = get_post_meta( $post_id, 'descripcion_banner', true );
		$old_linkedin_banner = get_post_meta( $post_id, 'linkedin_banner', true );
		$old_contacto_banner = get_post_meta( $post_id, 'contacto_banner', true );
		$old_github_banner = get_post_meta( $post_id, 'github_banner', true );
	

      // Saneamos lo introducido por el usuario.
      //$provider_email = sanitize_text_field( $_POST['provider_email'] );
      //$provider_phone = sanitize_text_field( $_POST['provider_phone'] );
      //$provider_descripcion_sobre_mi = esc_textarea( $_POST['provider_descripcion_sobre_mi']);
      //$titulo = sanitize_text_field( $_POST['provider_titulo'] );
		
		$titulo = sanitize_text_field( $_POST['titulo_banner'] );
		$descripcion = sanitize_text_field( $_POST['descripcion_banner'] );
		$linkedin = sanitize_text_field( $_POST['linkedin_banner'] );
		$contacto = sanitize_text_field( $_POST['contacto_banner'] );
		$github = sanitize_text_field( $_POST['github_banner'] );

      // Actualizamos el campo meta en la base de datos.
		//update_post_meta( $post_id, 'provider_email', $provider_email, $old_provider_email );
		//update_post_meta( $post_id, 'provider_phone', $provider_phone, $old_provider_phone );
		//update_post_meta( $post_id, 'provider_descripcion_sobre_mi', $provider_descripcion_sobre_mi , $old_provider_descripcion_sobre_mi  );
		// update_post_meta( $post_id, 'provider_descripcion_sobre_mi', $_POST['provider_descripcion_sobre_mi']  );
		//update_post_meta( $post_id, 'provider_titulo', $titulo, $old_titulo);
		
		update_post_meta( $post_id, 'titulo_banner', $titulo, $old_titulo_banner);
		update_post_meta( $post_id, 'descripcion_banner', $descripcion, $old_descripcion_banner);
		update_post_meta( $post_id, 'linkedin_banner', $linkedin, $old_linkedin_banner);
		update_post_meta( $post_id, 'contacto_banner', $contacto, $old_contacto_banner);
		update_post_meta( $post_id, 'github_banner', $github, $old_github_banner);
}
add_action( 'save_post', 'my_custom_fields_save_data_banner' );
?>


 