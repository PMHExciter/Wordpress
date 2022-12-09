jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function fast_food_pizza_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function fast_food_pizza_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

var fast_food_pizza_Keyboard_loop = function (elem) {
    var fast_food_pizza_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var fast_food_pizza_firstTabbable = fast_food_pizza_tabbable.first();
    var fast_food_pizza_lastTabbable = fast_food_pizza_tabbable.last();
    /*set focus on first input*/
    fast_food_pizza_firstTabbable.focus();

    /*redirect last tab to first input*/
    fast_food_pizza_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            fast_food_pizza_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    fast_food_pizza_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            fast_food_pizza_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){
	$('.mobiletoggle').click(function () {
        fast_food_pizza_Keyboard_loop($('.menu-brand.primary-nav'));
    });
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});

jQuery('document').ready(function($){
    $('.main-search span a').click(function(){
        $(".searchform_page").slideDown(500);
        fast_food_pizza_Keyboard_loop($('.searchform_page'));
    });

    $('.close a').click(function(){
        $(".searchform_page").slideUp(500);
    });
}); 