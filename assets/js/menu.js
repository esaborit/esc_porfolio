$(document).ready(function(){
    
   
	
	$('#abrir').click(function(){			
		//$('#main').css('marginLeft', '250px');		
		$('#mySidenav').css('width', '250px');		
		$("body").css("background-color", "rgba(77, 182, 224, 0.4)");
		$("#opaco").css("opacity", "0.4");
	});
	
	$('#mySidenav').click(function(){
		$('#mySidenav').css('width', '0px');
		//$('#main').css('marginLeft', '250px');
		$("body").css("background-color", "white");
		$("#opaco").css("opacity", "1");
	});
    
    
    // para que se esconda el menu
      // hide .navbar first
    //$(".navbar").hide();
	$(".navbar-default").css("background-color", "transparent");
	$(".navbar-default").css("border-color", "transparent");
	$('.navbar-default').css("box-shadow", "none");
    $('.nombre').css('visibility', 'hidden');
 
    //Para que se vea la barra al hacer scroll       // fade in .navbar
    $(function () {
        $(window).scroll(function () {
            // set distance user needs to scroll before we fadeIn navbar
            if ($(this).scrollTop() > 100) {
                //$('.navbar').fadeIn();
				$('.navbar-default').css("background-color", "#72B5DA");
				//$('.navbar-default').css("border-color", "#E7E7E7");
				$('.navbar-default').css("box-shadow", "0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)");
                $('.nombre').css('visibility', 'visible');
            } else {
                //$('.navbar').fadeOut();
				$(".navbar-default").css("background-color", "transparent");
				$(".navbar-default").css("border-color", "transparent");
				$('.navbar-default').css("box-shadow", "none");
                $('.nombre').css('visibility', 'hidden');
            }
        });

 
    });
	
    //Boton para subir al inicio de la pagina
    $('body').append('<div id="toTop" class="btn btn-circle"><i class="fa fa-angle-double-up"></i></div>');
    	$(window).scroll(function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		}); 
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 900);
        return false;
    });
	
});