jQuery(document).ready(function ($) {
  $('.custom_media_item_upload').on("click", function() {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = $(this);
 
    wp.media.editor.send.attachment = function(props, attachment) {
      $(button).next().val(attachment.id);
      $(button).next().next().attr('src', attachment.url);
      $(button).next().next().show();
      $(button).next().next().next().show();
 
      wp.media.editor.send.attachment = send_attachment_bkp;
    }
    wp.media.editor.open(button);
 
    return false;       
  });
 
  $('.custom_media_item_delete').on("click", function() {
    var button = $(this);
 
    $(button).hide();
    $(button).prev().attr('src', '');
    $(button).prev().hide();
    $(button).prev().prev().val('');
 
    return false;       
  });
 
//Para subir imagenes en el panel de administracion en la seccion de trabajos
	  $('.custom_media_item_upload_trabajos').on("click", function() {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = $(this);
 
    wp.media.editor.send.attachment = function(props, attachment) {
      $(button).next().val(attachment.id);
      $(button).next().next().attr('src', attachment.url);
      $(button).next().next().show();
      $(button).next().next().next().show();
 
      wp.media.editor.send.attachment = send_attachment_bkp;
    }
    wp.media.editor.open(button);
 
    return false;       
  });
 
  $('.custom_media_item_delete_trabajos').on("click", function() {
    var button = $(this);
 
    $(button).hide();
    $(button).prev().attr('src', '');
    $(button).prev().hide();
    $(button).prev().prev().val('');
 
    return false;       
  });
	
//se acabo hola	
	
	
  $('.date_picker').datepicker({
    firstDay: 1,
    dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
    dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
    monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
    dateFormat: 'dd/mm/yy',
  });
 
  $('.color_picker').wpColorPicker({
    defaultColor: true,
    change: function(event, ui){},
    clear: function() {},
    hide: true,
    palettes: true
  });
});
 