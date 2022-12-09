/**
 * Navigation bar scripts
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

(function ($) {
    "use strict";

    $(document).on('click', '.bottom-menu-bar .grid-item[data-slug],.bottom-menu .item-close', function (e) {
        e.preventDefault();
        let slug = $(this).attr('data-slug');
        let navigationbar = $(this).parents('.bottom-menu');

        if (slug === 'back' || $(this).hasClass('grid-item--active')) {
            $('.grid-item[data-slug="back"]')
                .addClass('grid-item--hidden')
                .parents('.bar-grid')
                .find('.grid-item')
                .removeClass('grid-item--active');
            navigationbar.find('.content-item').fadeOut('fast').removeClass('content-item--visible');
            navigationbar.find('.grid-item--current').addClass('grid-item--active');
            return false;
        }

        navigationbar.find('.content-item:not([data-slug="' + slug + '"])').fadeOut('fast').removeClass('content-item--visible');
        navigationbar.find('.content-item[data-slug="' + slug + '"]').fadeToggle('fast').addClass('content-item--visible');
        navigationbar.find('.grid-item[data-slug="back"]').removeClass('grid-item--hidden');
        navigationbar.find('.grid-item').not(this).removeClass('grid-item--active');
        $(this).toggleClass('grid-item--active');
    });
})(jQuery);