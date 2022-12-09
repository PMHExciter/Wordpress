(function ($) {
	$(document).ready(function () {
        $('.newslist-theme-slider-main-wrap').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<div class="slider-arrow slider-prev fa fa-angle-left"></div>',
            nextArrow: '<div class="slider-arrow slider-next fa fa-angle-right"></div>',
            arrows: NEWSLISTMAG.heroNewsShowArrows == 1 ? true : false,
            dots: false,
            autoplay: NEWSLISTMAG.heroNewsAutoPlay == 1 ? true : false,
            autoplaySpeed: 2000,          
            responsive: [{
              breakpoint: 768,
              settings: {
                centerMode: true,
                slidesToShow: 2
              }
            }, {
              breakpoint: 480,
              settings: {
                centerMode: true,
                slidesToShow: 1
              }
            }]
          });

        $( '.sidebar-order' ).theiaStickySidebar({
          // 'additionalMarginTop': 0,
          // 'additionalMarginBottom': 0,
        });
    });
})(jQuery)