let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.scripts([
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/custom.js',
    'resources/assets/styles/bootstrap4/popper.js',
    'resources/assets/bootstrap.min.js',
    'resources/assets/plugins/greensock/TweenMax.min.js',
    'resources/assets/plugins/greensock/TimelineMax.min.js',
    'resources/assets/plugins/scrollmagic/ScrollMagic.min.js',
    'resources/assets/plugins/greensock/animation.gsap.min.js',
    'resources/assets/plugins/greensock/ScrollToPlugin.min.js',
    'resources/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
    'resources/assets/plugins/scrollTo/jquery.scrollTo.min.js',
    'resources/assets/plugins/easing/easing.js',
], 'public/js/all.js');

mix.styles([
    'resources/assets/styles/bootstrap4/bootstrap.min.css',
    'resources/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css',
    'resources/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
    'resources/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
    'resources/assets/plugins/OwlCarousel2-2.2.1/animate.css',
    'resources/assets/styles/main_styles.css',
    'resources/assets/styles/responsive.css',
], 'public/css/all.css');

mix.copyDirectory('resources/assets/images', 'public/images');
