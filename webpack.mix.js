const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


/*
 mix.setPublicPath('public')
.js('resources/js/app.js', 'public/js')
.vue()
.postCss('resources/css/app.css', 'public/css', [
        //
    ])
.webpackConfig(require('./webpack.config'))
.sourceMaps()
;
*/


 mix.setPublicPath('public')
 .js('resources/js/app.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css')
 ;


/*
 mix.js('resources/js/app.js', 'public/js')
.vue()
.postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .webpackConfig(require('./webpack.config'))
    .sourceMaps()
;
*/


    // ブラウザキャッシュ回避のためのファイルのバージョ二ングを有効に
if (mix.inProduction()) {
    mix.version();
};
