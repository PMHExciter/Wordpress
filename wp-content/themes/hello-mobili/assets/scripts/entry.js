/**
 * Template scripts entry
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

require('bootstrap');
require('./_navigation-bar');

(function ($) {
    "use strict";

    $(document).on('click', '.wp-block-video + .play-button', function (e) {
        e.preventDefault();
        let video = $(this).prev('.wp-block-video').find('video');
        if (video.length > 0) {
            video.get(0).play();
            $(this).parent().addClass('is-playing');
        }
    });
    $(document).on('click', '.wp-block-audio + .play-button', function (e) {
        e.preventDefault();
        let audio = $(this).prev('.wp-block-audio').find('audio');
        if (audio.length > 0) {
            audio.get(0).play();
            $(this).parent().addClass('is-playing');
        }
    });

    $(document).on('ready', function () {
        $('.responsive-menu ul li.menu-item-has-children').each(function () {
            $(this).children('a').after('<button type="button" class="arrow" aria-label="' + localizedVariable.menuToggle + '"><i class="fas fa-angle-down"></i></button>');
        });
    });

    $(document).on('click', '.responsive-menu ul li a + .arrow', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('children--showing');
        $(this).next('ul').slideToggle();
    });
})(jQuery);