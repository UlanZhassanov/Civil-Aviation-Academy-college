// JavaScript Document
$(document).ready(function(){
    "use strict";
$(document).on('click','.nav-link', function(event) {
    event.preventDefault();
    var target = "#" + this.getAttribute('data-target');
    // -130 for navbar-fixed otherwise you can use 0 instead
    var top = $(target).offset().top - 100;
    $('html, body').animate({
        scrollTop: top
    }, 3000);
});

$("#testimonials").owlCarousel({
  slideSpeed: 500,
  autoPlay : 7000,
  paginationSpeed: 500,
  singleItem: true,
  pagination : true,
  transitionStyle : "backSlide"
});

/*-----------------------------------------------------------------------------------*/
/* MENU (For fixed Navbar for both blue and orange version)
/*-----------------------------------------------------------------------------------*/



var previousScroll = 0;
  $(window).scroll(function(){

    var scroll = $(window).scrollTop();
      if (scroll > 0 && scroll < previousScroll) {
        $('#navMenu').css("transform","translateY(-0%)");

        function myFunction(x) {
            if (x.matches) { // If media query matches
                $('#my_image').css('margin-left','0vw');
            } else {
                $('#my_image').css('margin-left','80px');
            }
          }

          var x = window.matchMedia("(max-width: 991px)")
          myFunction(x)

      } else if (scroll > 0 && scroll > previousScroll){
        $('#navMenu').css("transform","translateY(-100%)");

        function myFunction(x) {
            if (x.matches) { // If media query matches
                $('#my_image').css('margin-left','0vw');
            } else {
                $('#my_image').css('margin-left','80px');
            }
        }

          var x = window.matchMedia("(max-width: 991px)")
          myFunction(x)
      }

      else{


        function myFunction(x) {
            if (x.matches) { // If media query matches
                $('#navMenu').css("transform","translateY(0px)");
            } else {
                $('#navMenu').css("transform","translateY(31.5px)");
            }
        }

        var x = window.matchMedia("(max-width: 991px)")
        myFunction(x)
      }
	  previousScroll = scroll;

});
  /*****************************************************
  *
  * Flex Slider
  *
  *****************************************************/
   $(function() {
    $('.material-card > .mc-btn-action').click(function () {
        var card = $(this).parent('.material-card');
        var icon = $(this).children('i');
        icon.addClass('fa-spin-fast');

        if (card.hasClass('mc-active')) {
            card.removeClass('mc-active');

            window.setTimeout(function() {
                icon
                    .removeClass('fa-arrow-left')
                    .removeClass('fa-spin-fast')
                    .addClass('fa-bars');

            }, 800);
        } else {
            card.addClass('mc-active');

            window.setTimeout(function() {
                icon
                    .removeClass('fa-bars')
                    .removeClass('fa-spin-fast')
                    .addClass('fa-arrow-left');

            }, 800);
        }
    });
});
});



