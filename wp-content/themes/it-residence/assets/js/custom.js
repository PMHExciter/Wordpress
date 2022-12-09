// Custom JS for Theme
jQuery(document).ready(function() {

    jQuery('.header-slider-wrapper').owlCarousel({
		items: 1,
		autoplay: true
	});

    jQuery('.testimonials-wrapper').owlCarousel({
		items: 2,
		autoplay: true,
        dots: true,
        loop: true,
        responsive:
        {
			0: {
				items: 1
			},
			768: {
				items: 2
			}
		}
	});

	jQuery('[data-vbg]').youtube_background({
		'mobile':true,
		'fit-box':true
	});

    // Navigation
	var clickedBtn;
	jQuery('.menu-link').bigSlide({
		easyClose	: true,
		width		: '25em',
		side		: 'right',
		beforeOpen	: function() {
			jQuery('.menu-overlay').show();
		},
		afterOpen	: function(e) {
				    	jQuery('#close-menu').focus();
				    	clickedBtn = jQuery(e.target).parent();
			    	},
		afterClose: function(e) {
				    	clickedBtn.focus()
			    }
    });

  	jQuery('.go-to-top').on('focus', function() {
		jQuery('#close-menu').focus();
		jQuery('.menu-overlay').hide();
	});

	jQuery('.go-to-bottom').on('focus', function() {
		jQuery('ul#menu-mobile li:last-child > a').focus();
	});

	var parentElement =	jQuery('.panel li.menu-item-has-children'),
      		dropdown  =	jQuery('.panel li.menu-item-has-children span');

	parentElement.children('ul').hide();
	dropdown.on({
		'click': function(e) {
			e.target.style.transform == 'rotate(0deg)' ? 'rotate(180deg)' : 'rotate(0deg)';
			jQuery(this).siblings('ul').slideToggle().toggleClass('expanded');
			e.stopPropagation();
		},
		'keydown': function(e) {
			if( e.keyCode == 32 || e.keyCode == 13 ) {
				e.preventDefault();
				jQuery(this).siblings('ul').slideToggle().toggleClass('expanded');
				e.stopPropagation();
			}
		}
	});

});
