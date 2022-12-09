/**
 * Laravel mix configs
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

let mix = require('laravel-mix');

require('laravel-mix-banner');


mix.sass('assets/styles/entry.scss', 'style.css').options({
    processCssUrls: false
})
.banner({
    banner: (function () {
        return [
            '/*',
            'Theme Name: Hello Mobili',
            'Theme URI: https://wp-mobili.com/themes/hello-mobili/',
            'Author: the Mobili team',
            'Author URI: https://wp-mobili.com/',
            'Description: Hello Mobili is a starter template for Mobili plugin.',
            'Requires at least: 5.3',
            'Tested up to: 5.9',
            'Requires PHP: 7.1',
            'Version: 1.0.2',
            'Mobili: 1.0.0',
            'License: GNU General Public License v2 or later',
            'License URI: http://www.gnu.org/licenses/gpl-2.0.html',
            'Text Domain: hello-mobili',
            'Tags: no-column, mobili, mobile-theme, custom-colors, custom-menu, custom-logo, editor-style, featured-images, rtl-language-support, sticky-post, threaded-comments, translation-ready, blog',
            '*/'
        ].join('\n');
    })(),
    raw: true,
});
mix.js('assets/scripts/entry.js', 'dist/scripts.js');