/* ========================================== 
scrollTop() >= 300
Should be equal the the height of the header
========================================== */

$(document).ready(function () {
	      $(window).scroll(function() {
             if ($(this).scrollTop() > 50){  
                 $('.top-header').addClass("sticky");
             }
             else{
                 $('.top-header').removeClass("sticky");
             }
         });




 $(".center-slider").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3,
		
			responsive: [
		 {
              breakpoint: 1024,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 2,
                  infinite: true,
                  dots: false,
				   arrows: true,
              }
          },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
        slidesToShow: 1,
		slidesToScroll:1,
      }
    },
    {
      breakpoint: 560,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
		slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
      });
	  
	  
	  $(".center-slider2").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow:3,
        slidesToScroll: 1,
		
			responsive: [
		 {
              breakpoint: 1024,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: false,
				   arrows: true,
              }
          },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: false,
        centerPadding: '0px',
        slidesToShow: 1,
		slidesToScroll: 1,
      }
    },
    {
      breakpoint: 560,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
		slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
      });
	  
	  
	    $(".center-slider3").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
		
			responsive: [
		 {
              breakpoint: 1024,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: false,
				   arrows: true,
              }
          },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
        slidesToShow: 1,
		slidesToScroll:1,
      }
    },
    {
      breakpoint: 560,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
		slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
      });
	  
	  
// Gallery 1

 $(".logo-slider").slick({
        dots: false,
	    arrows: true,
        slidesToShow: 5,
        slidesToScroll:1,

		responsive: [
		 {
              breakpoint: 1024,
              settings: {
                  slidesToShow: 4,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: false,
				   arrows: true,
              }
          },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
        slidesToShow: 3,
		slidesToScroll: 3,
      }
    },
    {
      breakpoint: 560,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '40px',
		slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]

      });
	  
	 
// testimonials
 $(".testimonials").slick({
       dots: false,
	   arrows: true,
	   infinite: false,
       centerMode: false,
       slidesToShow: 1,
       slidesToScroll: 1,	  
 });

	
	

  // Add smooth scrolling to all links
  $("a.scroll").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 500, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  

  
// INFOGRAPHICS PAGE SLIDER  
  
  $(".infographic").slick({
        dots: false,
        infinite: false,
        centerMode: false,
        slidesToShow: 1,
        slidesToScroll: 1,
		
      });
});
	
	

	
// Dropdown MEGA MENU
/* $('ul.navbar-nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeIn(300);
    $(this).find('.dropdown-toggle') .addClass( "active-menu" ); 
}, 
function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeOut(300);
  $(this).find('.dropdown-toggle') .removeClass( "active-menu" );
});

$('ul.navbar-nav li.dropdown').click(function() {
  $(this).find('.dropdown-toggle') .removeClass( "active-menu" );
}); */






(function($) {
	$.fn.tab = function(options) {
		var opts = $.extend({}, $.fn.tab.defaults, options);
		return this.each(function() {
			var obj = $(this);

			$(obj).find('.menu-category-list li').on(opts.trigger_event_type, function() {
				$(obj).find('.menu-category-list li').removeClass('active');
				$(this).addClass('active');
				
				$(obj).find('.select-category .category').hide();
				$(obj).find('.select-category .category').eq($(this).index()).show();
			})
		});
	}
	$.fn.tab.defaults = {
		trigger_event_type: 'click', //mouseover | click 默认是click
	};

})(jQuery);
