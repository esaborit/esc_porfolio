$(function() {
    
    
	
	// Cache the Window object
	var $window = $(window);
	
	// Parallax Backgrounds
	// Tutorial: http://code.tutsplus.com/tutorials/a-simple-parallax-scrolling-technique--net-27641
	
	$('section[data-type="background"]').each(function(){
		var $bgobj = $(this); // assigning the object
		
		$(window).scroll(function() {
		
			// Scroll the background at var speed
			// the yPos is a negative value because we're scrolling it UP!								
			var yPos = -($window.scrollTop() / $bgobj.data('speed'));
			
			// Put together our final background position
			var coords = '50% '+ yPos + 'px';
			
			// Move the background
			$bgobj.css({ backgroundPosition: coords });
			
		}); // end window scroll
	});
    
    
    //Animacion de texto
    $(window).scroll(function() {
		$('.aparecerIzquierda').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).addClass("animated slideInLeft");
                $(this).css("visibility", "visible");
			}
		});
        //Aparecer por la derecha
        $('.aparecerDerecha').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				$(this).addClass("animated slideInRight");
                $(this).css("visibility", "visible");
			}
		});
        
        //Aparecer
        $('.aparecer').each(function(){
		var imagePos = $(this).offset().top;
            
                    
		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+590) {
				$(this).addClass("animated fadeIn");
                $(this).css("visibility", "visible");
			}
		});
        
	});
	
    //animacion flecha al pasar el raton por encima
   /* function animationHover(element, animation){
    element = $(element);
    element.hover(
        function() {
            //element.addClass('animated ' + animation); 
            element.addClass( animation); 
        },
        function(){
            //wait for animation to finish before removing classes
           window.setTimeout( function(){
                element.removeClass('animated ' + animation);
            }, 2000);         
        });
    }
    
    $('.pulso').each(function() {
        animationHover(this, 'pulse');
    });*/
    
    
    
    // jQuery for page scrolling feature - requires jQuery Easing plugin
  /*  $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });*/

    
   
    
    
    
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
  /*  function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
  /*  function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }*/
    
    
    function collapseNavbar() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
}

$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);
    
  // fakewaffle.responsiveTabs(['xs', 'sm']); 
    //$('#myTab').tabCollapse();
	
});

 

 